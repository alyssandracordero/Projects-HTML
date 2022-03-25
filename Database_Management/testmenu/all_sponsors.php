<!--
/**
 * CS 4342 Database Management
 * @author Instruction team Spring and Fall 2020 with contribution from L. Garnica
 * @version 2.0
 * Description: The purpose of these file is to provide PhP basic elements for an interface to access a DB.
 * Resources: https://getbootstrap.com/docs/4.5/components/alerts/  -- bootstrap examples
 * Include your name here - ex. Modified by Villanueva for Assignment 3
 */
-->

<?php

function displayTable( $tbl){
    $sql = "SELECT * FROM " . $tbl . ";";

    $conn = $GLOBALS['conn'];
    if ($result = $conn->query($sql)) {
        echo "<h1 class='center'>" .  $tbl .  " data </h1>";

        echo "<table class='center' border=1 width=50%>
                   <tr> ";
        $finfo = $result->fetch_fields();

        foreach ($finfo as $val) {
            echo "<th>". $val->name . "</th>";
        }
        echo "</tr>";

        while($row = $result->fetch_row()){
            echo "<tr>";
            foreach ($row as $value){
                echo "<td>".$value."</td>";
            }
            echo "</tr>";
        }

        echo "</table> <br><br> ";
    }
}

?>

<!doctype html>
<html lang="en">
<style>

</style>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CS DB PHP Menu</title>

    <!-- Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" >

</head>

<body>
<div style="margin-top: 20px" class="container">
    <!--- this code connects displays the menu and menu link (uses css to style and control ) -->

    <!--- this code connects to the database and display relations-->
    <?php
    session_start();
    require_once('../config.php');
    require_once('../validate_session.php');

    displayTable("lead_a");
    displayTable("lead_additional_information");
    ?>

</div>

<!-- jQuery and JS bundle w/ Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>

</html>

