<?php

namespace Database\Seeders;

use App\Models\Services;
use App\Models\Tenders;
use App\Models\User;
use Illuminate\Database\Seeder;

class TendersTableSeeder extends Seeder
{
    public function run(): void
    {
        Tenders::factory()
            ->count(8)
            ->create([
                'created_userID' => User::query()->value('id'),
                'parentID' => Services::query()->value('id'),
            ]);
    }
}
