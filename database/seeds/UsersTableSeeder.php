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
            [
                'name' => 'Federica',
                'surname' => 'Angelis',
                'date_of_birth' => '1995/02/03',
                'email' => 'fedeang1@gmail.com',
                'password' => 'dslofhisd',
            ],
            [
                'name' => 'Gianna',
                'surname' => 'Rossini',
                'date_of_birth' => '1998/03/04',
                'email' => 'gianna456@gmail.com',
                'password' => 'dslofhisd',
            ],
            [
                'name' => 'Alberto',
                'surname' => 'De Vitis',
                'date_of_birth' => '1985/02/03',
                'email' => 'alevito56@gmail.com',
                'password' => 'dslofhisd',
            ],
            [
                'name' => 'Gian Alberto',
                'surname' => 'Bianchetti',
                'date_of_birth' => '1985/06/03',
                'email' => 'greatal2@gmail.com',
                'password' => 'dslofhisd',
            ],
            [
                'name' => 'Andrea',
                'surname' => 'Milani',
                'date_of_birth' => '1980/06/03',
                'email' => 'andmil67@gmail.com',
                'password' => 'dslofhisd',
            ],
            [
                'name' => 'Primo',
                'surname' => 'Draghi',
                'date_of_birth' => '1970/06/03',
                'email' => 'primo23draghi5@gmail.com',
                'password' => 'dslofhisd',
            ],
            [
                'name' => 'Jessica',
                'surname' => 'Di Maio',
                'date_of_birth' => '1990/02/04',
                'email' => 'jess301@gmail.com',
                'password' => 'dslofhisd',
            ],
            [
                'name' => 'Roberta',
                'surname' => 'Antonelli',
                'date_of_birth' => '1991/01/01',
                'email' => 'robanto33@gmail.com',
                'password' => 'dslofhisd',
            ],
            [
                'name' => 'Roberto',
                'surname' => 'De Medici',
                'date_of_birth' => '1963/07/07',
                'email' => 'demedicirob@gmail.com',
                'password' => 'dslofhisd',
            ],
            [
                'name' => 'Daniel',
                'surname' => 'Barese',
                'date_of_birth' => '1979/06/03',
                'email' => 'danbar566@gmail.com',
                'password' => 'dslofhisd',
            ],
            [
                'name' => 'Asia',
                'surname' => 'De Donatis',
                'date_of_birth' => '1998/07/07',
                'email' => 'asiadedon236@gmail.com',
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
