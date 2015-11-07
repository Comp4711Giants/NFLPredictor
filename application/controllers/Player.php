<?php

/**
 * Player controller. Shows the player page with default using the justone view. 
 *
 * controllers/Player.php
 *
 * ------------------------------------------------------------------------
 */
class Player extends Application {

    function __construct() {
        parent::__construct();
    }

    //-------------------------------------------------------------
    //  The normal pages
    /*
	
	$this->data['pagebody'] = 'justone';    // this is the view we want shown
        // get the author and quote of the id passe by the route, to pass on to our view
        $record = $this->quotes->get($number);
        $this->data = array_merge($this->data, $record);

        $this->render();
     
    */
    //-------------------------------------------------------------

    function index() {
        $this->data['pagebody'] = 'playersView';    // this is the view we want shown
        // build the list of players, to pass on to our view
        $source = $this->players->all();
        $players = array();
        foreach ($source as $record) {
            $players[] = array('who' => $record->lastname . ", " . $record->firstname, 'mug' => $record->mug, 
                'id' => $record->id, 'position' => $record->position, 'number' => $record->number);
        }
        $this->data['players'] = $players;

        $this->render();
    }
    
    function display($number) {
        $this->data['pagebody'] = 'singlePlayerView';    // this is the view we want shown
        $record = $this->players->get($number);
        
        $player = array('id' => $record->id, 'who' => $record->lastname . ", " . $record->firstname, 'mug' => $record->mug,
            'number' => $record->number, 'position' => $record->position);
        $this->data = array_merge($this->data, $player);
        $this->render();
    }
}