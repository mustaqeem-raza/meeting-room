<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class MeetingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert dummy data into the meetings table
        DB::table('meetings')->insert([
            [
                'title' => 'Team Meeting',
                'organizer' => 'John Doe',
                'start_time' => Carbon::parse('2024-12-12 10:00:00'),
                'end_time' => Carbon::parse('2024-12-12 11:00:00'),
                'participants' => json_encode([1, 2, 3]), // Assuming employee IDs
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Project Kickoff',
                'organizer' => 'Jane Smith',
                'start_time' => Carbon::parse('2024-12-14 14:00:00'),
                'end_time' => Carbon::parse('2024-12-14 15:30:00'),
                'participants' => json_encode([4, 5, 6]), // Assuming employee IDs
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Client Meeting',
                'organizer' => 'Robert Brown',
                'start_time' => Carbon::parse('2024-12-16 09:00:00'),
                'end_time' => Carbon::parse('2024-12-16 10:00:00'),
                'participants' => json_encode([2, 3, 4]), // Assuming employee IDs
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Office Trip Planning',
                'organizer' => 'Alice Johnson',
                'start_time' => Carbon::parse('2024-12-18 13:00:00'),
                'end_time' => Carbon::parse('2024-12-18 14:30:00'),
                'participants' => json_encode([1, 3, 5]), // Assuming employee IDs
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
