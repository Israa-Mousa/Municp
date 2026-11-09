<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Careers;
use App\Models\Institutions;
use App\Models\Projects;
use App\Models\Services;
use App\Models\Tenders;
use App\Models\Tourisms;
use Illuminate\Support\Facades\DB;
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
        $this->call(UserTableSeeder::class);

        DB::transaction(function () {
            if (
                Services::query()->exists()
                || Projects::query()->exists()
                || Tenders::query()->exists()
                || Careers::query()->exists()
                || Blog::query()->exists()
                || Tourisms::query()->exists()
                || Institutions::query()->exists()
            ) {
                return;
            }

            $this->call([
                ServicesTableSeeder::class,
                ProjectsTableSeeder::class,
                TendersTableSeeder::class,
                CareersTableSeeder::class,
                BlogsTableSeeder::class,
                TourismsTableSeeder::class,
                InstitutionsTableSeeder::class,
            ]);
        });
    }
}
