<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstitutionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $institutions = [
            [
                'name'         => 'Ramallah Municipality',
                'name_ar'      => 'بلدية رام الله',
                'location'     => 'Al-Irsal Street, Ramallah',
                'location_ar'  => 'شارع الإرسال، رام الله',
                'created_userID' => null,
                'phone'        => '02-2981234',
                'fax'          => '02-2985678',
                'url'          => 'https://www.ramallah.ps',
                'email'        => 'info@ramallah.ps',
            ],
            [
                'name'         => 'Palestinian Red Crescent Society',
                'name_ar'      => 'جمعية الهلال الأحمر الفلسطيني',
                'location'     => 'Al-Bireh, Palestine',
                'location_ar'  => 'البيرة، فلسطين',
                'created_userID' => null,
                'phone'        => '02-2406510',
                'fax'          => '02-2403460',
                'url'          => 'http://www.palestinercs.org',
                'email'        => 'prcs@palestinercs.org',
            ],
        ];

        foreach ($institutions as $institution) {
            DB::table('institutions')->updateOrInsert(
                ['name' => $institution['name']],
                $institution
            );
        }
    }
}
