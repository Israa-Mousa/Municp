<?php

namespace Database\Seeders;

use App\Models\Tourisms;
use App\Models\User;
use Illuminate\Database\Seeder;

class TourismsTableSeeder extends Seeder
{
    public function run(): void
    {
        Tourisms::factory()
            ->count(6)
            ->create(['created_userID' => User::query()->value('id')]);
    }
}
