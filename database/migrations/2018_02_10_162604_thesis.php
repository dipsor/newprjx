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
        Schema::create('thesis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('typZadani');
            $table->string('pribliznyPocetListu');
            $table->string('presnyPocetStran');
            $table->string('typTisku');
            $table->string('barevnost');
            $table->string('skoly');
            $table->string('jinaSkola');
            $table->string('fakulty');
            $table->string('jinaFakulta');
            $table->string('typPrace');
            $table->string('jinyTypPrace');
            $table->string('spodniTextVlevo');
            $table->string('potiskNahore');
            $table->string('potiskDole');
            $table->string('pocetPevnychDesek');
            $table->string('pocetKrouzkovychDesek');
            $table->string('barvaDesek');
            $table->string('barvaPisma');
            $table->string('pocetKapesProCD');
            $table->string('pocetKapesProPosudek');
            $table->string('kapsaCdVpredu');
            $table->string('kapsaPosudekVpredu');
            $table->string('dobaZhotoveni');
            $table->string('poznamky');
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
        //
    }
}
