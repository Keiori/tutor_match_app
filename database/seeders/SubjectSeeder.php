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
        DB::table('subjects')->insert(
            ['name' => '中学英語'],
            ['name' => '中学数学'],
            ['name' => '中学国語'],
            ['name' => '中学理科'],
            ['name' => '中学社会'],
            ['name' => '高校英語'],
            ['name' => '高校数学'],
            ['name' => '現代文'],
            ['name' => '古典'],
            ['name' => '物理'],
            ['name' => '化学'],
            ['name' => '生物'],
            ['name' => '地学'],
            ['name' => '日本史'],
            ['name' => '世界史'],
            ['name' => '地理'],
            ['name' => '倫理/政治経済']
        );
    }
}
