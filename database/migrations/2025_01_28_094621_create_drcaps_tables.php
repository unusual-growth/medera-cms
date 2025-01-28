<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('drcaps', function (Blueprint $table) {
            // this will create an id, a "published" column, and soft delete and timestamps columns
            createDefaultTableFields($table);
            
            // add those 2 columns to enable publication timeframe fields (you can use publish_start_date only if you don't need to provide the ability to specify an end date)
            // $table->timestamp('publish_start_date')->nullable();
            // $table->timestamp('publish_end_date')->nullable();
        });

        Schema::create('drcap_translations', function (Blueprint $table) {
            createDefaultTranslationsTableFields($table, 'drcap');
            $table->string('title', 200)->nullable();
            $table->text('description')->nullable();
        });

        Schema::create('drcap_slugs', function (Blueprint $table) {
            createDefaultSlugsTableFields($table, 'drcap');
        });

        Schema::create('drcap_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'drcap');
        });
    }

    public function down()
    {
        Schema::dropIfExists('drcap_revisions');
        Schema::dropIfExists('drcap_translations');
        Schema::dropIfExists('drcap_slugs');
        Schema::dropIfExists('drcaps');
    }
};
