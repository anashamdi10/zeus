<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAddArbicColoumsToWhyShoose extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('why_shoose', function (Blueprint $table) {
            
            $table->string('title_ar');
            $table->text('pragraph_ar');
            $table->dropColumn('pragraph');
            $table->text('pragraph_en');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('why_shoose', function (Blueprint $table) {
            Schema::dropIfExists('why_shoose');
        });
    }
}
