<?php

namespace Database\Seeders;

use App\Models\Careers;
use App\Models\User;
use Illuminate\Database\Seeder;

class CareersTableSeeder extends Seeder
{
    public function run(): void
    {
        Careers::factory()
            ->count(6)
            ->create(['created_userID' => User::query()->value('id')]);
    }
}
