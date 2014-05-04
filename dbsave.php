<?php
    if(isset($_POST) && ! empty($_POST))
    {

$con=mysqli_connect("localhost","root","tester11","yammcur");

$create_trip = "INSERT INTO trip (budget)  VALUES (".$_POST['budget'].")";
/*var_dump($create_trip);



var_dump();*/


mysqli_query($con, $create_trip);
$trip_id = $con->insert_id;

var_dump($trip_id);

/*if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}else{
	echo 'true';
}*/

foreach($_POST['active'] as $k=>$active)
{
    if($active){
    	$save_employees = "INSERT INTO users (id_yammer, yammer_email)  VALUES (".$_POST['id'][$k].",".$_POST['email'][$k].")";

    	mysqli_query($con, $save_employees);

    	$trip_employees = "INSERT INTO trip_users (id_trip, id_user)  VALUES (".$trip_id.",".$_POST['id'][$k].")";

    	mysqli_query($con, $trip_employees);


        echo $_POST['id'][$k];
        echo $_POST['email'][$k];
    } 
}

}

?>