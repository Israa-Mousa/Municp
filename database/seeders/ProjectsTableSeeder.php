<?php

namespace Database\Seeders;

use App\Models\Projects;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    public function run(): void
    {
        Projects::factory()
            ->count(8)
            ->create(['created_userID' => User::query()->value('id')]);
    }
}
