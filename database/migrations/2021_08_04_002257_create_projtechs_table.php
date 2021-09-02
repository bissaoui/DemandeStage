<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjtechsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projteches', function (Blueprint $table) {
            $table->foreignId('technologie_id')
                ->constrained('technologies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('projet_id')
                ->constrained('projets')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->primary(['technologie_id', 'projet_id']);
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
        Schema::dropIfExists('projtechs');
    }
}
