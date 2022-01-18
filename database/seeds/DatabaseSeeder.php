<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
        UsersTableSeeder::class,
        GripsTableSeeder::class,
        RacketsTableSeeder::class,
        TypesTableSeeder::class,
        WeightsTableSeeder::class,
    ]);
        // $this->call(UsersTableSeeder::class);
    }
}
//seederに書いたものを実行することでそのテーブルのデータを実行する