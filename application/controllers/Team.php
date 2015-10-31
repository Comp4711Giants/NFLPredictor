<?php

class Team extends Application {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->data['pagebody'] = 'teamStats';    // this is the view we want shown
        $sourceAFC = $this->teams->getAFC();
        $sourceNFC = $this->teams->getNFC();
        
        $teamsAFC = array();
        $teamsNFC = array();
        
        foreach ($sourceAFC as $record) {
                $teamsAFC[] = array('id' => $record['id'], 'name' => $record['name'], 'conference' => $record['conference'], 'region' => $record['region'],
                'wins' => $record['wins'], 'loses' => $record['loses'], 'ties' => $record['ties']);
        }
        
        foreach ($sourceNFC as $record) {
                $teamsNFC[] = array('id' => $record['id'], 'name' => $record['name'], 'conference' => $record['conference'], 'region' => $record['region'],
                'wins' => $record['wins'], 'loses' => $record['loses'], 'ties' => $record['ties']);
        }
        
        $this->data['teamsAFC'] = $teamsAFC;
        $this->data['teamsNFC'] = $teamsNFC;

        $this->render();
    }
}