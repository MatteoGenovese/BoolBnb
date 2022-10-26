<?php

use App\Models\Photo;
use Illuminate\Database\Seeder;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i=1; $i <= 38; $i++) { 
            $newPhoto = new Photo();
            $newPhoto->apartment_id = $i;
            $newPhoto->file_name = 'seededphoto/apartment' . $i . '.jpg';
            $newPhoto->is_cover_photo = true;
            $newPhoto->save();
        } 

    }
}
