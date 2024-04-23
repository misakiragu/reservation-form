<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'sample1',
            'email' => 'test1@test.com',
            'password'  => '12345678'
        ];
        DB::table('users')->insert($param);
    }
}
