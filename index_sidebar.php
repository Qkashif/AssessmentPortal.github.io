<?php 
include 'connection.php';
session_start();

if (empty($_SESSION["user_id"])) {
    header("location: 404.php");
}
 ?>

<!doctype html>
<html lang="en">
    <head>
        
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- font awesome  -->
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="assets/fonts/icomoon/style.css">
        <!-- custom css -->


          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  
        <!----===== Boxicons CSS ===== -->
        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" integrity="sha512-sJa5KWq3F99QOeijUOm9O+BgDgVtzrWBBagZtjlW7F3I47NO1OaNJvbut+9KOPmjNr4Wb3blU4vQiQdi+Zk6wg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <title>assessment portal</title>
        <link rel="icon" href="assets/images/logo.png">

        <link rel="stylesheet" href="assets/css/style.css">
        <!-- <link rel="stylesheet" href="assets/css/style1.sdcss"> -->


    </head>
    <body>
        
        <nav class="sidebar">
            <div class="header">
                <div class="header_style">
                    <div class="image-text">
                        
                        <div class="text logo-text">
                            <span class="name">LMS</span>
                            <span class="profession">ASSESSMENT PORTAL</span>
                        </div>
                    </div>
                    <div class="toggle"><i class='bx bx-menu'></i></div>
                </div>
                
                
            </div>
            <div class="menu-bar">
                <div class="menu">
                    <ul class="menu-links">
                        <li class="nav-link">
                            <a href="index.php">
                                <i class='bx bx-home-alt icon'></i>
                                <span class="text nav-text">Classes</span>
                            </a>
                        </li>
                        
                        <li class="nav-link">
                            <a href="progress.php">
                                <i class='bx bx-line-chart icon'></i>
                                <span class="text nav-text">Progress</span>
                            </a>
                        </li>
                        <!-- <li class="nav-link">
                            <a href="#">
                                <i class='bx bxs-grid icon'></i>
                                <span class="text nav-text">My Studied Courses</span>
                            </a>
                        </li> -->
                        <!-- <li class="nav-link">
                            <a href="#">
                                <i class='bx bxs-calendar-check icon'></i>
                                <span class="text nav-text">Course Selection</span>
                            </a>
                        </li> -->
                        
                        
                        <li class="nav-link">
                            <a href="contact_us.php">
                                <i class='bx bx-phone icon'></i>
                                <span class="text nav-text">Contact Us</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="bottom-content">
                    <li class="">
                        <a href="logout.php">
                            <i class='bx bx-log-out icon'></i>
                            <span class="text nav-text">Logout</span>
                        </a>
                    </li>
                    
                    
                </div>
            </div>
            
        </nav>