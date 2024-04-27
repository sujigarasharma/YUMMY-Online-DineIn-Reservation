<!DOCTYPE html>
<html>
    <head>
        <title>yummy_Sign_up.com</title>
        <link rel="Stylesheet" href="CSS\Registeration_Styling.css">
        <script type = "text/javascript" src="JS/Registration_validation_form.js"></script>  
    </head>
    <body >
        <div>
            <!--yummy logo-->
                       <img src="Image/yummy.gif" id="yummy_logo">
                            <h3 id="logo_caption">It's Now Safe to Crave!</h3>
            <!--Nevigation buttoons-->
        </div>
    <!--Horizontal Line-->
    <hr id="line_1">
<!--middle (mean content)-->
          <fieldset id="Middle_fieldset">
              <img src="Image/plate.png" id="sign_up_logo">
              <h2 id="sign_up_text">Signup</h2>
              <br>
<!--Form start's from Here-->
        <form method="post" action="" name="registration_form" >
            <table  id="table_for_signup_page" >
            <!--Row-1-->
                <tr>
                <!--Coloum 1-->
                     <td>
                         <div class="group">      
                           <input type="text" name="Firstname" id="Firstname" class="input" required >
                           <label>First name</label>
                         </div>
                    </td>
                <!--Coloum 3-->
                    <td>
                         <div class="group">      
                           <input type="text" name="Lastname" id="Lastname" class="input" required>
                           <label>Last name</label>
                         </div>
                    </td>
                </tr>
            <!--Row-2-->
              
            <!--Row-3-->
            <tr>
                <!--Coloum 1-->
                     <td>
                         <div class="group">      
                           <input type="text" name="phone_number" id="phone_number" class="input" required >
                           <label>Phone number</label>
                         </div>
                    </td>                    
                <!--Coloum 3-->
                    <td>
                         <div class="group">      
                           <input type="Date" name="Date_of_birth" value="" id="Date_of_birth" class="input" required >
                           <label>Date of birth</label>
                         </div>
                    </td>
                </tr>
            <!--Row-4-->
                <tr>
                <!--Coloum 1-->
                     <td>
                         <div class="group">      
                           <input type="text" name="Address" id="Address" class="input" required >
                           <label>Address</label>
                         </div>
                    </td>                    
                <!--Coloum 3-->
                    <td>
                         <div class="group">      
                           <input type="text" name="Pincode" id="Pincode" class="input" required >
                           <label>Pincode</label>
                         </div>
                    </td>
                </tr> 
                <tr>
                <!--Coloum 1-->
                     <td colspan="3">
                         <div class="group_email_id">      
                           <input type="text" name="EmailID" id="EmailID_input" class="input" required>
                           <label id="label_email">Emai ID</label>
                         </div>
                    </td>
                </tr>
            <!--Row-4-->
                <tr>
                <!--Coloum 1-->
                     <td>
                         <div class="group_end">      
                           <input type="Password" name="Password" id="Password" class="input" required >
                           <label>Password</label>
                         </div>
                    </td>                    
                <!--Coloum 3-->
                    <td>
                         <div class="group_end" >      
                           <input type="Password" name="Confirm_password" id="Confirm_password" class="input" required >
                           <label>Confirm Password</label>
                         </div>
                    </td>
                </tr>   
                <tr>
                    <td colspan="3"><input type="checkbox" id="teamscondition" required><b>I accept the Teams & Conditions</b></td>
                </tr>
                <tr>
                    <td>
                    <button id="back"  onclick="Function()">Back</button></td>
                   
                    <td><button id="submit_button" name="submit" >Submit</button></td>
                </tr>
            </table>
        </form>        
        </fieldset>
    </body>
    <script>
function Function() {
    history.go(-1);
}
</script>
</html>
<?php
 error_reporting(0);
     if(isset($_POST['submit'])){
         $con=mysqli_connect("localhost","root","","yummy");
         $Firstname=$_POST['Firstname'];
         $Lastname=$_POST['Lastname'];
         $EmailID=$_POST['EmailID'];
         $phone_number=$_POST['phone_number'];
         $Date_of_birth=$_POST['Date_of_birth'];
         $Address=$_POST['Address'];
         $Pincode=$_POST['Pincode'];
         $Password=$_POST['Password'];
         $Confirm_password=$_POST['Confirm_password'];

         $sql="INSERT INTO `customer_registration_details`(`Firstname`, `Lastname`, `phone_number`, `Date_of_birth`, `Address`, `Pincode`, `EmailID`, `User_Password`) 
                                           VALUES ('$Firstname','$Lastname','$phone_number','$Date_of_birth','$Address','$Pincode','$EmailID',' $Password')";
        if(mysqli_query($con,$sql)){
            echo'
            <script>
                 alert("successfully register");
                 location.href="http://localhost/Project_yummy/index.php";
            </script>
          ';
        }
        else{
            echo'
            <script>
                 alert("Email ID already exist");
                 history.go(-1);
            </script>
          ';
        }
     }
     $con->close();
?>