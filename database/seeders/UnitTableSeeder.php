<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unit::truncate();

        $bgs = [
            'الوحدة الاولى',
            'الوحدة الثانية',
            'الوحدة الثالثة',
            'الوحدة الرابعة',
            'الوحدة الخامسة',
            'الوحدة السادسة',
            'الوحدة السابعة',
            'الةحدة الثامنة',
            'الوحدة التاسعة',
            'الةحدة العاشرة',
            'الوحدة الحادية عشر',
            'الوحدة الثانية عشر',



               ];

        foreach($bgs as  $bg){
            Unit::create(['Name' => $bg]);
        }
    }
}
