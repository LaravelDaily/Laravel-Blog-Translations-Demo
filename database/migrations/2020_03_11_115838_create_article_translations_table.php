<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale')->index();
            $table->foreignId('article_id')
                  ->constrained()
                  ->onDelete('cascade');
            $table->unique(['article_id', 'locale']);
            $table->string('title');
            $table->longText('full_text');
        });

        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('full_text');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_translations');
    }
}
