<?php

namespace Database\Seeders;

use App\Models\Services;
use App\Models\Tenders;
use Illuminate\Database\Seeder;

class TendersTableSeeder extends Seeder
{
    public function run(): void
    {
        $tenders = [
            [
                'name' => 'Street Lighting Maintenance',
                'name_ar' => 'صيانة إنارة الشوارع',
                'number_tenders' => 'RMC-2026-0001',
                'description' => 'Supply and maintenance of energy-efficient public street lighting.',
                'description_ar' => 'توريد وصيانة إنارة الشوارع العامة الموفرة للطاقة.',
            ],
            [
                'name' => 'Public Park Equipment',
                'name_ar' => 'تجهيزات الحدائق العامة',
                'number_tenders' => 'RMC-2026-0002',
                'description' => 'Supply and installation of durable, accessible park furniture and play equipment.',
                'description_ar' => 'توريد وتركيب أثاث ومعدات لعب متينة ومهيأة في الحدائق العامة.',
            ],
            [
                'name' => 'Road and Sidewalk Works',
                'name_ar' => 'أعمال الطرق والأرصفة',
                'number_tenders' => 'RMC-2026-0003',
                'description' => 'Construction and rehabilitation works for municipal roads and sidewalks.',
                'description_ar' => 'أعمال إنشاء وتأهيل الطرق والأرصفة التابعة للبلدية.',
            ],
        ];

        foreach ($tenders as $tender) {
            Tenders::query()->firstOrCreate(
                ['number_tenders' => $tender['number_tenders']],
                $tender + [
                    'name_buyer' => 'Ramallah Municipality',
                    'name_buyer_ar' => 'بلدية رام الله',
                    'status' => 1,
                    'signature' => '',
                    'parentID' => Services::query()->value('id'),
                    'created_userID' => null,
                ]
            );
        }
    }
}
