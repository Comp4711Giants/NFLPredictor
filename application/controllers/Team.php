<?php

define('LOCAL', false);   // control whether we access our model locally, or over XML-RPC
define('RPCSERVER', ('nfl.jlparry.com/rpc'));   // endpoint fo the XML-RPC server
define('RPCPORT', 80); // port the XML-RPC service is listening on

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
            $sessionLayout = array( 'Layout' => $this->input->post('Layout'));
            $this->session->set_userdata($sessionLayout);
        } else {
            $sessionLayout = array( 'Layout' => 'League');
            $this->session->set_userdata($sessionLayout);
        }

        //this gets the posted 'Sort' variable and sets it to a session variable
        if ($this->input->post('Sort') != null) {
            $sessionSort = array( 'Sort' => $this->input->post('Sort'));
            $this->session->set_userdata($sessionSort);
        } else {
            $sessionSort = array( 'Sort' => 'City');
            $this->session->set_userdata($sessionSort);
        }



        //-----------------------------
        //-----XML-RPC Begins Here-----
        //-----------------------------



        $list = array();
        // use XML-RPC to get the list
        $this->load->library('xmlrpc');
        $this->xmlrpc->server(RPCSERVER, RPCPORT);
        $this->xmlrpc->method('since');
        $request = array();
        $this->xmlrpc->request($request);

        //$this->xmlrpc->set_debug(true);

        if (!$this->xmlrpc->send_request())
        {
            echo $this->xmlrpc->display_error();
        }

        $list = $this->xmlrpc->display_response();

        

        //---------------------------
        //-----XML-RPC Ends Here-----
        //---------------------------



        //------------------------------------
        //-----Data Retrieval Begins Here-----
        //------------------------------------

         

        //Clear Teams Data
        $this->load->model('Teams');
        $reset = array(
            'wins' => 0,
            'losses' => 0,
            'points_for' => 0,
            'points_against' => 0,
            'net_points' => 0
        );
        $this->db->update('Teams', $reset);

        //Update Game History
        $this->history->updateGameRecords($list);

        // build the list of teams, to pass on to our view
        if ($this->session->Layout == 'Conference') {
            $teamSourceAFC = $this->teams->getConference($this->session->Sort, "AFC");
            $teamSourceNFC = $this->teams->getConference($this->session->Sort, "NFC");

            foreach ($teamSourceAFC as $record) {
                $afcTeams[] = array(
                    'id' => $record->id,
                    'name' => $record->name,
                    'city' => $record->city,
                    'conference' => $record->conference,
                    'division' => $record->division,
                    'wins' => $record->wins,
                    'losses' => $record->losses,
                    'points_for' => $record->points_for,
                    'points_against' => $record->points_against,
                    'net_points' => $record->net_points
                );
            }

            foreach ($teamSourceNFC as $record) {
                $nfcTeams[] = array(
                    'id' => $record->id,
                    'name' => $record->name,
                    'city' => $record->city,
                    'conference' => $record->conference,
                    'division' => $record->division,
                    'wins' => $record->wins,
                    'losses' => $record->losses,
                    'points_for' => $record->points_for,
                    'points_against' => $record->points_against,
                    'net_points' => $record->net_points
                );
            }

            $this->data['afcTeams'] = $afcTeams;

            $this->data['nfcTeams'] = $nfcTeams;
        } else if ($this->session->Layout == 'Division') {
            $teamSourceAFCNorth = $this->teams->getConferenceDivision($this->session->Sort, "AFC", "North");
            $teamSourceAFCEast = $this->teams->getConferenceDivision($this->session->Sort, "AFC", "East");
            $teamSourceAFCSouth = $this->teams->getConferenceDivision($this->session->Sort, "AFC", "South");
            $teamSourceAFCWest = $this->teams->getConferenceDivision($this->session->Sort, "AFC", "West");
            $teamSourceNFCNorth = $this->teams->getConferenceDivision($this->session->Sort, "NFC", "North");
            $teamSourceNFCEast = $this->teams->getConferenceDivision($this->session->Sort, "NFC", "East");
            $teamSourceNFCSouth = $this->teams->getConferenceDivision($this->session->Sort, "NFC", "South");
            $teamSourceNFCWest = $this->teams->getConferenceDivision($this->session->Sort, "NFC", "West");

            foreach ($teamSourceAFCNorth as $record) {
                $afcNorthTeams[] = array(
                    'id' => $record->id,
                    'name' => $record->name,
                    'city' => $record->city,
                    'conference' => $record->conference,
                    'division' => $record->division,
                    'wins' => $record->wins,
                    'losses' => $record->losses,
                    'points_for' => $record->points_for,
                    'points_against' => $record->points_against,
                    'net_points' => $record->net_points
                );
            }

            foreach ($teamSourceAFCEast as $record) {
                $afcEastTeams[] = array(
                    'id' => $record->id,
                    'name' => $record->name,
                    'city' => $record->city,
                    'conference' => $record->conference,
                    'division' => $record->division,
                    'wins' => $record->wins,
                    'losses' => $record->losses,
                    'points_for' => $record->points_for,
                    'points_against' => $record->points_against,
                    'net_points' => $record->net_points
                );
            }

            foreach ($teamSourceAFCSouth as $record) {
                $afcSouthTeams[] = array(
                    'id' => $record->id,
                    'name' => $record->name,
                    'city' => $record->city,
                    'conference' => $record->conference,
                    'division' => $record->division,
                    'wins' => $record->wins,
                    'losses' => $record->losses,
                    'points_for' => $record->points_for,
                    'points_against' => $record->points_against,
                    'net_points' => $record->net_points
                );
            }

            foreach ($teamSourceAFCWest as $record) {
                $afcWestTeams[] = array(
                    'id' => $record->id,
                    'name' => $record->name,
                    'city' => $record->city,
                    'conference' => $record->conference,
                    'division' => $record->division,
                    'wins' => $record->wins,
                    'losses' => $record->losses,
                    'points_for' => $record->points_for,
                    'points_against' => $record->points_against,
                    'net_points' => $record->net_points
                );
            }

            foreach ($teamSourceNFCNorth as $record) {
                $nfcNorthTeams[] = array(
                    'id' => $record->id,
                    'name' => $record->name,
                    'city' => $record->city,
                    'conference' => $record->conference,
                    'division' => $record->division,
                    'wins' => $record->wins,
                    'losses' => $record->losses,
                    'points_for' => $record->points_for,
                    'points_against' => $record->points_against,
                    'net_points' => $record->net_points
                );
            }

            foreach ($teamSourceNFCEast as $record) {
                $nfcEastTeams[] = array(
                    'id' => $record->id,
                    'name' => $record->name,
                    'city' => $record->city,
                    'conference' => $record->conference,
                    'division' => $record->division,
                    'wins' => $record->wins,
                    'losses' => $record->losses,
                    'points_for' => $record->points_for,
                    'points_against' => $record->points_against,
                    'net_points' => $record->net_points
                );
            }

            foreach ($teamSourceNFCSouth as $record) {
                $nfcSouthTeams[] = array(
                    'id' => $record->id,
                    'name' => $record->name,
                    'city' => $record->city,
                    'conference' => $record->conference,
                    'division' => $record->division,
                    'wins' => $record->wins,
                    'losses' => $record->losses,
                    'points_for' => $record->points_for,
                    'points_against' => $record->points_against,
                    'net_points' => $record->net_points
                );
            }

            foreach ($teamSourceNFCWest as $record) {
                $nfcWestTeams[] = array(
                    'id' => $record->id,
                    'name' => $record->name,
                    'city' => $record->city,
                    'conference' => $record->conference,
                    'division' => $record->division,
                    'wins' => $record->wins,
                    'losses' => $record->losses,
                    'points_for' => $record->points_for,
                    'points_against' => $record->points_against,
                    'net_points' => $record->net_points
                );
            }

            $this->data['afcNorthTeams'] = $afcNorthTeams;
            $this->data['afcEastTeams'] = $afcEastTeams;
            $this->data['afcSouthTeams'] = $afcSouthTeams;
            $this->data['afcWestTeams'] = $afcWestTeams;
            $this->data['nfcNorthTeams'] = $nfcNorthTeams;
            $this->data['nfcEastTeams'] = $nfcEastTeams;
            $this->data['nfcSouthTeams'] = $nfcSouthTeams;
            $this->data['nfcWestTeams'] = $nfcWestTeams;
        } else {
            $teamSourceLeague = $this->teams->getLeague($this->session->Sort);

            foreach ($teamSourceLeague as $record) {
                $teams[] = array(
                    'id' => $record->id,
                    'name' => $record->name,
                    'city' => $record->city,
                    'conference' => $record->conference,
                    'division' => $record->division,
                    'wins' => $record->wins,
                    'losses' => $record->losses,
                    'points_for' => $record->points_for,
                    'points_against' => $record->points_against,
                    'net_points' => $record->net_points
                );
            }
            $this->data['leagueTeams'] = $teams;
        }



        //----------------------------------
        //-----Data Retrieval Ends Here-----
        //----------------------------------



        //---------------------------------------------------
        //-----Sorting and Display Form Code Begins Here-----
        //---------------------------------------------------



        //creating the 'type' radio buttons
        //sets the default selected 'type' option based on the session variable
        if ($this->session->Layout == 'Division') {
            $this->data['pagebody'] = 'teamsDivisionView';
            $this->data['radLeague'] = form_radio($this->get_radio_button_data_array('Layout', 'League'));
            $this->data['radConference'] = form_radio($this->get_radio_button_data_array('Layout', 'Conference'));
            $this->data['radDivision'] = form_radio($this->get_radio_button_data_array('Layout', 'Division', TRUE));
        } else if ($this->session->Layout == 'Conference') {
            $this->data['pagebody'] = 'teamsConferenceView';
            $this->data['radLeague'] = form_radio($this->get_radio_button_data_array('Layout', 'League'));
            $this->data['radConference'] = form_radio($this->get_radio_button_data_array('Layout', 'Conference', TRUE));
            $this->data['radDivision'] = form_radio($this->get_radio_button_data_array('Layout', 'Division'));
        } else {
            $this->data['pagebody'] = 'teamsLeagueView';
            $this->data['radLeague'] = form_radio($this->get_radio_button_data_array('Layout', 'League', TRUE));
            $this->data['radConference'] = form_radio($this->get_radio_button_data_array('Layout', 'Conference'));
            $this->data['radDivision'] = form_radio($this->get_radio_button_data_array('Layout', 'Division'));
        }

        //creating the 'sort' radio buttons
        //sets the default selected 'sort' option based on the session variable
        if ($this->session->Sort == 'net_points') {
            $this->data['radCity'] = form_radio($this->get_radio_button_data_array('Sort', 'city'));
            $this->data['radTeam'] = form_radio($this->get_radio_button_data_array('Sort', 'name'));
            $this->data['radStanding'] = form_radio($this->get_radio_button_data_array('Sort', 'net_points', TRUE));
        } else if ($this->session->Sort == 'name') {
            $this->data['radCity'] = form_radio($this->get_radio_button_data_array('Sort', 'city'));
            $this->data['radTeam'] = form_radio($this->get_radio_button_data_array('Sort', 'name', TRUE));
            $this->data['radStanding'] = form_radio($this->get_radio_button_data_array('Sort', 'net_points'));
        } else {
            $this->data['radCity'] = form_radio($this->get_radio_button_data_array('Sort', 'city', TRUE));
            $this->data['radTeam'] = form_radio($this->get_radio_button_data_array('Sort', 'name'));
            $this->data['radStanding'] = form_radio($this->get_radio_button_data_array('Sort', 'net_points'));
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



        //-------------------------------------------------
        //-----Sorting and Display Form Code Ends Here-----
        //-------------------------------------------------



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