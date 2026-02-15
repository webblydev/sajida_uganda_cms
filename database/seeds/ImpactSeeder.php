<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ImpactModel;

class ImpactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ImpactModel::create([
            'title' => 'Impact',
            'description' => 'Our work is currently focused in the Busoga region, one of the areas hardest hit by poverty. Here, we are supporting micro and small entrepreneurs who have been excluded by traditional MFIs and left without pathways for growth, while also expanding access to healthcare for the most poverty-stricken households.',
            'impact_1_count' => '2,100+',
            'impact_1_title' => 'brought under financial inclusion',
            'impact_2_count' => '181,000+',
            'impact_2_title' => 'USD portfolio',
            'impact_3_count' => '1,070+',
            'impact_3_title' => 'individuals getting access to health care',
            'impact_4_count' => '2,080,500+',
            'impact_4_title' => 'UGX paid for health financing',
        ]);
    }
}
