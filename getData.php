<?php

    global $data;

    $servername = 'localhost';
    $username = 'root';
    $password = '2023';
    $dbname = 'airline';
    $tabledata = '<table>
            <tr>
            <th>Seat</th>
            <th>Name</th>
            <th>Age</th>
            <th>Email</th>
            <th>Boarding Airport</th>
            <th>Destination Airport</th>
            </tr>';

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    $sql;
    $sql = 'SELECT * FROM customer;';
    $result = $conn->query($sql);

    if ($result->num_rows > 0 and $sql != '') {

        while ($row = $result->fetch_assoc()) {
            $tabledata = $tabledata . '
                        <tr>
                            <td>' . $row['seat'] . '</td>
                            <td>' . $row['name'] . '</td>
                            <td>' . $row['age'] . '</td>
                            <td>' . $row['email'] . '</td>
                            <td>' . $row['srcfrom'] . '</td>
                            <td>' . $row['srcto'] . '</td>
                        </tr>';
        }
        // echo $tabledata . '</table>';
    }
    $conn->close();

$data = "<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='shortcut icon' href='icon.ico' type='image/x-icon'>
    <title>Admin Access</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rubik+Doodle+Shadow&family=Young+Serif&display=swap');
        
        body {
            font-size: 2rem;
        }

        table {
            border-collapse: collapse;width: 100%;
        }

        th {
            font-family: 'Rubik Doodle Shadow';
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

        tr th{
            font-size: 2.15vw;
        }

        tr td{
            font-size: 2.0vw;
        }

        td {
            font-weight: normal;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>
    <h1>Tickets</h1>";
    $data = $data . $tabledata . '</table></body></html>';
    // echo $data;
?>