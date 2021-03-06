<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DanhSachYeuThich extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danh_sach_yeu_thich', function (Blueprint $table) {
            $table->id();
            $table->integer('san_pham_id');
            $table->string('ten_san_pham');
            $table->integer('so_luong')->default(1);
            $table->double('don_gia', 18, 0);
            $table->integer('yeu_thich_id')->nullable();
            $table->integer('agent_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('danh_sach_yeu_thich');
    }
}
