<?php

namespace Database\Factories;

use App\Models\Careers;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Careers>
 */
class CareersFactory extends Factory
{
    protected $model = Careers::class;

    public function definition(): array
    {
        $career = fake()->randomElement([
            [
                'job_title' => 'Civil Engineer',
                'job_title_ar' => 'مهندس مدني',
                'job_skills' => 'Civil engineering degree, site supervision, and AutoCAD.',
                'job_skills_ar' => 'شهادة في الهندسة المدنية وخبرة في الإشراف الميداني وبرنامج أوتوكاد.',
                'job_description' => 'Support the planning and supervision of municipal road and infrastructure projects.',
                'job_description_ar' => 'المساهمة في تخطيط والإشراف على مشاريع الطرق والبنية التحتية البلدية.',
            ],
            [
                'job_title' => 'Public Service Officer',
                'job_title_ar' => 'موظف خدمات الجمهور',
                'job_skills' => 'Customer service, clear communication, and accurate record keeping.',
                'job_skills_ar' => 'مهارات خدمة الجمهور والتواصل الواضح وحفظ السجلات بدقة.',
                'job_description' => 'Help residents access municipal services and follow up on their requests.',
                'job_description_ar' => 'مساعدة المواطنين في الوصول إلى الخدمات البلدية ومتابعة طلباتهم.',
            ],
            [
                'job_title' => 'Environmental Inspector',
                'job_title_ar' => 'مفتش بيئي',
                'job_skills' => 'Environmental awareness, field reporting, and community engagement.',
                'job_skills_ar' => 'معرفة بيئية ومهارات إعداد التقارير الميدانية والتواصل المجتمعي.',
                'job_description' => 'Monitor public spaces and support municipal cleanliness and environmental programs.',
                'job_description_ar' => 'متابعة الأماكن العامة ودعم برامج النظافة والبيئة في البلدية.',
            ],
        ]);

        return $career + [
            'emai_careers' => fake()->unique()->safeEmail(),
            'status' => fake()->randomElement([0, 1]),
            'created_userID' => null,
        ];
    }
}
