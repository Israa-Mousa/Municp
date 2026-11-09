<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    protected $model = Blog::class;

    public function definition(): array
    {
        $article = fake()->randomElement(self::articles());

        return $article + [
            'status' => fake()->randomElement(['active', 'nonactive']),
            'image' => null,
            'blogs_banner' => null,
            'created_userID' => null,
        ];
    }

    public static function articles(): array
    {
        return [
            [
                'name' => 'Seasonal Tree Planting Campaign',
                'name_ar' => 'حملة موسمية لزراعة الأشجار',
                'introduction' => 'Residents and municipal teams are working together to expand urban green spaces.',
                'introduction_ar' => 'يعمل السكان وفرق البلدية معاً على زيادة المساحات الخضراء في المدينة.',
                'description' => 'The campaign includes planting native trees, caring for existing parks, and sharing practical guidance on water-wise planting.',
                'description_ar' => 'تشمل الحملة زراعة الأشجار المحلية والعناية بالحدائق القائمة وتقديم إرشادات عملية للزراعة الموفرة للمياه.',
            ],
            [
                'name' => 'Municipal Services During Public Holidays',
                'name_ar' => 'الخدمات البلدية خلال العطل الرسمية',
                'introduction' => 'The municipality announces service arrangements and emergency contact information.',
                'introduction_ar' => 'تعلن البلدية عن ترتيبات الخدمات ووسائل التواصل للحالات الطارئة.',
                'description' => 'Residents can review service hours, report urgent public-works issues, and find updated contact details.',
                'description_ar' => 'يمكن للمواطنين الاطلاع على ساعات العمل والإبلاغ عن الأعطال العاجلة ومعرفة بيانات التواصل المحدثة.',
            ],
            [
                'name' => 'Community Consultation for Safer Streets',
                'name_ar' => 'مشاورات مجتمعية لشوارع أكثر أماناً',
                'introduction' => 'The municipality invites residents to help identify local road safety priorities.',
                'introduction_ar' => 'تدعو البلدية السكان للمشاركة في تحديد أولويات السلامة المرورية في الأحياء.',
                'description' => 'Feedback will inform improvements to crossings, sidewalks, school routes, and access for people with disabilities.',
                'description_ar' => 'ستسهم الملاحظات في تطوير المعابر والأرصفة والطرق المؤدية إلى المدارس وتسهيل الوصول للأشخاص ذوي الإعاقة.',
            ],
        ];
    }
}
