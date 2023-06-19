<?php
/*
Template Name: Logout Page
*/
include_once 'css.php';
include_once 'util/core.php';
startSession();
stopSession();
pageRedirect();

?>
