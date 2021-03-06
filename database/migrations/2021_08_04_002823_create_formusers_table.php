<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formusers', function (Blueprint $table) {
            $table->foreignId('user_id')
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('ecole_id')
                ->constrained('ecoles')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('formation_id')
                ->constrained('formations')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('filiere');
            $table->string('nomEcoleComplet');
            $table->date('dateDebut');
            $table->date('dateFin');
            $table->primary(['dateDebut', 'user_id']);
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
        Schema::dropIfExists('formusers');
    }
}
