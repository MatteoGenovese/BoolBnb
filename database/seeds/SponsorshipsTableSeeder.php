<?php

use App\Models\Sponsorship;
use Illuminate\Database\Seeder;

class SponsorshipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponsorships = [
            [
                'name' => 'bronze',
                'price' => 2.99,
                'duration' => 24,
            ],
            [
                'name' => 'silver',
                'price' => 5.99,
                'duration' => 72,
            ],
            [
                'name' => 'gold',
                'price' => 9.99,
                'duration' => 144,
            ]
        ];

        foreach ($sponsorships as $sponsorship) {
            $newSponsorship = new Sponsorship();
            $newSponsorship->name = $sponsorship['name'];
            $newSponsorship->price = $sponsorship['price'];  
            $newSponsorship->duration = $sponsorship['duration'];  
            $newSponsorship->save();
        }
    }
}
