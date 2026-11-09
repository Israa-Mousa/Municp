<?php

namespace Database\Seeders;

use App\Models\Services;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name' => 'Public Works',
                'name_ar' => 'الأشغال العامة',
                'description' => 'Municipal maintenance and public infrastructure services.',
                'description_ar' => 'خدمات صيانة البلدية والبنية التحتية العامة.',
            ],
            [
                'name' => 'Citizen Services',
                'name_ar' => 'خدمات المواطنين',
                'description' => 'Information and transactions for residents and local businesses.',
                'description_ar' => 'معلومات ومعاملات مخصصة للسكان والمنشآت المحلية.',
            ],
            [
                'name' => 'Environment and Parks',
                'name_ar' => 'البيئة والحدائق',
                'description' => 'Services supporting clean streets, parks, and a healthy city.',
                'description_ar' => 'خدمات تدعم نظافة الشوارع والحدائق ومدينة صحية.',
            ],
        ];

        foreach ($services as $service) {
            Services::query()->firstOrCreate(
                ['name' => $service['name']],
                $service + ['parentID' => null, 'created_userID' => null, 'locale' => 'ar']
            );
        }
    }
}
