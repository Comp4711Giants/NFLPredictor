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
        $this->load->helper('form');
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

        $this->data['pagebody'] = 'playersView';    
        // this is the view we want shown
        // build the list of players, to pass on to our view
        $source = $this->players->all();

        //get value of session->userdata('editMode')
        $session_editMode = $this->session->editMode;
        //if emtpy, hide edit button in playersView
        if(empty($session_editMode)) {
            $this->data['editEnabled'] = "none";
            $this->data['hide'] = "true";
        } else {
             $this->data['editEnabled'] = "true";
             $this->data['hide'] = "none";
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

    //gives editting permissions
    function editSessionSet() {
        $this->session->type = "Table";
        $this->session->editMode = "edit";
        redirect('/roster');
    }

    //removes editing permissions
    function removeEditSessionSet() {
        $this->session->sess_destroy();
        $this->data['pagebody'] = 'removeEditSession';
        $this->render();
    }


    
    function display($number) {
        $this->data['pagebody'] = 'singlePlayerView';    // this is the view we want shown
        $record = $this->players->get($number);

        //check for editting session (will hide edit button in view)
        $session_editMode = $this->session->editMode;
        if(empty($session_editMode)) {
            $this->data['editEnabled'] = "none";
        } else {
             $this->data['editEnabled'] = "true";
        }
        $player = array(
            'id' => $record->id, 
            'who' => $record->lastname . ", " . $record->firstname, 
            'mug' => $record->mug,
            'number' => $record->number, 
            'position' => $record->position
        );

        $this->data['id'] = $record->id;
        $this->data = array_merge($this->data, $player);
        $this->render();
    }

    //this function is used to display the players page by page
    function display_page($page_number = 1) {

        $this->data['title'] = "Player Roster";

        if(empty($session_editMode)) {
            $this->data['editEnabled'] = "true";
            $this->data['hide'] = "none";
        } else {
             $this->data['editEnabled'] = "none";
             $this->data['hide'] = "true";
        }

        //this gets the posted 'type' variable and sets it to a session variable
        if ($this->input->post('Type') != null) {
            $sessionType = array( 'type' => $this->input->post('Type'));
            $this->session->set_userdata($sessionType);
        }

        //this gets the posted 'sort' variable and sets it to a session variable
        if ($this->input->post('Sort') != null) {
            $sessionSort = array( 'sort' => $this->input->post('Sort'));
            $this->session->set_userdata($sessionSort);
        }

        //this block sets config variables for the pagination library
        //you can look these up in the pagination documentation
        $config['base_url'] = '/roster';
        $config['total_rows'] = $this->players->size();
        $config["per_page"] = 12;
        $config['use_page_numbers'] = TRUE;
        $config['first_link'] = 'First';
        $config['prev_link'] = 'Previous';
        $config['next_link'] = 'Next';
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
         
        // build the list of players, to pass on to our view
        $source = $this->players->fetch_page(12, $page_number, $this->session->sort);

        //assigns the player data from the database to template variables/placeholders
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
        
        //creates the pagination links
        $this->data['links'] = $this->pagination->create_links();

        //creating the 'sort' radio buttons
        //sets the default selected 'type' option based on the session variable
        if ($this->session->type == 'Table') {
            $this->data['pagebody'] = 'playersPageViewTable';
            $this->data['radGallery'] = form_radio($this->get_radio_button_data_array('Type', 'Gallery'));
            $this->data['radTable'] = form_radio($this->get_radio_button_data_array('Type', 'Table', TRUE));
        } else {
            $this->data['pagebody'] = 'playersPageView';
            $this->data['radGallery'] = form_radio($this->get_radio_button_data_array('Type', 'Gallery', TRUE));
            $this->data['radTable'] = form_radio($this->get_radio_button_data_array('Type', 'Table'));
        }

        //creating the 'type' radio buttons
        //sets the default selected 'sort' option based on the session variable
        if ($this->session->sort == 'position') {
            $this->data['radName'] = form_radio($this->get_radio_button_data_array('Sort', 'lastname'));
            $this->data['radJersey'] = form_radio($this->get_radio_button_data_array('Sort', 'number'));
            $this->data['radPosition'] = form_radio($this->get_radio_button_data_array('Sort', 'position', TRUE));
        } else if ($this->session->sort == 'number') {
            $this->data['radName'] = form_radio($this->get_radio_button_data_array('Sort', 'lastname'));
            $this->data['radJersey'] = form_radio($this->get_radio_button_data_array('Sort', 'number', TRUE));
            $this->data['radPosition'] = form_radio($this->get_radio_button_data_array('Sort', 'position'));
        } else {
            $this->data['radName'] = form_radio($this->get_radio_button_data_array('Sort', 'lastname', TRUE));
            $this->data['radJersey'] = form_radio($this->get_radio_button_data_array('Sort', 'number'));
            $this->data['radPosition'] = form_radio($this->get_radio_button_data_array('Sort', 'position'));
        }
        
        //creating the labels for the radio buttons
        $this->data['lblGallery'] = form_label('Gallery', 'Gallery');
        $this->data['lblTable'] = form_label('Table', 'Table');
        $this->data['lblName'] = form_label('Name', 'lastname');
        $this->data['lblJersey'] = form_label('Jersey Number', 'number');
        $this->data['lblPosition'] = form_label('Position', 'position');
        $this->data['lblType'] = form_label('Display Type');
        $this->data['lblSort'] = form_label('Sort By');
        $this->data['btnSubmit'] = form_submit('Submit', 'Submit');

        //storing the page number in a placeholder/template variable
        $this->data['page_number'] = $page_number;

        $this->render();
    }

    function get_radio_button_data_array($name, $value, $checked = FALSE) {
        return $data = array(
            'name'        => $name,
            'value'       => $value,
            'id'          => $value,
            'checked'     => $checked,
        );
    }
}