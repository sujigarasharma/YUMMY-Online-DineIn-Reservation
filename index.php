<html>
<head>
	<title>Yummy - Safety Dine in Reservation</title>	
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="CSS/login.css"> 
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 	<script>
 		$(document).ready(function(){
   			$("#panel").ready(function()
 			{
 				setTimeout(function(){  $("#panel").slideUp("slow"); }, 1500);

   		 	});
 	   });
 	</script>
</head>
<body>
<video class = "banner_video" width="250" autoplay muted>
<source src="videos\webbanner.mov" type="video/mp4" />
</video>
<div id="panel">
<br><br><br>
<img class = "logo" src="Image/yummy.gif">
<br><br>
<div class="title1"> It's Now Safe to Crave!</div>
<img class = "loader_img" src="Image/loadingfood.gif">
</div>
    <fieldset id="Middle_fieldset">
        <img src="Image/plate.png" id="Login_logo">
        <h2 id="Login_text">Sign in</h2>
        <form method="post" name="user_login_page">
            <table  id="table_for_login_page">
            <!--Row-1-->
                <tr>
                <!--Coloum 1-->
                     <td >
                         <div class="group">      
                           <input type="email" name="User_ID" id="Username" class="input" required >
                           <label>User ID</label>
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
                   <td id="final_button"><a href = "Registration_page.php" target = "_blank"><input  type = "button"  value = "Sign Up" id="back"></button></a>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	<button id="submit_button" name="submit" >Submit</button></td><form>
                </tr>
    </fieldset>
</body>		
</html>
<?php
session_start();
   if(isset($_POST['submit'])){
    $con=mysqli_connect("localhost","root","","yummy");
      $email_id=$_POST['User_ID'];
      $password=$_POST['Password'];

      echo "<script>console.log('Debug Objects: " . $email_id . "' );</script>";
      echo "<script>console.log('Debug Objects: " . $password . "' );</script>";
     
      $getemail_ID = "NULL";
  	  $getpassword = "NULL";
        $sql = "Select EmailID,User_Password from customer_registration_details WHERE EmailID =  '$email_id'";
        $getuserdata = $con->query($sql);
      if ($getuserdata->num_rows > 0) {
        // output data of each row
        while($row = $getuserdata->fetch_assoc()) 
        {
            $getemail_ID=$row["EmailID"];
            $getpassword=$row["User_Password"];
            echo "<script>console.log('Debug Objects: " . $getemail_ID . "' );</script>";
            echo "<script>console.log('Debug Objects: " . $getpassword . "' );</script>";
        }
      } 
      else {
        echo'
            <script>
        if (confirm("Invalid Email ID"))
              {
                    history.go(-1);
              } 
          else{
            history.go(-1);
          }
            </script>';	 
        }
        if($getemail_ID==$email_id && $getpassword==$password)
          {
              $_SESSION["email_id"]=$email_id;
              echo'
                 <script>           
                    location.href="Home_page.php";
                 </script>
              ';
             
          }
          else if($getemail_ID==$email_id && $getpassword!=$password){
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
          else{}
}
?>