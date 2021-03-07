<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('is_supper')->default(false);
            $table->date('birth')->default(now());
            $table->dateTime('day_account_created')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('phone',30)->default('0');
            $table->string('photo',30)->default('image.jpg');
            $table->boolean('is_lock')->default(false);
            $table->boolean('is_delete')->default(false);
            $table->rememberToken();
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
        Schema::dropIfExists('admins');
    }
}
