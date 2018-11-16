<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->charset='utf8';
            $table->collation='utf8_general_ci';
            $table->increments('id');
            $table->text('title');
            $table->date('start_date');
            $table->date('finish_date');
            $table->date('start_apply_date');
            $table->date('deadline');
            $table->integer('price')->nullable();
            $table->text('price_comment')->nullable();
            $table->integer('capacity');
            $table->integer('minimum');
            $table->integer('travel_company_flg');
            $table->text('image');
            $table->longtext('event_detail');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('location_id')->unsigned();
            $table->foreign('location_id')->references('id')->on('mtb_locations');
            $table->integer('company_id')->unsigned()->nullable();
            $table->foreign('company_id')->references('id')->on('travel_companies');
            $table->integer('event_type_id')->unsigned();
            $table->foreign('event_type_id')->references('id')->on('mtb_event_types');
            $table->integer('event_status_id')->unsigned();
            $table->foreign('event_status_id')->references('id')->on('mtb_event_statuses');
            $table->integer('application_status_id')->unsigned();
            $table->foreign('application_status_id')->references('id')->on('events_mtb_applications');
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
        Schema::dropIfExists('events');
    }
}
