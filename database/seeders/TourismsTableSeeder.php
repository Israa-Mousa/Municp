<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tourisms;

class TourismsTableSeeder extends Seeder
{
    public function run()
    {
        $tourismPlaces = [
            [
                'name' => 'Dar Zahran Heritage Building',
                'name_ar' => 'دار زهران للتراث',
                'location' => 'Old City, Ramallah',
                'location_ar' => 'البلدة القديمة، رام الله',
                'description' => 'A traditional Palestinian house that showcases local heritage, art, and history.',
                'description_ar' => 'بيت فلسطيني تقليدي يعرض التراث المحلي والفن والتاريخ.',
                'created_userID' => 1, // يمكن تغييره حسب المستخدم المسجّل
                'image' => 'dar_zahran.jpg',
                'icon' => 'heritage-icon.png',
                'locale' => 'ar',
            ],
            [
                'name' => 'Ramallah City Park',
                'name_ar' => 'منتزه مدينة رام الله',
                'location' => 'Al-Tira Street, Ramallah',
                'location_ar' => 'شارع الطيرة، رام الله',
                'description' => 'A green public space for families and visitors with playgrounds and walking paths.',
                'description_ar' => 'مساحة خضراء عامة للعائلات والزوار تحتوي على ألعاب ومسارات مشي.',
                'created_userID' => 1,
                'image' => 'city_park.jpg',
                'icon' => 'park-icon.png',
                'locale' => 'ar',
            ],
        ];

        foreach ($tourismPlaces as $place) {
            Tourisms::create($place);
        }
    }
}
