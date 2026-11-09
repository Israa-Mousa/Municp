<?php

namespace Database\Seeders;

use App\Models\Services;
use App\Models\User;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    public function run(): void
    {
        $createdUserId = User::query()->value('id');
        $parentServices = Services::factory()
            ->count(5)
            ->create(['created_userID' => $createdUserId, 'parentID' => null]);

        Services::factory()
            ->count(5)
            ->create([
                'created_userID' => $createdUserId,
                'parentID' => $parentServices->random()->id,
            ]);
    }
}
