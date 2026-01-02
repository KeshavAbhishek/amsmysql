<?php

    $server = "localhost";
    $username = "root";
    $password = "2024";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password, "airline");

    // Check for connection success
    if(!$con){
        die("Connection to this database failed due to" . mysqli_connect_error());
    }
    $name;
    $age;
    $email;
    $seat;

    // $sql = "INSERT INTO `customer` (`seat`, `name`, `age`, `email`, `srcfrom`, `srcto`) values('$seat', '$name', '$age', '$email', '$bairport', '$dairport');";


    // if (isset($_GET["seat"]) && isset($_GET["seatC"])) {
    //     echo $_GET["seat"] . "<br>" . $_GET["seatC"];
    // }
    if (isset($_GET["seat"]) && isset($_GET["name"])) {
        // echo $_GET["seat"] . "<br>" . $_GET["name"];
        $name = $_GET['name'];
        $seat = $_GET['seat'];
        
        $sql = "UPDATE `customer` SET `name`='$name' WHERE `seat`='$seat';";
        $con->execute_query($sql);
    }
    if (isset($_GET["seat"]) && isset($_GET["age"])) {
        // echo $_GET["seat"] . "<br>" . $_GET["age"];

        $age = $_GET['age'];
        $seat = $_GET['seat'];

        $sql = "UPDATE `customer` SET `age`='$age' WHERE `seat`='$seat';";
        $con->execute_query($sql);
    }
    if (isset($_GET["seat"]) && isset($_GET["email"])) {
        // echo $_GET["seat"] . "<br>" . $_GET["email"];

        $email = $_GET['email'];
        $seat = $_GET['seat'];

        $sql = "UPDATE `customer` SET `email`='$email' WHERE `seat`='$seat';";
        $con->execute_query($sql);
    }
    // if (isset($_GET["seat"]) && isset($_GET["srcfrom"])) {
    //     echo $_GET["seat"] . "<br>" . $_GET["srcfrom"];
    // }
    // if (isset($_GET["seat"]) && isset($_GET["srcto"])) {
    //     echo $_GET["seat"] . "<br>" . $_GET["srcto"];
    // }

    $con->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Ticket</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="print.css" media="print">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rubik+Doodle+Shadow&family=Young+Serif&display=swap');

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        /* body {
            width: 100vw;
            height: 100vh;
            position: relative;
        } */

        #container {
            width: 100vw;
            height: 100vh;
            /* border: 1px solid; */
            position: relative;
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
            position: relative;
        }

        #child {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            width: 100%;
            background: white;
            padding: 30px 0;
        }

        #heading {
            font-size: 1.5em;
        }

        #head {
            width: 100%;
            text-align: center;
            font-size: 3.5rem;
            padding: 10px 0;
            font-family: "Rubik Doodle Shadow";
            color: green;
        }

        table {
            border-collapse: collapse;
            width: 80%;
        }

        th {
            font-family: "Rubik Doodle Shadow";
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
            font-weight: bolder;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        td {
            font-weight: normal;
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

        #print{
            background: #190219;
        }

        @media screen and (max-width: 700px) {
            #heading {
                font-size: 1.2rem;
            }

            #navbar {
                padding: 10px;
            }

            #head {
                font-size: 2.1rem;
                padding: 0;
                margin: 0;
            }

            table {
                font-size: 0.53rem;
            }

            #buttonFrame {
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
            }

            .btn {
                margin: 10px 0;
                font-size: 1.2rem;
            }

            #inner input{
                width: 90% !important;
            }
        }

        #child2{
            position: absolute;
            top: 0;
            left: -100%;
            width: 100vw;
            min-height: 100%;
            backdrop-filter: blur(10px);
            /* border: 1px solid red; */
            display: flex;
            align-items: center;
            justify-content: center;
            filter: invert(1);
        }

        #inner{
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            flex-direction: column;
            width: 90vw;
            height: 30vh;
            /* border: 1px solid; */
        }

        #inner h1{
            font-weight: bolder;
            font-family: "Rubik Doodle Shadow";
            width: 100%;
            text-align: center;
        }

        #inner input{
            width: 40%;
            padding: 10px 25px;
            border-radius: 100px;
            border: 3px solid #000;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bolder;
            font-size: 1.5rem;
        }

        #updateBtn, #cancel{
            filter: invert(1);
            padding: 10px 20px;
            border-radius: 100px;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bolder;
            cursor: pointer;
            outline: none;
            border: none;
            margin: 0 5px;
            font-size: 1.35rem;
            background: green;
            color: white;
        }

        #updateBtn:disabled{
            background: white;
            color: #000;
        }

        #cancel{
            background: red;
            color: white;
        }
        
        @keyframes slideLeft {
            0%{
                left: 0%
            }
            100%{
                left: -100%;
            }
        }

        @keyframes slideRight {
            0%{
                left: -100%
            }
            100%{
                left: 0;
            }
        }

        .slideLeft{
            animation: slideLeft 0.5s ease-in-out forwards 1;
        }

        .slideRight{
            animation: slideRight 0.5s ease-in-out forwards 1;
        }

        .tableData{
            font-weight: bolder;
            color: green;
            text-decoration: underline;
        }

        #info{
            width: 2rem;
            height: 2rem;
            text-align: center;
            background: #000;
            color: yellow;
            font-weight: bolder;
            font-family: "Rubik Doodle Shadow";
            font-size: 1.2rem;
            border: 0;
            outline: none;
            border-radius: 50%;
            cursor: pointer;
            position: absolute;
            top: 0;
            right: 0;
        }
    </style>
