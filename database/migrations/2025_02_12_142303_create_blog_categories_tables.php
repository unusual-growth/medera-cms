<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('blog_categories', function (Blueprint $table) {
            // this will create an id, a "published" column, and soft delete and timestamps columns
            createDefaultTableFields($table);
            
            $table->integer('position')->unsigned()->nullable();
            
            // add those 2 columns to enable publication timeframe fields (you can use publish_start_date only if you don't need to provide the ability to specify an end date)
            // $table->timestamp('publish_start_date')->nullable();
            // $table->timestamp('publish_end_date')->nullable();

            // this will create the required columns to support nesting for this module
            $table->nestedSet();
        });

        Schema::create('blog_category_translations', function (Blueprint $table) {
            createDefaultTranslationsTableFields($table, 'blog_category');
            $table->string('title', 200)->nullable();
            $table->text('description')->nullable();
        });

        Schema::create('blog_category_slugs', function (Blueprint $table) {
            createDefaultSlugsTableFields($table, 'blog_category');
        });

        Schema::create('blog_category_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'blog_category');
        });
    }

    public function down()
    {
        Schema::dropIfExists('blog_category_revisions');
        Schema::dropIfExists('blog_category_translations');
        Schema::dropIfExists('blog_category_slugs');
        Schema::dropIfExists('blog_categories');
    }
};
