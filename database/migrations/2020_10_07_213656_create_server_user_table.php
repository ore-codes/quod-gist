<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServerUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('server_user', function (Blueprint $table) {
            $table->timestamp('joinedAt');
            $table->unsignedBigInteger('server_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('server_id')->references('id')->on('_servers');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('server_user');
    }
}
