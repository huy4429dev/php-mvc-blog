<?php


/**
 *  Get Controller and Action
 */

if (isset($_GET['adminController']) && isset($_GET['action'])) {

    $Controller = "admin/" . $_GET['adminController'];
    $Action     = $_GET['action'];
    
} else if (isset($_GET['pageController']) && isset($_GET['action'])) {

    $Controller = "page/" . $_GET['pageController'];
    $Action     = $_GET['action'];
} else {
    $Controller = "page/HomeController";
    $Action     = "index";
}



/**
 * Load all core 
 */

include('./autoload/autoload.php');

/**
 *  Create object Database ; 
 */

$DB = new Database();
