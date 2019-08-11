<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
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
                'name' => 'The Deceased',
                'email' => 'some@mail.ru',
                'password' => bcrypt('admin123'),
                'remember_token' => '',
            ],
        ];
        foreach ($users as $userData) {
            $user = new \App\User($userData);
            $user->save();
        }
    }
}
