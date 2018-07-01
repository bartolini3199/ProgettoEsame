<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Gestione</title>
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
</style>

    </head>
    <body>
        <?php
        session_start();  
        $u=$_SESSION['nominativo'];
        if($_POST){
        $host = "https://it.altervista.org/";
                $user = "ordinismart";
                $db = "my_ordinismart";
                $connessione = new PDO("mysql:host=$host;dbname=$db", $user, "");
                $connessione->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
                $o="0";
        		if (isset($_POST["aggiungi"])){
				 $sql="INSERT INTO ORD_ORDINI (Ordinato,Qta,Descr,CodiceCli) VALUES (:ordinato,:qta,:descr,:codcli)";
                            $res = $connessione->prepare($sql);
                            $res->bindParam(":ordinato", $o);
                            $res->bindParam(":descr", $_POST['select']);
                            $res->bindParam(":qta", $_POST['qta']);
                            $res->bindParam(":codcli", $_SESSION['codcli']);
                            $res->execute(); 
                            } else 
                            {
                 $sql="UPDATE ORD_ORDINI SET Ordinato='1' WHERE CodiceCli =" . $_SESSION['codcli'];
                            $res = $connessione->prepare($sql);
                            $res->execute();             
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
							<a href="#">
							<i class="glyphicon glyphicon-list-alt"></i>
							Ordinazioni </a>
						</li>
                        <li class="active">
							<a href="http://ordinismart.altervista.org/menu.html">
							<i class="glyphicon glyphicon-th-list"></i>
							Menu </a>
						</li>
                        <li class="active">
							<a href="https://goo.gl/forms/W7ryz5JrGvNLqH1z1">
							<i class="glyphicon glyphicon-pencil"></i>
							Sondaggio </a>
						</li>
                        <li class="active">
							<a href="http://ordinismart.altervista.org/index.html">
							<i class="glyphicon glyphicon-log-out"></i>
							Log out </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">
  <h3 style="font-size:30px; color:#f6ac03;"> Ordinazione </h3>
  
<select class="selectpicker" name="select" id="select">
  <optgroup label="Condiments">
    <option value="Mustard">Mustard</option>
    <option value="Ketchup">Ketchup</option>
    <option value="Relish">Relish</option>
  </optgroup>
  <optgroup label="Breads">
    <option value="Mustard">Mustard</option>
    <option value="Ketchup">Ketchup</option>
    <option value="Relish">Relish</option>
  </optgroup>
</select>

<ol name="display" id="display">
</ol>

<input type="submit" value="Aggiungi" id="aggiungi" name="aggiungi">
<input type="submit" value="Ordina" id="ordina" name="ordina">
            </div>
		</div>
	</div>
</div>
<script type="text/javascript">
(function() {
    
    function getSelectedOptions(sel, fn) {
        var opts = [], opt;
        
        for (var i=0, len=sel.options.length;  i<len; i++) {
            opt = sel.options[i];
            
            // check if selected
            if ( opt.selected ) {
                // add to array of option elements to return from this function
                opts.push(opt);
                
                // invoke optional callback function if provided
                if (fn) {
                    fn(opt);
                }
            }
        }
        
        // return array containing references to selected option elements
        return opts;
    }
    
    // anonymous function onchange for select list with id demoSel
    document.getElementById('select').onchange = function(e) {
        // get reference to display textarea
        var display = document.getElementById('display');
        display.innerHTML = ''; // reset
        
        // callback fn handles selected options
        getSelectedOptions(this, callback);
        
        // remove ', ' at end of string
        var str = display.innerHTML.slice(0, -2);
        display.innerHTML = str;
    };
    
    // example callback function (selected options passed one by one)
    function callback(opt) {
        
        // display in textarea for this example
        var display = document.getElementById('display');
         $("ol").append("<li>" + opt.value + "<input type='number' value='qta' min='1' id='qta' name='qta'></li>");
    }
    
  
    
}());
</script>

</body>
</html>
