<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InternshipCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create an array with different good category
        $internCategories = ['Business','IT','Engineering','Design','Science', 'Law', 'Other'];
        for($i = 0; $i < count($internCategories); $i++) {
            DB::table('internship_categories')->insert([
                'category_title' => $internCategories[$i],
                'category_description' => 'Category ' . $internCategories[$i] . ' description',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
