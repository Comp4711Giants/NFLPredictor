<?php

/**
 * Player.php
 * Model for players with hard-coded data to start.
 *
 * Version 1
 * @author Jessica Tekenos
 */
class Players extends CI_Model {

    // http://www.nfl.com/teams/newyorkgiants/roster?team=NYG
    var $data = array(
        array('id' => '1', 'who' => 'Prince Amukamara', 'mug' => 'amakumara.png', 'number' => '20', 
        	'position' => 'CB', 'where'=>'/roster'),
        array('id' => '2', 'who' => 'Robert Ayers', 'mug' => 'ayers.png', 'number' => '91', 
        	'position' => 'DE', 'where'=>'/roster'),
        array('id' => '3', 'who' => 'Jon Beason', 'mug' => 'beason.png', 'number' => '52', 
        	'position' => 'MLB', 'where'=>'/roster'),
        array('id' => '4', 'who' => 'Will Beatty', 'mug' => 'beatty.png', 'number' => '65', 
        	'position' => 'T', 'where'=>'/roster'),
        array('id' => '5', 'who' => 'Odell Beckham', 'mug' => 'beckham.png', 'number' => '13', 
        	'position' => 'WR', 'where'=>'/roster'),
        array('id' => '6', 'who' => 'Nat Berhe', 'mug' => 'berhe.png', 'number' => '29', 
        	'position' => 'SS', 'where'=>'/roster'),
        array('id' => '7', 'who' => 'Jasper Brinkley', 'mug' => 'brinkley.png', 'number' => '53', 
        	'position' => 'LB', 'where'=>'/roster'),
        array('id' => '8', 'who' => 'Jay Bromley', 'mug' => 'bromley.png', 'number' => '96', 
        	'position' => 'DT', 'where'=>'/roster'),
        array('id' => '9', 'who' => 'Josh Brown', 'mug' => 'brown.png', 'number' => '3', 
        	'position' => 'K', 'where'=>'/roster'),
        array('id' => '10', 'who' => 'Jonathan Casillas', 'mug' => 'casillas.png', 'number' => '54', 
        	'position' => 'LB', 'where'=>'/roster'),
        array('id' => '11', 'who' => 'Landon Collins', 'mug' => 'collins.png', 'number' => '21', 
        	'position' => 'FS', 'where'=>'/roster'),
        array('id' => '12', 'who' => 'Victor Cruz', 'mug' => 'cruz.png', 'number' => '80', 
        	'position' => 'WR', 'where'=>'/roster'),
        array('id' => '13', 'who' => 'Jerome Cunningham', 'mug' => 'cunningham.png', 'number' => '86', 
        	'position' => 'TE', 'where'=>'/roster'),
        array('id' => '14', 'who' => 'Justin Currie', 'mug' => 'currie.png', 'number' => '36', 
        	'position' => 'DB', 'where'=>'/roster'),
        array('id' => '15', 'who' => 'Craig Dahl', 'mug' => 'dahl.png', 'number' => '25', 
        	'position' => 'DB', 'where'=>'/roster'),
        array('id' => '16', 'who' => 'Orleans Darkwa', 'mug' => 'darkwa.png', 'number' => '26', 
        	'position' => 'RB', 'where'=>'/roster'),
        array('id' => '17', 'who' => 'Geremy Davis', 'mug' => 'davis.png', 'number' => '18', 
        	'position' => 'WR', 'where'=>'/roster'),
        array('id' => '18', 'who' => 'Zak DeOssie', 'mug' => 'deossie.png', 'number' => '51', 
        	'position' => 'LS', 'where'=>'/roster'),
        array('id' => '19', 'who' => 'Larry Donnell', 'mug' => 'donnell.png', 'number' => '84', 
        	'position' => 'TE', 'where'=>'/roster'),
        array('id' => '20', 'who' => 'Kenrick Ellis', 'mug' => 'ellis.png', 'number' => '71', 
        	'position' => 'DT', 'where'=>'/roster'),
        array('id' => '21', 'who' => 'Daniel Fells', 'mug' => 'fells.png', 'number' => '85', 
        	'position' => 'TE', 'where'=>'/roster'),
        array('id' => '22', 'who' => 'Ereck Flowers', 'mug' => 'flowers.png', 'number' => '76', 
        	'position' => 'OT', 'where'=>'/roster'),
        array('id' => '23', 'who' => 'Jonathan Hankins', 'mug' => 'hankins.png', 'number' => '95', 
        	'position' => 'DT', 'where'=>'/roster'),
        array('id' => '24', 'who' => 'Dwayne Harris', 'mug' => 'harris.png', 'number' => '17', 
        	'position' => 'WR', 'where'=>'/roster'),
        array('id' => '25', 'who' => 'Marcus Harris', 'mug' => 'harris_m.png', 'number' => '18', 
        	'position' => 'WR', 'where'=>'/roster'),
        array('id' => '26', 'who' => 'Bobby Hart', 'mug' => 'hart.png', 'number' => '68', 
        	'position' => 'OG', 'where'=>'/roster'),
        array('id' => '27', 'who' => 'Mark Herzlich', 'mug' => 'herzlich.png', 'number' => '94', 
        	'position' => 'OLG', 'where'=>'/roster'),
        array('id' => '28', 'who' => 'Jayron Hosley', 'mug' => 'hosley.png', 'number' => '28', 
        	'position' => 'CB', 'where'=>'/roster'),
        array('id' => '29', 'who' => 'Bennett Jackson', 'mug' => 'jackson.png', 'number' => '24', 
        	'position' => 'CB', 'where'=>'/roster'),
        array('id' => '30', 'who' => 'Cullen Jenkins', 'mug' => 'jenkins.png', 'number' => '99', 
        	'position' => 'DT', 'where'=>'/roster'),
        array('id' => '31', 'who' => 'Rashad Jennings', 'mug' => 'jennings.png', 'number' => '23', 
        	'position' => 'RB', 'where'=>'/roster'),
        array('id' => '32', 'who' => 'John Jerry', 'mug' => 'jerry.png', 'number' => '77', 
        	'position' => 'G', 'where'=>'/roster'),
        array('id' => '33', 'who' => 'Brett Jones', 'mug' => 'jones.png', 'number' => '69', 
        	'position' => 'C', 'where'=>'/roster'),
    );

    // Constructor
    public function __construct() {
        parent::__construct();
    }

    // retrieve a single quote
    public function get($which) {
        // iterate over the data until we find the one we want
        foreach ($this->data as $record)
            if ($record['id'] == $which)
                return $record;
        return null;
    }

    // retrieve all of the quotes
    public function all() {
        return $this->data;
    }

    // retrieve the first quote
    public function first() {
        return $this->data[0];
    }

    // retrieve the last quote
    public function last() {
        $index = count($this->data) - 1;
        return $this->data[$index];
    }

}
