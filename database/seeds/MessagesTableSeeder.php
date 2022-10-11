<?php

use Illuminate\Database\Seeder;
use App\Models\Message;
use App\Models\Apartment;
use Faker\Generator as Faker;
class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $apartments = Apartment::all();

        for ($i=0; $i < 50; $i++) { 
            $newMessage = new Message();
            $newMessage->apartment_id = $faker->randomElement($apartments)->id;
            $newMessage->username = $faker->firstName();
            $newMessage->email = $faker->email();
            $newMessage->message = $faker->text();

            $newMessage->save();
        }
    }
}
