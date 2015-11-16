<?php

/**
* controllers/Admin.php
*
* Controller for modifying or adding players to 
* a the roster
*
*/

class Admin extends Application {
	function __construct() {
		parent::__construct();
		$this->load->helper('formfields');
	}

	function index() {

		//unset($_SESSION['editMode']);

		//get session 'editMode' variable if any
		$modeSelected = $this->session->editMode;

		//check which mode is set in session 'editMode' param
		switch ($modeSelected) {
			case 'edit':
				//refresh session
				$addMode = array( 'editMode' => 'edit');
				$this->session->set_userdata($addMode);
				$this->data['pagebody'] = 'editPlayerView';
				$this->data['title'] = 'Edit Player Roster';
				$this->data['players'] = $this->players->all();
				break;
			default:
				//if no session set (will change when modes) redirect to home
				$this->data['pagebody'] = 'editPlayerView';
				$this->data['title'] = 'Edit Existing Players';
				$this->data['players'] = $this->players->all();
				$this->data['btn_add'] = makeSubmitButton('Add New Player', 
					'btn-primary');
				//set session to edit mode
				$addMode = array( 'editMode' => 'edit');
				$this->session->set_userdata($addMode);					
				break;
		}
		
		$this->render();
	}

	/* Add new player to roster */
	function add() {
		//refresh session
		$addMode = array( 'editMode' => 'edit');
		$this->session->set_userdata($addMode);
		//create empty player
		$player = $this->players->create();
		$playerSession = array( 'playerId' => "",
			'playerFname' => "",
			'playerLname' => "",
			'playerNumber' => "",
			'playerONumber' => "",
			'playerPosition' => "",
			'playerMug' => ""
			);
		$this->session->set_userdata($playerSession);
		//pass to Admin::present with empty player
		$this->present($player);
	}

	/* Edit existing player records. */
	function edit($player) {

		//find player with id passed from view
		$playerObject = $this->players->some('id', $player);

		//get parameters for edit fields
		foreach ($playerObject as $editedPlayer) {
			$id = $editedPlayer->id;
			$first = $editedPlayer->firstname;
			$last = $editedPlayer->lastname;
			$number = $editedPlayer->number;
            $onumber = $editedPlayer->number;
			$position = $editedPlayer->position;
			$mug = $editedPlayer->mug;
		}

		$playerSession = array( 
			'playerId' => $id,
			'playerFname' => $first,
			'playerLname' => $last,
			'playerNumber' => $number,
			'playerONumber' => $onumber,
			'playerPosition' => $position,
			'playerMug' => $mug
			);
		$this->session->set_userdata($playerSession);
		$this->data['id'] = $id;

		//make ID read-only (auto-incremented in db)
		$this->data['eid'] = makeTextField('ID#', 'id', 
			$this->session->playerId, "Unique, system-assigned");
		$this->data['efirstname'] = makeTextField('First Name', 
			'firstname', $this->session->playerFname);
		$this->data['elastname'] = makeTextField('Last Name', 
			'lastname', $this->session->playerLname);
		$this->data['enumber'] = makeTextField('Jersey Number', 
			'number', $this->session->playerNumber);
		$this->data['eposition'] = makeTextField('Player Position', 
			'position', $this->session->playerPosition);
        $this->data['onumber'] = makeTextField('Jersey Number', 
			'onumber', $this->session->playerONumber);

		$this->data['emug'] = makeTextField('Photo', 'mug', $mug);

		//submit button using formfields helper
		$this->data['esubmit'] = makeSubmitButton('Submit Changes', 'title', 
			'btn-success');

		$this->data['title'] = "Edit A Player";
		$this->data['pagebody'] = 'editSinglePlayerView';
                
               
        $message = '';
        if (count($this->errors) > 0) {
            foreach ($this->errors as $booboo)
              $message .= $booboo . '<br>';
        }
        $this->data['message'] = $message;
		$this->render();

	}

	function delete($player) {
		//find player with id passed from view
		$playerObject = $this->players->some('id', $player);

		$array_playerSession = array( 'playerId','playerFname','playerLname',
		'playerNumber','playerONumber','playerPosition','playerMug' );
				
		$toDelete = array();
		//get parameters for deletion confirmation page
		foreach ($playerObject as $deletedPlayer) {
			$result = array (
				'fname' => $deletedPlayer->firstname,
				'lname' => $deletedPlayer->lastname
			);
			$toDelete[] = $result;
		}
		$this->data['players'] = $toDelete;
		$this->data['title'] = "Deletion Confirmation";
		$this->data['pagebody'] = 'deletePlayerView';
		$this->render();
		//actual deletion after rendering page (otherwise no data)
		$this->players->delete($player);
		$this->session->unset_userdata($array_playerSession);

	}

