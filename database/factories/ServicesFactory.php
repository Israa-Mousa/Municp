<?php

namespace Database\Factories;

use App\Models\Services;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Services>
 */
class ServicesFactory extends Factory
{
    protected $model = Services::class;

    public function definition(): array
    {
        $service = fake()->randomElement([
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
        ]);

        return $service + [
            'parentID' => null,
            'created_userID' => null,
            'icon' => null,
            'locale' => 'ar',
        ];
    }
}
