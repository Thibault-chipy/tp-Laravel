<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique('users_email_unique'); // Supprime l'ancienne contrainte unique
            $table->string('email', 191)->unique()->change(); // Redéfinit la colonne avec une longueur max de 191
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique('users_email_unique'); // Supprime la contrainte unique
            $table->string('email')->unique()->change(); // Revient à l'ancienne définition
        });
    }
};
