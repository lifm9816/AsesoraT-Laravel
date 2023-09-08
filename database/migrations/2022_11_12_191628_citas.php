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
        Schema::create("Citas", function(Blueprint $table)
        {
            $table->increments("id_cita");
            $table->integer("id_asesoria")->unsigned();
            $table->foreign("id_asesoria")->references("id_asesoria")->on("tipo_asesorias");
            $table->integer("id_tramite")->unsigned();
            $table->foreign("id_tramite")->references("id_tramite")->on("tipo_tramites");
            $table->integer("id_cliente")->unsigned();
            $table->foreign("id_cliente")->references("id")->on("Clientes");
            $table->integer("id_abogado")->unsigned();
            $table->foreign("id_abogado")->references("id")->on("Abogados");
            $table->date("fecha");
            $table->time("hora");
            $table->rememberToken();
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
        Schema::drop("Citas");
    }
};
