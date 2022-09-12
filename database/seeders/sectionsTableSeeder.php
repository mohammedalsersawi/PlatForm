<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Section;
use Illuminate\Database\Seeder;

class sectionsTableSeeder extends Seeder
{
    protected $sections =  [
        [
            'name' => 'اللغة العربية',
            'slug' => 'Arabic',
        ], [
            'name' => 'اللغة الانجلزية',
            'slug' => 'English',
        ], [
            'name' => 'الرياضيات',
            'slug' => 'Math',
        ],
    ];

    protected $Admins =  [
        [
            'name' => 'admin',
            'email' => 'admin@admin',
            'password' => '$2y$10$2QIGMPVBiymwxFdNDGRaa.jZpsi25nHWjn2MdpJ1XdqjwMmW.y7Yi',
            'nametype' => 'admin'
        ],
    ];
    public function run()
    {

        foreach ($this->sections as $section) {
            Section::create($section);
        }

        foreach ($this->Admins as $Admin) {
            Admin::create($Admin);
        }
    }
}
