<?php

use Illuminate\Database\Seeder;
use App\Models\NewsCategory;

class NewsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'title' => 'General News',
                'description' => 'General news and updates',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Announcements',
                'description' => 'Official announcements and notices',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Events',
                'description' => 'Upcoming and past events',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Education',
                'description' => 'Educational news and updates',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Technology',
                'description' => 'Technology related news',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Health',
                'description' => 'Health and wellness news',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($categories as $category) {
            NewsCategory::firstOrCreate(
                ['title' => $category['title']],
                $category
            );
        }
    }
}
