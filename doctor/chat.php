<?php
session_start();
if (!$_SESSION['email']) {
    header("LOCATION: login.php");
}
$email = $_SESSION['email'];

include ("../connect.php");

$sql = mysqli_query($con, "SELECT * FROM doctor WHERE email = '$email'");
$row = mysqli_fetch_array($sql);

$id = $row["d_id"];
$name = $row["name"];

$pid = $_GET["pid"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Dashboard</title>
    <link rel="stylesheet" href="../css/chat.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="../jQueryAssets/jquery-1.8.3.min.js" type="text/javascript"></script>


</head>

<body>

<?php include('navigation.php'); ?>
    <div class="contents" id="contents">
        <div class="contents__heading">
            <div class="contents__heading__left">
                <h3 id="nav_btn" onclick="nav_button()">
                    < </h3> &nbsp; &nbsp;
                        <h3>Chatting</h3>
            </div>
            <div class="contents__heading__right">
                <div class="dropdown">
                    <div class="user">
                        <h3><?php echo $name; ?></h3>
                        <span class="material-icons">
                            arrow_drop_down
                        </span>
                    </div>
                    <div class="dropdown-content">
                        <a href="changepass.php">Change password</a><br>
                        <a href="logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    
        <main>

           <div class="chat">
               <div class="left">
                    <div class="top">
                    <p><strong>Chatting with : </strong><?php if(isset($_GET["pid"])) { echo $_GET["pid"]; } else { echo 'None'; } ?></p>
                    </div>
                    <div class="line"></div>
                    <div class="view">
                    <?php
					if(isset($_GET["pid"]))
					{
						$str="Select * from chatting where patient='$pid' and doctor='$name' order by id desc";
						$result1=mysqli_query($con,$str);
						while($row=mysqli_fetch_array($result1))
						{
							if($row["sender"]==$pid)
							{
								echo '<div class="bubble" style="background-color: rgb(181, 212, 218); align-self: flex-start;">
                                <p>'.$row["msg"].' </p><span> '.$row["date"].'</span>
                                </div>';
							}
							else
							{
								echo '<div class="bubble" style="background-color: rgb(172, 228, 211); align-self: flex-end;">
                                <p>'.$row["msg"].' </p><span>  '.$row["date"].'</span>
                                </div>';
							}
						}
						$upd="Update chatting set status='read' where patient='$pid' and doctor='$name' and sender='$pid'";
						mysqli_query($con,$upd);
					}
				?>

                        
                       
                    </div>
                    <form class="post" action="chat1.php" method="POST">
                        <input type="hidden" name="name" value="<?php echo $name; ?>">
                        <input type="hidden" name="pid" id="pid" value="<?php if(isset($pid)) { echo $pid; } ?>">
                        <textarea name="msg" cols="100%" rows="2" ></textarea>
                        <input type="submit" id="submit" value="Send">
                    </form>
               </div>
               <div class="right">
               <p align="center"><strong>Unread Messages</strong></p>
                <?php
                $sql = "SELECT count(A.msg) as num, A.patient from chatting as A, patient as B where A.doctor='$name' and A.status='unread' and A.sender=A.patient and A.patient=B.name group by A.patient";
                $result = mysqli_query($con, $sql);
                $n = mysqli_num_rows($result);
                if ($n == 0) {
                    echo '<p align="center">You have 0 unread messages</p>';
                }
                while ($row = mysqli_fetch_array($result)) {
                    echo '<p><a href="chat.php?pid=' . $row["patient"] . '">' . $row["patient"] .'&nbsp <span style="
                    background-color: rgb(30, 76, 105);
                    color: white;
                    border-radius: 50%;
                    padding: 5px 10px;
                    width: 50px;">'. $row["num"] . '</span></a></p>';
                }
                ?>
               <div class="name-list">
                <p align="center"><u><strong>Patients</strong></u></p>
                   <?php
					$sql2="SELECT distinct name from patient inner join appointments on patient.p_id = appointments.p_id where assigned_to_id = '$id' ";
					$result2=mysqli_query($con,$sql2);
					while($row2=mysqli_fetch_array($result2))
					{
						echo '<p><a href="chat.php?pid='.$row2["name"].'">'.$row2["name"];'</a></p>';	
					}
				?>
               </div>
               </div>
           </div>
            
            

        </main>
    </div>


    <script>
	$(document).ready(function() {
        $("#submit").click(function(e) {
            var pid=$("#pid").val();
			if(pid=="")
			{
				alert("Select a Patient to start chatting");
				e.preventDefault();	
			}
        });
    });
</script>

</body>

</html>