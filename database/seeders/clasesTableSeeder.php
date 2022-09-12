<?php

namespace Database\Seeders;

use App\Models\Classroom;
use Illuminate\Database\Seeder;

class clasesTableSeeder extends Seeder
{
    protected $clases =  [
        [
            'name' => 'الاول',
            'slug' => 'First',
            'grade_id' => '1',
        ],

        [
            'name' => 'الثاني',
            'slug' => 'Second',
            'grade_id' => '1',
        ],
        [
            'name' => 'الثالث',
            'slug' => 'Third',
            'grade_id' => '1',
        ],
        [
            'name' => 'الرابع',
            'slug' => 'Fourth',
            'grade_id' => '1',
        ],
        [
            'name' => 'الخامس',
            'slug' => 'Fifth',
            'grade_id' => '1',
        ],
        [
            'name' => 'السادس',
            'slug' => 'Sixth',
            'grade_id' => '2',
        ],
        [
            'name' => 'السابع',
            'slug' => 'Seventh',
            'grade_id' => '2',
        ],
        [
            'name' => 'الثامن',
            'slug' => 'Eighth',
            'grade_id' => '2',
        ],
        [
            'name' => 'التاسع',
            'slug' => 'Ninth',
            'grade_id' => '2',
        ],
        [
            'name' => 'العاشر',
            'slug' => 'Tenth',
            'grade_id' => '3',
        ],
        [
            'name' => 'الحادي عشر',
            'slug' => 'Eleventh',
            'grade_id' => '3',
        ],
        [
            'name' => 'الثاني عشر',
            'slug' => 'Twelfth',
            'grade_id' => '3',
        ],


    ];
    public function run()
    {
        foreach ($this->clases as $clase) {
            Classroom::create($clase);
        }
    }
}
