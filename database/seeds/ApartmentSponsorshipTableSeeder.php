<?php

use App\Models\Apartment;
use App\Models\Sponsorship;
use Illuminate\Database\Seeder;

class ApartmentSponsorshipTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TODO To seed when needed

        $apartments = Apartment::inRandomOrder()->limit(2)->get();
        $sponsorships = Sponsorship::all();

        foreach ($apartments as $apartment) {
            
            $randomsponsorships = Sponsorship::inRandomOrder()->limit(2)->get();

            // $apartment->sponsorships()->attach([
            //     1 => ['expires' => $expires],
            //     2 => ['expires' => $expires],
            // ]);
            
            $apartment->sponsorships()->attach($sponsorship->id, ['expiration_date' => ]);

        }
    }
}
