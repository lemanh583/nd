<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
        [
            'role' => 'admin',
            'descriptions' => 'Quản trị viên'
        ],
        [
            'role' => 'mod',
            'descriptions' => 'Quản lý'
        ],
        [
            'role' => 'user',
            'descriptions' => 'Người dùng'
        ] 
        ]);
    }
}
