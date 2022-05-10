<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_view_movies', function (Blueprint $table) {
            $table->foreignId('user_id');
            $table->foreignId('movie_id');
            $table->date('viewed_at');

            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->foreign('movie_id')
                ->references('id')
                ->on('movies');

            $table->index('viewed_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_view_movies');
    }
};
