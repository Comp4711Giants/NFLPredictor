<?php

/**
 * Teams.php
 * Model for teams with hard-coded data to start.
 *
 * Version 1
 * @author James Ensom
 */
class Teams extends CI_Model {

    // http://www.nfl.com/standings
    var $data = [
        array('id' => 'DAL', 'name' => 'Dallas Cowboys', 'conference' => 'NFC', 'region' => 'east', 'wins' => '2', 'loses' => '1', 'ties' => '0'),
        array('id' => 'NYG', 'name' => 'New York Giants', 'conference' => 'NFC', 'region' => 'east', 'wins' => '1',	 'loses' => '2', 'ties' => '0'),
        array('id' => 'WAS', 'name' => 'Washington Redskins', 'conference' => 'NFC', 'region' => 'east', 'wins' => '1',	 'loses' => '2', 'ties' => '0'),
        array('id' => 'PHI', 'name' => 'Philadelphia Eagles', 'conference' => 'NFC', 'region' => 'east', 'wins' => '1',	 'loses' => '2', 'ties' => '0'),
        array('id' => 'GB', 'name' => 'Green Bay Packers', 'conference' => 'NFC', 'region' => 'north', 'wins' => '3', 'loses' => '0', 'ties' => '0'),
        array('id' => 'MIN', 'name' => 'Minnesota Vikings', 'conference' => 'NFC', 'region' => 'north', 'wins' => '2', 'loses' => '1', 'ties' => '0'),
        array('id' => 'DET', 'name' => 'Detroit Lions', 'conference' => 'NFC', 'region' => 'north', 'wins' => '0', 'loses' => '3', 'ties' => '0'),
        array('id' => 'CHI', 'name' => 'Chicago Bears', 'conference' => 'NFC', 'region' => 'north', 'wins' => '0', 'loses' => '3', 'ties' => '0'),
        array('id' => 'CAR', 'name' => 'Carolina Panthers', 'conference' => 'NFC', 'region' => 'south', 'wins' => '3', 'loses' => '0', 'ties' => '0'),
        array('id' => 'ATL', 'name' => 'Atlanta Falcons', 'conference' => 'NFC', 'region' => 'south', 'wins' => '3', 'loses' => '0', 'ties' => '0'),
        array('id' => 'TB', 'name' => 'Tampa Bay Buccaneers', 'conference' => 'NFC', 'region' => 'south', 'wins' => '1', 'loses' => '2', 'ties' => '0'),
        array('id' => 'NO', 'name' => 'New Orleans Saints', 'conference' => 'NFC', 'region' => 'south', 'wins' => '0', 'loses' => '3', 'ties' => '0'),
        array('id' => 'ARI', 'name' => 'Arizona Cardinals', 'conference' => 'NFC', 'region' => 'west', 'wins' => '3', 'loses' => '0', 'ties' => '0'),
        array('id' => 'STL', 'name' => 'St. Louis Rams', 'conference' => 'NFC', 'region' => 'west', 'wins' => '1', 'loses' => '2', 'ties' => '0'),
        array('id' => 'SF', 'name' => 'San Francisco 49ers', 'conference' => 'NFC', 'region' => 'west', 'wins' => '1', 'loses' => '2', 'ties' => '0'),
        array('id' => 'SEA', 'name' => 'Seattle Seahawks', 'conference' => 'NFC', 'region' => 'west', 'wins' => '1', 'loses' => '2', 'ties' => '0'),
        array('id' => 'NE', 'name' => 'New England Patriots', 'conference' => 'AFC', 'region' => 'east', 'wins' => '3', 'loses' => '0', 'ties' => '0'),
        array('id' => 'BUF', 'name' => 'Buffalo Bills', 'conference' => 'AFC', 'region' => 'east', 'wins' => '2', 'loses' => '1', 'ties' => '0'),
        array('id' => 'NYJ', 'name' => 'New York Jets',  'conference' => 'AFC', 'region' => 'east', 'wins' => '2', 'loses' => '1', 'ties' => '0'),
        array('id' => 'MIA', 'name' => 'Miami Dolphins', 'conference' => 'AFC', 'region' => 'east', 'wins' => '1', 'loses' => '2', 'ties' => '0'),
        array('id' => 'CIN', 'name' => 'Cincinnati Bengals', 'conference' => 'AFC', 'region' => 'north', 'wins' => '3', 'loses' => '0', 'ties' => '0'),
        array('id' => 'PIT', 'name' => 'Pittsburgh Steelers', 'conference' => 'AFC', 'region' => 'north', 'wins' => '2', 'loses' => '2', 'ties' => '0'),
        array('id' => 'CLE', 'name' => 'Cleveland Browns', 'conference' => 'AFC', 'region' => 'north', 'wins' => '1', 'loses' => '2', 'ties' => '0'),
        array('id' => 'BAL', 'name' => 'Baltimore Ravens', 'conference' => 'AFC', 'region' => 'north', 'wins' => '1', 'loses' => '3', 'ties' => '0'),
        array('id' => 'IND', 'name' => 'Indianapolis Colts', 'conference' => 'AFC', 'region' => 'South', 'wins' => '1', 'loses' => '2', 'ties' => '0'),
        array('id' => 'TEN', 'name' => 'Tennessee Titans', 'conference' => 'AFC', 'region' => 'South', 'wins' => '1', 'loses' => '2', 'ties' => '0'),
        array('id' => 'HOU', 'name' => 'Houston Texans', 'conference' => 'AFC', 'region' => 'South', 'wins' => '1', 'loses' => '2', 'ties' => '0'),
        array('id' => 'JAC', 'name' => 'Jacksonville Jaguars', 'conference' => 'AFC', 'region' => 'South', 'wins' => '1', 'loses' => '2', 'ties' => '0'),
        array('id' => 'DEN', 'name' => 'Denver Broncos', 'conference' => 'AFC', 'region' => 'west', 'wins' => '3', 'loses' => '0', 'ties' => '0'),
        array('id' => 'OAK', 'name' => 'Oakland Raiders', 'conference' => 'AFC', 'region' => 'west', 'wins' => '2', 'loses' => '1', 'ties' => '0'),
        array('id' => 'KC', 'name' => 'Kansas City Chiefs', 'conference' => 'AFC', 'region' => 'west', 'wins' => '1', 'loses' => '2', 'ties' => '0'),
        array('id' => 'SD', 'name' => 'San Diego Chargers', 'conference' => 'AFC', 'region' => 'west', 'wins' => '1', 'loses' => '2', 'ties' => '0'),
    ];

