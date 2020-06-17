<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();

            $table->unsignedBigInteger('school_id');
            $table->foreign('school_id')->references('id')->on('art_schools')->onDelete('cascade');
            $table->string('title', 100)->unique();
            $table->string('description', 500);
            $table->dateTime('start_date');
            $table->dateTime('finish_date');
            $table->string('location', 100)->nullable();

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
        Schema::dropIfExists('events');
    }
}
