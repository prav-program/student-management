<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed the teachers table first
        $this->call(TeacherSeeder::class);
        
        // Seed the students table after teachers
        $this->call(StudentSeeder::class);
    }
}