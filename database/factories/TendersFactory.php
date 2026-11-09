<?php

namespace Database\Factories;

use App\Models\Tenders;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tenders>
 */
class TendersFactory extends Factory
{
    protected $model = Tenders::class;

    public function definition(): array
    {
        $tender = fake()->randomElement([
            [
                'name' => 'Street Lighting Maintenance',
                'name_ar' => 'صيانة إنارة الشوارع',
                'description' => 'Supply and maintenance of energy-efficient public street lighting.',
                'description_ar' => 'توريد وصيانة إنارة الشوارع العامة الموفرة للطاقة.',
            ],
            [
                'name' => 'Public Park Equipment',
                'name_ar' => 'تجهيزات الحدائق العامة',
                'description' => 'Supply and installation of durable, accessible park furniture and play equipment.',
                'description_ar' => 'توريد وتركيب أثاث ومعدات لعب متينة ومهيأة في الحدائق العامة.',
            ],
            [
                'name' => 'Road and Sidewalk Works',
                'name_ar' => 'أعمال الطرق والأرصفة',
                'description' => 'Construction and rehabilitation works for municipal roads and sidewalks.',
                'description_ar' => 'أعمال إنشاء وتأهيل الطرق والأرصفة التابعة للبلدية.',
            ],
        ]);

        return $tender + [
            'name_buyer' => 'Ramallah Municipality',
            'name_buyer_ar' => 'بلدية رام الله',
            'number_tenders' => 'RMC-' . fake()->unique()->numerify('2026-####'),
            'status' => fake()->randomElement([0, 1, 2]),
            'signature' => 'documents/sample-tender.pdf',
            'parentID' => null,
            'created_userID' => null,
        ];
    }
}
