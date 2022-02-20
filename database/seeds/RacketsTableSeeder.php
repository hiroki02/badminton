<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RacketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rackets')->insert([
            'name' => Str::random(10),
            'user_id'=> 1,
            'type_id'=> 1,
            'grip_id'=> 1,
            'weight_id'=> 1,
            'maker'=> Str::random(10),
            'body'=> Str::random(10),
        ]);
    }
}
