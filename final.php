<?php
session_start();
include "config.php";
include "database.php";
include "billing.php";
//$category_id=$_GET["category_id"];

$num_of_rooms=$_SESSION["num_of_rooms"];  
//print_r($_SESSION); 
$today = date("Y-m-d");
//echo $today;

 /*   $result = mysqli_query($con, "select * from room_details where category_id='".$category_id."' AND (end_date <='".$_SESSION["start_date"]."' OR start_date>='".$_SESSION["end_date"]."')");*/
 $result = mysqli_query($con, "select * from room_details where Type='".$_SESSION["room_type"]."'");
	$fetch = mysqli_fetch_assoc($result);
	$num = mysqli_num_rows($result);
	$prize=$fetch["Prize"];
		//echo "vivek";
		$date1=date_create($_SESSION["start_date"]);
		$date2=date_create($_SESSION["end_date"]);
		//echo $_SESSION["end_date"];

		$days=date_diff($date1,$date2)->days;
		//$total_price=$_SESSION["num_of_rooms"]*$days*$prize;
		//echo $days;
		$obj= new billing;
		echo $obj->Payment_calc($prize,$num_of_rooms,$days);
		//echo $total_price;
	
?>

<?php



?>