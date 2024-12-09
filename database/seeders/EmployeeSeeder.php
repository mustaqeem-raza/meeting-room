<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert dummy employee data
        DB::table('employees')->insert([
            [
                'name' => 'John Doe',
                'department' => 'Sales',
                'email' => 'abc@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'department' => 'Marketing',
                'email' => 'cde@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Robert Brown',
                'department' => 'HR',
                'email' => 'fgh@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Alice Johnson',
                'department' => 'Finance',
                'email' => 'ijk@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Michael Lee',
                'department' => 'IT',
                'email' => 'lmn@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sara White',
                'department' => 'Operations',
                'email' => 'opq@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'David Wilson',
                'department' => 'Legal',
                'email' => 'rst@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Emily Clark',
                'department' => 'Customer Support',
                'email' => 'uvw@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
