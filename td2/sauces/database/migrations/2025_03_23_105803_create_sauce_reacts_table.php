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
            $table->unsignedBigInteger('idUser');
            $table->unsignedBigInteger('sauceId');
            $table->enum('reaction', ['like', 'dislike']); // Réaction Like/Dislike
    
            $table->foreign('idUser')->references('idUser')->on('users')->onDelete('cascade');
            $table->foreign('sauceId')->references('idSauce')->on('sauces')->onDelete('cascade');
            $table->primary(['idUser', 'sauceId']); 
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
