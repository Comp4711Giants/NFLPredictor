<?php

class Team extends Application {

    function __construct() {
        parent::__construct();
    }
    
    function getProbabilityOfVictory($opponent) {
        $teams = $this->teams->getAllTeamCodes();
        
        //var_dump($teams);
        $valid = false;
        foreach($teams as $team) {
            if($team["id"] == $opponent) {
                $valid = true;
            }
        }
        if (!$valid) {
            echo "Invalid Data";
        }
        else {
            $result = $this->history->getProbabilityOfVictory($opponent);
            echo "Your probability of victory is " . $result . "%";
        }
    }

    function index() {
        $this->data['pagebody'] = 'teamsView';    // this is the view we want shown
        $sourceAFC = $this->teams->getAFC();
        $sourceNFC = $this->teams->getNFC();
        
        $teamsAFC = array();
        $teamsNFC = array();
        
        foreach ($sourceAFC as $record) {
                $teamsAFC[] = array('id' => $record['id'], 'name' => $record['name'], 'city' => $record['city'], 'conference' => $record['conference'], 'division' => $record['division'],
                'logo' => $record['logo']);
        }
        
        foreach ($sourceNFC as $record) {
                $teamsNFC[] = array('id' => $record['id'], 'name' => $record['name'], 'city' => $record['city'], 'conference' => $record['conference'], 'division' => $record['division'],
                'logo' => $record['logo']);
        }
        
        $this->data['teamsAFC'] = $teamsAFC;
        $this->data['teamsNFC'] = $teamsNFC;

        $this->render();
    }

    function display_presentation_page() {

        $this->data['title'] = "League Data";
        $this->load->helper('form');
        $this->load->helper('formfields');

        if(empty($session_editMode)) {
            $this->data['editEnabled'] = "true";
            $this->data['hide'] = "none";
        } else {
             $this->data['editEnabled'] = "none";
             $this->data['hide'] = "true";
        }

        //this gets the posted 'Layout' variable and sets it to a session variable
        if ($this->input->post('Layout') != null) {
            $sessionType = array( 'Layout' => $this->input->post('Layout'));
            $this->session->set_userdata($sessionType);
        }

        //this gets the posted 'Sort' variable and sets it to a session variable
        if ($this->input->post('Sort') != null) {
            $sessionSort = array( 'Sort' => $this->input->post('Sort'));
            $this->session->set_userdata($sessionSort);
        }
         
        // build the list of players, to pass on to our view
        $source = $this->teams->getLeague();

        //assigns the player data from the database to template variables/placeholders
        $players = array();
        foreach ($source as $record) {
            $teams[] = array(
                'id' => $record->id, 
                'name' => $record->name, 
                'city' => $record->city, 
                'conference' => $record->conference, 
                'division' => $record->division,
                'logo' => $record->logo,
                'net_points' => $record->net_points
            );
        }
        $this->data['teams'] = $teams;

        //creating the 'sort' radio buttons
        //sets the default selected 'type' option based on the session variable
        if ($this->session->Layout == 'League') {
            $this->data['pagebody'] = 'teamsLeagueView';
            $this->data['radLeague'] = form_radio($this->get_radio_button_data_array('Layout', 'League', TRUE));
            $this->data['radConference'] = form_radio($this->get_radio_button_data_array('Layout', 'Conference'));
            $this->data['radDivision'] = form_radio($this->get_radio_button_data_array('Layout', 'Division'));
        } else if ($this->session->Layout == 'Conference') {
            $this->data['pagebody'] = 'teamsConferenceView';
            $this->data['radLeague'] = form_radio($this->get_radio_button_data_array('Type', 'Gallery'));
            $this->data['radConference'] = form_radio($this->get_radio_button_data_array('Type', 'Table', TRUE));
            $this->data['radDivision'] = form_radio($this->get_radio_button_data_array('Type', 'Table'));
        } else {
            $this->data['pagebody'] = 'teamsDivisionView';
            $this->data['radLeague'] = form_radio($this->get_radio_button_data_array('Type', 'Gallery'));
            $this->data['radConference'] = form_radio($this->get_radio_button_data_array('Type', 'Table'));
            $this->data['radDivision'] = form_radio($this->get_radio_button_data_array('Type', 'Table', TRUE));
        }

        $this->data['pagebody'] = 'teamsLeagueView';

        //creating the 'type' radio buttons
        //sets the default selected 'sort' option based on the session variable
        if ($this->session->sort == 'City') {
            $this->data['radCity'] = form_radio($this->get_radio_button_data_array('Sort', 'City', TRUE));
            $this->data['radTeam'] = form_radio($this->get_radio_button_data_array('Sort', 'Team'));
            $this->data['radStanding'] = form_radio($this->get_radio_button_data_array('Sort', 'Standing'));
        } else if ($this->session->sort == 'Team') {
            $this->data['radCity'] = form_radio($this->get_radio_button_data_array('Sort', 'City'));
            $this->data['radTeam'] = form_radio($this->get_radio_button_data_array('Sort', 'Team', TRUE));
            $this->data['radStanding'] = form_radio($this->get_radio_button_data_array('Sort', 'Standing'));
        } else {
            $this->data['radCity'] = form_radio($this->get_radio_button_data_array('Sort', 'City'));
            $this->data['radTeam'] = form_radio($this->get_radio_button_data_array('Sort', 'Team'));
            $this->data['radStanding'] = form_radio($this->get_radio_button_data_array('Sort', 'Standing', TRUE));
        }
        
        //creating the labels for the radio buttons
        $this->data['lblLeague'] = form_label('League', 'League');
        $this->data['lblConference'] = form_label('Conference', 'Conference');
        $this->data['lblDivision'] = form_label('Division', 'Division');
        $this->data['lblCity'] = form_label('City', 'city');
        $this->data['lblTeam'] = form_label('Team', 'name');
        $this->data['lblStanding'] = form_label('Standing', 'net_points');
        $this->data['lblLayout'] = form_label('Display Layout');
        $this->data['lblSort'] = form_label('Sort By');
        $this->data['btnSubmit'] = form_submit('Submit', 'Submit');

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