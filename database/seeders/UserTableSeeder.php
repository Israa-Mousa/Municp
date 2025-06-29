<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
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
        User::create([
            'email'=>'israa@mult.com',
            'name'=>'israa mult',
            'password'=>Hash::make('12345'),
        ]);
        User::create([
            'email'=>'israa@mult2.com',
            'name'=>'israa2 mult',
            'password'=>Hash::make('12345'),
        ]);
    }
}
