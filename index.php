<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Show Ticket</title>
  <link rel="stylesheet" href="style.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Rubik+Doodle+Shadow&family=Young+Serif&display=swap');

    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
    }

    body {
      width: 100%;
      height: 100vh;
    }

    #container {
      width: 100%;
      height: 100%;
    }

    #navbar {
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
      font-weight: bolder;
      background: aqua;
      font-family: "Rubik Doodle Shadow";
      font-size: 2rem;
    }

    #child {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      width: 100%;
    }

    #heading {
      font-size: 1.5em;
    }

    #head {
      width: 100%;
      text-align: center;
      font-size: 3rem;
      padding: 10px 0;
      font-family: "Rubik Doodle Shadow";
      color: green;
    }

    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 80%;
    }

    td,
    th {
      border: 1px solid #dddddd;
      text-align: center;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }

    #buttonFrame {
      margin: auto;
      width: 100%;
      text-align: center;
      margin-top: 35px;
    }

    .btn {
      font-size: 2rem;
      padding: 10px 20px;
      font-weight: bolder;
      font-family: "Rubik Doodle Shadow";
      border: 0;
      border-radius: 10px;
      margin: 0 10px;
      color: white;
      cursor: pointer;
    }

    .btn:nth-child(1) {
      background: green;
    }

    .btn:nth-child(2) {
      background: blue;
    }

    .error {
      width: 100%;
      text-align: center;
      font-size: 2.5rem;
      padding: 20px 0;
      font-family: "Rubik Doodle Shadow";
      color: red;
    }

    .success {
      width: 100%;
      text-align: center;
      font-size: 2.5rem;
      padding: 20px 0;
      font-family: "Rubik Doodle Shadow";
      color: green;
    }

    @media screen and (max-width: 700px) {
      #heading {
        font-size: 1.2rem;
      }

      #navbar {
        padding: 10px;
      }

      ul {
        display: none;
      }

      i {
        display: inherit !important;
      }

      #verticalNav {
        display: block;
        overflow: hidden;
        text-align: center;
        background: aqua;
        /* height: 6rem; */
        height: 0rem;
        transition: height 0.5s ease;
      }

      #verticalNav div {
        font-family: "Rubik Doodle Shadow";
        color: #000;
        font-weight: bolder;
        font-size: 1.2rem;
      }

      #head {
        font-size: 1.58rem;
      }

      table {
        font-size: 1.2rem;
      }

      .sameWidth {
        font-size: 1.2rem;
        padding: 5px 0;
        border-radius: 2px;
      }

      #buttonFrame {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
      }

      .btn {
        margin: 10px 0;
        font-size: 1.5rem;
      }

      .src {
        width: 80%;
        font-size: 0.95rem;
      }

      .ahead {
        font-size: 1.5rem !important;
      }

      #seatHeading {
        font-size: 1.8rem !important;
      }

      .success{
        font-size: 1.5rem;
      }

      .error{
        font-size: 1.5rem;
      }
    }
  </style>
</head>

<body>
  <div id="container">
    <div id="navbar">
      <div id="heading">Airline&nbsp;&nbsp;&nbsp;Management&nbsp;&nbsp;&nbsp;System</div>
    </div>
    <br><br>
    <div id="child">
      <div id="head">Acknowledgement<br>Page</div>
      <br><br>
      <?php
      $insert = false;
      if (isset($_POST['name'])) {
        $server = "localhost";
        $username = "root";
        $password = "2024";

        // Create a database connection
        $con = mysqli_connect($server, $username, $password, "airline");

        // Check for connection success
        if (!$con) {
          die("Connection to this database failed due to" . mysqli_connect_error());
        }
        $name = $_POST['name'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $seat = $_POST['seat'];
        $bairport = $_POST['bairport'];
        $dairport = $_POST['dairport'];

        if ($name != "" && $age != "" && $email != "" && $seat != "" && $bairport != "" && $dairport != "") {

          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // die("Invalid email format");
            die("<div class='error'>Invalid&nbsp;&nbsp;Email&nbsp;&nbsp;Format</div>");
          }

          $sql = "INSERT INTO `customer` (`seat`, `name`, `age`, `email`, `srcfrom`, `srcto`) values('$seat', '$name', '$age', '$email', '$bairport', '$dairport');";

          if ($con->query("SELECT * FROM customer WHERE `seat`='$seat'")->num_rows == 0 && $con->query($sql) == true) {
            echo "<div class='success'>Ticket<br>Booked<br>Successfully</div>";
          } else {
            echo "<div class='error'>Seat<br>Already<br>Booked</div>";
          }
        } else {
          die("<div class='error'>All fields are mandatory to be filled.</div>");
        }
        $con->close();
      }
      ?>
      <!-- <div style="color: red !important;" class="success" id="redirect"></div> -->
      <div id="buttonFrame">
        <button class="btn" onclick="document.location.replace('index.html')">Book More Ticket</button>
        <button class="btn" onclick="document.location.replace('show.php?seat=<?php echo $seat;?>')">Show Ticket</button>
      </div>
    </div>
  </div>
</body>

</html>