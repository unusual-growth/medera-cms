<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('how_we_works', function (Blueprint $table) {
            // this will create an id, a "published" column, and soft delete and timestamps columns
            createDefaultTableFields($table);
            $table->text(column: 'template')->nullable();


            // add those 2 columns to enable publication timeframe fields (you can use publish_start_date only if you don't need to provide the ability to specify an end date)
            // $table->timestamp('publish_start_date')->nullable();
            // $table->timestamp('publish_end_date')->nullable();
        });

        Schema::create('how_we_work_translations', function (Blueprint $table) {
            createDefaultTranslationsTableFields($table, 'how_we_work');
            $table->string('title', 200)->nullable();
            $table->text('description')->nullable();
            $table->json('schema')->nullable();
        });

        Schema::create('how_we_work_slugs', function (Blueprint $table) {
            createDefaultSlugsTableFields($table, 'how_we_work');
        });

        Schema::create('how_we_work_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'how_we_work');
        });
    }

    public function down()
    {
        Schema::dropIfExists('how_we_work_revisions');
        Schema::dropIfExists('how_we_work_translations');
        Schema::dropIfExists('how_we_work_slugs');
        Schema::dropIfExists('how_we_works');
    }
};
