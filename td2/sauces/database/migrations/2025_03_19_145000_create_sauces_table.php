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
        Schema::create('sauces', function (Blueprint $table) {
            $table->id("idSauce");
            $table->unsignedBigInteger("user_id"); 
            $table->string("name");
            $table->string("manufacturer");
            $table->text("description");
            $table->string("mainPepper");
            $table->string("imageUrl");
            $table->integer("heat");
            $table->integer("likes")->default(0);
            $table->integer("dislikes")->default(0);
            $table->json("usersLiked")->nullable(); 
            $table->json("usersDisliked")->nullable();
            
            // Clé étrangère 
            $table->foreign('user_id')->references('idUser')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sauces');
    }
};

