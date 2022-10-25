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
        
        $photos = [
            [
                'apartment_id' => 1,
                'file_name' => 'seededphoto/apartment1.jpg',
                'is_cover_photo' => true,
            ],
            [
                'apartment_id' => 2,
                'file_name' => 'seededphoto/apartment2.jpg',
                'is_cover_photo' => true,
            ],
            [
                'apartment_id' => 3,
                'file_name' => 'seededphoto/apartment3.jpg',
                'is_cover_photo' => true,
            ],
            [
                'apartment_id' => 4,
                'file_name' => 'seededphoto/apartment4.jpg',
                'is_cover_photo' => true,
            ],
            [
                'apartment_id' => 5,
                'file_name' => 'seededphoto/apartment5.jpg',
                'is_cover_photo' => true,
            ],
            [
                'apartment_id' => 6,
                'file_name' => 'seededphoto/apartment6.jpg',
                'is_cover_photo' => true,
            ],
            [
                'apartment_id' => 7,
                'file_name' => 'seededphoto/apartment7.jpg',
                'is_cover_photo' => true,
            ],
            [
                'apartment_id' => 8,
                'file_name' => 'seededphoto/apartment8.jpg',
                'is_cover_photo' => true,
            ],
            [
                'apartment_id' => 9,
                'file_name' => 'seededphoto/apartment9.jpg',
                'is_cover_photo' => true,
            ],
            [
                'apartment_id' => 10,
                'file_name' => 'seededphoto/apartment10.jpg',
                'is_cover_photo' => true,
            ],
            [
                'apartment_id' => 11,
                'file_name' => 'seededphoto/apartment1.jpg',
                'is_cover_photo' => true,
            ],
        ];


        foreach ($photos as $photo) {
            $newPhoto = new Photo();
            $newPhoto->apartment_id = $photo['apartment_id'];
            $newPhoto->file_name = $photo['file_name'];
            $newPhoto->is_cover_photo = $photo['is_cover_photo'];
            $newPhoto->save();
     
        }

    }
}
