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
        array('id' => '1', 'who' => 'Prince Amukamara', 'mug' => 'amukamara.png', 'number' => '20', 
        	'position' => 'CB', 'where'=>'/roster/1'),
        array('id' => '2', 'who' => 'Robert Ayers', 'mug' => 'ayers.png', 'number' => '91', 
        	'position' => 'DE', 'where'=>'/roster/2'),
        array('id' => '3', 'who' => 'Jon Beason', 'mug' => 'beason.png', 'number' => '52', 
        	'position' => 'MLB', 'where'=>'/roster/3'),
        array('id' => '4', 'who' => 'Will Beatty', 'mug' => 'beatty.png', 'number' => '65', 
        	'position' => 'T', 'where'=>'/roster/4'),
        array('id' => '5', 'who' => 'Odell Beckham', 'mug' => 'beckham.png', 'number' => '13', 
        	'position' => 'WR', 'where'=>'/roster/5'),
        array('id' => '6', 'who' => 'Nat Berhe', 'mug' => 'berhe.png', 'number' => '29', 
        	'position' => 'SS', 'where'=>'/roster/6'),
        array('id' => '7', 'who' => 'Jasper Brinkley', 'mug' => 'brinkley.png', 'number' => '53', 
        	'position' => 'LB', 'where'=>'/roster/7'),
        array('id' => '8', 'who' => 'Jay Bromley', 'mug' => 'bromley.png', 'number' => '96', 
        	'position' => 'DT', 'where'=>'/roster/8'),
        array('id' => '9', 'who' => 'Josh Brown', 'mug' => 'brown.png', 'number' => '3', 
        	'position' => 'K', 'where'=>'/roster/9'),
        array('id' => '10', 'who' => 'Jonathan Casillas', 'mug' => 'casillas.png', 'number' => '54', 
        	'position' => 'LB', 'where'=>'/roster/10'),
        array('id' => '11', 'who' => 'Landon Collins', 'mug' => 'collins.png', 'number' => '21', 
        	'position' => 'FS', 'where'=>'/roster/11'),
        array('id' => '12', 'who' => 'Victor Cruz', 'mug' => 'cruz.png', 'number' => '80', 
        	'position' => 'WR', 'where'=>'/roster/12'),
        array('id' => '13', 'who' => 'Jerome Cunningham', 'mug' => 'cunningham.png', 'number' => '86', 
        	'position' => 'TE', 'where'=>'/roster/13'),
        array('id' => '14', 'who' => 'Justin Currie', 'mug' => 'currie.png', 'number' => '36', 
        	'position' => 'DB', 'where'=>'/roster/14'),
        array('id' => '15', 'who' => 'Craig Dahl', 'mug' => 'dahl.png', 'number' => '25', 
        	'position' => 'DB', 'where'=>'/roster/15'),
        array('id' => '16', 'who' => 'Orleans Darkwa', 'mug' => 'darkwa.png', 'number' => '26', 
        	'position' => 'RB', 'where'=>'/roster/16'),
        array('id' => '17', 'who' => 'Geremy Davis', 'mug' => 'davis.png', 'number' => '18', 
        	'position' => 'WR', 'where'=>'/roster/17'),
        array('id' => '18', 'who' => 'Zak DeOssie', 'mug' => 'deossie.png', 'number' => '51', 
        	'position' => 'LS', 'where'=>'/roster/18'),
        array('id' => '19', 'who' => 'Larry Donnell', 'mug' => 'donnell.png', 'number' => '84', 
        	'position' => 'TE', 'where'=>'/roster/19'),
        array('id' => '20', 'who' => 'Kenrick Ellis', 'mug' => 'ellis.png', 'number' => '71', 
        	'position' => 'DT', 'where'=>'/roster/20'),
        array('id' => '21', 'who' => 'Daniel Fells', 'mug' => 'fells.png', 'number' => '85', 
        	'position' => 'TE', 'where'=>'/roster/21'),
        array('id' => '22', 'who' => 'Ereck Flowers', 'mug' => 'flowers.png', 'number' => '76', 
        	'position' => 'OT', 'where'=>'/roster/22'),
        array('id' => '23', 'who' => 'Jonathan Hankins', 'mug' => 'hankins.png', 'number' => '95', 
        	'position' => 'DT', 'where'=>'/roster/23'),
        array('id' => '24', 'who' => 'Dwayne Harris', 'mug' => 'harris.png', 'number' => '17', 
        	'position' => 'WR', 'where'=>'/roster/24'),
        array('id' => '25', 'who' => 'Marcus Harris', 'mug' => 'harris_m.png', 'number' => '18', 
        	'position' => 'WR', 'where'=>'/roster/25'),
        array('id' => '26', 'who' => 'Bobby Hart', 'mug' => 'hart.png', 'number' => '68', 
        	'position' => 'OG', 'where'=>'/roster/26'),
        array('id' => '27', 'who' => 'Mark Herzlich', 'mug' => 'herzlich.png', 'number' => '94', 
        	'position' => 'OLG', 'where'=>'/roster/27'),
        array('id' => '28', 'who' => 'Jayron Hosley', 'mug' => 'hosley.png', 'number' => '28', 
        	'position' => 'CB', 'where'=>'/roster/28'),
        array('id' => '29', 'who' => 'Bennett Jackson', 'mug' => 'jackson.png', 'number' => '24', 
        	'position' => 'CB', 'where'=>'/roster/29'),
        array('id' => '30', 'who' => 'Cullen Jenkins', 'mug' => 'jenkins.png', 'number' => '99', 
        	'position' => 'DT', 'where'=>'/roster/30'),
        array('id' => '31', 'who' => 'Rashad Jennings', 'mug' => 'jennings.png', 'number' => '23', 
        	'position' => 'RB', 'where'=>'/roster/31'),
        array('id' => '32', 'who' => 'John Jerry', 'mug' => 'jerry.png', 'number' => '77', 
        	'position' => 'G', 'where'=>'/roster/32'),
        array('id' => '33', 'who' => 'Brett Jones', 'mug' => 'jones.png', 'number' => '69', 
        	'position' => 'C', 'where'=>'/roster/33'),
        array('id' => '34', 'who' => 'Devon Kennard', 'mug' => 'kennard.png', 'number' => '59',
            'position' => 'OLB', 'where'=>'/roster/34'),
        array('id' => '35', 'who' => 'Markus Kuhn', 'mug' => 'kuhn.png', 'number' => '78',
            'position' => 'DT', 'where'=>'/roster/35'),
        array('id' => '36', 'who' => 'Eli Manning', 'mug' => 'manning.png', 'number' => '10',
            'position' => 'QB', 'where'=>'/roster/36'),
        array('id' => '37', 'who' => 'Trumaine McBride', 'mug' => 'mcbride.png', 'number' => '38',
            'position' => 'CB', 'where'=>'/roster/37'),
        array('id' => '38', 'who' => 'Brandon Meriweather', 'mug' => 'meriweather.png', 'number' => '22',
            'position' => 'SS', 'where'=>'/roster/38'),
        array('id' => '39', 'who' => 'Damontre Moore', 'mug' => 'moore.png', 'number' => '98',
            'position' => 'DE', 'where'=>'/roster/39'),
        array('id' => '40', 'who' => 'Brandon Mosley', 'mug' => 'mosley.png', 'number' => '75',
            'position' => 'G', 'where'=>'/roster/40'),
        array('id' => '41', 'who' => 'Ryan Nassib', 'mug' => 'nassib.png', 'number' => '12',
            'position' => 'QB', 'where'=>'/roster/41'),
        array('id' => '42', 'who' => 'Marshall Newhouse', 'mug' => 'newhouse.png', 'number' => '73',
            'position' => 'OT', 'where'=>'/roster/42'),
        array('id' => '43', 'who' => 'Louis Nix', 'mug' => 'nix.png', 'number' => '92',
            'position' => 'DT', 'where'=>'/roster/43'),
        array('id' => '44', 'who' => 'Owamagbe Odighizuwa', 'mug' => 'odighizuwa.png', 'number' => '58',
            'position' => 'DE', 'where'=>'/roster/44'),
        array('id' => '45', 'who' => 'Justin Pugh', 'mug' => 'pugh.png', 'number' => '67',
            'position' => 'OG', 'where'=>'/roster/45'),
        array('id' => '46', 'who' => 'Rueben Randle', 'mug' => 'randle.png', 'number' => '82',
            'position' => 'WR', 'where'=>'/roster/46'),
        array('id' => '47', 'who' => 'Dallas Reynolds', 'mug' => 'reynolds.png', 'number' => '61',
            'position' => 'G', 'where'=>'/roster/47'),
        array('id' => '48', 'who' => 'Weston Richburg', 'mug' => 'richburg.png', 'number' => '70',
            'position' => 'C', 'where'=>'/roster/48'),
        array('id' => '49', 'who' => 'Dominique Rodgers-Cromartie', 'mug' => 'rodgers-cromartie.png', 'number' => '41',
            'position' => 'CB', 'where'=>'/roster/49'),
        array('id' => '50', 'who' => 'Geoff Schwartz', 'mug' => 'schwartz.png', 'number' => '74',
            'position' => 'G', 'where'=>'/roster/50'),
        array('id' => '51', 'who' => 'George Selvie', 'mug' => 'selvie.png', 'number' => '93',
            'position' => 'DE', 'where'=>'/roster/51'),
        array('id' => '52', 'who' => 'Cooper Taylor', 'mug' => 'taylor.png', 'number' => '30',
            'position' => 'DB', 'where'=>'/roster/52'),
        array('id' => '53', 'who' => 'J.T. Thomas', 'mug' => 'thomas.png', 'number' => '55',
            'position' => 'OLB', 'where'=>'/roster/53'),
        array('id' => '54', 'who' => 'Mykkele Thompson', 'mug' => 'thompson.png', 'number' => '33',
            'position' => 'DB', 'where'=>'/roster/54'),
        array('id' => '55', 'who' => 'Uani\' Unga', 'mug' => 'unga.png', 'number' => '47',
            'position' => 'MLB', 'where'=>'/roster/55'),
        array('id' => '56', 'who' => 'Shane Vereen', 'mug' => 'vereen.png', 'number' => '34',
            'position' => 'RB', 'where'=>'/roster/56'),
        array('id' => '57', 'who' => 'Trevin Wade', 'mug' => 'wade.png', 'number' => '31',
            'position' => 'DB', 'where'=>'/roster/57'),
        array('id' => '58', 'who' => 'Nikita Whitlock', 'mug' => 'whitlock.png', 'number' => '49',
            'position' => 'RB', 'where'=>'/roster/58'),
        array('id' => '59', 'who' => 'Andre Williams', 'mug' => 'williams.png', 'number' => '44',
            'position' => 'RB', 'where'=>'/roster/59'),
        array('id' => '60', 'who' => 'Brad Wing', 'mug' => 'wing.png', 'number' => '9',
            'position' => 'P', 'where'=>'/roster/60'),
        array('id' => '61', 'who' => 'Kerry Wynn', 'mug' => 'wynn.png', 'number' => '72',
            'position' => 'DE', 'where'=>'/roster/61'),
    );

    // Constructor
    public function __construct() {
        parent::__construct();
    }

    // retrieve a single player
    public function get($which) {
        // iterate over the data until we find the one we want
        foreach ($this->data as $record)
            if ($record['id'] == $which)
                return $record;
        return null;
    }

}
