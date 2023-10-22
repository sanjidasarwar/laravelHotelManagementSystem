<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([

            // admin
            [
                'name'=>'admin',
                'email'=>'admin@gmail.com',
                'password'=>Hash::make('111'),
                'role'=>'admin',
                'status'=>'active'
            ],

            // user
            [
                'name'=>'user',
                'email'=>'user@gmail.com',
                'password'=>Hash::make('111'),
                'role'=>'user',
                'status'=>'active'
            ],


        ]);
    }
}
