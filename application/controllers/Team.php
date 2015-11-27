<?php

class Team extends Application {

    function __construct() {
        parent::__construct();
    }
    
    function getProbabilityOfVictory($opponent) {
        $teams = $this->teams->getAllTeamCodes();
        
        //var_dump($teams);
        $valid = false;
        foreach($teams as $team) {
            if($team["id"] == $opponent) {
                $valid = true;
            }
        }
        if (!$valid) {
            echo "Invalid Data";
        }
        else {
            $result = $this->history->getProbabilityOfVictory($opponent);
            echo "Your probability of victory is " . $result . "%";
        }
    }

    function index() {
        $this->data['pagebody'] = 'teamsView';    // this is the view we want shown
        $sourceAFC = $this->teams->getAFC();
        $sourceNFC = $this->teams->getNFC();
        
        $teamsAFC = array();
        $teamsNFC = array();
        
        foreach ($sourceAFC as $record) {
                $teamsAFC[] = array('id' => $record['id'], 'name' => $record['name'], 'city' => $record['city'], 'conference' => $record['conference'], 'division' => $record['division'],
                'logo' => $record['logo']);
        }
        
        foreach ($sourceNFC as $record) {
                $teamsNFC[] = array('id' => $record['id'], 'name' => $record['name'], 'city' => $record['city'], 'conference' => $record['conference'], 'division' => $record['division'],
                'logo' => $record['logo']);
        }
        
        $this->data['teamsAFC'] = $teamsAFC;
        $this->data['teamsNFC'] = $teamsNFC;

        $this->render();
    }
}