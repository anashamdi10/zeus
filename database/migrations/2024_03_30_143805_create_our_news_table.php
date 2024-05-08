<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOurNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('our_news', function (Blueprint $table) {
            $table->id();
            $table->string('writer');
            $table->string('title_en');
            $table->string('title_ar');
            $table->text('pragraph_ar');
            $table->text('pragraph_en');
            $table->date('date');
            $table->string('image');
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
        Schema::dropIfExists('our_news');
    }
}
