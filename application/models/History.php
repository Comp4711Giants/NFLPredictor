<?php

/**
 * History.php
 * Model for history with hard-coded data to start.
 *
 * Version 1
 * @author Jessica Tekenos
 */
class History extends MY_Model2 {
    // Constructor
    public function __construct() {
        parent::__construct("history", "team", "date");
    }
    
    public function getProbabilityOfVictory($opponent) {
        $this->db->order_by('date', 'desc');
        $this->db->where('team', 'NYG');
        $query = $this->db->get("history");
        $us = $query->result();
        
        //statistics for all games
        $gameCount = 0;
        $winCount = 0;
        $winCountLast5 = 0;
        
        //statistics for games against the specific opponent
        $gameCountAgainstOpponent = 0;
        $winCountAgainstOpponent = 0;
        $winCountLast5AgainstOpponent = 0;
        
        foreach($us as $game) {
            $gameCount++;
            if ($game->win) {
                $winCount++;
            }
            if ($gameCount == 5) {
                $winCountLast5 = $winCount;
            }
            if($game->opponent == $opponent) {
                $gameCountAgainstOpponent++;
                if($game->win) {
                    $winCountAgainstOpponent++;
                }
                if ($gameCountAgainstOpponent == 5) {
                    $winCountLast5AgainstOpponent = $winCountAgainstOpponent;
                }
            }
        }
        if ($gameCount < 5) {
            return "Hello World";
        }
        
        $probability = (0.7 * ($winCount / $gameCount)) + (0.2 * ($winCountLast5 / 5)) + (0.1 * ($winCountLast5AgainstOpponent / 5));
                
        return $probability;
    }
}