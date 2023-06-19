<?php
   /*
   Template Name: Remove Vehicle Page
   */
   include_once 'css.php';
   include_once 'util/core.php';
   include_once 'Database/UnitOfWork.php';
   $uow = Uow::context();
   $uow->Vehicle->Remove($_GET['id']);
   pageRedirect("vehicle");
?>


