<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Meeting;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function showCalendar()
    {
        $employees = Employee::all();
        $meetings = Meeting::with('participants')->get();

        return view('calendar.access', compact('meetings', 'employees'));
    }

    public function index()
    {
        $meetings = Meeting::all();

        $transformedMeetings = $meetings->map(function ($meeting) {
            $organizer = Employee::find($meeting->organizer);

            $participantIds = json_decode($meeting->participants, true);
            $participantNames = $participantIds
                ? Employee::whereIn('id', $participantIds)->pluck('name')->toArray()
                : [];

            return [
                'id' => $meeting->id,
                'title' => $meeting->title,
                'start' => $meeting->start_time,
                'end' => $meeting->end_time,
                'organizer' => $organizer->name,
                'participants' => $participantNames,
            ];
        });

        return response()->json($transformedMeetings);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after_or_equal:start_time',
            'organizer' => 'required|exists:employees,id',
            'participants' => 'required|array|min:1',
            'participants.*' => 'exists:employees,id',
        ]);

        try {
            Meeting::create([
                'title' => $validatedData['title'],
                'start_time' => $validatedData['start_time'],
                'end_time' => $validatedData['end_time'],
                'organizer' => $validatedData['organizer'],
                'participants' => json_encode($validatedData['participants']),
            ]);

            return redirect()->route('calendar.access');
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }
}
