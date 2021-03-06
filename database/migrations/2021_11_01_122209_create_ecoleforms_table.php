<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEcoleformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ecoleforms', function (Blueprint $table) {
            $table->foreignId('ecole_id')
                ->constrained('ecoles')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('formation_id')
                ->constrained('formations')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->primary(['ecole_id', 'formation_id']);

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
        Schema::dropIfExists('ecoleforms');
    }
}
