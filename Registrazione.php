<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registrazione</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Registrazione</title>
<link rel="icon" href="immagini/Logo.png" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link href='https://fonts.googleapis.com/css?family=Oleo Script Swash Caps' rel='stylesheet'>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style type="text/css">
	body {
		color: #fff;
		background: #f6ac03;
	}
	.form-control {
		min-height: 41px;
		background: #f2f2f2;
		box-shadow: none;
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
        height: 350px;
		text-align: center;
        position: absolute;
    	top:0;
    	bottom: 0;
   		left: 0;
   	 	right: 0;
   		margin: auto;
	}
    .login-form2 {
    color: #7a7a7a;
		border-radius: 3px;
    	margin-bottom: 15px;
        background: #fff;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
		width: 450px;
        height: 250px;
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
   
/*popup*/
.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.7);
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 0;
}
.overlay:target {
  visibility: visible;
  opacity: 1;
}

.popup {
  margin: 70px auto;
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  width: 30%;
  position: relative;
  transition: all 5s ease-in-out;
}

.popup h2 {
  margin-top: 0;
  color: #333;
  font-family: Tahoma, Arial, sans-serif;
}
.popup .close {
  position: absolute;
  top: 20px;
  right: 30px;
  transition: all 200ms;
  font-size: 30px;
  font-weight: bold;
  text-decoration: none;
  color: #333;
}
.popup .close:hover {
  color: #06D85F;
}
.popup .content {
  max-height: 30%;
  overflow: auto;
}

@media screen and (max-width: 700px){
  .box{
    width: 70%;
  }
  .popup{
    width: 70%;
  }
}

</style>
    </head>
    <body>
        <?php 
        if ($_POST) {
            if (isset($_POST['nominat']) && isset($_POST['email']) && isset($_POST['pass'])) {
                $host = "https://it.altervista.org/";
                $user = "ordinismart";
                $db = "my_ordinismart";
                $password = "";
                try {
                    $connessione = new PDO("mysql:host=$host;dbname=$db", $user, $password);
                    $connessione->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $sql = "INSERT INTO ORD_CLIENTE (Nominativo,Pass,Email) VALUES (:nominat,:pass,:email)";
                            $res = $connessione->prepare($sql);
                            $res->bindParam(":nominat", $_POST['nominat']);
                            $res->bindParam(":pass", $_POST['pass']);
                            $res->bindParam(":email", $_POST['email']);
                            $res->execute();
                            echo"        
                           <div class='login-form2'>
    <form method='post' action=" . $_SERVER['PHP_SELF'] . ">
        <h1 class='text-center'>Complimenti,ti sei registrato!</h1><h2>
  Sarai reindirizzato alla pagina di login tra 5 secondi </h2>";
  header('refresh: 5; url=http://ordinismart.altervista.org/Login.php');
echo"</form></div>";

                } catch (PDOException $e) {
                    die("Connessione fallita: " . $e->getMessage());
                }
            }
        }
        else
        {
         echo"<div class='login-form'>
    <form method='post' action=" . $_SERVER['PHP_SELF'] . ">
        <h2 class='text-center'>Registrazione</h2>   
        <div class='form-group has-error'>
        	<input type='text' class='form-control' name='nominat' placeholder='Nominativo' required='required' pattern='^[A-Z][a-z]+\s[A-Z][a-z]+$'>
        </div>
		<div class='form-group has-error'>
        	<input type='email' class='form-control' name='email' placeholder='Email' required='required'>
        </div>
        <div class='form-group has-error'>
        	<input type='password' class='form-control' name='pass' placeholder='Password' required='required' >
        </div>
        <div class='form-group'>
            <button type='submit' class='btn btn-primary btn-lg btn-block'>Registrati</button>
        </div>
    </form>
    <p class='text-center small'> Ti sei già registrato? <a href='http://lucabartolini.altervista.org/Progetto_Esame/Login.php'>Effettula il login!</a></p>
</div>";
        }
            ?>
</body>
</html>
