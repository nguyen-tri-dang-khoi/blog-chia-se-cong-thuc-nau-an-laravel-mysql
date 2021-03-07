<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCongthucsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('congthucs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_cong_thuc',50);
            $table->integer('admin_id')->unsigned();
            $table->integer('loai_cong_thuc_id')->unsigned();
            $table->mediumText('mo_ta_cong_thuc');
            $table->string('hinh_anh',50)->default('default.jpg');
            $table->dateTime('ngay_dang')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->boolean('da_xoa')->default(true);
            $table->timestamps();

            $table->foreign('admin_id')->references('id')->on('admins')
            ->onDelete('cascade');
            $table->foreign('loai_cong_thuc_id')->references('id')->on('loaicongthucs')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('congthucs');
    }
}
