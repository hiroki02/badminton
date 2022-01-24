<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class WeightsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('weights')->insert([
            'name' => '7U 平均68グラム',
        ]);
        DB::table('weights')->insert([
            'name' => '6U(F) 平均73グラム',
        ]);
        DB::table('weights')->insert([
            'name' => '5U 平均78グラム',
        ]);
        DB::table('weights')->insert([
            'name' =>'4U 平均83グラム',
        ]);
        DB::table('weights')->insert([
            'name' => '3U 平均88グラム',
        ]);
        DB::table('weights')->insert([
            'name' => '2U 平均93グラム',
        ]);
    }
}
