<?php

/**
 * Player.php
 * Model for players with hard-coded data to start.
 *
 * Version 1
 * @author Jessica Tekenos
 */
class Players extends MY_Model {
    // Constructor
    public function __construct() {
        parent::__construct("players", "id");
    }

    //Get a range of players from the database determined by $per_page and $page_mumber
    //$per_page - determines the size of the range of players
    //$page_number - determines where the range of players starts
    public function fetch_page($per_page, $page_number) {
    	$this->db->order_by($this->_keyField, 'asc');
    	$first = 1 + ($per_page * ($page_number - 1));
    	$last = $first + $per_page - 1;
        $query = $this->db->query("SELECT * FROM players WHERE id BETWEEN " . $first . " AND " . $last . ";", $this->_tableName);
        return $query->result();
    }
}