<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Institutions;
use Carbon\Carbon;

class InstitutionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Institutions::insert([
            [
                'name'         => 'Ramallah Municipality',
                'name_ar'      => 'بلدية رام الله',
                'location'     => 'Al-Irsal Street, Ramallah',
                'location_ar'  => 'شارع الإرسال، رام الله',
                'created_userID' => 1, // تأكد من وجود المستخدم بـ ID = 1
                'phone'        => '02-2981234',
                'fax'          => '02-2985678',
                'url'          => 'https://www.ramallah.ps',
                'email'        => 'info@ramallah.ps',
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now(),
            ],
            [
                'name'         => 'Palestinian Red Crescent Society',
                'name_ar'      => 'جمعية الهلال الأحمر الفلسطيني',
                'location'     => 'Al-Bireh, Palestine',
                'location_ar'  => 'البيرة، فلسطين',
                'created_userID' => 1,
                'phone'        => '02-2406510',
                'fax'          => '02-2403460',
                'url'          => 'http://www.palestinercs.org',
                'email'        => 'prcs@palestinercs.org',
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now(),
            ],
        ]);
    }
}
