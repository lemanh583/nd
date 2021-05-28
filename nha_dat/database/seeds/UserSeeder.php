<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'phone_number' => '123456789',
            'images' => '/storage/user_img/anh_mac_dinh.jpg',
            'id_role' => 1,
        ]);
    }
}
