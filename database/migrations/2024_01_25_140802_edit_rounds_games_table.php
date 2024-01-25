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
        Schema::table('games', function (Blueprint $table) {
            $table->foreignIdFor(Player::class, 'hearth_queen_player_id');
        });

        Schema::table('rounds', function (Blueprint $table) {
            $table->foreignIdFor(Player::class, 'president_player_id');
            $table->foreignIdFor(Player::class, 'vice_president_player_id');
            $table->foreignIdFor(Player::class, 'trou_player_id');
            $table->foreignIdFor(Player::class, 'vice_trou_player_id');
        });
    }
};
