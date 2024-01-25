<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Round extends Model
{
    use HasFactory;

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }

    public function players(): BelongsToMany
    {
        return $this->belongsToMany(Player::class, 'round_player');
    }
}
