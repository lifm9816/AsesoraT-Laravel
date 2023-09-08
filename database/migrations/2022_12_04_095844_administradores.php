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
        Schema::create("Administradores", function(Blueprint $table)
        {
            $table -> increments("id");
            $table -> string("nombre", 30);
            $table -> string("aPaterno", 30);
            $table -> string("aMaterno", 30);
            $table -> string("teléfono", 10);
            $table -> string("correo", 255);
            $table -> string("identificación", 255);
            $table -> string("contraseña", 255);
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
        Schema::drop("Administradores");
    }
};
