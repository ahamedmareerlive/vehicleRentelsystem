<?php
   /*
   Template Name: Remove User Page
   */
   include_once 'css.php';
   include_once 'util/core.php';
   include_once 'Database/UnitOfWork.php';
   $uow = Uow::context();
   $uow->User->Remove($_GET['id']);
   pageRedirect("profile");
?>


