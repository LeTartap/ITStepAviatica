
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
  ?>    


        <div class="container-contact100">
                <div class="wrap-contact100">
                    <form action='angajati.php' method='GET'>
                                <?php
                                $sql='SELECT `id_Companie` FROM `stepit_claudiu`.`Angajati` GROUP BY `id_Companie`';
                                $result = $conn->query($sql);
                                
                                $sqlpoz='SELECT `Pozitie` FROM `stepit_claudiu`.`Angajati` GROUP BY `id_Companie`';
                                $resultpoz = $conn->query($sqlpoz)
                                ?>
                                        <span class="contact100-form-title">
                                                AVIA
                                        </span>

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
                                
                                        <div class="wrap-input100 validate-input">
                                                <span class="label-input100">Data angajare</span>
                                                <input class="input100" type="date" name="Data">
                                                <span class="focus-input100"></span>
                                        </div>

                                        
                            
                            
                                            <div class="wrap-input100 input100-select">
                                            <span class="label-input100">ID companie</span>
                                                <div>
                                                    <select class="selection-2" name="idCompanie">
                                                    <?php
                                                        if ($result->num_rows > 0) 
                                                            {
                                                                   while($row = $result->fetch_assoc()) {                                                                        
                                                                    echo '<option value="'.$row["id_Companie"].'">'.$row["id_Companie"].'</option>';                                                       
                                                                }
                                                            }
                                                        ?>                                                               
                                                    </select>
                                                </div>
                                            <span class="focus-input100"></span>
                                        </div>
                            
                            
                                <div class="wrap-input100 validate-input" data-validate="Sallary">
                                        <span class="label-input100">Sallary</span>
                                        <input class="input100" type="text" name="salary" placeholder="Enter your salary">
                                        <span class="focus-input100"></span>
                                </div>
                            
                            
                                        <div class="wrap-input100 input100-select">
                                            <span class="label-input100">Pozitie</span>
                                                <div>
                                                    <select class="selection-2" name="pozitie">
                                                    <?php
                                                        if ($resultpoz->num_rows > 0) 
                                                            {
                                                                   while($row = $resultpoz->fetch_assoc()) {                                                                        
                                                                    echo '<option value="'.$row["Pozitie"].'">'.$row["Pozitie"].'</option>';                                                       
                                                                }
                                                            }
                                                        ?>                                                               
                                                    </select>
                                                </div>
                                            <span class="focus-input100"></span>
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
                        </form>
                </div>
        </div>

    <?php
    $idcomp = $_GET['idCompanie'];
$nume=$_GET['nume'];
$prenume=$_GET['prenume'];
$dataang=$_GET['Data'];
$pozitie=$_GET['pozitie'];
$salary=$_GET['salary'];


//validare inceput
if(isset($nume) AND isset($prenume)) {
  # execute a query and output its results
if(!(ctype_alpha($nume)&&$nume!="" && ctype_alpha($prenume) && $prenume!="" ))
{
    echo '<script type="text/javascript"> alertInvalid()</script>';    
}
else{    
    $sql = "INSERT INTO `stepit_claudiu`.`Angajati` (`id_companie`, `Nume`, `Prenume`, `data_angajare`,`pozitie`,`salariu`) 
            VALUES ('".$idcomp."' , '".$nume."', '".$prenume."', '".$dataang."', '".$pozitie."', '".$salary."');";

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
</tr>
<?php
  $conn->close();
?>

    
    
    
    
    
    
        <div id="dropDownSelect1"></div>

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
