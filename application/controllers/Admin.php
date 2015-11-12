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

		//unset($_SESSION['editOrAdd']);

		if (isset($_SESSION['editOrAdd'])) {

			$modeSelected = $this->session->editOrAdd;

			switch ($modeSelected) {
				case 'edit':
					$this->data['pagebody'] = 'editPlayerView';
					$this->data['title'] = 'Edit Existing Players';
					$this->data['players'] = $this->players->all();
					break;
				case 'add':
					redirect('admin/add');
					$this->data['title'] = 'Add New Player';
					break;
				default:
					$this->data['title'] = 'Error unable to process request';
					break;
			}
		} else {

			$this->data['pagebody'] = 'editPlayerView';
			$this->data['title'] = 'Edit Existing Players';
			$this->data['players'] = $this->players->all();
			$addMode = array( 'editOrAdd' => 'edit');
			$this->session->set_userdata($addMode);


		}

		// $this->data['pagebody'] = 'editPlayerView';

		// $this->data['players'] = $this->players->all();
		
		$this->render();
	}

	function add() {

		$addMode = array( 'editOrAdd' => 'add');
		$this->session->set_userdata($addMode);

		$player = $this->players->create();
		$this->present($player);
	}

	function edit() {

		$addMode = array( 'editOrAdd' => 'edit');
		$this->session->set_userdata($addMode);

		redirect('/admin');
	}

	function present($player) {
		$message = '';
		//TODO pass validation errors
		$this->data['message'] = $message;


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

		
		$this->data['fsubmit'] = makeSubmitButton('Process Player', 
			'btn-success');

		$this->data['pagebody'] = 'addPlayerView';
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
