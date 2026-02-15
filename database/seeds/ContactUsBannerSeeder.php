<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContactUsBanner;

class ContactUsBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContactUsBanner::create([
            'title' => 'Contact Us',
            'background_image' => null, // Can be added later through admin panel
        ]);
    }
}
