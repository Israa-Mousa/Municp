<?php

namespace Database\Seeders;

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
        $email = env('INITIAL_ADMIN_EMAIL');
        $password = env('INITIAL_ADMIN_PASSWORD');

        if ($email === null && $password === null) {
            return;
        }

        if (
            ! is_string($email)
            || filter_var($email, FILTER_VALIDATE_EMAIL) === false
            || ! is_string($password)
            || strlen($password) < 16
        ) {
            throw new \InvalidArgumentException('Set INITIAL_ADMIN_EMAIL and an INITIAL_ADMIN_PASSWORD of at least 16 characters.');
        }

        User::firstOrCreate(
            ['email' => $email],
            ['name' => 'Municipal Admin', 'password' => Hash::make($password)]
        );
    }
}
