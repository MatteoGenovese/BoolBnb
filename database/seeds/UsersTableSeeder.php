<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Gianni',
                'surname' => 'Rossi',
                'date_of_birth' => '1990/03/20',
                'email' => 'gianni@gmail.com',
                'password' => 'dslofhisd',
            ],
            [
                'name' => 'Bianca',
                'surname' => 'Bianchi',
                'date_of_birth' => '1940/02/10',
                'email' => 'bian@gmail.com',
                'password' => 'dslofhisd',
            ],
            [
                'name' => 'Federico',
                'surname' => 'Rossini',
                'date_of_birth' => '1996/04/10',
                'email' => 'federossi@gmail.com',
                'password' => 'dslofhisd',
            ],
            [
                'name' => 'Donata',
                'surname' => 'Cervelli',
                'date_of_birth' => '1960/07/20',
                'email' => 'donny@gmail.com',
                'password' => 'dslofhisd',
            ],
            [
                'name' => 'Alessandra',
                'surname' => 'Rossini',
                'date_of_birth' => '1990/02/02',
                'email' => 'aleros@gmail.com',
                'password' => 'dslofhisd',
            ],

        ];

        $devUser = new User();
        $devUser->name = 'Gianni';
        $devUser->surname = 'Morandi';
        $devUser->date_of_birth = '1985/10/10';
        $devUser->email = 'dev@gmail.com';
        $devUser->password = Hash::make('ciaociaociao');
        $devUser->save();

        foreach ($users as $user) {
            $newUser = new User();
            $newUser->name = $user['name'];
            $newUser->surname = $user['surname'];
            $newUser->date_of_birth = $user['date_of_birth'];
            $newUser->email = $user['email'];
            $newUser->password = Hash::make($user['password']);
            $newUser->save();
        }
    }
}
