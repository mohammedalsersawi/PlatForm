<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;

class uniteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unites = [
            'الاولى',
            'الثانية',
            'الثالثة',
            'الرابعة',
            'الخامسة',
            'السادسة',
            'السابعة',
            'الةحدة الثامنة',
            'التاسعة',
            'الةحدة العاشرة',
            'الحادية عشر',
            'الثانية عشر',
        ];
        foreach($unites as  $unite){
            Unit::create(['name' => $unite]);
        }

    }
}
