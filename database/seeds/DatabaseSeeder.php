<?php

use App\Models\Apartment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // ? Indipendenti
            UsersTableSeeder::class,
            ApartmentsTableSeeder::class,

            // ? Dipendenti
            MessagesTableSeeder::class,
            PhotosTableSeeder::class,
            ServicesTableSeeder::class,
            SponsorshipsTableSeeder::class,
            VisualsTableSeeder::class,

            // ? Pivot
            ApartmentServiceTableSeeder::class,
            ApartmentSponsorshipTableSeeder::class,
        ]);
    }
}
