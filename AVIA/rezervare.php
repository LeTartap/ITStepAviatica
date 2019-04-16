
<!DOCTYPE html>
<html lang="en">
<head>
        <title>Table V04</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->        
        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/1util.css">
        <link rel="stylesheet" type="text/css" href="css/1main.css">
<!--===============================================================================================-->




<script>
function alertInvalid() {
  alert("Date invalide!");
}


function validDB(){
    alert("Rezervare efectuata cu succes!");
}
function invalidDB() {
  alert("Nu s-a putut face conexiunea cu baza de date!");
}
</script>
<!--===============================================================================================-->
</head>
<body>
    
    
   
    
    
         <div>
          <form action='rezervare.php' method='GET'>
                                                

				<div class="wrap-input100 validate-input" data-validate="Last name is required">
					<span class="label-input100">Your Last Name</span>
					<input class="input100" type="text" name="nume" placeholder="Enter your last name">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="First name is required">
					<span class="label-input100">Your First Name</span>
					<input class="input100" type="text" name="prenume" placeholder="Enter your first name">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="First name is required">
					<span class="label-input100">CNP</span>
					<input class="input100" type="text" name="cnp" placeholder="CNP">
					<span class="focus-input100"></span>
				</div>
                            <input type="hidden" name="IdCursa" value="<?php echo $_GET['IdCursa']; ?>">                            
                            <input type='submit' />                          
                            
                                                
                                                
          </form>  
                                            
                                            
     </div>


<?php
  $servername = "193.200.126.13";
  $username = "stepit2";
  $password = "s73pi7-2018";
  $dbname = "stepit_claudiu";

  # connect to the database
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

$id = $_GET['IdCursa'];
$nume=$_GET['nume'];
$prenume=$_GET['prenume'];
$cnp=$_GET['cnp'];


//validare inceput
if( isset($id) AND isset($nume) AND isset($prenume) AND isset($cnp)) {
  # execute a query and output its results
if(!(ctype_alpha($nume)&&$nume!="" && ctype_alpha($prenume) && $prenume!="" && ctype_digit($cnp)&& $cnp!=""))
{
    echo '<script type="text/javascript"> alertInvalid()</script>';    
}
else{    
    $sql = "INSERT INTO `stepit_claudiu`.`Rezervare` (`IdCursa`, `Nume`, `Prenume`, `Cnp`) 
            VALUES (".$_GET['IdCursa']." , '".$nume."', '".$prenume."', '".$cnp."');";

      $result = $conn->query($sql);
      if($result){
          echo('<script type="text/javascript"> validDB() </script>');
      }
      else{
          echo('<script type="text/javascript"> invalidDB() </script>');
      }
    }
    //validare sfarsit
}
?>

               
      <?php
//}  } else { ?>

</tr>
<?php
//  }
?>

                                   
                                


<?php
  $conn->close();
?>


<!--===============================================================================================-->        
        <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
        <script src="vendor/bootstrap/js/popper.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
        <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
        <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script>
                $('.js-pscroll').each(function(){
                        var ps = new PerfectScrollbar(this);

                        $(window).on('resize', function(){
                                ps.update();
                        })
                });
                        
                
        </script>
<!--===============================================================================================-->
        <script src="js/main.js"></script>

</body>
</html>