<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('team_user', function (Blueprint $table) {
            
            $table->id();

            $table->foreignId('team_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('role')->default('member');

            $table->timestamps();

            $table->unique(['team_id', 'user_id']);

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('team_user');
    }
};
