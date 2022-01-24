<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class GripsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grips')->insert([
            'name' => 'G7 75mm',
        ]);
        DB::table('grips')->insert([
            'name' => 'G6 78mm',
        ]);
        DB::table('grips')->insert([
            'name' => 'G5 81mm',
        ]);
        DB::table('grips')->insert([
            'name' => 'G4 84mm',
        ]);
    }
}
