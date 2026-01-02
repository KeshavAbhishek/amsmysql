<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airline Management System</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .btn{
            font-size: 1.5rem !important;
        }
        .error{
          width: 100%;
          text-align: center;
          font-size: 2.5rem;
          padding: 20px 0;
          font-family: "Rubik Doodle Shadow";
          color: red;
        }

        .success{
          width: 100%;
          text-align: center;
          font-size: 2.5rem;
          padding: 20px 0;
          font-family: "Rubik Doodle Shadow";
          color: green;
        }
    </style>
</head>

<body>
    <div id="container">
        <div id="navbar" style="justify-content: center;">
            <div id="heading">Airline&nbsp;&nbsp;&nbsp;Management&nbsp;&nbsp;&nbsp;System</div>
        </div>
        <br>
        <div id="child">
            <div id="head">Customer Details</div>
            <br><br>
            <?php
                $server = "localhost";
                $username = "root";
                $password = "2024";

                $show = "";

                // Create a database connection
                $con = mysqli_connect($server, $username, $password, "airline");

                // Check for connection success
                if(!$con){
                    die("Connection to this database failed due to" . mysqli_connect_error());
                }
                $seat;
                if(isset($_POST["seat"])){$seat = $_POST["seat"];}
                if(isset($_GET["seat"])){$seat = $_GET["seat"];}

                if($seat!=""){
                    $result = $con->query("SELECT * FROM customer where seat='$seat';");
                    if($result->num_rows>0){
                        while($row = $result->fetch_assoc()) {
                            echo '<div id="hidden" hidden>'.$row["seat"].'*'.$row["name"].'*'.$row["age"].'*'.$row["email"].'*'.$row["srcfrom"].'*'.$row["srcto"].'</div>';
                        }
                    }
                    else{
                        echo "<div class='error'>No such record found.</div>";
                        $show="none";
                    }
                }
                else{
                    die("<div class='error'>Seat number not entered.</div>");
                    // die("Seat number not entered.");
                }
                $con->close();
            ?>
            <form action="./saveUpdate.php" method="post" id="form">
                <table id="table" style="<?php echo 'display : '.$show.';'?>">
                    <tr class="hide">
                        <!-- <td class="tableChild"><label for="name">Name :&nbsp;</label></td> -->
                        <td><input type="text" id="name" name="name" class="sameWidth" placeholder="Enter your name">
                        </td>
                    </tr>
                    <tr class="hide">
                        <!-- <td class="tableChild"><label for="age">Age :&nbsp;</label></td> -->
                        <td><input type="number" id="age" min="1" max="100" name="age" class="sameWidth"
                                placeholder="Enter your age"></td>
                    </tr>
                    <tr class="hide">
                        <!-- <td class="tableChild"><label for="email">Email :&nbsp;</label></td> -->
                        <td><input type="text" id="email" name="email" class="sameWidth" placeholder="Enter your email">
                        </td>

                    </tr>
                    <tr>
                        <!-- <td class="tableChild"><label for="seat">Seat :&nbsp;</label></td> -->
                        <!-- <td><select type="text" id="seat" name="seat" class="sameWidth"
                                style="cursor: pointer;" required></select></td> -->
                        <td><input type="text" id="seat" name="seat" class="sameWidth" placeholder="Choose Seat"
                                readonly="true"></td>
                        <input type="text" id="seatC" name="seatC" class="sameWidth" placeholder="Choose Seat" readonly="true" hidden>
                    </tr>
                    <tr class="hide">
                        <!-- <td class="tableChild"><label for="bairport">Boarding Airport :&nbsp;</label></td> -->
                        <!-- <td><select name="bairport" id="bairport" value="" class="sameWidth" style="cursor: pointer;"
                                required></select></td> -->
                        <td><input type="text" id="bairport" name="bairport" class="sameWidth" placeholder="Choose BA"
                                readonly="true"></td>
                    </tr>
                    <tr class="hide">
                        <!-- <td class="tableChild"><label for="dairport">Destination Airport :&nbsp;</label></td> -->
                        <!-- <td><select name="dairport" id="dairport" value="" class="sameWidth" style="cursor: pointer;"
                                required></select></td> -->
                        <td><input type="text" id="dairport" name="dairport" class="sameWidth" placeholder="Choose DA"
                                readonly="true"></td>
                    </tr>
                </table>
                <div id="buttonFrame">
                    <button id="submit" class="btn" style="<?php echo 'display : '.$show.';'?>">Update Ticket</button>
                    <!-- <button id="submit" class="btn">Update Ticket</button> -->
                    <button id="cancel" class="btn" onclick="document.location.replace('./index.html');">Home</button>
                </div>
            </form>
        </div>
        </div>
        <div id="srcfrom">
            <div id="srcfomHeading" class="ahead">
                Choose Boarding Airport
                <br>
                <input type="text" id="srcfromtext" class="filter" placeholder="Search...">
            </div>
            <div id="fromairportButtonFrame"></div>
        </div>

        <div id="srcto">
            <div id="srctoHeading" class="ahead">
                Choose Destination Airport
                <br>
                <input type="text" id="srctotext" class="filter" placeholder="Search...">
            </div>
            <div id="toairportButtonFrame"></div>
        </div>
        <div id="seatSelect" class="">
            <div id="seatHeading">Choose&nbsp;Ticket</div>
            <div id="seatButtonFrame"></div>
        </div>
    </div>
    <script src="node.js" defer></script>
    <script defer>
        var data = document.getElementById("hidden").innerHTML.split("*");
        document.getElementById("seat").value=data[0];
        document.getElementById("seatC").value=data[0];
        document.getElementById("name").value=data[1];
        document.getElementById("age").value=data[2];
        document.getElementById("email").value=data[3];
        document.getElementById("bairport").value=data[4];
        document.getElementById("dairport").value=data[5];
    </script>
</body>

</html>