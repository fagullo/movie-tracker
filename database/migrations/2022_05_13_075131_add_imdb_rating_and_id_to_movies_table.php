<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->string('imdb_reference')
                ->after('crew')
                ->unique()
                ->nullable();

            $table->float('imdb_rating')
                ->after('crew')
                ->index()
                ->nullable();

            $table->integer('imdb_rating_count')
                ->after('crew')
                ->index()
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->dropColumn('imdb_reference');
        });

        Schema::table('movies', function (Blueprint $table) {
            $table->dropColumn('imdb_rating');
        });

        Schema::table('movies', function (Blueprint $table) {
            $table->dropColumn('imdb_rating_count');
        });
    }
};
