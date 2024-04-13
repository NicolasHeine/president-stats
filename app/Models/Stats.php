<?php

namespace App\Models;

class Stats
{
    protected $games;
    protected $players;
    protected $type;
    protected $stats = [];

    public function __construct(String $type){
        $this->games = Game::all();
        $this->players = Player::all();
        $this->type = $type;

        foreach ($this->players as $player){
            if(!isset($this->stats[$player->id])){
                $this->stats[$player->id] = [
                    'name' => $player->name,
                    'pourcent' => 0,
                    'score' => 0,
                    'total' => 0,
                ];
            };
        }
    }

    public function getStats(){
        switch ($this->type){
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
                $this->getCalculatedStatsQueen('bottom');
                break;
        }

        $this->stats = array_map(function($el){
            if($el['total']){
                if($this->type == 'global'){
                    $el['pourcent'] = round($el['total']/$el['score'], 2);
                    return $el;
                }elseif($el['total'] >= 20){
                    $el['pourcent'] = round($el['score'] * 100 / $el['total'], 2);
                    return $el;
                }
            }
        }, $this->stats);

        usort($this->stats, function($a, $b){
            if ($a['pourcent'] == $b['pourcent']) {
                return 0;
            }
            return ($a['pourcent'] < $b['pourcent']) ? 1 : -1;
        });

        return $this->stats;
    }

    public function getCalculatedStats(String $type){
        foreach($this->games as $game){
            foreach($game->rounds as $round){
                if($type){
                    if($type == 'top'){
                        $this->stats[$round->president_player_id]['score']++;
                        $this->stats[$round->vice_president_player_id]['score']++;
                    }elseif($type == 'bottom'){
                        $this->stats[$round->vice_trou_player_id]['score']++;
                        $this->stats[$round->trou_player_id]['score']++;
                    }else{
                        $this->stats[$round->{$type}]['score']++;
                    }
                }
                foreach ($round->players as $player){
                    $this->stats[$player->id]['total']++;
                    if(!$type){
                        if(
                            $round->president_player_id != $player->id &&
                            $round->vice_president_player_id != $player->id &&
                            $round->vice_trou_player_id != $player->id &&
                            $round->trou_player_id != $player->id
                        ){
                            $this->stats[$player->id]['score']++;
                        }
                    }
                }
            }
        }
    }

    public function getCalculatedStatsQueen(String $type){
        foreach($this->games as $game){
            $this->stats[$game->hearth_queen_player_id]['score']++;
            foreach ($game->rounds[0]->players as $player){
                $this->stats[$player->id]['total']++;
            }
        }
    }

    public function getGlobalStats(){
        $round = 0;
        foreach($this->games as $game){
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
