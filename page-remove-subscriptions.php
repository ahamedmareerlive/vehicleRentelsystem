<?php
   /*
   Template Name: Remove Subscriptions Page
   */
   include_once 'css.php';
   include_once 'util/core.php';
   include_once 'Database/UnitOfWork.php';
   $uow = Uow::context();
   $uow->Subscription->Remove($_GET['id']);
   pageRedirect("profile");
?>


