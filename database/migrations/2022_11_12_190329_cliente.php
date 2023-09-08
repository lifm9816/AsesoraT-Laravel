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
        Schema::create("Clientes", function(Blueprint $table)
        {
            $table->integer("id")->unsigned();
            $table->primary("id");
            $table->string("nombre", 30);
            $table->string("aPaterno", 30);
            $table->string("aMaterno", 30);
            $table->string("telefono", 10);
            $table->string("correo", 255);
            $table->string("Identificación", 255);
            $table->string("contraseña", 255);
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
        Schema::drop("Cliente");
    }
};
