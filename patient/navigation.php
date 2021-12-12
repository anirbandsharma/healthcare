<style>
    main {
        margin-bottom: 50px;
    }
</style>

<?php
include('../connect.php');
$email = $_SESSION['email'];
$sql = mysqli_query($con, "SELECT * FROM patient WHERE email = '$email'");
$row = mysqli_fetch_array($sql);
$name = $row["name"];
?>

<link rel="stylesheet" href="../css/navigation.css">



    <nav id="nav">
        <div class="nav-content">
            <a href="./dashboard.php">
                <h4>Dashboard</h4>
            </a>
        </div>
        <div class="nav-content">
            <u>
                <p></p>
            </u>
            <a href="./my_profile.php"><span class="material-icons">
                    double_arrow
                </span>My profile</a><br>
            <a href="./edit_profile.php?id=<?php echo $row["p_id"] ?>"><span class="material-icons">
                    double_arrow
                </span>Edit profile</a>
        </div>
        <div class="nav-content">
            <u>
                <p>Records</p>
            </u>
            <a href="./update_record.php?id=<?php echo $row["p_id"] ?>"><span class="material-icons">
                    double_arrow
                </span>Update medical record</a><br>
            <a href="./view_reports.php"><span class="material-icons">
                    double_arrow
                </span>View reports</a>
        </div>
        <div class="nav-content">
            <u>
                <p>Appointments</p>
            </u>
            <a href="./make_appointment.php"><span class="material-icons">
                    double_arrow
                </span>Make an appointment</a><br>
            <a href="./view_appointments.php"><span class="material-icons">
                    double_arrow
                </span>View appointments</a>
        </div>

        <div class="nav-content">
            <u>
                <p>Enquiries</p>
            </u>
            <a href="./chat.php"><span class="material-icons">
                    double_arrow
                </span>Chat here</a><br>
           
        </div>
        

    </nav>

    <script>
        function nav_button() {
            var contents = document.getElementById("contents");
            var btn = document.getElementById("nav_btn");

            if (contents.style.width == "80vw") {
                contents.style.width = "100vw";
                contents.style.borderRadius = "0";
                btn.innerText = ">";
            } else {
                contents.style.width = "80vw";
                contents.style.borderRadius = "2rem 0 0 2rem";
                btn.innerText = "<";
            }
        }
    </script>

    <script>


window.onload = () => {
  const anchors = document.querySelectorAll('a');
  const transition_el = document.querySelector('.contents');

  setTimeout(() => {
    transition_el.classList.add('slidein');
  }, 500);

  for (let i = 0; i < anchors.length; i++) {
    const anchor = anchors[i];

    anchor.addEventListener('click', e => {
      e.preventDefault();
      let target = e.target.href;

      console.log(transition_el);

      transition_el.classList.add('slideout');

      console.log(transition_el);

      setInterval(() => {
        window.location.href = target;
      }, 300);
    })
  }
}

    </script>
