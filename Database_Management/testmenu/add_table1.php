<html lang="en" xmlns="http://www.w3.org/1999/html">
<link rel = "stylesheet" type="text/css" href="css/style1.css">
<head>
    <title> REGISTER NEW LEAD </title>
    <meta charset="UTF-8">
</head>
<body>
    <H1>FILL FOR NEW INFORMATION</H1>

    <form action="process_add1.php" method="post">
        Email <input type="text" name="lemail"><br>
        First Name <input type="text" name="lfirst_name"><br>
        Last Name <input type="text" name="llast_name"><br>
        Lead ID <input type="text" name="llead_id"><br>
        Supporting Organization <input type="text" name="lsupporting_organization"><br>
        Department <input type="text" name="ldepartment"><br><br>
                <input type="submit" name="send data"><br>
    </form>
</body>
</html>
<?php
//if(isset($_POST['lemail']) && !empty($_POST['lemail']) &&
//    isset($_POST['lfirst_name']) && !empty($_POST['lfirst_name']) &&
//    isset($_POST['llast_name']) && !empty($_POST['llast_name']) &&
//    isset($_POST['llead_id']) && !empty($_POST['llead_id']) &&
//    isset($_POST['lsupporting_cost_code']) && !empty($_POST['lsupporting_cost_code']) &&
//    isset($_POST['ldepartment']) && !empty($_POST['ldepartment'])) {
session_start();
require_once('..validate_session.php');
/** import the code to create the db connection object */
require_once('../config.php');
/** default look of the page **/
$conn = $GLOBALS['conn'];
if ($result = $conn->query($sql)) {
    mysql_query("INSERT INTO lead_a(lemail, lfirst_name, llast_name, llead_id) VALUES('$_POST[lemail]','$_POST[lfirst_name]','$_POST[llast_name]','$_POST[llead_id]')");
    mysql_query("INSERT INTO lead_additional_information(llead_id, lfaculty, lsupporting_cost_code, ldepartment) VALUES('$_POST[llead_id]','0','$_POST[lsupporting_cost_code]','$_POST[ldepartment]')");
    echo "INSERT SUCCESSFUL!";
}
//}
else{
    echo "THERE WAS A PROBLEM CONNECTING TO THE SERVER";
}
?>