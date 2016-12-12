<?php

// Bring in all of the utility funcitons.
$utility = 'functions/utility';
include_once "$utility/helper.php";
include_once "$utility/logo.php";
include_once "$utility/nav.php";


// Bring in all of the registration funcitons.
$register = 'functions/register';
include_once "$register/scripts.php";
include_once "$register/meta.php";
include_once "$register/menu-locations.php";
include_once "$register/widget-areas.php";
include_once "$register/customizer.php";

// Bring in global structure file.
include_once 'functions/structure/global.php';