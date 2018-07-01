<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Il nostro menu</title>
        <link rel="icon" href="immagini/Logo.png" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Oleo Script Swash Caps'>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

        <style type="text/css">
            body {
                background: #f6ac03;
            }

            input[type=number],select {
                width: 100px;
                padding: 8px 20px;
                margin: 15px 15px 15px;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }
            h2,h3 {
                font-family: 'Oleo Script Swash Caps';
                text-align: center;}

            /* Profile container */
            .profile {
                margin: 20px 0;
            }

            /* Profile sidebar */
            .profile-sidebar {
                padding: 20px 0 10px 0;
                background: #fff;
                border-radius: 18px;
                margin-bottom:20px;
            }

            .profile-userpic img {
                float: none;
                margin: 0 auto;
                width: 50%;
                height: 50%;
                -webkit-border-radius: 50% !important;
                -moz-border-radius: 50% !important;
                border-radius: 50% !important;
            }

            .profile-usertitle {
                text-align: center;
                margin-top: 20px;
            }

            .profile-usertitle-name {
                color: #5a7391;
                font-size: 16px;
                font-weight: 600;
                margin-bottom: 7px;
            }

            .profile-usertitle-job {
                text-transform: uppercase;
                color: #5b9bd1;
                font-size: 12px;
                font-weight: 600;
                margin-bottom: 15px;
            }

            .profile-userbuttons {
                text-align: center;
                margin-top: 10px;
            }

            .profile-userbuttons .btn {
                text-transform: uppercase;
                font-size: 11px;
                font-weight: 600;
                padding: 6px 15px;
                margin-right: 5px;
            }

            .profile-userbuttons .btn:last-child {
                margin-right: 0px;
            }

            .profile-usermenu {
                margin-top: 30px;
            }

            .profile-usermenu ul li {
                border-bottom: 1px solid #f0f4f7;
            }

            .profile-usermenu ul li:last-child {
                border-bottom: none;
            }

            .profile-usermenu ul li a {
                color: #93a3b5;
                font-size: 14px;
                font-weight: 400;
            }

            .profile-usermenu ul li a i {
                margin-right: 8px;
                font-size: 14px;
            }

            .profile-usermenu ul li a:hover {
                background-color: #fafcfd;
                color: #5b9bd1;
            }

            .profile-usermenu ul li.active {
                border-bottom: none;
            }

            .profile-usermenu ul li.active a {
                color: #5b9bd1;
                background-color: #f6f9fb;
                border-left: 2px solid #5b9bd1;
                margin-left: -2px;
            }

            /* Profile Content */
            .profile-content {
                padding: 20px;
                background: #fff;
                min-height: 460px;
                border-radius: 18px;
            }

            .card{
                border-radius: 18px;
                background-color: white;
                padding:20px;
                    border: 5px solid #f6ac03;
            }

            .button {
                background-color: #f6ac03;
                border-radius: 10px;
                color: white;
                padding: 13px 20px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 15px;
                margin: 4px 2px;
                cursor: pointer;
            }

        </style>

    </head>
    <body>
        <?php
        session_start();
        ?>
        <FORM METHOD='post' ACTION="<?php $_SERVER['PHP_SELF'] ?>">
            <div class="container">
                <div class="row profile">
                    <div class="col-md-3">
                        <div class="profile-sidebar">
                            <!-- SIDEBAR USERPIC -->
                            <div class="profile-userpic">
                                <img src="immagini/user.png" class="img-responsive" style="width:25%;">
                            </div>
                            <!-- END SIDEBAR USERPIC -->
                            <!-- SIDEBAR USER TITLE -->
                            <div class="profile-usertitle">
                                <div class="profile-usertitle-name">
                                    <? echo $_SESSION['CodiceCli']; ?>
                                </div>
                            </div>
                            <!-- END SIDEBAR USER TITLE -->
                            <!-- SIDEBAR MENU -->
                            <div class="profile-usermenu">
                                <ul class="nav">
                                <li class="active">
                                        <a href="http://ordinismart.altervista.org/IndexClienti.php">
                                            <i class="glyphicon glyphicon-list-alt"></i>
                                            Ordina </a>
                                    </li>
                                    <li class="active">
                                        <a href="http://ordinismart.altervista.org/myOrdini.php">
                                            <i class="glyphicon glyphicon-list-alt"></i>
                                            Ordinazioni </a>
                                    </li>
                                    <li class="active">
                                        <a href="https://goo.gl/forms/W7ryz5JrGvNLqH1z1">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                            Sondaggio </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- END MENU -->
                        </div>
                    </div>
                    <div class="col-md-9 ">
                        <div class="profile-content">
                            <h3 style="font-size:30px; color:#f6ac03;"> I nostri prodotti </h3>
                            <p style='text-align:center;'>Tutti i prezzi sono indicati per una singola porzione</p>
                            <div class="container">
                            <div class="row">
                            <div class='col-sm-2'>
                            </div>
                                <div class='col-sm-4'>
                                <div class='card'>
                                <div class='card-block'>
                                <p class='card-text p-y-1'style='text-align:center;'><strong>Antipasti</strong></p>
                                	<p style='text-align:left;'> Quiche di pasta sfoglia ripena con verdure<span style='float:right;'>3,00€</span></p>
                                	<p style='text-align:left;'> Insalata di seppie con contorno di arance e finocchio<span style='float:right;'>3,50€</span></p>
                                    <p style='text-align:left;'> Quinoa e seppioline<span style='float:right;'>3,50€</span></p>
                                    <p style='text-align:left;'> Fritto misto<span style='float:right;'>4,00€</span></p>
                                <p class='card-text p-y-1'style='text-align:center;'><strong>Primi</strong></p>
                                    <p style='text-align:left;'> Lasagna semplice bianca/rossa <span style='float:right;'>3,00€</span></p>
                                    <p style='text-align:left;'> Cannelloni ricotta e spinaci/carne <span style='float:right;'>3,00€</span></p>
                                	<p style='text-align:left;'> Lasagna tartufata <span style='float:right;'>3,50€</span></p>
                                    <p style='text-align:left;'> Lasagna ai gamberi <span style='float:right;'>4,00€</span></p>
                                <p class='card-text p-y-1'style='text-align:center;'><strong>Secondi</strong></p> 
                                    <p style='text-align:left;'> Rollè al forno <span style='float:right;'>3,50€</span></p>
                                    <p style='text-align:left;'> Arista di maiale <span style='float:right;'>4,00€</span></p>
                                    <p style='text-align:left;'> Pollo arrosto <span style='float:right;'>4,00€</span></p>
                                    <p style='text-align:left;'> Filetto di branzino <span style='float:right;'>4,50€</span></p>
                                	<p style='text-align:left;'> Coda di rospo <span style='float:right;'>4,50€</span></p>
                                    <p style='text-align:left;'> Spiedini di pesce <span style='float:right;'>4,50€</span></p>
                                <p class='card-text p-y-1'style='text-align:center;'><strong>Contrni</strong></p> 
                                	<p style='text-align:left;'> Patate al forno <span style='float:right;'>3,50€</span></p>
                                    <p style='text-align:left;'> Patatine fritte <span style='float:right;'>3,50€</span></p>
                                    <p style='text-align:left;'> Verdure grigliate <span style='float:right;'>4,00€</span></p>
                                </div>
                                </div>
                                </div>
                                </div>
                            <div class='col-sm-2'>
                            </div>
                                </div>
                            </div>
                        </div>
                    </div>

    </body>
</html>
