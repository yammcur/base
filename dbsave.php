<?php
    if(isset($_POST) && ! empty($_POST))
    {

$con=mysqli_connect("localhost","root","tester11","yammcur");

$create_trip = "INSERT INTO trip (budget)  VALUES (".$_POST['budget'].")";


mysqli_query($con, $create_trip);
$trip_id = $con->insert_id;

foreach($_POST['id'] as $k=>$id)
{

    if(isset($_POST['active'][$id])){
    	$save_employees = "INSERT INTO users (id_yammer, yammer_email)  VALUES ('".$_POST['id'][$k]."','".$_POST['email'][$k]."')";

    	mysqli_query($con, $save_employees);

    	$trip_employees = "INSERT INTO trip_users (id_trip, id_user)  VALUES ('".$trip_id."','".$_POST['id'][$k]."')";

    	mysqli_query($con, $trip_employees);

    } 
}




header('Location: http://yammcur.com/main.php');
exit;

}

?>