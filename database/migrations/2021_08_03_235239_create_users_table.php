<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('prenom')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken()->nullable();
            $table->date('ddn')->nullable();
            $table->string('adresse')->nullable();
            $table->string('photoUser')->nullable()->default('images.png');
            $table->string('civilite')->nullable();
            $table->string('telephone')->nullable();
            $table->foreignId('ville_id')->nullable()
                ->constrained('villes')
                ->onUpdate('cascade')
                ->onDelete('cascade')->default("Null");
            $table->boolean('is_admin')->nullable();
            $table->boolean('cv_Is_Complet')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('users');
    }
}
