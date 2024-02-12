<?php

use App\Models\Departement;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->foreignIdFor(Departement::class)->constrained()->cascadeOnDelete();
            $table->string('login_windows')->unique();
            $table->boolean('blocked')->default(false);
            $table->integer('tentative')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string("login_window")->unique();
            $table->boolean('blocked')->default(false);
            $table->rememberToken();
            $table->integer("tentative")->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
