<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table V04</title>

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
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">       
        
        
<!--===============================================================================================-->

<script>
    function alertInvalid() {
    alert("Data invalida!");
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

    <div class="limiter">
                    <div class="container-table100">
                            <div class="wrap-table100">
                                    <div class="table100 ver1 m-b-110">
                                            <div class="table100-head">
                                                    <table>
                                                            <thead>
                                                                    <tr class="row100 head">
                                                                            <th class="cell100 column1">Numar Companie</th>
                                                                            <th class="cell100 column2">Denumire Produs</th>
                                                                            <th class="cell100 column3">Denumire Furnizor</th>
                                                                            <th class="cell100 column4">Cantitate</th>
                                                                            <th class="cell100 column5">Pret</th>
                                                                    </tr>
                                                            </thead>
                                                    </table>
                                            </div>

    
    <?php
        //o singura valoare putem sa prindem din dropdwn
       //$numeCompanie = $_POST['numeCompanie'];
        $idCompanie = $_POST['idCompanie'];
        
        // $orasDestinatie = $_POST['Destinatie'];
        // $dataPlecare = $_POST['Data'];

        // if ($dataPlecare == "" && isset($dataPlecare)) {
        //         echo '<script type="text/javascript">alertInvalid()</script>';
        // }

        # execute a query and output its results
        //$sql = "SELECT id, oras_Plecare as Plecare, oras_sosire as Destinatie, ora_Plecare as Ora, Pret FROM `Curse`";
        // $sql = "SELECT id, oras_Plecare as Plecare, oras_sosire as Destinatie, ora_Plecare as Ora, Pret FROM `Curse` WHERE
        // Valabilitate = 1 AND oras_Plecare = '" . $numeCompanie . "' AND oras_sosire = '" . $_POST['Destinatie'] . "' AND zi_a_saptamanii = DAYOFWEEK ('" . $dataPlecare . "') ORDER BY oras_sosire, zi_a_saptamanii";
        
       $sql = "SELECT denumire_produs as DenumireP, denumire_furnizor as DenumireF, pret as Pret, cantitate as Cantitate, id_Companie as IDCompanie FROM `Stocuri` WHERE
       id_Companie = '".$idCompanie . "' ";
        
       ?>
        
        <div class="table100-body js-pscroll">
                <table>
                        <tbody>
                        

    <?php
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
                //output data of each row
                while ($row = $result->fetch_assoc()) { ?>

                        <tr class="row100 body">
                        
                    
                        <td  class="cell100 column1"><a href="rezervare.php?IdCompanie=<?php echo $row['IDCompanie'] ?>" ><?php echo $row["IDCompanie"] ?></a></td>                                                                      
                        
                        <td class="cell100 column2"><?php echo $row["DenumireP"] ?></td>
                        <td class="cell100 column3"><?php echo $row["DenumireF"] ?></td>
                        <td class="cell100 column4"><?php echo $row["Cantitate"] ?></td>
                        <td class="cell100 column5"><?php echo $row["Pret"] ?></td>
                        
                    </tr>
                    
                <?php
                }
        } else { ?>
        <tr class="row100 body">
                <td class="cell100 column1"><?php echo "0 results" ?></td>
        </tr>
        <?php

}
?>
        
        </tbody>
                                                </table>
                                        </div>
                                </div>
    
          
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