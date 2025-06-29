<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Careers;
use Carbon\Carbon;
class CareersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       Careers::insert([
    [
        'job_title'           => 'Full Stack Developer',
        'job_title_ar'        => 'مطور فل ستاك',
        'emai_careers'        => 'jobs@ramallah.ps',
        'status'              => 1,
        'job_skills'          => 'PHP, Laravel, JavaScript, Vue.js, REST APIs, MySQL',
        'job_skills_ar'       => 'PHP، Laravel، JavaScript، Vue.js، REST APIs، MySQL',
        'job_description'     => 'We are looking for a Full Stack Developer to build and maintain web applications.',
        'job_description_ar'  => 'نبحث عن مطور فل ستاك لتطوير وصيانة تطبيقات الويب.',
        'created_userID'      => 1,
        'created_at'          => Carbon::now(),
        'updated_at'          => Carbon::now(),
    ],
    [
        'job_title'           => 'Programmer',
        'job_title_ar'        => 'مبرمج',
        'emai_careers'        => 'careers@ramallah.ps',
        'status'              => 1,
        'job_skills'          => 'C#, ASP.NET, JavaScript, SQL Server, problem solving',
        'job_skills_ar'       => 'C#، ASP.NET، JavaScript، SQL Server، حل المشكلات',
        'job_description'     => 'We are hiring a skilled programmer to develop and maintain software applications.',
        'job_description_ar'  => 'نقوم بتوظيف مبرمج ماهر لتطوير وصيانة تطبيقات البرمجيات.',
        'created_userID'      => 1,
        'created_at'          => Carbon::now(),
        'updated_at'          => Carbon::now(),
    ]
]);
    }
}
