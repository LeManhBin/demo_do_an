<?php

namespace Database\Seeders;

use App\Models\quan_li_thong_ke;
use Illuminate\Database\Seeder;

class thongke extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        quan_li_thong_ke::factory(200)->create();
    }
}
