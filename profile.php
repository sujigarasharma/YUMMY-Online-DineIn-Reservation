<?php
  session_start();
  include('Restaurant/config.php');
  $user_email_id=$_SESSION['email_id'];
 echo'
 <!DOCTYPE html>
          <html lang="en">
             <head><title>
                  Book your hotel seats from Home.Book from Yummy.com</title>
                  <link rel="stylesheet" href="CSS/payment_style.css">
                  <link rel="stylesheet" href="CSS/hotel_style.css">
                  <link rel="stylesheet" type="text/css" href="CSS/headstyle.css">
                  <link rel="stylesheet" type="text/css" href="CSS/swal_alert.css">
                  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
             </head>
             <body>
             <div id="body1">
             <input type="button" value="Back" id="back" onclick=back() class="button">
                 <a href="http://localhost/Project_yummy/Home_page.php"><img src="Image/logo.png" name="logo" id="logo" ></a>
                 <table style="position: absolute;left:74%;top:2vw;width:25vw">
                    <tr>
                       <td>
                           <button class="btn-1" onclick=btn_1()>
                              <img src="Image/lifesaver.png" name="user" id="user"/>
                              <h3 class="image_relative" id="sub_title1">Help</h3>
                           </button>
                       </td>
                        <td>
                           <button class="btn-1" onclick=btn_2()>
                               <img src="Image/order.png" name="user" id="user"/>
                               <h3 class="image_relative" id="sub_title4">Order</h3>
                           </button>
                       </td>
                        <td>
                           <button class="btn-1" onclick=btn_3()>
                               <img src="Image/shopping-cart.png" name="user" id="user"/>
                               <h3 class="image_relative" id="sub_title3">Cart</h3>
                           </button>
                       </td>
                        <td>
                           <button class="btn-1">
                                <img src="Image/user.png" name="user" id="user"/>
                                <h3 class="image_relative" id="sub_title2">Profile</h3>
                           </button>
                       </td>
                    </tr>
                 </table>
              </div>
              <script>
              function back(){
                history.go(-1);
              }
              function btn_2(){
               window.open("Order_view.php","_parent");
             }
              function btn_1(){
              var str="Contact Number : +91-6301457870\n" +
                 "Mail ID : yummy@gmail.com\n";
                  
         Swal.fire({
           title:"<b>Help & Support</b>",
           html: "<pre>" + str + "</pre>",
           customClass: {
             popup: "format-pre"
           }
         });
             }
           function btn_3(){
               window.open("cart.php","_parent");
               }
            </script>
                <center>
                <fieldset class="fieldset_2" style="width:60vw;height:37.5vw;margin-top:1.75vw">
                <table class="table_1">
                <tr>
                   <td><h1 class="payment_title" style="margin-left:-15vw">MY ACCOUNT</h1></td>
                </tr>
             </table>
             <hr>
             <div  style="display:flex">
                  <div class="payment_selection">
                     <button class="button_1" id="button_1" onclick="debit_Card()">
                         <table class="">
                           <tr>
                               <td><h3 class="debit_card_text">Profile</h3></td>
                           </tr>
                         </table>
                     </button>
                        <button class="button_2" id="button_2" onclick="upi()">
                         <table class="">
                           <tr>
                               <td><h3 class="debit_card_text">Change password</h3></td>
                           </tr>
                         </table>
                     </button>
                     <button class="button_2" id="button_2" onclick="back_1()">
                         <table class="">
                           <tr>
                               <td><h3 class="debit_card_text">Logout</h3></td>
                           </tr>
                         </table>
                     </button>
                  </div>
                  <script>
                    function back_1(){
                        window.open("index.php","_parent");
                    }
                  </script>';
                  $con=mysqli_connect("localhost","root","","yummy");
                  $result = mysqli_query($con,"SELECT * FROM customer_registration_details WHERE EmailID='$user_email_id'");
              
                     while($row = mysqli_fetch_array($result)) {
                         $firstname=$row['Firstname'];
                         $Lastname=$row['Lastname'];
                         $phone_number=$row['phone_number'];
                         $Date_of_birth=$row['Date_of_birth'];
                         $Address=$row['Address'];
                         $Pincode=$row['Pincode'];
                         $EmailID=$row['EmailID'];
                         $User_Password=$row['User_Password'];
                     }
                    
                  echo'<div class="payment_view">
                       <div id="debit_card_details" >
                       <form method="POST" action="">
                         <table class="payment_card_details" style="margin-top:3vw">                           
                            <tr>
                               <td colspan="2">
                                      <label style="margin-left:33.9vw;margin-top:-0.5vw">First name</label> 
                                      <input type="text" name="firstname" id="firstname" class="input" value="'.$firstname.'" required style="margin-top:1vw" disabled>
                               </td>  
                               <td>
                                      <label style="margin-left:53.9vw;margin-top:-0.5vw">Last name</label> 
                                      <input type="text" name="Lastname" id="Lastname" class="input" value="'.$Lastname.'" required style="margin-top:1vw" disabled>
                               </td>                                         
                            </tr>
                             <tr>
                               <td colspan="2">
                                      <label style="margin-left:33.9vw;margin-top:4.2vw">Date of Birth</label>                               
                                      <input type="text" name="DOB" id="DOB" class="input" value="'.$Date_of_birth.'" required style="margin-top:1.7vw"  disabled>
                               </td>  
                               <td>
                                      <label style="margin-left:53.9vw;margin-top:4.2vw">Phone number</label> 
                                      <input type="text" name="Phone_number" id="Phone_number" class="input" value="'.$phone_number.'" required style="margin-top:1.7vw" disabled>
                               </td>                                         
                            </tr>
                               <tr>
                               <td colspan="2">
                                      <label style="margin-left:33.9vw;margin-top:8.6vw">Address</label>      
                                      <input type="text" name="Address" id="Address" class="input" value="'.$Address.'"  required style="margin-top:1.7vw" disabled>                         
                               </td>  
                               <td>
                                      <label style="margin-left:53.9vw;margin-top:8.6vw">Pincode</label> 
                                      <input type="text" name="Pincode" id="Pincode" class="input" value="'.$Pincode.'"  required style="margin-top:1.7vw" disabled>
                               </td>                                         
                            </tr>
                             <tr>
                               <td colspan="2">
                                      <label style="margin-left:33.9vw;margin-top:13.1vw">Email ID</label> 
                                      <input type="text" name="Email_ID" id="Email_ID" class="input" value="'.$EmailID.'" required disabled style="margin-top:1.6vw" value="">
                               </td>  
                               <td>
                                      <label style="margin-left:53.9vw;margin-top:13.1vw">Password</label> 
                                      <input type="password" name="Email_ID" id="Email_ID" class="input" value="'.$User_Password.'" required disabled style="margin-top:1.6vw" value="">
                               </td>                                         
                            </tr>
                            <tr>
                              <td colspan="3">
                                  <div style="display:flex">
                                     <button class="check_out" name="button2" id="btn1" onclick="edit()" style="width:10vw;margin-left:0vw">Edit</button>
                                     <button class="check_out" name="button1" style="width:10vw;margin-left:20vw;">Save</button>
                                  </div>
                              </td>
                           </tr>
                           </form>
                         </table>
                        
                       </div>';
               if(isset($_POST['button2'])){
                    echo'
                         <script>                           
                                document.getElementById("firstname").disabled = false;
                                document.getElementById("Lastname").disabled = false;
                                document.getElementById("DOB").disabled = false;
                                document.getElementById("Phone_number").disabled = false;
                                document.getElementById("Address").disabled = false;
                                document.getElementById("Pincode").disabled = false;
                               
                         </script>
                    ';
               }
               if(isset($_POST['button1'])){
               $firstname=$_POST['firstname'];
               $Lastname=$_POST['Lastname'];
               $phone_number=$_POST['Phone_number'];
               $Date_of_birth=$_POST['DOB'];
               $Address=$_POST['Address'];
               $Pincode=$_POST['Pincode'];
                $sql_update="UPDATE `customer_registration_details` 
                SET `Firstname`='$firstname',`Lastname`='$Lastname',`phone_number`='$phone_number',`Date_of_birth`='$Date_of_birth',`Address`='$Address',
                `Pincode`='$Pincode' WHERE EmailID='$user_email_id'";
                if(mysqli_query($con,$sql_update)){
                    echo  '<script type="text/javascript" language="javascript">
                       alert("Successfully updated the profile");
                       location.href=location.href; 
                     </script>'; 
                }
               
                }
                     echo'<div id="UPI_details">
                     <table class="payment_card_details" style="margin-top:4vw">
                     <form method="POST" action="">
                       <tr>
                          <td>
                             <div class="upi_outer">
                                <h2 class="upi_title"></h2>
                             </div>
                          </td>
                       </tr>
                       <tr>
                            <td>
                              <div class="group" id="group_input">      
                                  <input type="text" name="old_password" id="old_password" class="input" >
                                  <label>Enter Current</label>
                              </div>
                            </td>                                           
                       </tr>
                       <tr>
                           <td>
                              <div class="group" id="group_input">      
                                  <input type="text" name="new_password" id="new_password" class="input" >
                                  <label>Enter New Password</label>
                              </div>
                           </td>                                           
                       </tr>
                        <tr>
                          <td>
                               <button class="check_out" name="button3" id="button_upi" >Change</button>
                          </td>
                       </tr>
                       </form>
                     </table>
                       </div> 
                  </div>
             </div>';
              if(isset($_POST['button3'])){
                  $old_password=$_POST['old_password'];
                  $new_password=$_POST['new_password'];
                  if($User_Password==$old_password){

                    $sql_password="UPDATE `customer_registration_details` SET `User_Password`='$new_password' WHERE EmailID='$user_email_id'";
                    if(mysqli_query($con,$sql_password)){
                       echo  '<script type="text/javascript" language="javascript">
                                alert("Successfully password changed");  
                           </script>'; 
                    }
                  }
                  else{
                    echo  '<script type="text/javascript" language="javascript">
                                alert("Old password incorrect");
                                location.href=location.href; 
                           </script>'; 
                  }
              }
                echo'</fieldset>
                </center>
        </body>
        <script>
        function debit_Card(){
          document.getElementById("debit_card_details").style.display = "block";
          document.getElementById("button_1").style.background = "white";
          document.getElementById("button_1").style.color= "black";
          document.getElementById("button_2").style.background = "#edf1f7";
          document.getElementById("button_2").style.color= "rgb(107, 107, 107)";
          document.getElementById("UPI_details").style.display = "none";
         }
         function upi(){
          document.getElementById("debit_card_details").style.display = "none";
          document.getElementById("button_1").style.background = "#edf1f7";
          document.getElementById("button_1").style.color= "rgb(107, 107, 107)";
          document.getElementById("button_2").style.color= "black";
          document.getElementById("button_2").style.background = "white";
          document.getElementById("UPI_details").style.display = "block";
         }
        </script>
    </html>';
?>