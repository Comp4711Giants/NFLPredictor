<?php

class Welcome extends Application {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->data['pagebody'] = 'homepage';    // this is the view we want shown
        $source = $this->teams->all();
        
        $teamsAFC = array();
        $teamsNFC = array();
        
        foreach ($source as $record) {
            if ($record['conference'] == "AFC") {
                $teamsAFC[] = array('id' => $record['id'], 'name' => $record['name'], 'conference' => $record['conference'], 'region' => $record['region'],
                'wins' => $record['wins'], 'loses' => $record['loses'], 'ties' => $record['ties']);
            }
            if ($record['conference'] == "NFC") {
                $teamsNFC[] = array('id' => $record['id'], 'name' => $record['name'], 'conference' => $record['conference'], 'region' => $record['region'],
                'wins' => $record['wins'], 'loses' => $record['loses'], 'ties' => $record['ties']);
            }
        }
        
        $this->data['teamsAFC'] = $teamsAFC;
        $this->data['teamsNFC'] = $teamsNFC;

        $this->render();
    }

    function about() {
        $this->data['pagebody'] = 'about';
        $this->data['what'] = '<h1>The Team:<br>James, Jessica, Jonny, and Ryan</h1><br>
                                <h3>This site is for educational use only.</h3>
                                Section 29 of the Copyright Act of Canada creates the fair dealing exception to copyright for the purpose of education.
                                <br>
                                <br>
                                "s.29 Fair dealing for the purpose of research, private study, education, parody or satire does not infringe copyright."';
        $this->render();
    }

}