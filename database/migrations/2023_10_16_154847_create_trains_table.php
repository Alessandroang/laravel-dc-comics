<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trains', function (Blueprint $table) {
            $table->id();
            $table->string('azienda',100);
            $table->string('stazione_partenza',100);
            $table->string('stazione_arrivo',50);
            $table->time('orario_di_partenza');
            $table->time('orario_di_arrivo');
            $table->date('data_di_partenza');
            $table->date('data_di_arrivo');
            $table->string('codice_treno',10)->unique();
            $table->tinyInteger('numero_carrozze')->unsigned();
            $table->boolean('in_orario')->default(true);
            $table->tinyInteger('cancellato')->default(0);
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
        Schema::dropIfExists('trains');
    }
};
