<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('song_name');
            $table->string('song_title');
            $table->text('song_description');
            $table->foreignId('singers_id')->constrained()->onDelete('cascade');
            $table->foreignId('singer_langs_id')->constrained()->onDelete('cascade');
            $table->foreignId('singer_genres_id')->constrained()->onDelete('cascade');
            $table->string('song_img')->nullable();
            $table->string('song_mp3')->nullable();
            $table->string('song_date', 200);
            $table->bigInteger('view_count')->nullable();
            $table->bigInteger('song_download')->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('songs');
    }
}
