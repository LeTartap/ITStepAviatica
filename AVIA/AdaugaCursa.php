<!DOCTYPE html>
<html lang="en">
<head>
        <title>Adaugare cursa noua</title>
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
    alert("Cursa adaugata cu succes!");
}
function invalidDB() {
  alert("Nu s-a putut face conexiunea cu baza de date!");
}
</script>
<!--===============================================================================================-->
</head>
<body>
         <div>
             <div class="container-contact100">
		<div class="wrap-contact100">
                    <form action='adaugacursa.php' method='GET'>

                <div class="wrap-input100 validate-input" data-validate="ID">
					<span class="label-input100">ID Companie</span>
					<input class="input100" type="text" name="id_companie" placeholder="ID">
					<span class="focus-input100"></span>
				</div>                                

				<div class="wrap-input100 validate-input" data-validate="Va rugam completati numele orasului">
					<span class="label-input100">Oras plecare</span>
					<input class="input100" type="text" name="oras_plecare" placeholder="Introduceti numele orasului de plecare">
					<span class="focus-input100"></span>
				</div>

                <div class="wrap-input100 validate-input">
                    <span class="label-input100">Data plecare</span>
                    <input class="input100" type="date" name="data_plecare">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Introduceti ora">
					<span class="label-input100">Ora plecare</span>
					<input class="input100" type="text" name="ora_plecare" placeholder="Ora decolarii">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Va rugam completati numele orasului">
					<span class="label-input100">Oras sosire</span>
					<input class="input100" type="text" name="oras_sosire" placeholder="Introduceti numele orasului de sosire">
					<span class="focus-input100"></span>
				</div>

                <div class="wrap-input100 validate-input">
                    <span class="label-input100">Data sosire</span>
                    <input class="input100" type="date" name="data_sosire">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Introduceti ora">
					<span class="label-input100">Ora sosire</span>
					<input class="input100" type="text" name="ora_sosire" placeholder="Ora sosirii">
					<span class="focus-input100"></span>
				</div>

                <div class="wrap-input100 validate-input" data-validate="Introduceti tariful">
					<span class="label-input100">Tarif</span>
					<input class="input100" type="text" name="pret" placeholder="Tariful cursei">
					<span class="focus-input100"></span>
				</div>

                <div class="wrap-input100 validate-input" data-validate="Introduceti costul kerosenului">
					<span class="label-input100">Consum kerosen</span>
					<input class="input100" type="text" name="consum_kerosnen" placeholder="Cost kerosen">
					<span class="focus-input100"></span>
				</div>

                <div class="wrap-input100 validate-input" data-validate="Introduceti numarul de ore">
					<span class="label-input100">Durata zbor</span>
					<input class="input100" type="text" name="durata_zbor" placeholder="Durata zborului">
					<span class="focus-input100"></span>
				</div>

                <div class="wrap-input100 validate-input" data-validate="ID">
					<span class="label-input100">ID Avion</span>
					<input class="input100" type="text" name="id_avion" placeholder="ID">
					<span class="focus-input100"></span>
				</div>
                            <input type="hidden" name="IdCursa" value="<?php echo $_GET['IdCursa']; ?>">                            

				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button class="contact100-form-btn">
							<span>
								Adaugare cursa
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

$id_companie = $_GET['id_companie'];
$oras_plecare=$_GET['oras_plecare'];
$data_plecare=$_GET['data_plecare'];
$ora_plecare=$_GET['ora_plecare'];
$oras_sosire=$_GET['oras_sosire'];
$data_sosire=$_GET['data_sosire'];
$ora_sosire=$_GET['ora_sosire'];
$pret=$_GET['pret'];
$consum_kerosnen=$_GET['consum_kerosnen'];
$durata_zbor=$_GET['durata_zbor'];
$id_avion=$_GET['id_avion'];

//validare inceput
if( isset($id_companie) AND isset($oras_plecare) AND isset($data_plecare) AND isset($ora_plecare)
AND isset($oras_sosire) AND isset($data_sosire) AND isset($ora_sosire) AND isset($pret)
AND isset($consum_kerosnen) AND isset($durata_zbor) AND isset($id_avion)) {
  # execute a query and output its results
if(!(ctype_alpha($id_companie) && $id_companie!="" && 
        ctype_alpha($oras_plecare) && $oras_plecare!="" && 
        ctype_digit($data_plecare)&& $data_plecare!="" && ctype_alpha($ora_plecare)&&$ora_plecare!=""
&& ctype_alpha($oras_sosire)&& $oras_sosire!=""  && ctype_digit($data_sosire)&& $data_sosire!=""  && ctype_alpha($ora_sosire)&& $ora_sosire!=""
&& ctype_digit($pret)&&$pret!="" && ctype_digit($consum_kerosnen)&&$consum_kerosnen!="" && ctype_alpha($id_companie)&&$id_companie!=""
&& ctype_digit($durata_zbor)&&$durata_zbor!="" && ctype_alpha($id_avion)&&$id_avion!=""))
{
    echo '<script type="text/javascript"> alertInvalid()</script>';    
}
else{    
    $sql = "INSERT INTO `stepit_claudiu`.`Rezervare` (`id_companie`, `oras_plecare`, `data_plecare`, `ora_plecare`, `oras_sosire`,
                        `data_sosire`, `ora_sosire`, `pret`, `consum_kerosnen`, `durata_zbor`, `id_avion`) 
            VALUES (".$_GET['id']." , '".$id_companie."', '".$oras_plecare."', '".$data_plecare."', '".$ora_plecare."', '".$oras_sosire."',
            '".$data_sosire."', '".$ora_sosire."', '".$pret."', '".$consum_kerosnen."', '".$durata_zbor."', '".$id_avion."',);";

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