<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('butyrates', function (Blueprint $table) {
            // this will create an id, a "published" column, and soft delete and timestamps columns
            createDefaultTableFields($table);
            $table->text(column: 'template')->nullable();

            // add those 2 columns to enable publication timeframe fields (you can use publish_start_date only if you don't need to provide the ability to specify an end date)
            // $table->timestamp('publish_start_date')->nullable();
            // $table->timestamp('publish_end_date')->nullable();
        });

        Schema::create('butyrate_translations', function (Blueprint $table) {
            createDefaultTranslationsTableFields($table, 'butyrate');
            $table->string('title', 200)->nullable();
            $table->text('description')->nullable();
            $table->json('schema')->nullable();

        });

        Schema::create('butyrate_slugs', function (Blueprint $table) {
            createDefaultSlugsTableFields($table, 'butyrate');
        });

        Schema::create('butyrate_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'butyrate');
        });
    }

    public function down()
    {
        Schema::dropIfExists('butyrate_revisions');
        Schema::dropIfExists('butyrate_translations');
        Schema::dropIfExists('butyrate_slugs');
        Schema::dropIfExists('butyrates');
    }
};
