<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contact V4</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="/images/icons/favicon.ico" />
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
    <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/1util.css">
    <link rel="stylesheet" type="text/css" href="css/1main.css">
    <!--===============================================================================================-->
</head>

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

<body>

    <div class="container-background100">

        <div class="container-contact100">
            <div class="wrap-contact100">
                <form class="contact100-form validate-form" action="Companierezervare.php" method="GET">

                    <span class="contact100-form-title">
                        Select Company
                    </span>


                    <div class="wrap-input100 input100-select">
                        <span class="label-input100">Company name</span>

                        <?php
					$sql = 'SELECT `Denumire`, `id` as IdCompanie FROM `stepit_claudiu`.`Companie`';
					$result = $conn->query($sql);
					?>

                        <div>
                            <select class="selection-2" name="idCompanie">
                                <option>Company name</option>

                                <?php
						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row["IdCompanie"] . '" >' . $row["Denumire"] . '</option>';
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
                            <button type="submit" value="Submit" class="contact100-form-btn">
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

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
        </script>

</body>

</html>