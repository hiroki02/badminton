<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        DB::table('types')->insert([
            'name' =>'ヘッドヘビー',
        ]);
         DB::table('types')->insert([
            'name' =>'ヘッドライト',
        ]); 
        DB::table('types')->insert([
            'name' =>'ヘッドイーブン',
        ]);
    }
}
