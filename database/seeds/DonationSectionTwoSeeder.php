<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DonationSectionTwo;

class DonationSectionTwoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DonationSectionTwo::create([
            'title' => 'Be The Light In Someone\'s Darkest Hour',
            'description' => '<p>Your donation can bring hope and healing to families living in poverty—providing access to lifesaving medicines, doctor consultations, and critical treatment.</p><p>Every contribution uplifts the most vulnerable, easing their suffering and restoring dignity, comfort, and strength in the face of immense challenges.</p>',
            'image' => null, // Can be added later through admin panel
        ]);
    }
}
