<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sauce_reacts', function (Blueprint $table) {
            $table->bigIncrements('idUser');
            $table->unsignedBigInteger('sauceId');
            $table->primary(['idUser', 'sauceId']);

            $table->foreign('idUser')->references('idUser')->on('users');
            $table->foreign('sauceId')->references('idSauce')->on('sauces');

            $table->boolean('reaction')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sauce_reacts');
    }
};
