<?php

namespace Database\Seeders;

use App\Models\Careers;
use Illuminate\Database\Seeder;

class CareersTableSeeder extends Seeder
{
    public function run(): void
    {
        $careers = [
            [
                'job_title' => 'Civil Engineer',
                'job_title_ar' => 'مهندس مدني',
                'emai_careers' => 'careers@example.com',
                'job_skills' => 'Civil engineering degree, site supervision, and AutoCAD.',
                'job_skills_ar' => 'شهادة في الهندسة المدنية وخبرة في الإشراف الميداني وبرنامج أوتوكاد.',
                'job_description' => 'Support the planning and supervision of municipal road and infrastructure projects.',
                'job_description_ar' => 'المساهمة في تخطيط والإشراف على مشاريع الطرق والبنية التحتية البلدية.',
            ],
            [
                'job_title' => 'Public Service Officer',
                'job_title_ar' => 'موظف خدمات الجمهور',
                'emai_careers' => 'careers@example.com',
                'job_skills' => 'Customer service, clear communication, and accurate record keeping.',
                'job_skills_ar' => 'مهارات خدمة الجمهور والتواصل الواضح وحفظ السجلات بدقة.',
                'job_description' => 'Help residents access municipal services and follow up on their requests.',
                'job_description_ar' => 'مساعدة المواطنين في الوصول إلى الخدمات البلدية ومتابعة طلباتهم.',
            ],
            [
                'job_title' => 'Environmental Inspector',
                'job_title_ar' => 'مفتش بيئي',
                'emai_careers' => 'careers@example.com',
                'job_skills' => 'Environmental awareness, field reporting, and community engagement.',
                'job_skills_ar' => 'معرفة بيئية ومهارات إعداد التقارير الميدانية والتواصل المجتمعي.',
                'job_description' => 'Monitor public spaces and support municipal cleanliness and environmental programs.',
                'job_description_ar' => 'متابعة الأماكن العامة ودعم برامج النظافة والبيئة.',
            ],
        ];

        foreach ($careers as $career) {
            Careers::query()->firstOrCreate(
                ['job_title' => $career['job_title']],
                $career + ['status' => 1, 'created_userID' => null]
            );
        }
    }
}
