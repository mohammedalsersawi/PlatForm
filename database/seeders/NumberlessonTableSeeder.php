<?php

namespace Database\Seeders;

use App\Models\Numberlesson;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NumberlessonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('numberlessons')->delete();

        $bgs = [
            'الاول',
            'الثاني',
            'الثالث',
            'الرابع',
            'الخامس',
            'السادس',
            'السابع',
            'الثامن',
            'التاسع',
            'العاشر',
            'الحادي عشر',
            'الثاني عشر',
        ];

        foreach($bgs as  $bg){
            Numberlesson::create(['Name' => $bg]);
        }
    }
}
