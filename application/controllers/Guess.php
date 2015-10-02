<?php

/**
 * Guess controller. Shows the pages with default using the justone view. 
 *
 * controllers/Guess.php
 *
 * ------------------------------------------------------------------------
 */
class Guess extends Application {

    function __construct() {
        parent::__construct();
    }

    //-------------------------------------------------------------
    //  The normal pages
    //-------------------------------------------------------------

    function index() {
        $this->data['pagebody'] = 'justone';    // this is the view we want shown
        
        // get the author and quote of id 4, to pass on to our view
        $record = $this->quotes->get(4);
        $this->data = array_merge($this->data, $record);

        $this->render();
    }

}