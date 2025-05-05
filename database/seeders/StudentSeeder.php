<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            [
                'student_name' => 'Michael',
                'class_teacher_id' => 1,  // John Smith's ID
                'class' => '10A',
                'admission_date' => now(),
                'yearly_fees' => 2000.00,
            ],
            [
                'student_name' => 'Sarah',
                'class_teacher_id' => 2,  // Alice Johnson's ID
                'class' => '10B',
                'admission_date' => now(),
                'yearly_fees' => 2200.00,
            ],
            [
                'student_name' => 'James',
                'class_teacher_id' => 3,  // Mark Brown's ID
                'class' => '9A',
                'admission_date' => now(),
                'yearly_fees' => 1800.00,
            ],
            [
                'student_name' => 'Sophia',
                'class_teacher_id' => 4,  // Emma Williams's ID
                'class' => '9B',
                'admission_date' => now(),
                'yearly_fees' => 1900.00,
            ],
        ]);
    }
}
