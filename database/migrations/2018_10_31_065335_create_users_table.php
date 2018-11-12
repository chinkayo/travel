<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->charset='utf8';
            $table->collation='utf8_general_ci';
            $table->increments('id');
            $table->text('familyname');
            $table->text('givenname');
            $table->text('email');
            $table->text('password');
            $table->string('token');
            $table->string('remember_token')->nullable();
            $table->integer('user_status_id')->unsigned();
            $table->foreign('user_status_id')->references('id')->on('mtb_user_statuses');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