	/*
	* Creates a form to add players to the team roster. 
	*/
	function present($player) {
        $message = '';
        if (count($this->errors) > 0) {
            foreach ($this->errors as $booboo)
              $message .= $booboo . '<br>';
        }

        $this->data['message'] = $message;
		//make ID read-only (auto-incremented in db)
		$this->data['fid'] = makeTextField('ID#', 'id', 
			$player->id, "Unique, system-assigned", 10, 10, true);
		$this->data['ffirstname'] = makeTextField('First Name', 
			'firstname', $this->session->playerFname);
		$this->data['flastname'] = makeTextField('Last Name', 
			'lastname', $this->session->playerLname);
		$this->data['fnumber'] = makeTextField('Jersey Number', 
			'number', $this->session->playerNumber);
		$this->data['fposition'] = makeTextField('Player Position', 
			'position', $player->position);
        $this->data['emug'] = makeTextField('mug',
                'mug', $this->session->playerMug);
		//submit button using formfields helper
		$this->data['fsubmit'] = makeSubmitButton('Process Player', 'success',
			'btn-success');

		$this->data['pagebody'] = 'addPlayerView';
		$this->data['title'] = "Add New Player";
		$this->render();
	}
     
     //unset session data, send user back to roster
     function cancelForm() {
     	$array_playerSession = array( 'playerId','playerFname','playerLname',
		'playerNumber','playerONumber','playerPosition','playerMug' );
		$this->session->unset_userdata($array_playerSession);
		redirect('/roster');
     }

	function confirm() {
		$record = $this->players->create();

		//set session data
		$playerSession = array( 
		'playerId' => $this->input->post('id'),
		'playerFname' => $this->input->post('firstname'),
		'playerLname' => $this->input->post('lastname'),
		'playerNumber' => $this->input->post('number'),
		'playerONumber' => $this->input->post('onumber'),
		'playerPosition' => $this->input->post('position'),
		'playerMug' => $this->input->post('mug')
		);
		$this->session->set_userdata($playerSession);

		//get the submitted fields loading form session data
		$record->id = $this->session->playerId;
		$record->firstname = $this->session->playerFname;
		$record->lastname = $this->session->playerLname;
		$record->position = $this->session->playerPosition;
		$record->number = $this->session->playerNumber;
        $onumber = $this->session->playerONumber;
		$record->mug = $this->session->playerMug;

        $this->load->library("../core/security");
        
        $record->firstname = $this->security->xss_clean($record->firstname);
        $record->lastname = $this->security->xss_clean($record->lastname);
        $record->position = $this->security->xss_clean($record->position);
        $record->number = $this->security->xss_clean($record->number);
        
        $this->load->library('form_validation');

        $this->form_validation->set_rules('firstname', 'firstname', 'trim|required');
        $this->form_validation->set_rules('lastname', 'lastname', 'trim|required');
       
        if (strcmp($record->number, $onumber) == 0) {
            $this->form_validation->set_rules('number', 'number', 'trim|required');
        } else {
            $this->form_validation->set_rules('number', 'number', 'trim|required|is_unique[players.number]');
        }
        
        $this->form_validation->set_rules('position', 'position', 'trim|required');

        $match = false;
        
        $pos = array("QB", "CB", "LB", "C", "G", "T", "RB", "WR", "TE",
            "DT", "DE", "MLB", "OLB", "S", "K", "H", "LS", "P", "KOS",
            "PR", "KR");
		foreach ($pos as $playPos) {
            if (strcmp($record->position, $playPos) == 0)
                $match = true;
        }

		//$idCheck = $record->id;
        $config['upload_path'] = './data/mugs/';
		$config['allowed_types'] = '*';
		$config['max_size']	= '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
                
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        
        $array_playerSession = array( 'playerId','playerFname','playerLname',
		'playerNumber','playerONumber','playerPosition','playerMug' );
		

        if (!$this->upload->do_upload()) { 
            // Our upload failed, but before we throw an error, learn why
            if ("You did not select a file to upload." != $this->upload->display_errors('','')) {
                // in here we know they DID provide a file
                // but it failed upload, display error
                $this->errors[] = $this->upload->display_errors();
                $this->data['pagebody'] = 'editSinglePlayerView';
                //$this->edit($record->id);
                if(empty($record->id)) {
                    $this->present($record);
                } else {
                    $this->edit($record->id);
                }
            }
            else {
                // here we failed b/c they did not provide a file to upload
                // fail silently, or message user, up to you
            }
        }
        else {
            // in here is where things went according to plan. 
            //file is uploaded, people are happy
            $data = array('upload_data' => $this->upload->data());
            $record->mug = $this->upload->file_name;
        }

        
        if ($this->form_validation->run() == FALSE)
		{
            $this->errors[] = validation_errors();
            $this->data['pagebody'] = 'editSinglePlayerView';
            if(empty($record->id)) {
			$this->present($record);
            } else {
                $this->edit($record->id);
            }
		}
            else if ($match == false)
		{
            $this->errors[] = "Position is invalid";
            $this->data['pagebody'] = 'editSinglePlayerView';
            if(empty($record->id)) {
				$this->present($record);
            } else {
				$this->players->update($record);
				redirect('/roster');
				$this->session->unset_userdata($array_playerSession);
            }
		}
		else
		{
            if(empty($record->id)) {
				$this->players->add($record);
				$this->session->unset_userdata($array_playerSession);
				redirect('/roster');
            } else {
				$this->players->update($record);
				$this->session->unset_userdata($array_playerSession);
				redirect('/roster');
            }
		}
	}

}
