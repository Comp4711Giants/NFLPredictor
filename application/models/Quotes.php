<?php

/**
 * This is a "CMS" model for quotes, but with bogus hard-coded data,
 * so that we don't have to worry about any database setup.
 * This would be considered a "mock database" model.
 *
 * @author jim
 */
class Quotes extends CI_Model {

    // The data comes from http://www.quotery.com/top-100-funny-quotes-of-all-time/?PageSpeed=noscript
    var $data = array(
        array('id' => '1', 'who' => 'Bob Monkhouse', 'mug' => 'bob-monkhouse-150x150.jpg', 'where'=>'/sleep',
            'what' => 'When I die, I want to go peacefully like my grandfather did–in his sleep. Not yelling and screaming like the passengers in his car.'),
        array('id' => '2', 'who' => 'Elayne Boosler', 'mug' => 'elayne-boosler-150x150.jpg', 'where'=>'/lock/em/up',
            'what' => 'I have six locks on my door all in a row. When I go out, I lock every other one. I figure no matter how long somebody stands there picking the locks, they are always locking three.'),
        array('id' => '3', 'who' => 'Mark Russell', 'mug' => 'mark-russell-150x150.jpg', 'where'=>'/show/3',
            'what' => 'The scientific theory I like best is that the rings of Saturn are composed entirely of lost airline luggage.'),
        array('id' => '4', 'who' => 'Anonymous', 'mug' => 'Anonymous-150x150.jpg', 'where'=>'/dunno',
            'what' => 'How do you get a sweet little 80-year-old lady to say the F word? Get another sweet little 80-year-old lady to yell “BINGO!”'),
        array('id' => '5', 'who' => 'Socrates', 'mug' => 'socrates-150x150.jpg', 'where'=>'/wise/bingo',
            'what' => 'By all means, marry. If you get a good wife, you’ll become happy; if you get a bad one, you’ll become a philosopher.'),
        array('id' => '6', 'who' => 'Isaac Asimov', 'mug' => 'isaac-asimov-150x150.jpg', 'where'=>'/comp4711/wisdom',
            'what' => 'Those people who think they know everything are a great annoyance to those of us who do.')
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
