<?php

// Error Reporting

  ini_set('display_errors' , 'On');
  error_reporting(E_ALL);

  include 'include/connect.php';
  include 'include/func.php';

  $sessionUser = '';
  if (isset($_SESSION['user'])) {
    $sessionUser = $_SESSION['user'];

  }

    // Rotes

    $css  = 'layout/css/';          // css Directory
    $js   = 'layout/js/';           // js Directory


 // include the Important file


  include 'include/header.php';
