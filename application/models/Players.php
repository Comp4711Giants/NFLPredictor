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
}
