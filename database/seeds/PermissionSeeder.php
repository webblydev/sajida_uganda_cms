<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            [
                'id' => 2, 
                'name' => 'manage_role',
                'guard_name' => 'web',
            ],
            [
                'id' => 3, 
                'name' => 'manage_permission',
                'guard_name' => 'web',
            ],
            [
                'id' => 4, 
                'name' => 'manage_user',
                'guard_name' => 'web',
            ],
            [
                'id' => 5, 
                'name' => 'manage_home_page',
                'guard_name' => 'web',
            ],
            [
                'id' => 6, 
                'name' => 'manage_about_us_page',
                'guard_name' => 'web',
            ],
            [
                'id' => 7, 
                'name' => 'manage_news_page',
                'guard_name' => 'web',
            ],
            [
                'id' => 8, 
                'name' => 'manage_approaches',
                'guard_name' => 'web',
            ],
            [
                'id' => 9, 
                'name' => 'manage_leadership_designation',
                'guard_name' => 'web',
            ],
            [
                'id' => 10, 
                'name' => 'manage_leadership_category',
                'guard_name' => 'web',
            ],
            [
                'id' => 11, 
                'name' => 'manage_leaders',
                'guard_name' => 'web',
            ],
            [
                'id' => 12, 
                'name' => 'manage_job_page_banner',
                'guard_name' => 'web',
            ],
            [
                'id' => 13, 
                'name' => 'manage_profession',
                'guard_name' => 'web',
            ],
            [
                'id' => 14, 
                'name' => 'manage_team',
                'guard_name' => 'web',
            ],
            [
                'id' => 15, 
                'name' => 'manage_location',
                'guard_name' => 'web',
            ],
            [
                'id' => 16, 
                'name' => 'manage_job_circular',
                'guard_name' => 'web',
            ],
            [
                'id' => 17, 
                'name' => 'manage_job_application',
                'guard_name' => 'web',
            ],
            [
                'id' => 18, 
                'name' => 'manage_donation_page_banner',
                'guard_name' => 'web',
            ],
            [
                'id' => 19, 
                'name' => 'manage_donation_list',
                'guard_name' => 'web',
            ],
        ]);
    }
}
