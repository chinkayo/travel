<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailMagazineHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_magazine_histories', function (Blueprint $table) {
            $table->charset='utf8';
            $table->collation='utf8_general_ci';
            $table->increments('id');
            $table->integer('mail_magazine_content_id')->unsigned();
            $table->foreign('mail_magazine_content_id')->references('id')->on('mail_magazine_contents');
            $table->integer('mail_list_id')->unsigned();
            $table->foreign('mail_list_id')->references('id')->on('mail_lists');
            $table->dateTime('sent_at');
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
        Schema::dropIfExists('mail_magazine_histories');
    }
}
