<?php

include("../connect.php");

session_start();
if (!$_SESSION['username']) {
    header("LOCATION: login.php");
}
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Dashboard</title>
    <link rel="stylesheet" href="../css/add.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

</head>

<body>

    <?php include('navigation.php'); ?>

    <main>
        <h3 style="margin-bottom: 30px;">View doctor</h3>

        <table class="table" id="myTable">
            <thead class="thead">
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>E-mail</td>
                    <td>Password</td>
                    <td>Specialization</td>
                    <td>Fees</td>
                    <td>Action</td>
                </tr>
            </thead>

            <tbody>
                <?php

                $result = mysqli_query($con, "select * from doctor");
                while ($row = mysqli_fetch_array($result)) {
                    echo '
                <tr>
                    <td>' . $row["d_id"] . '</td>
                    <td>' . $row["name"] . '</td>
                    <td>' . $row["email"] . '</td>
                    <td>*****</td>
                    <td>' . $row["specialization"] . '</td>
                    <td>' . $row["fees"] . '</td>
                    <td><button><a href="edit_doctor.php?id=' . $row["d_id"] . '">EDIT</a></button>
                        <button><a href="delete_doctor.php?id=' . $row["d_id"] . '" class="action">DELETE</a></button></td>
                </tr>
            ';
                }
                ?>
            </tbody>


        </table>

    </main>

    </div>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                responsive: true
            });

        });
    </script>

</body>

</html>