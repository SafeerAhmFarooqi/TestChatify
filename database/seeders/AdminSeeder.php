<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert(array(
            array(
            'name' => "Admin",
            'email' => 'admin@asadsohail.com',
            'password' => bcrypt('aaaaaaaa'),
            )
            ));
    }
}
