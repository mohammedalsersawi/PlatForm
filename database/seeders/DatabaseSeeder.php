<?php

namespace Database\Seeders;

use App\Models\Numberlesson;
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
        // \App\Models\User::factory(10)->create();

        $this->call(MaterialTableSeeder::class);
        $this->call(UnitTableSeeder::class);
        $this->call(NumberlessonTableSeeder::class);

    }
}
