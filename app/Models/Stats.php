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
        $resource = [];
        switch ($this->type){
            case 'pres':
                $resource = $this->getCalculatedStats('president_player_id');
                break;
            case 'vice-pres':
                $resource = $this->getCalculatedStats('vice_president_player_id');
                break;
            case 'neutre':
                $resource = $this->getCalculatedStats('');
                break;
            case 'vice-trou':
                $resource = $this->getCalculatedStats('vice_trou_player_id');
                break;
            case 'trou':
                $resource = $this->getCalculatedStats('trou_player_id');
                break;
        }

        return $resource;
    }

    public function getCalculatedStats(String $type){
        foreach($this->games as $game){
            foreach($game->rounds as $round){
                if($type){
                    $this->stats[$round->{$type}]['score']++;
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

        $this->stats = array_map(function($el){
            $el['pourcent'] = round($el['score'] * 100 / $el['total'], 2);
            return $el;
        }, $this->stats);

        usort($this->stats, function($a, $b){
            if ($a['pourcent'] == $b['pourcent']) {
                return 0;
            }
            return ($a['pourcent'] < $b['pourcent']) ? 1 : -1;
        });

        return $this->stats;
    }
}
