<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert(['name' => '中学英語']);
        DB::table('subjects')->insert(['name' => '中学数学']);
        DB::table('subjects')->insert(['name' => '中学国語']);
        DB::table('subjects')->insert(['name' => '中学理科']);
        DB::table('subjects')->insert(['name' => '中学社会']);
        DB::table('subjects')->insert(['name' => '高校英語']);
        DB::table('subjects')->insert(['name' => '高校数学']);
        DB::table('subjects')->insert(['name' => '現代文']);
        DB::table('subjects')->insert(['name' => '古典']);
        DB::table('subjects')->insert(['name' => '物理']);
        DB::table('subjects')->insert(['name' => '化学']);
        DB::table('subjects')->insert(['name' => '生物']);
        DB::table('subjects')->insert(['name' => '地学']);
        DB::table('subjects')->insert(['name' => '日本史']);
        DB::table('subjects')->insert(['name' => '世界史']);
        DB::table('subjects')->insert(['name' => '地理']);
        DB::table('subjects')->insert(['name' => '倫理/政治経済']);
    }
}
