<?php

use App\User;
use Illuminate\Database\Seeder;

class RespKitaSeeder extends Seeder
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
                'name' => 'admin',
                'email' => 'admin@resepkita.com',
                'password' => bcrypt('admin'),
                'account_status' => 1
            ],
            [
                'name' => 'member',
                'email' => 'member@resepkita.com',
                'password' => bcrypt('member'),
                'account_status' => 2
            ]
            ];
        User::insert($users);
    }
}
