<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTableSeeder::class,
            ServicesTableSeeder::class,
            ProjectsTableSeeder::class,
            TendersTableSeeder::class,
            CareersTableSeeder::class,
            BlogsTableSeeder::class,
            TourismsTableSeeder::class,
            InstitutionsTableSeeder::class,
        ]);
    }
}
