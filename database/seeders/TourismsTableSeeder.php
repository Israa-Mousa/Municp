<?php

namespace Database\Seeders;

use App\Models\Tourisms;
use Illuminate\Database\Seeder;

class TourismsTableSeeder extends Seeder
{
    public function run(): void
    {
        $places = [
            [
                'name' => 'Historic City Center',
                'name_ar' => 'وسط المدينة التاريخي',
                'location' => 'Old City, Ramallah',
                'location_ar' => 'البلدة القديمة، رام الله',
                'description' => 'A walkable historic district with traditional architecture and locally owned shops.',
                'description_ar' => 'منطقة تاريخية قابلة للمشي تضم مباني تراثية ومحالاً تجارية محلية.',
                'image' => 'assets/App/images/access/rashid.jpg',
            ],
            [
                'name' => 'Municipal Cultural Center',
                'name_ar' => 'المركز الثقافي البلدي',
                'location' => 'City Center, Ramallah',
                'location_ar' => 'وسط مدينة رام الله',
                'description' => 'A public venue hosting cultural programs, exhibitions, and community events.',
                'description_ar' => 'مرفق عام يستضيف البرامج الثقافية والمعارض والفعاليات المجتمعية.',
                'image' => 'assets/App/images/access/side_view.jpg',
            ],
            [
                'name' => 'Central Public Garden',
                'name_ar' => 'الحديقة العامة المركزية',
                'location' => 'Al-Tira, Ramallah',
                'location_ar' => 'الطيرة، رام الله',
                'description' => 'A green public space with walking paths and areas for families to gather.',
                'description_ar' => 'مساحة عامة خضراء تضم مسارات للمشي ومناطق مخصصة لاجتماع العائلات.',
                'image' => 'assets/App/images/access/night_waterfall.jpg',
            ],
        ];

        foreach ($places as $place) {
            $tourism = Tourisms::query()->firstOrNew(['name' => $place['name']]);

            if (! $tourism->exists) {
                $tourism->fill($place + [
                    'created_userID' => null,
                    'icon' => null,
                    'locale' => 'ar',
                ]);
            } elseif (empty($tourism->image)) {
                $tourism->image = $place['image'];
            }

            if ($tourism->isDirty()) {
                $tourism->save();
            }
        }
    }
}
