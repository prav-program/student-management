<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teachers')->insert([
            ['teacher_name' => 'John Smith'],
            ['teacher_name' => 'Alice Johnson'],
            ['teacher_name' => 'Mark Brown'],
            ['teacher_name' => 'Emma Williams'],
        ]);
    }
}
