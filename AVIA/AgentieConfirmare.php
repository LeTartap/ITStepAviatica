<!DOCTYPE html>
<html lang="en">
<head>

	<title>AVIA</title>
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
	<link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
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
if($conn->connect_error)
    die("Connection failed: " . $conn->connect_error);
?>    

<div class="container-contact100">
	<div class="wrap-contact100">

<?php 
$nume = $_GET['Nume'];
$prenume = $_GET['Prenume'];
$cnp = $_GET['Cnp'];

$sql = "SELECT * FROM `Rezervare` WHERE Nume = '".$nume."' AND Prenume = '".$prenume."' AND Cnp = '".$cnp."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$idCursa = $row['IdCursa'];

$sqlCurse = "SELECT * FROM `Curse` WHERE id = '".$idCursa."'";
$resultCurse = $conn->query($sqlCurse);
$rowCurse = $resultCurse->fetch_assoc();

$orasSosire = $rowCurse['oras_sosire'];
$dataPlecare = $rowCurse['data_Plecare'];
$pret = $rowCurse['pret'];
?>

        <div class="contact100-form validate-form">
			<span class="contact100-form-title">AVIA</span>

            <div class="wrap-input100 validate-input">
                <span class="label-input100">Nume: <?php echo $nume?></span>
            </div>

            <div class="wrap-input100 validate-input">
                <span class="label-input100">Prenume: <?php echo $prenume?></span>
            </div>
                        
            <div class="wrap-input100 validate-input">
                <span class="label-input100">CNP: <?php echo $cnp?></span>
            </div>

            <div class="wrap-input100 validate-input">
                <span class="label-input100">ID Cursa: <?php echo $idCursa?></span>
            </div>

            <div class="wrap-input100 validate-input">
                <span class="label-input100">Oras Plecare: <?php echo $rowCurse['oras_Plecare']?></span>
            </div>

            <div class="wrap-input100 validate-input">
                <span class="label-input100">Ora Plecare: <?php echo $rowCurse['ora_Plecare']?></span>
            </div>
                        
            <div class="wrap-input100 validate-input">
                <span class="label-input100">Oras Sosire: <?php echo $orasSosire?></span>
            </div>

            <div class="wrap-input100 validate-input">
                <span class="label-input100">Ora Sosire: <?php echo $rowCurse['ora_Sosire']?></span>
            </div>

            <div class="wrap-input100 validate-input">
                <span class="label-input100">Pret: <?php echo $pret?></span>
            </div>

            <div class="container-contact100-form-btn">
                <div class="wrap-contact100-form-btn">
                    <div class="contact100-form-bgbtn"></div>
                    <button class="contact100-form-btn" onclick='location.href="AgentieFinalizare.php?Nume=<?php echo $nume?>&Prenume=<?php echo $prenume?>&Cnp=<?php echo $cnp?>&IdCursa=<?php echo $idCursa?>&OrasSosire=<?php echo $orasSosire?>&DataPlecare=<?php echo $dataPlecare?>&Pret=<?php echo pret?>";'>
                        <span>Confirmare <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i></span>
                    </button>
                </div>
            </div>
        </div>

<?php
$conn->close();
?>

    </div>
</div>

</body>
</html>
