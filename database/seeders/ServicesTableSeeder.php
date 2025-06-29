<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Services;

class ServicesTableSeeder extends Seeder
{
    public function run()
    {
        $services = [
            [
                'name' => 'Electronic Services',
                'description' => 'Digital municipal services available online for citizens.',
                'name_ar' => 'الخدمات الالكترونية',
                'description_ar' => 'الخدمات البلدية الإلكترونية المتوفرة للمواطنين.',
                'parentID' => null,
                'created_userID' => 1, // غيّر حسب المتاح
                'icon' => 'icon-electronic.png',
                'locale' => 'ar',
            ],
            [
                'name' => 'GIS Services',
                'description' => 'Geographic Information Services for mapping and spatial data.',
                'name_ar' => 'خدمات الGIS',
                'description_ar' => 'خدمات نظم المعلومات الجغرافية.',
                'parentID' => null,
                'created_userID' => 1,
                'icon' => 'icon-gis.png',
                'locale' => 'ar',
            ],
            [
                'name' => 'Public Services Center',
                'description' => 'Centralized center to serve citizens efficiently.',
                'name_ar' => 'مركز خدمات الجمهور',
                'description_ar' => 'مركز موحد لخدمة المواطنين بكفاءة.',
                'parentID' => null,
                'created_userID' => 1,
                'icon' => 'icon-center.png',
                'locale' => 'ar',
            ],
            [
                'name' => 'Complaints and Suggestions',
                'description' => 'Platform for citizens to submit feedback.',
                'name_ar' => 'الشكاوى والاقتراحات',
                'description_ar' => 'منصة للمواطنين لتقديم ملاحظاتهم.',
                'parentID' => null,
                'created_userID' => 1,
                'icon' => 'icon-feedback.png',
                'locale' => 'ar',
            ],
        ];

        foreach ($services as $data) {
            Services::create($data);
        }
    }
}
