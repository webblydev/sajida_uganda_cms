<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DonationSection;

class DonationSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DonationSection::create([
            'title' => 'Be the Change-Donate Today',
            'description' => 'Your gift provides vital healthcare to vulnerable families and empowers small business owners in Uganda to break free from poverty and build brighter futures.',
            'button_text' => 'Donate >',
            'button_link' => null, // Will use default route('donation.index')
            'image' => null, // Can be added later through admin panel
        ]);
    }
}
