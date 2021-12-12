
<?php
session_start();
if (!$_SESSION['email']) {
    header("LOCATION: login.php");
}
$email = $_SESSION['email'];

include("../connect.php");

$sql = mysqli_query($con, "SELECT * FROM patient WHERE email = '$email'");
$row = mysqli_fetch_array($sql);

$id = $row["p_id"];
$name = $row["name"];
$rid = $_GET["rid"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print report</title>
    <link rel="stylesheet" href="../css/print.css">
    
</head>

<body>
    <?php
    $result2 = mysqli_query($con, "SELECT * FROM ((patient INNER JOIN report ON patient.p_id = report.p_id) inner join p_records ON patient.p_id = p_records.p_id) WHERE patient.p_id = $id AND report.report_id = $rid");
    while ($row2 = mysqli_fetch_array($result2)) {
    ?>

        <div class="heading">
            <div class="logo">LOGO</div>
            <h1>University Medical Center</h1>
            <div class="logo">LOGO</div>
        </div>
        <div class="line"></div>
        <div class="line"></div>
        <div class="patient">
            <table class="myTable">
                <tr>
                    <th style="width: 30%;">Patient ID</td>
                    <td style="width: 70%;"><?php echo $id; ?></td>
                </tr>
                <tr>
                    <th style="width: 30%;">Patient Name</th>
                    <td style="width: 70%;"><?php echo $row2["name"]; ?></td>
                </tr>
                <tr>
                    <th style="width: 30%;">Age</th>
                    <td style="width: 70%;"><?php echo $row2["age"]; ?></td>
                </tr>
                <tr>
                    <th style="width: 30%;">Gender</th>
                    <td style="width: 70%;"><?php echo $row2["gender"]; ?></td>
                </tr>
                <tr>
                    <th style="width: 30%;">E-mail</th>
                    <td style="width: 70%;"><?php echo $row2["email"]; ?></td>
                </tr>
                <tr>
                    <th style="width: 30%;">Address</th>
                    <td style="width: 70%;"><?php echo $row2["address"]; ?></td>
                </tr>
                <tr>
                    <th style="width: 30%;">Registration Date</th>
                    <td style="width: 70%;"><?php echo $row2["reg_date"]; ?></td>
                </tr>
            </table>

            <table class="myTable">
            <tr>
                    <th style="width: 30%;">Report ID</th>
                    <td style="width: 70%;"><?php echo $rid; ?></td>
                </tr>
                <tr>
                    <th style="width: 30%;">Last updated on</th>
                    <td style="width: 70%;"><?php echo $row2["update_date"]; ?></td>
                </tr>
                <tr>
                    <th style="width: 30%;">Height</td>
                    <td style="width: 70%;"><?php echo $row2["height"]; ?></td>
                </tr>
                <tr>
                    <th style="width: 30%;">Weight</th>
                    <td style="width: 70%;"><?php echo $row2["weight"]; ?></td>
                </tr>
                <tr>
                    <th style="width: 30%;">Blood pressure</th>
                    <td><?php echo $row2["blood_pressure"]; ?></td>
                </tr>
                <tr>
                    <th style="width: 30%;">Blood sugar</th>
                    <td><?php echo $row2["blood_sugar"]; ?></td>
                </tr>
                <tr>
                    <th>Allergies</th>
                    <td style="width: 70%;"><?php echo $row2["allergies"]; ?></td>
                </tr>
                
                
            </table>
        </div>
<br>
        <div class="patient">
        <table class="myTable">
                <tr>
                    <th style="width: 30%;">Doctor ID</td>
                    <td style="width: 70%;"><?php echo $row2["d_id"]; ?></td>
                </tr>
                <tr>
                    <th style="width: 30%;">Doctor Name</th>
                    <td style="width: 70%;"><?php echo $row2["value"]; ?></td>
                </tr>
                
            </table>
            </div>
       <br>

        <center>
            <h1 style="color: rgb(7, 72, 116);">Report</h1>
        </center>
        <div class="line"></div>
        <div class="report">
            <h2><strong>Diagnosis :</strong></h2> <br>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio, veritatis tempore, rerum excepturi amet mollitia voluptatem deleniti, assumenda atque exercitationem at perspiciatis hic! Accusamus, soluta laboriosam consequuntur aperiam eveniet obcaecati?</p>
        
        <br> <br>
        <h2><strong>Tests recomended :</strong></h2> <br>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio, veritatis tempore, rerum excepturi amet mollitia voluptatem deleniti, assumenda atque exercitationem at perspiciatis hic! Accusamus, soluta laboriosam consequuntur aperiam eveniet obcaecati?</p>
            </div>

            <div class="line"></div>

            <div class="report">
            <h2><strong>Notes :</strong></h2> <br>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio, veritatis tempore, rerum excepturi amet mollitia voluptatem deleniti, assumenda atque exercitationem at perspiciatis hic! Accusamus, soluta laboriosam consequuntur aperiam eveniet obcaecati? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores incidunt est eligendi iure! Dolores sequi inventore quisquam. Pariatur, deleniti corrupti?</p>
        
        <br> <br>
        <h2><strong>Medicine :</strong></h2> <br>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio, veritatis tempore, rerum excepturi amet mollitia voluptatem deleniti, assumenda atque exercitationem at perspiciatis hic! Accusamus, soluta laboriosam consequuntur aperiam eveniet obcaecati?</p>
            </div>
            <div class="line"></div>
    <?php }; ?>

    
</body>

<script>
    window.onafterprint = function() { 
    window.close();
};
window.print();
</script>


</html>
