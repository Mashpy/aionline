<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlternativeSoftwaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ai_softwares', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('software_category_id');
            $table->integer('software_sub_category_id')->nullable();
            $table->string('name');
            $table->text('description');
            $table->integer('like')->nullable();
            $table->string('official_link')->nullable();
            $table->string('slug');
            $table->string('logo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('models_ai_softwares');
    }
}
