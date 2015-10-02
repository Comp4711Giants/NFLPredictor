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
        $this->data['pagebody'] = 'rosterView';    // this is the view we want shown
        // build the list of players, to pass on to our view
        $source = $this->players->all();
        $players = array();
        foreach ($source as $record) {
            $players[] = array('who' => $record['who'], 'mug' => $record['mug'], 
                'href' => $record['where'], 'posistion'=>['position'], 'number' =>['number']);
        }
        $this->data['players'] = $players;

        $this->render();
    }

    function get($number) {
        $this->data['pagebody'] = 'singlePlayerView';    // this is the view we want shown
        // get the author and quote of the id passe by the route, to pass on to our view
        $roster = $this->players->get($number);
        $this->data = array_merge($this->data, $roster);

        $this->render();
    }

}