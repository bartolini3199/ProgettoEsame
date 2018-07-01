<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>I tuoi ordini</title>
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
        $u = $_SESSION['nominativo'];
        if ($_POST) {
            $host = "https://it.altervista.org/";
            $user = "ordinismart";
            $db = "my_ordinismart";
            $connessione = new PDO("mysql:host=$host;dbname=$db", $user, "");
            $connessione->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $o = "0";
            if (isset($_POST["aggiungi"])) {
                $sql = "INSERT INTO ORD_ORDINI (Ordinato,Qta,Descr,CodiceCli) VALUES (:ordinato,:qta,:descr,:codcli)";
                $res = $connessione->prepare($sql);
                $res->bindParam(":ordinato", $o);
                $res->bindParam(":descr", $_POST['select']);
                $res->bindParam(":qta", $_POST['qta']);
                $res->bindParam(":codcli", $_SESSION['codcli']);
                $res->execute();
            } else {
                $sql = "UPDATE ORD_ORDINI SET Ordinato='1' WHERE CodiceCli =" . $_SESSION['codcli'];
                $res = $connessione->prepare($sql);
                $res->execute();
                header("Location: http://ordinismart.altervista.org/t.php");
                die();
            }
        }
        ?>
        <FORM METHOD='post' ACTION="<?php $_SERVER['PHP_SELF'] ?>">
            <h2 style="font-size:50px;color:white;">Benvenuto!</h2>
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
                                    <? echo" $u "; ?>
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
                                        <a href="http://ordinismart.altervista.org/menu.php">
                                            <i class="glyphicon glyphicon-th-list"></i>
                                            Menu </a>
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
                            <h3 style="font-size:30px; color:#f6ac03;"> I tuoi ordini </h3>
                            <div class="container">
                            <div class="row">
                                <?
                                $con=mysqli_connect("www.altervista.org","ordinismart","","my_ordinismart");
                                // Check connection
                                if (mysqli_connect_errno())
                                {
                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                }

                                $sql="SELECT `Descr`,`Qta` FROM `ORD_ORDINI` WHERE `Ordinato`='1' AND `CodiceCli` =" . $_SESSION['codcli'] ." ORDER BY CodiceOrd DESC";

                                if ($result=mysqli_query($con,$sql))
                                {
                                // Fetch one and one row
                                echo"
                                <div class='col-sm-4'>
                                <div class='card'>
                                <div class='card-block'>
                                <p class='card-text p-y-1'style='text-align:left;'>
                                <strong>Prodotto</strong>
                                <span style='float:right;'><strong>Qta</strong></span>
                                </p>";
                                while ($row=mysqli_fetch_row($result))
                                {
                                echo"<p style='text-align:left;'>" . $row[0] . " <span style='float:right;'>" . $row[1] . "</span></p>";
                                }
                                echo"
                                </div>
                                </div>
                                </div>
                                </div>
                                ";
                                }

                                mysqli_close($con);
                                ?>
                            </div>
                        </div>
                    </div>

    </body>
</html>
