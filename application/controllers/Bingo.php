<?php

/**
 * Bingo controller. Shows the pages with default, /wisdom routes 
 * using the 'justone' view. 
 *
 * controllers/Bingo.php
 *
 * ------------------------------------------------------------------------
 */
class Bingo extends Application {

    function __construct() {
        parent::__construct();
    }

    //-------------------------------------------------------------
    //  The normal pages
    //-------------------------------------------------------------

    function index() {
        $this->data['pagebody'] = 'justone';    // this is the view we want shown
        
        // get the author and quote of id 5, to pass on to our view
        $record = $this->quotes->get(5);
        $this->data = array_merge($this->data, $record);

        $this->render();
    }

    function wisdom() {
        $this->data['pagebody'] = 'justone'; 
        // get the author and quote of id 6, to pass on to our view
        $record = $this->quotes->get(6);
        $this->data = array_merge($this->data, $record);

        $this->render();
    }

}