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
}
