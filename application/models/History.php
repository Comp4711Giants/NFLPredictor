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
            return "INVALID";
        }
        
        $probability = 100 * ((0.7 * ($winCount / $gameCount)) + (0.2 * ($winCountLast5 / 5)) 
            + (0.1 * ($winCountLast5AgainstOpponent / 5)));
        return $probability;
    }


    public function updateGameRecords($list) {

        $team = array();

        foreach($list as $record) {
            $homeTeam = $record['home'];
            $awayTeam = $record['away'];
            //get substrings of date
            $gameYear = substr($record['date'], 0, 4);
            $gameMonth = substr($record['date'], 4, 2);
            $gameDay = substr($record['date'], 6, 2);
            //create date
            $gameDate = $gameYear . "-" . $gameMonth . "-" . $gameDay;
            //explode score ##:##
            $scores = explode(":", $record['score']);
            $homeTeamScore = $scores[0];
            $awayTeamScore = $scores[1];
            //find which team won
            $win = $homeTeamScore > $awayTeamScore;
            array_push($team, $homeTeam, $awayTeam, $gameDate, $homeTeamScore, $awayTeamScore, $win);

            //create entries for each team as "home team" to get only one score per row
            $firstEntry = array(
                'team' => $homeTeam,
                ''
            );
        }

        return $team;
    }
}