<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            [
                'user_id' => 2,
                'admin_id' => 1,
                'date' => '2023-10-01',
                'start_time' => '12:00:00',
                'end_time' => '14:00:00',
                'type' => 1,
                'content' => '面談①',
            ],
            [
                'user_id' => 2,
                'admin_id' => 1,
                'date' => '2023-10-05',
                'start_time' => '14:00:00',
                'end_time' => '16:00:00',
                'type' => 0,
                'content' => '授業①',
            ],
            [
                'user_id' => 2,
                'admin_id' => 1,
                'date' => '2023-10-11',
                'start_time' => '15:00:00',
                'end_time' => '17:00:00',
                'type' => 0,
                'content' => '授業②',
            ],
            [
                'user_id' => 2,
                'admin_id' => 1,
                'date' => '2023-10-20',
                'start_time' => '16:00:00',
                'end_time' => '18:00:00',
                'type' => 0,
                'content' => '授業③',
            ],
        ]);
    }
}
