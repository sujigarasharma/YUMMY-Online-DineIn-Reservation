<?php
session_start();
 include('config.php');
 
    $Admin_ID = $_POST["Admin_ID"];  
    $userpassword = $_POST["Password"];  
   	$getAdmin_ID = "NULL";
  	$getuserpassword = "NULL";
   
	  $sql = "Select Admin_ID,Password from admin WHERE Admin_ID =  '$Admin_ID'";

	$getuserdata = $conn->query($sql);
	if ($getuserdata->num_rows > 0) {
	  // output data of each row
	  while($row = $getuserdata->fetch_assoc()) 
	  {
		 $getAdmin_ID=$row["Admin_ID"];
		 $getuserpassword=$row["Password"];
	  }
	} 
	else {
    echo'
		<script>
	
    if (confirm("Invalid Admin_ID"))
		  {
			    history.go(-1);
		  } 
      else{
        history.go(-1);
      }
	
		</script>';	 
	}
 if($getAdmin_ID==$Admin_ID && $getuserpassword!=$userpassword){
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
  

	if($getAdmin_ID==$Admin_ID && $getuserpassword==$userpassword)
	{
		
		header("Location: Home_page.html ");
		$_SESSION["Admin_ID"]=$Admin_ID;
	}
  else{
      
  }
$conn->close();
?>