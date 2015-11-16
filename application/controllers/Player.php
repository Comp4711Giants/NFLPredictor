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
        if ($this->input->post('Type') != null) {
            $sessionType = array( 'type' => $this->input->post('Type'));
            $this->session->set_userdata($sessionType);
        }

        if ($this->input->post('Sort') != null) {
            $sessionSort = array( 'sort' => $this->input->post('Sort'));
            $this->session->set_userdata($sessionSort);
        }

        $config['base_url'] = 'http://comp4711.local:8080/roster';
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
         
        // this is the view we want shown
        // build the list of players, to pass on to our view
        $source = $this->players->fetch_page(12, $page_number, $this->session->sort);

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

        if ($this->session->type == 'Table') {
            $this->data['pagebody'] = 'playersPageViewTable';
            $this->data['radGallery'] = form_radio($this->get_radio_button_data_array('Type', 'Gallery'));
            $this->data['radTable'] = form_radio($this->get_radio_button_data_array('Type', 'Table', TRUE));
        } else {
            $this->data['pagebody'] = 'playersPageView';
            $this->data['radGallery'] = form_radio($this->get_radio_button_data_array('Type', 'Gallery', TRUE));
            $this->data['radTable'] = form_radio($this->get_radio_button_data_array('Type', 'Table'));
        }

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
        
        $this->data['lblGallery'] = form_label('Gallery', 'Gallery');
        $this->data['lblTable'] = form_label('Table', 'Table');
        $this->data['lblName'] = form_label('Name', 'lastname');
        $this->data['lblJersey'] = form_label('Jersey Number', 'number');
        $this->data['lblPosition'] = form_label('Position', 'position');
        $this->data['lblType'] = form_label('Display Type');
        $this->data['lblSort'] = form_label('Sort By');
        $this->data['btnSubmit'] = form_submit('Submit', 'Submit');

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