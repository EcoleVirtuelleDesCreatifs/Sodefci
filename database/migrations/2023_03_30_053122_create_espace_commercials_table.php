<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspaceCommercialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('espace_commercials', function (Blueprint $table) {
            $table->id();
            $table->string('entreprise');
            $table->string('responsable');
            $table->string('localisation');
            $table->string('email')->unique();
            $table->string('contact');
            $table->string('blocnote');
            $table->string('prochainrendezvous');
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
        Schema::dropIfExists('espace_commercials');
    }
}
