<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('blogs')->insert([
            [
                'name' => 'Ramallah Celebrates Earth Day',
                'name_ar' => 'رام الله تحتفل بيوم الأرض',
                'locale' => 'ar',
                'introduction' => 'The city joins global efforts to raise environmental awareness.',
                'introduction_ar' => 'المدينة تشارك في الجهود العالمية لرفع الوعي البيئي.',
                'description' => 'Activities included school events, tree planting, and street cleanups.',
                'description_ar' => 'تضمنت الفعاليات نشاطات مدرسية، وتشجير، وحملات تنظيف للشوارع.',
                'status' => 'active',
                'image' => 'blogs/earth_day.jpg',
                'blogs_banner' => 'banners/earth_day_banner.jpg',
                'created_userID' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Municipality Launches Smart City Project',
                'name_ar' => 'بلدية رام الله تطلق مشروع المدينة الذكية',
                'locale' => 'ar',
                'introduction' => 'A new era of digital infrastructure begins.',
                'introduction_ar' => 'عهد جديد من البنية التحتية الرقمية يبدأ.',
                'description' => 'The project will include smart lighting, digital services, and city-wide Wi-Fi.',
                'description_ar' => 'سيشمل المشروع إنارة ذكية، وخدمات رقمية، وإنترنت مجاني في جميع أنحاء المدينة.',
                'status' => 'active',
                'image' => 'blogs/smart_city.jpg',
                'blogs_banner' => 'banners/smart_city_banner.jpg',
                'created_userID' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ramallah Hosts Summer Youth Festival',
                'name_ar' => 'مهرجان صيفي للشباب في رام الله',
                'locale' => 'ar',
                'introduction' => 'A colorful festival full of music, food, and youth creativity.',
                'introduction_ar' => 'مهرجان ملون مليء بالموسيقى والطعام وإبداعات الشباب.',
                'description' => 'Local bands, artisans, and food trucks joined to create a vibrant event.',
                'description_ar' => 'شاركت فرق موسيقية، وحرفيون، وشاحنات طعام محلية لصنع حدث نابض بالحياة.',
                'status' => 'active',
                'image' => 'blogs/summer_festival.jpg',
                'blogs_banner' => 'banners/summer_festival_banner.jpg',
                'created_userID' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ramallah Installs Solar Panels on Municipal Buildings',
                'name_ar' => 'بلدية رام الله تركب ألواح شمسية على مبانيها',
                'locale' => 'ar',
                'introduction' => 'Sustainable energy now powering public facilities.',
                'introduction_ar' => 'الطاقة المستدامة أصبحت تغذي المرافق العامة.',
                'description' => 'The project aims to reduce costs and carbon emissions through clean energy.',
                'description_ar' => 'يهدف المشروع إلى تقليل التكاليف والانبعاثات الكربونية من خلال الطاقة النظيفة.',
                'status' => 'active',
                'image' => 'blogs/solar_panels.jpg',
                'blogs_banner' => 'banners/solar_panels_banner.jpg',
                'created_userID' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
