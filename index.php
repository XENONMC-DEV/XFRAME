<?php

/** 
 * FILENAME: portal.php
 * DESCRIPTION: routes user to public index page
 * AUTHORS: XENONMC XFRAME
 * 
 * COPYRIGHT: XENONMC XFRAME 2017 - 2021. All Rights Reserved. All external dependencies belong to their respective owners, we do not claim to create them, All custom dependencies are owned by XENONMC XFRAME and should not be claimed as your own. Trying to do so will cause you to love privileges such as free support
 * 
*/

/** 
 * IMPORTANT ⚠
 * 
 * NOTE: do NOT edit this file, this file is meant for the webserver itself and controlling input, configs, etc... To make a project, navigate to the public folder of this framework
 * 
*/

namespace xframe\framework;

// setup ini configuration
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// get config
$config = json_decode(file_get_contents('config.json'), true);

// check php version
$php_min_version = "OC4wLjA=";
$php_min_version = base64_decode($php_min_version);

if($config['ignore-php-version'] !== true) {

    if (version_compare(phpversion(), $php_min_version, "<")) {

        die("<p style = 'font-family: sans-serif; font-size: 13px;'><strong>ERROR: The minimum version of PHP must be " . $php_min_version . " for this software to work.  Your PHP version is " . phpversion() . ".  Please upgrade your PHP version to " . $php_min_version . " or higher, or ask you host to upgrade your version.</strong></p>");

    }

}

/** 
 * framework class
 * 
 * @param bool, use testing class
 * 
*/

class xframe {

    /** 
     * router object
     * 
    */

    private $router;

    /** 
     * model object
     * 
    */

    private $model;

    /** 
     * controller object
     * 
    */

    private $controller;

    /** 
     * view object
     * 
    */

    private $view;

    /** 
     * application root
     * 
    */

    private $root;

    /** 
     * framework configuration
     * 
    */

    private $config;

    function __construct($use_testing) {

        // define configuration
        $this->config = json_decode(file_get_contents('config.json'), true);

        // create root directory
        $this->root = str_replace('\\', '/', __DIR__);

        // require composer
        require_once $this->root . '/vendor/autoload.php';

        // require utils
        require_once $this->root . '/src/utils.php';

        // start framework classes
        if($use_testing === true) {

            $this->testing();
            return null;

        }
        
        $this->main();
        return null;

    }

    /** 
     * main class
     * 
    */

    function main() {

        // get real index
        include $this->root . '/public/' . $this->config['app-index'];

    }

    /** 
     * testing class
     * 
    */

    function testing() {

        $db = new \xframe\Database\App();

        $db->connect(array(

            'host' => 'localhost',
            'username' => 'root',
            'password' => '',
            'database' => 'xframe',
            'port' => 3306,
            'charset' => 'utf8'

        ));

        // get real index
        include $this->root . '/public/' . $this->config['app-index'];

        $db->select()->execute();

    }

}

/** 
 * execute framework
 * 
*/

$xframe = new xframe($config['developer-mode']);