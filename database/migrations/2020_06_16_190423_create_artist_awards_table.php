<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistAwardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artist_awards', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('artist_id');
            $table->foreign('artist_id')->references('id')->on('artists')->onDelete('cascade');
            $table->string('title', 100);
            $table->string('description', 500);
            $table->string('photo');

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
        Schema::dropIfExists('artist_awards');
    }
}
