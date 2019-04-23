<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact V4</title>
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
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/1util.css">
	<link rel="stylesheet" type="text/css" href="css/1main.css">
<!--===============================================================================================-->
</head>
<body>
        
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




//validare inceput

  
//SELECT Id FROM Rezervare WHERE Nume="Costin" AND Prenume="Calin"
   
    $sql = "SELECT Id FROM `stepit_claudiu`.`Rezervare` WHERE Nume='$nume' AND Prenume='$prenume' " ;

      $result = $conn->query($sql);
      if($result){
          
         
      }
      else{
          echo('<script type="text/javascript"> invalidDB() </script>');
      }
    
    //validare sfarsit

?>
      <div>
             <div class="container-contact100">
		<div class="wrap-contact100">
                    <form action='checkInAfisare.php' method='GET'>
                                                

				<div class="wrap-input100 validate-input" data-validate="Last name is required">
					<span class="label-input100">Your Last Name</span>
					<input class="input100" type="text" name="nume" placeholder="Enter your last name">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="First name is required">
					<span class="label-input100">Your First Name</span>
					<input class="input100" type="text" name="prenume" placeholder="Enter your first name">
					<span class="focus-input100"></span>
                                        <input type="hidden" name="id" value="<?php echo $id; ?>" />

				</div>

			

				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button class="contact100-form-btn">
							<span>
								Submit
								<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
							</span>
						</button>
					</div>
				</div>                            
                </div>               
                                                
          </form>  
                                            
                                            
     </div>
    
    
 

               
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
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
    
</body>
</html>

