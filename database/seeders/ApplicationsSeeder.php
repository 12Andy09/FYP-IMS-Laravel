<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicationsSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = ['waiting_company','waiting_admin','doing','completed'];
        for ($i = 1; $i <= 50; $i++) {
            $user_id = DB::table('users')->get()->random()->id;
            $internship_id = DB::table('internships')->get()->random()->id;
            DB::table('applications')->insert([
                'user_id' => $user_id,
                'internship_id' => $internship_id,
                'application_status'=>$status[rand(0,3)],
                'application_details'=>'test'.$i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
