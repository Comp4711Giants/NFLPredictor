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

		unset($_SESSION['editMode']);

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

	function add() {
		//refresh session
		$addMode = array( 'editMode' => 'edit');
		$this->session->set_userdata($addMode);

		$player = $this->players->create();
		$this->present($player);
	}

	function edit($player) {

		//find player with id passed from view
		$playerObject = $this->players->some('id', $player);

	}

	function delete($player) {
		//find player with id passed from view
		$playerObject = $this->players->some('id', $player);
		
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
	}

	/*
	* Creates a form to add players to the team roster. 
	*/
	function present($player) {
		$message = '';
		//TODO pass validation errors
		$this->data['message'] = $message;

		//make ID read-only (auto-incremented in db)
		$this->data['fid'] = makeTextField('ID#', 'id', 
			$player->id, "Unique, system-assigned", 10, 10, true);
		$this->data['ffirstname'] = makeTextField('First Name', 
			'firstname', $player->firstname);
		$this->data['flastname'] = makeTextField('Last Name', 
			'lastname', $player->lastname);
		$this->data['fnumber'] = makeTextField('Jersey Number', 
			'number', $player->firstname);
		$this->data['fposition'] = makeTextField('Player Position', 
			'position', $player->position);

		//submit button using formfields helper
		$this->data['fsubmit'] = makeSubmitButton('Process Player', 
			'btn-success');

		$this->data['pagebody'] = 'addPlayerView';
		$this->data['title'] = "Add New Player";
		$this->render();
	}

	function confirm() {
		$record = $this->players->create();

		//get the submitted fields
		$record->id = $this->input->post('id');
		$record->firstname = $this->input->post('firstname');
		$record->lastname = $this->input->post('lastname');
		$record->position = $this->input->post('position');
		$record->number = $this->input->post('number');

		//TODO: ADD VALIDATION

		if(empty($record->id)) {
			$this->players->add($record);
		} else {
			$this->quotes->update($record);
		}

		redirect('/admin/add');
	}

}
