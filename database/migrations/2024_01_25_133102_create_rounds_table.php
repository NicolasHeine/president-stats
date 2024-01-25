<?php

use App\Models\Game;
use App\Models\Player;
use App\Models\Round;
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
        Schema::create('rounds', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Game::class);
            $table->foreignIdFor(Player::class, 'president_player_id');
            $table->foreignIdFor(Player::class, 'vice_president_player_id');
            $table->foreignIdFor(Player::class, 'trou_player_id');
            $table->foreignIdFor(Player::class, 'vice_trou_player_id');
            $table->timestamps();
        });

        Schema::create('round_player', function (Blueprint $table) {
            $table->foreignIdFor(Round::class);
            $table->foreignIdFor(Player::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rounds');
        Schema::dropIfExists('round_player');
    }
};
