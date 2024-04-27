<?php
error_reporting(0);
session_start();
 include('config.php');
 
    $Admin_ID = $_POST["Admin_ID"];  
    $userpassword = $_POST["Password"];  
   	$getAdmin_ID = "NULL";
  	$getuserpassword = "NULL";


	$sql = "SELECT * from cuisine_menu_list";

	if ($result = mysqli_query($conn, $sql)) 
	{
	    $rowcount = mysqli_num_rows( $result );
	}
	 
	$dishid = $rowcount+2;

$sql = "INSERT INTO cuisine_menu_list (Dish_ID, Dish_Name, Dish_Type,VegorNonveg)
	VALUES ('$dishid','$_POST[dishname]','$_POST[DishType]','$_POST[VegorNonveg]')";


if ($conn->query($sql) === TRUE) 
{
	echo'
	<script>
	  confirm("Cuisin added successfully")
	</script>';
} 
else 
{
	echo'
	<script>
	
	 confirm("Cuisin Already Exits.")
	
	</script>';
}

$conn->close();
?>