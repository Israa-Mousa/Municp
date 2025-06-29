<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Projects;

class ProjectsTableSeeder extends Seeder
{
    public function run()
    {
        $projects = [
            [
                'name' => 'Reusing Treated Water Project',
                'name_ar' => 'مشروع إعادة استخدام المياه المعالجة',
                'introduction' => 'Reusing water treated for environmental sustainability.',
                'introduction_ar' => 'إعادة استخدام المياه المعالجة لتحقيق استدامة بيئية.',
                'description' => 'A municipality-led initiative to reuse treated wastewater for irrigation.',
                'description_ar' => 'مبادرة بلدية لإعادة استخدام مياه الصرف المعالجة لأغراض الري.',
                'status' => 'A',
                'created_userID' => 1,
                'locale' => 'en',
                'city' => 'Ramallah',
            ],
            [
                'name' => 'Ramallah City Archive Project',
                'name_ar' => 'مشروع أرشيف مدينة رام الله',
                'introduction' => 'Preserving municipal records and historical documents.',
                'introduction_ar' => 'حفظ السجلات والوثائق التاريخية لمدينة رام الله.',
                'description' => 'Creating a digital & physical archive for city history.',
                'description_ar' => 'إنشاء أرشيف رقمي ومادي لتاريخ المدينة.',
                'status' => 'A',
                'created_userID' => 1,
                'locale' => 'en',
                'city' => 'Ramallah',
            ],
            [
                'name' => 'Artists\' Homes Project',
                'name_ar' => 'مشروع بيوت الفنانين',
                'introduction' => 'Establishing a residency hub for local artists.',
                'introduction_ar' => 'إنشاء مركز إقامة للفنانين المحليين.',
                'description' => 'Converting old houses into cultural workshops.',
                'description_ar' => 'تحويل بيوت قديمة إلى ورش ثقافية.',
                'status' => 'A',
                'created_userID' => 1,
                'locale' => 'en',
                'city' => 'Ramallah',
            ],
            [
                'name' => 'Stray Dog Sterilization Center',
                'name_ar' => 'مركز تعقيم الكلاب الضالة',
                'introduction' => 'Animal welfare and public health campaign.',
                'introduction_ar' => 'حملة لتعقيم الكلاب للعناية بالحيوان والصحة العامة.',
                'description' => 'Municipal center addressing stray animal population.',
                'description_ar' => 'مركز بلدي لإدارة أعداد الحيوانات الضالة.',
                'status' => 'A',
                'created_userID' => 1,
                'locale' => 'en',
                'city' => 'Ramallah',
            ],
            [
                'name' => 'Greening the City of Ramallah Project',
                'name_ar' => 'مشروع تخضير المدينة',
                'introduction' => 'Urban afforestation and environmental zones.',
                'introduction_ar' => 'تشجير المناطق الحضرية وإنشاء مناطق بيئية.',
                'description' => 'Planting trees and establishing green belts throughout the city.',
                'description_ar' => 'زراعة الأشجار وإنشاء أحزمة خضراء في أنحاء المدينة.',
                'status' => 'A',
                'created_userID' => 1,
                'locale' => 'en',
                'city' => 'Ramallah',
            ],
        ];

        foreach ($projects as $data) {
            Projects::create($data);
        }
    }
}
