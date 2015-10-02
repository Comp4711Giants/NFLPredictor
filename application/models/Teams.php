<?php

/**
 * Teams.php
 * Model for teams with hard-coded data to start.
 *
 * Version 1
 * @author James Ensom
 */
class Teams extends CI_Model {

    // http://www.nfl.com/standings
    var $data = array(
        array('id' => 'NE', 'name' => 'New England Patriots', 'conference' => 'AFC', 'region' => 'east', 'wins' => '3', 
        	'loses' => '0', 'ties' => '0'),
        array('id' => 'BUF', 'name' => 'Buffalo Bills', 'conference' => 'AFC', 'region' => 'east', 'wins' => '2', 
        	'loses' => '1', 'ties' => '0'),
        array('id' => 'DAL', 'name' => 'Dallas Cowboys', 'conference' => 'NFC', 'region' => 'east', 'wins' => '2', 
        	'loses' => '1', 'ties' => '0'),
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