    // Constructor
    public function __construct() {
        parent::__construct();
    }

    // retrieve a single team
    public function get($which) {
        // iterate over the data until we find the one we want
        foreach ($this->data as $record)
            if ($record['id'] == $which)
                return $record;
        return null;
    }
    
    // retrieve AFC teams
    public function getAFC() {
        $teamsAFC = array();
        // iterate over the data until we find all the ones we want
        foreach ($this->data as $record)
            if ($record['conference'] == "AFC")
                $teamsAFC[] = array('id' => $record['id'], 'name' => $record['name'], 'conference' => $record['conference'], 'region' => $record['region'],
                'wins' => $record['wins'], 'loses' => $record['loses'], 'ties' => $record['ties']);
        return $teamsAFC;
    }
    
    // retrieve NFC teams
    public function getNFC() {
        $teamsNFC = array();
        // iterate over the data until we find all the ones we want
        foreach ($this->data as $record)
            if ($record['conference'] == "NFC")
                $teamsNFC[] = array('id' => $record['id'], 'name' => $record['name'], 'conference' => $record['conference'], 'region' => $record['region'],
                'wins' => $record['wins'], 'loses' => $record['loses'], 'ties' => $record['ties']);
        return $teamsNFC;
    }

    // retrieve all of the teams
    public function all() {
        return $this->data;
    }

}
