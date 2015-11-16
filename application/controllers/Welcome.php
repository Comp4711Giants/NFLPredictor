<?php

class Welcome extends Application {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->data['pagebody'] = 'homepage';
        $this->session->sess_destroy();
        $this->render();
    }

    function about() {
        $this->data['pagebody'] = 'about';
        $this->data['what'] = '<h2>The Team:<br>James, Jessica, Jonny, and Ryan</h2><br>
                                <h3>This site is for educational use only.</h3>
                                Section 29 of the Copyright Act of Canada creates the fair dealing exception to copyright for the purpose of education.
                                <br>
                                <br>
                                "s.29 Fair dealing for the purpose of research, private study, education, parody or satire does not infringe copyright."';
        $this->render();
    }

}