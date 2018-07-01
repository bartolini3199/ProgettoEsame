<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ordinazioni</title>
        <link rel="icon" href="immagini/Logo.png" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Oleo Script Swash Caps'>
        <style type="text/css">
            body{
                margin-top:50px;
                background-color: #f6ac03;
            }
            .card{
                border-radius: 18px;
                margin-top:30px;
                background-color: white;
                padding:20px;
            }
            h2 {
                font-family: 'Oleo Script Swash Caps';
                text-align: center;
                font-size:70px;
                color:white;}
            </style>

        </head>
        <body onload="setInterval(function () {
                    window.location.reload();
                }, 12000);">  
            <div class="container">
            <h2>Ordinazioni</h2>
            <div class="row">
                <?php
                $con = mysqli_connect("www.altervista.org", "ordinismart", "", "my_ordinismart");
// Check connection
                if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }

                $sql = "SELECT `CodiceCli`,`Descr`,`Qta` FROM `ORD_ORDINI` WHERE `Ordinato`='1' GROUP BY `CodiceCli`";

                if ($result = mysqli_query($con, $sql)) {
                    // Fetch one and one row
                    while ($row = mysqli_fetch_row($result)) {
                        $sql1 = "SELECT `CodiceCli`,`Descr`,`Qta` FROM `ORD_ORDINI` WHERE `CodiceCli`='" . $row[0] . "' AND `Ordinato`='1'";
                        if ($result1 = mysqli_query($con, $sql1)) {
                            echo"
  	<div class='col6 col-sm-4 '>
          <div class='card'>
            <div class='card-block'>
              <h4 class='card-title' style='text-align: center;'>Ordinazione n°" . $row[0] . "</h4>
              <p class='card-text p-y-1'style='text-align:left;'>
                <strong>Prodotto</strong>
  				<span style='float:right;'><strong>Qta</strong></span>
			  </p>";

                            while ($r = mysqli_fetch_row($result1)) {
                                echo"   <p class='card-text p-y-1'  style='text-align:left;'>" . $r[1] . "<span style='float:right;'>" . $r[2] . "";
                            }
                            echo"
            </div>
          </div>
        </div>
";
                            mysqli_free_result($result1);
                        }
                    }
                    // Free result set
                    mysqli_free_result($result);
                }

                mysqli_close($con);
                ?>
            </div>
            </div>
    </body>
</html>