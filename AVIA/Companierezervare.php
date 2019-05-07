
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

function alertInfo(){
        console.log("console test");
}
</script>
<!--===============================================================================================-->
</head>
<body>
    
    
   
    
    
         <div>
             <div class="container-contact100">
		<div class="wrap-contact100">
                    <form action='CompanieList.php' method='GET'>
                                                

				<div class="wrap-input100 validate-input" data-validate="Product name is required">
					<span class="label-input100">Product name</span>
					<input class="input100" type="text" name="numeProdus" placeholder="Enter produc">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Provider name is required">
					<span class="label-input100">Provider Name</span>
					<input class="input100" type="text" name="numeFurnizor" placeholder="Enter provider">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Price is required">
					<span class="label-input100">Price</span>
					<input class="input100" type="number" name="pret" placeholder="Price">
					<span class="focus-input100"></span>
				</div>

                                <div class="wrap-input100 validate-input" data-validate="Amount is required">
					<span class="label-input100">Amount</span>
					<input class="input100" type="number" name="cantitate" placeholder="Amount">
					<span class="focus-input100"></span>
				</div>
                            <input type="hidden" name="IdCompanie" value="<?php echo $_GET['idCompanie']; ?>">                            

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
  $servername = "193.200.126.13";
  $username = "stepit2";
  $password = "s73pi7-2018";
  $dbname = "stepit_claudiu";

  # connect to the database
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }


$idCompanie = $_GET['IdCompanie'];
$numeProdus=$_GET['numeProdus'];
$numeFurnizor=$_GET['numeFurnizor'];
$pret=$_GET['pret'];
$cantitate=$_GET['cantitate'];

//echo('<script type="text/javascript"> alertInfo() </script>');

//validare inceput
if( isset($idCompanie) AND isset($numeProdus) AND isset($numeFurnizor) AND isset($pret) AND isset($cantitate)) {
  # execute a query and output its results
  
        echo('<script type="text/javascript"> alertInfo() </script>');

 if(!(ctype_alpha($numeProdus) && $numeProdus != "" && ctype_alpha($numeFurnizor) && $numeFurnizor != "" && ctype_digit($pret)&& $pret != "" && ctype_digit($cantitate) && $cantitate != ""))
 {
     echo '<script type="text/javascript"> alertInvalid()</script>';    
 }
 else{    
    $sql = "INSERT INTO `stepit_claudiu`.`Stocuri` (`id_Companie`, `denumire_produs`, `denumire_furnizor`, `pret` , `cantitate`) 
            VALUES (".$_GET['IdCompanie']." , '".$numeProdus."', '".$numeFurnizor."', '".$pret."' , '".$cantitate."');";

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
//}
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