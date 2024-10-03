<?php

namespace App\Models;

class Stats
{
  protected $games;
  protected $players;
  protected $type;
  protected $date_from;
  protected $date_to;
  protected $stats = [];

  public function __construct(string $type, string $date_from = '', string $date_to = '')
  {
    $this->date_from = $date_from;
    $this->date_to = $date_to;

    if($this->date_from && $this->date_to){
      $this->games = Game::all()
        ->where('created_at', '>=', $this->date_from.' 00:00:00')
        ->where('created_at', '<=', $this->date_to.' 23:59:59');
    }else{
      $this->games = Game::all();
    }

    $this->players = Player::all();
    $this->type = $type;

    foreach ($this->players as $player) {
      if (!isset($this->stats[$player->id])) {
        $this->stats[$player->id] = [
          'name' => $player->name,
          'pourcent' => 0,
          'score' => 0,
          'total' => 0,
        ];
      };
    }
  }

  public function getStats()
  {
    switch ($this->type) {
      case 'global':
        $this->getGlobalStats();
        break;
      case 'pres':
        $this->getCalculatedStats('president_player_id');
        break;
      case 'vice-pres':
        $this->getCalculatedStats('vice_president_player_id');
        break;
      case 'neutre':
        $this->getCalculatedStats('');
        break;
      case 'vice-trou':
        $this->getCalculatedStats('vice_trou_player_id');
        break;
      case 'trou':
        $this->getCalculatedStats('trou_player_id');
        break;
      case 'top':
        $this->getCalculatedStats('top');
        break;
      case 'bottom':
        $this->getCalculatedStats('bottom');
        break;
      case 'queen':
        $this->getCalculatedStatsQueen();
        break;
    }

    $this->stats = array_map(function ($el) {
      if ($el['total']) {
        if ($this->type == 'global') {
          $el['pourcent'] = round($el['total'] / $el['score'], 2);
        } else {
          $el['pourcent'] = round($el['score'] * 100 / $el['total'], 2);
        }
        return $el;
      } else {
        return $el;
      }
    }, $this->stats);

    usort($this->stats, function ($a, $b) {
      if ($a['pourcent'] == $b['pourcent']) {
        return 0;
      }
      return ($a['pourcent'] < $b['pourcent']) ? 1 : -1;
    });

    return $this->stats;
  }

  public function getCalculatedStats(string $type)
  {
    foreach ($this->games as $game) {
      foreach ($game->rounds as $round) {
        if ($type) {
          if ($type == 'top') {
            $this->stats[$round->president_player_id]['score']++;
            $this->stats[$round->vice_president_player_id]['score']++;
          } elseif ($type == 'bottom') {
            $this->stats[$round->vice_trou_player_id]['score']++;
            $this->stats[$round->trou_player_id]['score']++;
          } else {
            $this->stats[$round->{$type}]['score']++;
          }
        }
        foreach ($round->players as $player) {
          $this->stats[$player->id]['total']++;
          if (!$type) {
            if (
              $round->president_player_id != $player->id &&
              $round->vice_president_player_id != $player->id &&
              $round->vice_trou_player_id != $player->id &&
              $round->trou_player_id != $player->id
            ) {
              $this->stats[$player->id]['score']++;
            }
          }
        }
      }
    }
    foreach ($this->stats as $key => $stats) {
      if ($stats['total'] < 20) {
        //unset($this->stats[$key]);
      }
    }
  }

  public function getCalculatedStatsQueen()
  {
    foreach ($this->games as $game) {
      $this->stats[$game->hearth_queen_player_id]['score']++;
      foreach ($game->rounds[0]->players as $player) {
        $this->stats[$player->id]['total']++;
      }
    }
    foreach ($this->stats as $key => $stats) {
      if ($stats['total'] < 5) {
        //unset($this->stats[$key]);
      }
    }
  }

  public function getGlobalStats()
  {
    $round = 0;
    foreach ($this->games as $game) {
      $round += count($game->rounds);
    }
    $this->stats = [
      0 => [
        'name' => '',
        'pourcent' => 0,
        'score' => count($this->games),
        'total' => $round,
      ]
    ];
  }
}
