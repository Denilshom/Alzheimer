<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombres', 100)->unique();
            $table->string('apellidos', 100)->unique();
            // $table->string('tipo_documento', 20)->nullable();
            // $table->string('num_documento', 20)->nullable();
            // $table->string('expedido', 20)->nullable();
            // $table->string('direccion', 70)->nullable();
            // $table->string('telefono', 20)->nullable();
            // $table->string('email', 50)->nullable();
            $table->boolean('condicion')->default(1);
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
        Schema::dropIfExists('pacientes');
    }
}
