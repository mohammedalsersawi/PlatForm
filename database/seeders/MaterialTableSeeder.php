<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('materials')->delete();

        $bgs = ['اللغة العربية' ,
                'الرياضيات الادبي',
                'الرياضيات العلمي',
                'العلوم العامة',
                'الفيزياء',
                'الكيماء',
                'الاحياء',
                'اللغة الانجليزية',
                'التربية الاسلامية',
                'التاريخ',
                'الجغرافيا',
                'الثقافة'


               ];

        foreach($bgs as  $bg){
            Material::create(['Name' => $bg]);
        }
    }
}
