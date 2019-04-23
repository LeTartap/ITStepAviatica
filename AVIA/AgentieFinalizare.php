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
$idCursa = $_GET['IdCursa'];
$dataPlecare = $_GET['DataPlecare'];
$orasSosire = $_GET['OrasSosire'];
$pret = $_GET['Pret'];

$sql = "INSERT INTO `Pasageri` (Nume, Prenume, CNP) VALUES ('".$nume."', '".$prenume."', '".$cnp."')";
$conn->query($sql);

$sql = "SELECT * FROM `Pasageri` WHERE CNP = '".$cnp."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$idPasager = $row['id'];

$sql = "INSERT INTO `Bilet_cumparat` (id_Pasager, id_vanzator, kg, loc, Pret, id_Cursa, oras_sosire, data_plecare) VALUES ('".$idPasager."', '2', '0', '0', '".$pret."', '".$idCursa."', '".$orasSosire."', '".$dataPlecare."')"; //problema aici la id vanzator
$conn->query($sql);     
?>

        <div class="contact100-form validate-form">
			<span class="contact100-form-title">AVIA</span>

            <div class="wrap-input100 validate-input">
                <span class="label-input100">Rezervare realizata cu succes.</span>
            </div>

            <div class="container-contact100-form-btn">
                <div class="wrap-contact100-form-btn">
                    <div class="contact100-form-bgbtn"></div>
                    <button class="contact100-form-btn" onclick='location.href="index.php";'>
                        <span>Pagina Principala</span>
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
