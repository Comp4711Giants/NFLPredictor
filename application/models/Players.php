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
    public function fetch_page($per_page, $page_number, $sort = 'name') {
    	$this->db->order_by($sort, 'asc');
    	$first = $per_page * ($page_number - 1);
        $this->db->limit($per_page, $first);
        $query = $this->db->get("players");
        return $query->result();
    }
}