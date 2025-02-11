<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            // this will create an id, a "published" column, and soft delete and timestamps columns
            createDefaultTableFields($table);

            $table->integer('position')->unsigned()->nullable();

            // add those 2 columns to enable publication timeframe fields (you can use publish_start_date only if you don't need to provide the ability to specify an end date)
            // $table->timestamp('publish_start_date')->nullable();
            // $table->timestamp('publish_end_date')->nullable();
        });

        Schema::create('faq_translations', function (Blueprint $table) {
            createDefaultTranslationsTableFields($table, 'faq');
            $table->string('title', 200)->nullable();
            $table->text('answer')->nullable();
        });

        Schema::create('faq_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'faq');
        });
    }

    public function down()
    {
        Schema::dropIfExists('faq_revisions');
        Schema::dropIfExists('faq_translations');
        Schema::dropIfExists('faqs');
    }
};
