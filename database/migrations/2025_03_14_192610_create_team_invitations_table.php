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
        Schema::disableForeignKeyConstraints();
        Schema::create('team_invitations', function (Blueprint $table) {

            $table->id();

            $table->foreignId('team_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('email');
            $table->string('name');
            $table->string('role')->default('member');
            $table->string('token')->unique();

            $table->timestamp('expires_at')->nullable();

            $table->unique(['team_id', 'email']);

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_invitations');
    }
};
