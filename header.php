<?php
session_start();
include 'includes\dbh.inc.php';
$obj = new Dbh;
$pdo =$obj->connect();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HSM</title>
    <!--Bootstrap Css-->
    <link rel="stylesheet" href="css/bootstrap-4.0.0.css">
    <!--Main cssCss-->
    <link rel="stylesheet" href="css/main.css">
    <!--FONT AWESOME-->
    <script src="js/all.js"></script>
    <!--MATERIAL DESIGNICON-->


</head>

<body>
    <nav id="nav" class="navbar py-3 navbar-light bg-primary navbar-expand-md sticky-top ">
        <!--Logo -->
        <a href="#" class="navbar-brand text-uppercase font-italic "></a>
        <!--Toggler icon -->
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#mynav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!--nav Button Group-->
        <div class="collapse navbar-collapse" id="mynav">
            <ul class="navbar-nav w-100 d-flex">
                <li class="nav-item ">
                    <a href="index.php#nav" class=" nav-link link-text-size active">HOME</a>
                </li>
                <li class="nav-item">
                    <a href="index.php#rooms" class="nav-link link-text-size ">ROOMS</a>
                </li>

                <li class="nav-item">
                    <a href="#" class="  nav-link link-text-size"> ABOUT</a>
                </li>
                <li class="nav-item">
                    <a href="index.php#footer" class="nav-link link-text-size ">Contact Us</a>
                </li>

                <!--SIGNUP BUTTON BUTTON-->
                <li class="nav-item">
                    <a href="book.php" class=" nav-link link-text-size">
                        <button type="button" class="btn btn-sm  btn-success" data-toggle="modal"
                            data-target="">BOOK</button>
                    </a>
                </li><?php
              
            
               
                if (isset($_SESSION['std_email'])) {
                    echo '
                    <form action="includes/logout.inc.php" method="POST">
                            <!--LOGIN BUTTON-->
                        <li class="nav-item align-self-end">
                            <a href="#footer" class=" nav-link link-text-size">
                                <button type="submit" class="btn btn-sm btn-success" name="logout-submit" data-toggle="modal"
                                    data-target="#login">LOGOUT</button>
                            </a>
                        </li>
                    </form>
    
                    <!--STUDENT PROFILE-->
                    <li class="nav-item align-self-end">
                        <a href="student.php" class=" nav-link link-text-size">
                            <button type="button" class="btn btn-sm btn-success" data-toggle="modal"
                                data-target="#login">STUDENT PROFILE</button>
                        </a>
                    </li>';
                } elseif (isset($_SESSION['adm_email'])) {
                    echo '
                    <form action="includes/logout.inc.php" method="POST">
                            <!--LOGIN BUTTON-->
                        <li class="nav-item align-self-end">
                            <a href="#footer" class=" nav-link link-text-size">
                                <button type="submit" class="btn btn-sm btn-success" name="logout-submit" data-toggle="modal"
                                    data-target="#login">LOGOUT</button>
                            </a>
                        </li>
                    </form>
    
                    <!--STUDENT PROFILE-->
                    <li class="nav-item align-self-end">
                        <a href="admin.php" class=" nav-link link-text-size">
                            <button type="button" class="btn btn-sm btn-success" data-toggle="modal"
                                data-target="#login">ADMIN PROFILE</button>
                        </a>
                    </li>';
                } else {
                    echo '
                    <!--LOGIN BUTTON-->
                <li class="nav-item align-self-end">
                    <a href="#footer" class=" nav-link link-text-size">
                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal"
                            data-target="#login">LOGIN</button>
                    </a>
                </li>';
                }
                
                ?>


            </ul>
        </div>
    </nav>