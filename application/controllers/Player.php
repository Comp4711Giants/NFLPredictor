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
        $this->load->library('pagination');
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

        //$this->session->sess_destroy();

        $this->data['pagebody'] = 'playersView';    
        // this is the view we want shown
        // build the list of players, to pass on to our view
        $source = $this->players->all();

        //get value of session->userdata('editMode')
        $session_editMode = $this->session->editMode;
        //if emtpy, hide edit button in playersView
        if(empty($session_editMode)) {
            $this->data['editEnabled'] = "none";
        } else {
             $this->data['editEnabled'] = "true";
        }

        $players = array();
        foreach ($source as $record) {
            $players[] = array(
                'who' => $record->lastname . ", " . $record->firstname, 
                'mug' => $record->mug, 
                'id' => $record->id, 
                'position' => $record->position, 
                'number' => $record->number
            );
        }
        $this->data['players'] = $players;

        $this->render();
    }
    
    function display($number) {
        $this->data['pagebody'] = 'singlePlayerView';    // this is the view we want shown
        $record = $this->players->get($number);
        
        $player = array(
            'id' => $record->id, 
            'who' => $record->lastname . ", " . $record->firstname, 
            'mug' => $record->mug,
            'number' => $record->number, 
            'position' => $record->position
        );

        $this->data = array_merge($this->data, $player);
        $this->render();
    }

    function display_page($page_number = 1) {
        $config['base_url'] = 'http://comp4711.local:8080/roster/page';
        $config['total_rows'] = ceil($this->players->size() / 12);
        $config["per_page"] = 1;
        $config['use_page_numbers'] = TRUE;
        $config['first_link'] = 'First ';
        $config['prev_link'] = 'Previous ';
        $config['next_link'] = 'Next ';
        $config['last_link'] = 'Last';
        $config['display_pages'] = FALSE;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        if (isset($this->data['grid'])) {
            if ($this->data['grid']) {
                $this->data['pagebody'] = 'playersPageView';
            } else {
                $this->data['pagebody'] = 'playersPageViewTable';
            }
        } else {
            $this->data['pagebody'] = 'playersPageView';
        }
        
         
        // this is the view we want shown
        // build the list of players, to pass on to our view
        $source = $this->players->fetch_page(12, $page_number);

        $players = array();
        foreach ($source as $record) {
            $players[] = array(
                'who' => $record->lastname . ", " . $record->firstname, 
                'mug' => $record->mug, 
                'id' => $record->id, 
                'position' => $record->position, 
                'number' => $record->number
            );
        }
        $this->data['players'] = $players;

        $this->data['links'] = $this->pagination->create_links();

        $this->render();
    }

    function toggle_grid_table() {
        if (isset($this->data['grid'])) {
            $this->data['grid'] = !$this->data['grid'];
        } else {
            $this->data['grid'] = true;
        }

        $this->render();
    }
}