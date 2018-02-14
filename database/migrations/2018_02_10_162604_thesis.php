<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Thesis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('filePath')->nullable();
            $table->string('price')->nullable();
            $table->string('typZadani')->nullable();
            $table->string('pribliznyPocetListu')->nullable();
            $table->string('presnyPocetStran')->nullable();
            $table->string('typTisku')->nullable();
            $table->string('barevnost')->nullable();
            $table->string('skoly')->nullable();
            $table->string('jinaSkola')->nullable();
            $table->string('fakulty')->nullable();
            $table->string('jinaFakulta')->nullable();
            $table->string('typPrace')->nullable();
            $table->string('jinyTypPrace')->nullable();
            $table->string('spodniTextVlevo')->nullable();
            $table->string('spodniTextVpravo')->nullable();
            $table->string('potiskNahore')->nullable();
            $table->string('potiskDole')->nullable();
            $table->string('pocetPevnychDesek')->nullable();
            $table->string('pocetKrouzkovychDesek')->nullable();
            $table->string('barvaDesek')->nullable();
            $table->string('barvaPisma')->nullable();
            $table->string('pocetKapesProCD')->nullable();
            $table->string('pocetKapesProPosudek')->nullable();
            $table->string('kapsaCdVpredu')->nullable();
            $table->string('kapsaPosudekVpredu')->nullable();
            $table->string('dobaZhotoveni')->nullable();
            $table->string('poznamky')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('theses');
    }
}
