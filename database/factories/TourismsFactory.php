<?php

namespace Database\Factories;

use App\Models\Tourisms;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tourisms>
 */
class TourismsFactory extends Factory
{
    protected $model = Tourisms::class;

    public function definition(): array
    {
        $place = fake()->randomElement([
            [
                'name' => 'Historic City Center',
                'name_ar' => 'وسط المدينة التاريخي',
                'location' => 'Old City, Ramallah',
                'location_ar' => 'البلدة القديمة، رام الله',
                'description' => 'A walkable historic district with traditional architecture and locally owned shops.',
                'description_ar' => 'منطقة تاريخية قابلة للمشي تضم مباني تراثية ومحالاً تجارية محلية.',
            ],
            [
                'name' => 'Municipal Cultural Center',
                'name_ar' => 'المركز الثقافي البلدي',
                'location' => 'City Center, Ramallah',
                'location_ar' => 'وسط مدينة رام الله',
                'description' => 'A public venue hosting cultural programs, exhibitions, and community events.',
                'description_ar' => 'مرفق عام يستضيف البرامج الثقافية والمعارض والفعاليات المجتمعية.',
            ],
            [
                'name' => 'Central Public Garden',
                'name_ar' => 'الحديقة العامة المركزية',
                'location' => 'Al-Tira, Ramallah',
                'location_ar' => 'الطيرة، رام الله',
                'description' => 'A green public space with walking paths and areas for families to gather.',
                'description_ar' => 'مساحة عامة خضراء تضم مسارات للمشي ومناطق مخصصة لاجتماع العائلات.',
            ],
        ]);

        return $place + [
            'created_userID' => null,
            'image' => null,
            'icon' => null,
            'locale' => 'ar',
        ];
    }
}
