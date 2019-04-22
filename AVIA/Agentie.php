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
    <form class="contact100-form validate-form" action="Agentie.php" method='POST'>
			<span class="contact100-form-title">AVIA</span>

			<div class="wrap-input100 validate-input">
				<span class="label-input100">Nume</span>
				<input class="input100" type="text" name="Nume">
				<span class="focus-input100"></span>
			</div>

			<div class="wrap-input100 validate-input">
				<span class="label-input100">Prenume</span>
				<input class="input100" type="text" name="Prenume">
				<span class="focus-input100"></span>
			</div>
									
			<div class="wrap-input100 validate-input">
				<span class="label-input100">CNP</span>
				<input class="input100" type="text" name="CNP">
				<span class="focus-input100"></span>
			</div>

			<div class="container-contact100-form-btn">
				<div class="wrap-contact100-form-btn">
					<div class="contact100-form-bgbtn"></div>
					<button class="contact100-form-btn">
						<span>Cautare<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i></span>
					</button>
				</div>
			</div>
		</form>
  </div>

<?php 
$nume = $_POST['Nume'];
$prenume = $_POST['Prenume'];
$cnp = $_POST['CNP'];

$sql = "SELECT * FROM `Rezervare` WHERE Nume = '".$nume."' OR Prenume = '".$prenume."' OR Cnp = '".$cnp."'";
?>

<!--<div class="limiter">
	<div class="container-table100">-->
		<div class="wrap-table100">
			<div class="table100 ver1 m-b-110">
				<div class="table100-head">
					<table>
						<thead>
							<tr class="row100 head">
								<th class="cell100 column1">CNP</th>
								<th class="cell100 column2">Nume</th>
								<th class="cell100 column3">Prenume</th>
							</tr>
						</thead>
					</table>
				</div>

				<div class="table100-body js-pscroll">
					<table>
						<tbody>

<?php
$result = $conn->query($sql);
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
?>

<tr class="row100 body">
  <td class="cell100 column1"><a href="AgentieConfirmare.php?Nume=<?php echo $row['Nume']?>&Prenume=<?php echo $row['Prenume']?>&Cnp=<?php echo $row['Cnp']?>"><?php echo $row["Cnp"]?></a></td>
  <td class="cell100 column2"><a href="AgentieConfirmare.php?Nume=<?php echo $row['Nume']?>&Prenume=<?php echo $row['Prenume']?>&Cnp=<?php echo $row['Cnp']?>"><?php echo $row["Nume"]?></a></td>
  <td class="cell100 column3"><a href="AgentieConfirmare.php?Nume=<?php echo $row['Nume']?>&Prenume=<?php echo $row['Prenume']?>&Cnp=<?php echo $row['Cnp']?>"><?php echo $row["Prenume"]?></a></td>
</tr>

<?php
    }
} else {
?>

<tr class="row100 body">
    <td class="cell100 column1"><?php echo "0 results"?></td>
</tr>

<?php
}
?>

						</tbody>
					</table>
				</div>
			</div>
		</div>
  <!--</div>
</div>-->

<?php
$conn->close();
?>

</div>

</body>
</html>
