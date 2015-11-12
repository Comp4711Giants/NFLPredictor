<?php

/**
 * First controller. Shows the pages with default, /zzz and /gimme routes 
 * using the 'justone' view. 
 *
 * controllers/First.php
 *
 * ------------------------------------------------------------------------
 */
class First extends Application {

    function __construct() {
        parent::__construct();
    }

    //-------------------------------------------------------------
    //  The normal pages
    //-------------------------------------------------------------

    function index() {
        $this->data['pagebody'] = 'justone';    // this is the view we want shown

        $record = $this->quotes->first();
        $this->data = array_merge($this->data, $record);

        $this->render();
    }

    function zzz() {
        $this->data['pagebody'] = 'justone';    // this is the view we want shown
        // get the author and quote of the id called by first(), to pass on to our view
        $record = $this->quotes->first();
        $this->data = array_merge($this->data, $record);

        $this->render();
    }

    function gimme($number) {

        $this->data['pagebody'] = 'justone';    // this is the view we want shown
        // get the author and quote of the id passe by the route, to pass on to our view
        $record = $this->quotes->get($number);
        $this->data = array_merge($this->data, $record);

        $this->render();
    }



}

/* End of file Welcome.php */
/* Location: application/controllers/Welcome.php */