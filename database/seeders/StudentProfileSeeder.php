<?php

namespace Database\Seeders;

use App\Models\Student_Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student_Profile::create([
            'user_id' => 4,
            'student_id' => 101,
            'student_education' => 'Swinburne Bachelor of ICT',
            'student_photo' => 'default_profile.png',
            'student_resume' => '',
            'student_aboutMe' => 'Hard Working',
            'student_status' => '',
        ]);
    }
}
