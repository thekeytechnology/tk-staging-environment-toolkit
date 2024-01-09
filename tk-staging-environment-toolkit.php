<?php
/*
Plugin Name: TKT Staging Environment Toolkit
Plugin URI:  https://www.thekey.technology
Version: 2.1
Description: Handles redirections, role management, and robots.txt modifications in a staging environment.
Author:      Mohamed Audi, the key technology
Author URI:  https://www.thekey.technology
License:     proprietary
Text Domain: tkt
*/

// Include class files
require_once "utils.php";
require_once "classes/TkRedirect.php";
require_once "classes/TkRobots.php";
require_once "classes/TkTesterRole.php";


$tkRedirect = new TkRedirect();
$tkRedirect->init();

$tkRobots = new TkRobots();
$tkRobots->init();

$tkTesterRole = new TkTesterRole();
$tkTesterRole->init();


register_activation_hook(__FILE__, array($tkTesterRole, 'tkAddTesterRole'));
register_deactivation_hook(__FILE__, array($tkTesterRole, 'tkRemoveTesterRole'));
register_deactivation_hook(__FILE__, array($tkRobots, 'additionalDeactivationTask'));


require 'plugin-update-checker-4.11/plugin-update-checker.php';
$updateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://github.com/thekeytechnology/tk-staging-environment-toolkit.git',
    __FILE__,
    'tk-staging-environment-toolkit'
);
$updateChecker->setBranch('master');