</head>

<body>
    <div id="container">
        <div id="navbar">
            <div id="heading">Airline&nbsp;&nbsp;&nbsp;Management&nbsp;&nbsp;&nbsp;System</div>
            <button id="info">?</button>
        </div>
        <br>
        <div id="child">
            <div id="head">Ticket</div>
            <br>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "2024";
            $dbname = "airline";
            $tabledata = "<table>
            <tr>
            <th>Seat</th>
            <th>Name</th>
            <th>Age</th>
            <th>Email</th>
            <th>Boarding Airport</th>
            <th>Destination Airport</th>
            </tr>";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql;
            if(isset($_GET["seat"])){
                $seatSelected = $_GET["seat"];
                $sql = "SELECT * FROM customer where seat = '$seatSelected';";
            }
            $result = $conn->query($sql);

            if ($result->num_rows > 0 and $sql!="") {

                while ($row = $result->fetch_assoc()) {
                    // <td onclick="change = `show.php?seat=' . $row["seat"] . '&seatC=None' . '`;window.location.replace(change);">' . $row["seat"] . '</td>
                    // <td class="tableData" style="cursor: pointer;" onclick="change = `show.php?seat=' . $row["seat"] . '&srcfrom=None' . '`; animateOverlap();">' . $row["srcfrom"] . '</td>
                            // <td class="tableData" style="cursor: pointer;" onclick="change = `show.php?seat=' . $row["seat"] . '&srcto=None' . '`; animateOverlap();">' . $row["srcto"] . '</td>
                    $tabledata = $tabledata . '
                        <tr>
                            <td>' . $row["seat"] . '</td>
                            <td class="tableData" style="cursor: pointer;" onclick="change = `show.php?seat=' . $row["seat"] . '&name=None' . '`; animateOverlap();">' . $row["name"] . '</td>
                            <td class="tableData" style="cursor: pointer;" onclick="change = `show.php?seat=' . $row["seat"] . '&age=None' . '`; animateOverlap();">' . $row["age"] . '</td>
                            <td class="tableData" style="cursor: pointer;" onclick="change = `show.php?seat=' . $row["seat"] . '&email=None' . '`; animateOverlap();">' . $row["email"] . '</td>
                            <td>' . $row["srcfrom"] . '</td>
                            <td>' . $row["srcto"] . '</td>
                        </tr>';
                }
                echo $tabledata . '</table>';
            }
            $conn->close();
            ?>
            <div id="buttonFrame">
                <button id="submit" class="btn" onclick="document.location.replace('index.html')">Book More Ticket</button>
                <button id="print" class="btn">Print</button>
                <!-- <img src="" id="download"> -->
            </div>
            <a href="" id="download" download="file.jpg" hidden></a>
            <div id="child2">
                <div id="inner">
                    <h1>Update Details</h1>
                    <input type="text" id="updateThis" placeholder="Enter details..." oninput="check();">
                    <div id="bframe">
                        <button id="updateBtn" class="button" disabled onclick="update();">Update</button>
                        <button id="cancel" class="button">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h1 id="device"></h1>
    <script src="out.js" defer></script>
    <script defer>
        var change;
        document.getElementById("updateThis").focus();
        document.getElementById("cancel").addEventListener("click",()=>{
            window.location.reload("/");
        })  

        function check(){
            if(document.getElementById("updateThis").value!=''){
                // console.log(document.getElementById("updateThis").value);
                document.getElementById("updateBtn").disabled=false;
            }
            else{
                document.getElementById("updateBtn").disabled=true;
            }
        }   

        function update(){
            if(change.includes("email")){
                // console.log(change);
                if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById("updateThis").value)==false){
                    alert("Invalid Email Address");
                    return;
                }
            }
            change = change.replace("None",document.getElementById("updateThis").value);
            document.getElementById("child2").setAttribute("class","slideLeft");
            // alert(change);
            setTimeout(() => {
                window.location.replace(change);
            }, 1000);
        }

        var TD = document.querySelectorAll(".tableData");
        // for (const x of TD) {
        //     x.addEventListener("click")
        // }
        function animateOverlap(){
            document.getElementById("child2").setAttribute("class","slideRight");
        }

        document.getElementById("info").addEventListener("click",()=>{
            alert('Feature\nYou can edit name, age and email-id from this page too.\n\nThank You.');
        })
    </script>
</body>

</html>