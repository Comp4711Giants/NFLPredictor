<?php

/**
 * Our homepage. Show the most recently added quote.
 * 
 * controllers/Welcome.php
 *
 * ------------------------------------------------------------------------
 */
define('LOCAL', false);   // control whether we access our model locally, or over XML-RPC
define('RPCSERVER', ('nfl.jlparry.com/rpc'));   // endpoint fo the XML-RPC server
define('RPCPORT', 80); // port the XML-RPC service is listening on

            

class Welcome extends Application {


    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->data['pagebody'] = 'homepage';
        // get the list of airports that can be flown from
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
        
        $this->load->model('Teams');
        $reset = array(
            'wins' => 0,
            'losses' => 0,
            'points_for' => 0,
            'points_against' => 0
        );
        $this->db->update('teams', $reset); 
        $this->load->model('History');
        $updatedTeams = $this->History->updateGameRecords($list);
        //var_dump($updatedTeams);


        $label = "Select the opposing team:";
        $name = "ddlOpposingTeam";
        $value = "NE";
        $options = $this->teams->getAllTeamCodes();
        
        $this->load->helper('formfields');
        $this->data['ddlOpposingTeam'] = makeComboField($label, $name, $value, $options);
        
       

        $this->render();
    }

    function about() {
        $this->data['pagebody'] = 'about';
        $this->data['what'] = '<h2>The Team:<br>James, Jessica, and Jonny</h2><br>
                                <h3>This site is for educational use only.</h3>
                                Section 29 of the Copyright Act of Canada creates the fair dealing exception to copyright for the purpose of education.
                                <br>
                                <br>
                                "s.29 Fair dealing for the purpose of research, private study, education, parody or satire does not infringe copyright."';
        $this->render();
    }

}