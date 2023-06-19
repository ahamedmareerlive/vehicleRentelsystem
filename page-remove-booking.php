<?php
   /*
   Template Name: Remove Booking Page
   */
   include_once 'css.php';
   include_once 'util/core.php';
   include_once 'Database/UnitOfWork.php';
   $uow = Uow::context();
   $uow->Booking->Remove($_GET['id']);
   pageRedirect("profile");
?>
