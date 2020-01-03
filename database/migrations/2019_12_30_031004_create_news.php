<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Tittle');
            $table->text('Summary');
            $table->longText('Content');
            $table->string('Image');
            $table->integer('Hightlight')->default(0);
            $table->integer('Views')->default(0);
            $table->integer('idNewsType')->unsigned();
            $table->foreign('idNewsType')->references('id')->on('newstype');
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
        Schema::dropIfExists('news');
    }
}
