<?php

/**
 * Teams.php
 * Model for teams with hard-coded data to start.
 *
 * Version 1
 * @author James Ensom
 */
class Teams extends MY_Model {

    // Constructor
    public function __construct() {
        parent::__construct("teams", "id");
    }
    
    // retrieve team codes
    public function getAllTeamCodes() {
        $teamCodes = array();
        // iterate over the data until we find all the ones we want
        $all = $this->all();
        foreach ($all as $record)
            if ($record->id != "NYG") {
                $teamCodes[] = array('id' => $record->id, 'name' => $record->name);  
            }
        return $teamCodes;
    }
    
    // retrieve AFC teams
    public function getAFC() {
        $teamsAFC = array();
        // iterate over the data until we find all the ones we want
        $all = $this->all();
        foreach ($all as $record)
            if ($record->conference == "AFC") {
                $teamsAFC[] = array('id' => $record->id, 'name' => $record->name, 'city' => $record->city, 'conference' => $record->conference, 'division' => $record->division, 'logo' => $record->logo);  
            }
        return $teamsAFC;
    }
    
    // retrieve NFC teams
    public function getNFC() {
        $teamsNFC = array();
        // iterate over the data until we find all the ones we want
        $all = $this->all();
        foreach ($all as $record)
            if ($record->conference == "NFC") {
                $teamsNFC[] = array('id' => $record->id, 'name' => $record->name, 'city' => $record->city, 'conference' => $record->conference, 'division' => $record->division, 'logo' => $record->logo);
            }
        return $teamsNFC;
    }

    public function updateScores($team) {
       // //create query to find matching team in record
       //  $teamName = $team['team'];
       //  $date = $team['date'];
       //  //echo $date("Y-m-d", strtotime($date));

       //  $oldData = $this->db->where('name', $teamName);
       //  $oldDate = $oldData['date'];

       //  $dates = array();
        

       //  array_push($dates, $date, $oldDate);
        $points = 5;

        $teamObj = $this->db->get('teams', $team);
        $id = $teamObj->id;
        $teamScore = $teamObj->score;
        $teamScore += $points;
        $updatedTeam = $teamObj;


        return $updatedTeam;

    }
}
