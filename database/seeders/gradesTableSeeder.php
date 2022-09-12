<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class gradesTableSeeder extends Seeder
{
    protected $grades =  [
        [
            'name' => 'المرحلة الابتدائية',
            'slug' => 'Primary',
        ], [
            'name' => 'المرحلة المتوسطة',
            'slug' => 'Middle',
        ], [
            'name' => 'المرحلة الثانوية',
            'slug' => 'High',
        ],
    ];

    public function run()
    {


        foreach ($this->grades as $grade) {
            Grade::create($grade);
        }
    }
}
