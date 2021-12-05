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

$did = $_GET["did"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient - Chat</title>
    <link rel="stylesheet" href="../css/chat.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="../jQueryAssets/jquery-1.8.3.min.js" type="text/javascript"></script>


</head>

<body>

    <?php include('navigation.php'); ?>

    <main>
        <h3>Chatting Panel</h3>

        <div class="chat">
            <div class="left">
                <div class="top">
                    <p><strong>Chatting with : </strong><?php if (isset($_GET["did"])) {
                                                            echo $_GET["did"];
                                                        } else {
                                                            echo 'None';
                                                        } ?></p>
                </div>
                <div class="line"></div>
                <div class="view">
                    <?php
                    if (isset($_GET["did"])) {
                        $str = "Select * from chatting where doctor='$did' and patient='$name' order by id desc";
                        $result1 = mysqli_query($con, $str);
                        while ($row = mysqli_fetch_array($result1)) {
                            if ($row["sender"] == $did) {
                                echo '<div class="bubble" style="background-color: rgb(181, 212, 218); align-self: flex-start;">
                                <p>' . $row["msg"] . ' </p><span> ' . $row["date"] . '</span>
                                </div>';
                            } else {
                                echo '<div class="bubble" style="background-color: rgb(172, 228, 211); align-self: flex-end;">
                                <p>' . $row["msg"] . ' </p><span>  ' . $row["date"] . '</span>
                                </div>';
                            }
                        }
                        $upd = "Update chatting set status='read' where doctor='$did' and patient='$name' and sender='$did'";
                        mysqli_query($con, $upd);
                    }
                    ?>



                </div>
                <form class="post" action="chat1.php" method="POST">
                    <input type="hidden" name="name" value="<?php echo $name; ?>">
                    <input type="hidden" name="did" id="did" value="<?php if (isset($did)) {
                                                                        echo $did;
                                                                    } ?>">
                    <textarea name="msg" cols="100%" rows="2"></textarea>
                    <input type="submit" id="submit" value="Send">
                </form>
            </div>
            <div class="right">

                <p align="center"><strong>Unread Messages</strong></p>
                <?php
                $sql = "SELECT count(A.msg) as num, A.doctor from chatting as A, doctor as B where A.patient='$name' and A.status='unread' and A.sender=A.doctor and A.doctor=B.name group by A.doctor";
                $result = mysqli_query($con, $sql);
                $n = mysqli_num_rows($result);
                if ($n == 0) {
                    echo '<p align="center">You have 0 unread messages</p>';
                }
                while ($row = mysqli_fetch_array($result)) {
                    echo '<p><a href="chat.php?did=' . $row["doctor"] . '">' . $row["doctor"] .'&nbsp <span style="
                    background-color: rgb(30, 76, 105);
                    color: white;
                    border-radius: 50%;
                    padding: 5px 10px;
                    width: 50px;">'. $row["num"] . '<span></a></p>';
                }
                ?>

                <div class="name-list">
                    <p align="center"><u><strong>Doctors</strong></u></p>
                    <?php
                    $sql2 = "Select * from doctor";
                    $result2 = mysqli_query($con, $sql2);
                    while ($row2 = mysqli_fetch_array($result2)) {
                        echo '<p><a href="chat.php?did=' . $row2["name"] . '">' . $row2["name"];
                        '</a></p>';
                    }
                    ?>
                </div>
            </div>
        </div>
        </div>



    </main>

    </div>

    <script>
        $(document).ready(function() {
            $("#submit").click(function(e) {
                var pid = $("#pid").val();
                if (pid == "") {
                    alert("Select a Patient to start chatting");
                    e.preventDefault();
                }
            });
        });
    </script>

</body>

</html>