<?php

class TkStagingEnvironmentToolkit {

    private $redirect;
    private $robots;
    private $testerRole;

    public function __construct() {
        $this->redirect = new TkRedirect();
        $this->robots = new TkRobots();
        $this->testerRole = new TkTesterRole();
    }

    public function init() {
        $this->redirect->init();
        $this->robots->init();
        $this->testerRole->init();
    }
}
