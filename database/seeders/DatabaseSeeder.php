<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Meeting;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);

        $this->call(EmployeeSeeder::class);
        // $this->call(MeetingSeeder::class);

        // $employee1 = Employee::find(1);
        // $employee2 = Employee::find(2);
    
        // $meeting1 = Meeting::find(1);
        // $meeting2 = Meeting::find(2);
    
        // // Attaching employees to meetings
        // $meeting1->employees()->attach([$employee1->id, $employee2->id]);
        // $meeting2->employees()->attach([$employee1->id]);
    }
}
