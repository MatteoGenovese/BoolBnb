<?php

use Illuminate\Database\Seeder;
use App\Models\Service;


class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            'Posto auto',
            'Aria Condizionata',
            'Giardino',
            'WI-FI',
            'Ascensore',
            'TV',
            'Cucina',
            'Lavatrice',
            'Ferro da stiro',
            'Riscaldamento',
            'Lavastoviglie',
            'Asciugacapelli',
        ];

        foreach ($services as $service) {
            $newService = new Service();
            $newService->name = $service;
            $newService->save();
        }
    }
}
