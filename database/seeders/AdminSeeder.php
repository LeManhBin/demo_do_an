<?php

namespace Database\Seeders;

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
        DB::table('admin_accs')->delete();

        DB::table('admin_accs')->truncate();

        DB::table('admin_accs')->insert([
            ['email' => 'lemanhbin@gmail.com', 'password' => bcrypt('12345678')],
        ]);
    }
}
