<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Numberlesson;
use App\Models\Section;
use App\Models\Unit;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Grade::truncate();
        Classroom::truncate();
        Section::truncate();
        Numberlesson::truncate();
        Unit::truncate();
        $this->call(gradesTableSeeder::class);
        $this->call(clasesTableSeeder::class);
        $this->call(sectionsTableSeeder::class);
        $this->call(numberTableSeeder::class);
        $this->call(uniteTableSeeder::class);
    }
}
