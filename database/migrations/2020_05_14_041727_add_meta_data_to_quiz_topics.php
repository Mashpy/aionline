<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMetaDataToQuizTopics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quiz_topics', function (Blueprint $table) {
            $table->string('meta_description')->after('category_id')->nullable();
            $table->string('keyword')->after('meta_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quiz_topics', function (Blueprint $table) {
            $table->dropColumn(['meta_description', 'keyword']);
        });
    }
}
