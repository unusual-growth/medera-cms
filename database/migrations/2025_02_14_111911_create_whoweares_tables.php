<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('whoweares', function (Blueprint $table) {
            // this will create an id, a "published" column, and soft delete and timestamps columns
            createDefaultTableFields($table);
            $table->text('template')->nullable();
            
            // add those 2 columns to enable publication timeframe fields (you can use publish_start_date only if you don't need to provide the ability to specify an end date)
            // $table->timestamp('publish_start_date')->nullable();
            // $table->timestamp('publish_end_date')->nullable();
        });

        Schema::create('whoweare_translations', function (Blueprint $table) {
            createDefaultTranslationsTableFields($table, 'whoweare');
            $table->string('title', 200)->nullable();
            $table->text('description')->nullable();
            $table->json('schema')->nullable();

        });

        Schema::create('whoweare_slugs', function (Blueprint $table) {
            createDefaultSlugsTableFields($table, 'whoweare');
        });

        Schema::create('whoweare_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'whoweare');
        });
    }

    public function down()
    {
        Schema::dropIfExists('whoweare_revisions');
        Schema::dropIfExists('whoweare_translations');
        Schema::dropIfExists('whoweare_slugs');
        Schema::dropIfExists('whoweares');
    }
};
