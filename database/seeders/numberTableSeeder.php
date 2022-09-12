<?php

namespace Database\Seeders;

use App\Models\Numberlesson;
use Illuminate\Database\Seeder;

class numberTableSeeder extends Seeder
{

    public function run()
    {

        $numberlessons =  [
            '1', '2', '3', '4', '5', '6', '7', '8', '9', '10',
            '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
        ];
        foreach($numberlessons as  $numberlesson){
            Numberlesson::create(['number' => $numberlesson]);
        }
    }
}
