<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tenders;
use Carbon\Carbon;

class TendersTableSeeder extends Seeder
{
    public function run()
    {
        $tenders = [
            [
                'name'            => 'Road Rehabilitation Tender',
                'name_ar'         => 'عطاء تأهيل الشوارع',
                'name_buyer'      => 'Ramallah Municipality',
                'name_buyer_ar'   => 'بلدية رام الله',
                'number_tenders'  => 'TND-001/2025',
                'description'     => 'Tender for rehabilitation of main urban roads.',
                'description_ar'  => 'عطاء لتأهيل الشوارع الرئيسية في المدينة.',
                'status'          => 1,
                'signature'       => 'ramallah-signature.pdf',
                'parentID'        => null, // أو حطي id الخدمة المرتبطة
                'created_userID'  => 1,
                'created_at'      => Carbon::now(),
                'updated_at'      => Carbon::now(),
            ],
            [
                'name'            => 'Infrastructure Development Tender',
                'name_ar'         => 'عطاء تطوير البنى التحتية',
                'name_buyer'      => 'Ramallah Municipality',
                'name_buyer_ar'   => 'بلدية رام الله',
                'number_tenders'  => 'TND-002/2025',
                'description'     => 'Tender for water and sewage network improvements.',
                'description_ar'  => 'عطاء لتحسين شبكات المياه والصرف الصحي.',
                'status'          => 1,
                'signature'       => 'infra-signature.pdf',
                'parentID'        => null,
                'created_userID'  => 1,
                'created_at'      => Carbon::now(),
                'updated_at'      => Carbon::now(),
            ],
            [
                'name'            => 'Maintenance Services Tender',
                'name_ar'         => 'عطاء خدمات الصيانة',
                'name_buyer'      => 'Ramallah Municipality',
                'name_buyer_ar'   => 'بلدية رام الله',
                'number_tenders'  => 'TND-003/2025',
                'description'     => 'Tender for preventive maintenance services.',
                'description_ar'  => 'عطاء لخدمات الصيانة الوقائية.',
                'status'          => 1,
                'signature'       => 'maint-signature.pdf',
                'parentID'        => null,
                'created_userID'  => 1,
                'created_at'      => Carbon::now(),
                'updated_at'      => Carbon::now(),
            ],
        ];

        Tenders::insert($tenders);
    }
}
