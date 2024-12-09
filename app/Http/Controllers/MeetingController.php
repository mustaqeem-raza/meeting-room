<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Meeting;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function showCalendar()
    {
        $participents = Employee::all();
        $meetings = Meeting::with('employees')->get();
        return view('calendar.access', compact('meetings', 'participents')); // A form to input the token
    }

    public function getMeetings()
    {
        // Get all meetings from the database
        $meetings = Meeting::all();
        return response()->json($meetings);
    }

    public function addMeeting(Request $request)
    {
        // Validate the input
        $request->validate([
            'title' => 'required',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'organizer' => 'required',
            'participants' => 'required|array',
        ]);

        // Check for overlapping meetings
        $overlap = Meeting::where(function ($query) use ($request) {
            $query->whereBetween('start_time', [$request->start_time, $request->end_time])
                ->orWhereBetween('end_time', [$request->start_time, $request->end_time])
                ->orWhere(function ($query) use ($request) {
                    $query->where('start_time', '<', $request->start_time)
                        ->where('end_time', '>', $request->end_time);
                });
        })->exists();

        if ($overlap) {
            return response()->json(['error' => 'This time slot is already taken.'], 400);
        }

        // Create the new meeting
        $meeting = Meeting::create([
            'title' => $request->title,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'organizer' => $request->organizer,
            'participants' => json_encode($request->participants),
        ]);

        return response()->json($meeting);
    }

    public function getMeetingDetails($id)
    {
        // Get the details of a single meeting
        $meeting = Meeting::findOrFail($id);
        return response()->json($meeting);
    }

    // public function validateToken(Request $request)
    // {
    //     $request->validate(['token' => 'required']);
    //     $admin = User::where('meeting_access_token', $request->token)->first();

    //     if ($admin) {
    //         session(['access_granted' => true]);
    //         return redirect()->route('calendar.view');
    //     }

    //     return back()->withErrors(['token' => 'Invalid token.']);
    // }
}
