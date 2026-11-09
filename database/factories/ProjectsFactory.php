<?php

namespace Database\Factories;

use App\Models\Projects;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Projects>
 */
class ProjectsFactory extends Factory
{
    protected $model = Projects::class;

    public function definition(): array
    {
        $project = fake()->randomElement([
            [
                'name' => 'Neighborhood Streets Rehabilitation',
                'name_ar' => 'تأهيل شوارع الأحياء',
                'introduction' => 'Improving road safety and access across residential neighborhoods.',
                'introduction_ar' => 'تحسين السلامة المرورية وسهولة الوصول في الأحياء السكنية.',
                'description' => 'The municipal works include resurfacing, sidewalks, drainage, and accessible crossings.',
                'description_ar' => 'تشمل الأعمال البلدية تعبيد الطرق والأرصفة وتصريف المياه ومعابر مهيأة للجميع.',
            ],
            [
                'name' => 'Public Park Renewal',
                'name_ar' => 'تطوير حديقة عامة',
                'introduction' => 'Creating a welcoming and accessible green space for residents.',
                'introduction_ar' => 'إنشاء مساحة خضراء آمنة ومهيأة لخدمة السكان.',
                'description' => 'The project renews paths, lighting, seating, and play areas while conserving water.',
                'description_ar' => 'يطور المشروع الممرات والإنارة والمقاعد ومناطق اللعب مع ترشيد استهلاك المياه.',
            ],
            [
                'name' => 'Municipal Energy Efficiency',
                'name_ar' => 'كفاءة الطاقة في المباني البلدية',
                'introduction' => 'Reducing energy use in public facilities through practical upgrades.',
                'introduction_ar' => 'خفض استهلاك الطاقة في المرافق العامة من خلال تحسينات عملية.',
                'description' => 'Municipal buildings will receive efficient lighting and monitoring systems.',
                'description_ar' => 'سيتم تزويد المباني البلدية بإنارة موفرة وأنظمة لمراقبة الاستهلاك.',
            ],
        ]);

        return $project + [
            'status' => 'A',
            'created_userID' => null,
            'image' => null,
            'locale' => 'ar',
            'city' => fake()->randomElement(['Ramallah', 'Al-Bireh', 'Beitunia']),
        ];
    }
}
