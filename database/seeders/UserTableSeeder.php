<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  
        User::firstOrCreate(
            ['email' => 'israa@mult.com'],
            ['name' => 'Israa Municipal Admin', 'password' => Hash::make('12345')]
        );

        User::firstOrCreate(
            ['email' => 'israa@mult2.com'],
            ['name' => 'Israa Content Editor', 'password' => Hash::make('12345')]
        );
    }
}
