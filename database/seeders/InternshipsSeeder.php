<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class InternshipsSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $job_position = ['HR', 'Programmer', 'Accountant', 'Clerk', 'Software Engineer', 'Automotive', 'Secretary', 'Sales'];
        $job_location = ['Kuching', 'Kuala Lumpur', 'Online', 'Indonesia', 'Miri'];
        DB::table('internships')->insert([

            'job_position' => 'HR',
            'job_description' => 'Internship as Software Engineer (Front-end) in Sagara Technology',
            'job_requirement' => "2 years of study in bachelor's degree",
            'company_overview' => 'Sagara Technology is an industry-leading software development proficient in delivering web and mobile IT solutions.',
            'job_location' => 'Online',
            'job_duration' => 'Jan/Feb',
            'user_id' => 3,
            'internship_category_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('internships')->insert([
            'job_position' => 'HR',
            'job_description' => 'Internship as Software Engineer (Front-end) in Sagara Technology',
            'job_requirement' => "2 years of study in bachelor's degree",
            'company_overview' => 'Sagara Technology is an industry-leading software development proficient in delivering web and mobile IT solutions.',
            'job_location' => 'Kuching',
            'job_duration' => 'June/July',
            'user_id' => 3,
            'internship_category_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        for ($i = 1; $i <= 25; $i++) {
            $internship_category_id = DB::table('internship_categories')->get()->random()->id;
            DB::table('internships')->insert([
                'job_position' => $job_position[rand(0, 7)],
                'job_description' => 'Internship as Software Engineer (Front-end) in Sagara Technology' . $i,
                'job_requirement' => "2 years of study in bachelor's degree",
                'company_overview' => 'Sagara Technology is an industry-leading software development proficient in delivering web and mobile IT solutions.',
                'job_location' => $job_location[rand(0, 4)],
                'job_duration' => 'June/July',
                'user_id' => 3,
                'internship_category_id' => $internship_category_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        for ($i = 1; $i <= 25; $i++) {
            $internship_category_id = DB::table('internship_categories')->get()->random()->id;
            DB::table('internships')->insert([
                'job_position' => $job_position[rand(0,7)],
                'job_description' => 'Internship as Software Engineer (Front-end) in Sagara Technology'.$i,
                'job_requirement' => "2 years of study in bachelor's degree",
                'company_overview' => 'Sagara Technology is an industry-leading software development proficient in delivering web and mobile IT solutions.',
                'job_location' => $job_location[rand(0,4)],
                'job_duration' => 'June/July',
                'user_id' => 1,
                'internship_category_id' => $internship_category_id,
                'created_at' => Carbon::now()->subMonth(8),
                'updated_at' => Carbon::now()->subMonth(8),
            ]);
        }
    }
}
