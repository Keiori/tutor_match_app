<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Datetime;

class MatchingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('matchings')->insert([
            [
                'is_accepted' => 0,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'user_id' => 1,
                'admin_id' => 1
            ],
            [
                'is_accepted' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'user_id' => 2,
                'admin_id' => 1
            ],
            [
                'is_accepted' => 2,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'user_id' => 1,
                'admin_id' => 2
            ],
            [
                'is_accepted' => 0,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'user_id' => 4,
                'admin_id' => 1
            ],
            [
                'is_accepted' => 0,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'user_id' => 5,
                'admin_id' => 1
            ],
        ]);
    }
}
