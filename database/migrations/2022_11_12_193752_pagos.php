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
        Schema::create("Pagos", function(Blueprint $table)
        {
            $table->increments("id_pago");
            $table->integer("id_cita")->unsigned();
            $table->foreign("id_cita")->references("id_cita")->on("Citas");
            $table->float("Costo");
            $table->string("nTarjeta", 16);
            $table->string("comprobante", 255);
            $table->float("Adeudo");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("Pagos");
    }
};
