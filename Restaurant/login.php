<?php
session_start();
 include('config.php');
 
    $Hotel_ID = $_POST["hotel_ID"];  
    $userpassword = $_POST["Password"];  
   	$getHotel_ID = "NULL";
  	$getuserpassword = "NULL";
   
	  $sql = "Select Hotel_ID,Password from restaurant_details WHERE Hotel_ID =  '$Hotel_ID'";

	$getuserdata = $conn->query($sql);
	if ($getuserdata->num_rows > 0) {
	  // output data of each row
	  while($row = $getuserdata->fetch_assoc()) 
	  {
		 $getHotel_ID=$row["Hotel_ID"];
		 $getuserpassword=$row["Password"];
	  }
	} 
	else {
    echo'
		<script>
	
    if (confirm("Invalid Hotel_ID"))
		  {
			    history.go(-1);
		  } 
      else{
        history.go(-1);
      }
	
		</script>';	 
	}
 if($getHotel_ID==$Hotel_ID && $getuserpassword!=$userpassword){
    echo'
		<script>
	
		  if (confirm("incorrect Password")) 
		  {
			    history.go(-1);
	   
		  } 
      else{
        history.go(-1);
      }
	
		</script>';
  }
  

	if($getHotel_ID==$Hotel_ID && $getuserpassword==$userpassword)
	{
		
		header("Location: Home_page.html ");
		$_SESSION["Hotel_ID"]=$Hotel_ID;
	}
  else{
      
  }
$conn->close();
?>