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
		//$this->load->helper('formfields');
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
					$this->data['pagebody'] = 'addPlayerView';
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

		redirect('/admin');
	}

	function edit() {

		$addMode = array( 'editOrAdd' => 'edit');
		$this->session->set_userdata($addMode);

		redirect('/admin');
	}
}
