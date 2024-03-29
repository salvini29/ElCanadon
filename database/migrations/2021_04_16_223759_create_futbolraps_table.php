<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFutbolrapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('futbolraps', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('fecha');
            $table->string('hora');
            $table->boolean('pagado');
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
        Schema::dropIfExists('futbolraps');
    }
}
