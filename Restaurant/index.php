<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="css/Restaurant_login_page_stylesheet.css">
    <iframe  src = "top.html" scrolling ="no"  width =99.15% style="border:0px; height:5.5vw;position:absolute;top: 1vw;margin-bottom: 12%;"></iframe>
</head>
<body>
    <fieldset id="Middle_fieldset">
        <img src="img/tiffin_restaurant_logo.png" id="Login_logo">
        <h2 id="Login_text">Sign in</h2>
        <form method="post" action="" name="restaurant_login_page">
            <table  id="table_for_login_page">
            <!--Row-1-->
                <tr>
                <!--Coloum 1-->
                     <td >
                         <div class="group">      
                           <input type="text" name="hotel_ID" id="Username" class="input" required >
                           <label>Hotel ID</label>
                         </div>
                    </td>
                </tr>
                <tr>
                    <td><div class="group">      
                        <input type="password" name="Password" id="Password" class="input" required >
                        <label>Password</label>
                      </div>
                    </td>
                </tr>
                <tr>
                    <td id="final_button"> <button id="back">Back</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button name="submit" id="submit_button">Submit</button></td>
                </tr>
    </fieldset>
</body>

</html>

<?php

if(isset($_POST['submit'])){
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
		
		header("Location: Home_page.php ");
		$_SESSION["Hotel_ID"]=$Hotel_ID;
	}
  else{
      
  }
$conn->close();
}

?>