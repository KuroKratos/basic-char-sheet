<?php
  // NEEDED FOR PHP DEBUG
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html style="margin:0; padding:0;">
  <head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BaSIC - Feuille de personnage</title>

    <!-- LOADING BOOTSTRAP CSS -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

    <!-- LOADING FONT AWESOME CSS -->
    <link rel="stylesheet" href="assets/font_awesome/css/font-awesome.min.css">

    <!-- LOADING CUSTOM CSS -->
    <link rel="stylesheet" href="assets/char_sheet.css">

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

    <!-- CUSTOMIZIND SCROLLBAR FOR BROWSERS WHICH SUPPORTS IT -->
    <style type="text/css">

      html, body {
        height: 100%;
      }

      body {
        background: url('assets/images/bg.jpg') no-repeat center center fixed;
        background-size: cover;
        min-height: 100%;
      }
      
      .jumbotron {
        background-color: rgba(255,255,255,0.8);
      }

      /*=============================================================*/
      /* CUSTOM SCROLLBRAR FOR COMPATBILE BROWSERS                   */
      /*=============================================================*/

      ::-webkit-scrollbar {
        width: 5px;
        height: 5px;
      }
      ::-webkit-scrollbar-button {
        width: 0px;
        height: 0px;
      }
      ::-webkit-scrollbar-thumb {
        background: darkgrey;
        border: 0px none #ffffff;
        border-radius: 4px;
      }
      ::-webkit-scrollbar-thumb:hover {
        background: gray;
      }
      ::-webkit-scrollbar-thumb:active {
        background: darkgray;
      }
      ::-webkit-scrollbar-track {
        background: none;
        border: 0px none #ffffff;
        border-radius: 4px;
      }
      ::-webkit-scrollbar-corner {
        background: transparent;
      }

      /*=============================================================*/
      /* TABLE FIXED HEADER                                          */
      /*=============================================================*/
      .table-fixed {
        width: 100%;
        background-color: #fff;
      }

      .table-fixed tbody {
        height: 200px;
        overflow-y: auto;
        width: 100%;
      }

      .table-fixed thead, .table-fixed tbody, .table-fixed tr, .table-fixed td, .table-fixed th {
        display: block;
      }

      .table-fixed tbody td {
        float: left;
      }
      
      .table-fixed thead tr th {
        float: left;
      }
    </style>

    <!-- LOADING LIBRARIES JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>

  </head>

  <body style="height: 100%; margin:0; padding:0;">

    <div class="container-fluid">

          <?php require_once 'scripts/char_sheet.php'; ?>

    </div><!-- CONTAINER -->

  </body>

</html>
