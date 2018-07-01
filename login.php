<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link rel="icon" href="immagini/Logo.png" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Oleo Script Swash Caps'>
        <style type="text/css">
            body {
                color: #fff;
                background: #f6ac03;
            }
            .form-control {
                min-height: 41px;
                background: #f2f2f2;
                box-shadow: none !important;
                border: transparent;
            }
            .form-control:focus {
                background: #e2e2e2;
            }
            .form-control, .btn {        
                border-radius: 2px;
            }
            .login-form {
                width: 350px;
                height: 300px;
                text-align: center;
                position: absolute;
                top:0;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
            }
            .login-form h2 {
                margin: 10px 0 25px;
                font-family: 'Oleo Script swash caps';
                font-size:40px;
            }
            .login-form form {
                color: #7a7a7a;
                border-radius: 3px;
                margin-bottom: 15px;
                background: #fff;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                padding: 30px;
            }
            .login-form .btn {        
                font-size: 16px;
                font-weight: bold;
                background: #f6ac03;
                border: none;
                outline: none !important;
            }
            .login-form .btn:hover, .login-form .btn:focus {
                background: #FF8100;
            }
            .login-form a {
                color: #fff;
                text-decoration: underline;
            }
            .login-form a:hover {
                text-decoration: none;
            }
            .login-form form a {
                color: #7a7a7a;
                text-decoration: none;
            }
            .login-form form a:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <?php
        session_start();
        if ($_POST) {
            if (isset($_POST['email']) && isset($_POST['pass'])) {
                $host = "https://it.altervista.org/";
                $user = "ordinismart";
                $db = "my_ordinismart";
                $password = "";
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $connessione = new PDO("mysql:host=$host;dbname=$db", $user, $password);
                $connessione->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $query = $connessione->query("SELECT Nominativo,Email,Pass,Cod_Cli,Amm FROM ORD_CLIENTE");
                while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

                    if (($row['Email'] == $email) && ($row['Pass'] == $pass)) {
                        if ($row['Amm'] == '') {
                            $_SESSION['codcli'] = $row['Cod_Cli'];
                            $_SESSION['nominativo'] = $row['Nominativo'];
                            header("Location: http://ordinismart.altervista.org/IndexClienti.php");
                            die();
                        } else {
                            header("Location: http://ordinismart.altervista.org/Ordinazioni.php");
                            die();
                        }
                    }

                    if (($row['Email'] != $email) && ($row['Pass'] == $pass)) {
                        echo"<div class='alert alert-danger' style='margin:50px;margin-left:450px;margin-right:450px;text:center;text-align:center;'>
  					<strong>Attenzione!</strong> E-Mail errata.</div>";
                    }
                    
                    if (($row['Email'] == $email) && ($row['Pass'] != $pass)) {
                            echo"<div class='alert alert-danger' style='margin:50px;margin-left:450px;margin-right:450px;text:center;text-align:center;'>
  					<strong>Attenzione!</strong> Password errata.</div>";
                        }
                }
            }
            }
            ?>
            <div class="login-form">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <h2 class="text-center">Login</h2>   
                <div class="form-group has-error">
                    <input type="email" class="form-control" name="email" placeholder="Email" required="required">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="pass" placeholder="Password" required="required">
                </div>        
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                </div>
            </form>
            <p class="text-center small">Non hai un account? <a href="http://ordinismart.altervista.org/Registrazione.php">Registrati!</a></p>
        </div>
    </body>
</html>