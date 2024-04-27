<?php
error_reporting(0);
  include('Restaurant/config.php');
  session_start();
  $user_email_id=$_SESSION['email_id'];
  $hotel_name_=$_SESSION['hotel_name'];
  $hotel_name = str_replace('_', ' ', $hotel_name_);
  echo'
  <!DOCTYPE html>
          <html lang="en">
             <head>
                 <title></title>
                 <link rel="stylesheet" href="CSS/hotel_style.css">
                 <link rel="stylesheet" type="text/css" href="CSS/headstyle.css">
                 <link rel="stylesheet" type="text/css" href="CSS/swal_alert.css">
                 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                 <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
                 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                 <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
                 <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
                 <script>
var x = 0;
$(document).ready(function(){
  $("div").scroll(function(){
  });
});
</script>
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
                           <button class="btn-1" onclick=btn_4()>
                                <img src="Image/user.png" name="user" id="user"/>
                                <h3 class="image_relative" id="sub_title2">Profile</h3>
                           </button>
                       </td>
                    </tr>
                 </table>
              </div>
              <script>
              function back(){
                   history.go(-2);
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
             function btn_4(){
               window.open("profile.php","_parent");
             }

           function btn_3(){
               window.open("cart.php","_parent");
               }
            </script>
               <fieldset class="field_1"  style="margin-top:0.5vw;">              
                  <div style="display:flex;margin-left:27.5vw;">';
                  $sql="SELECT * FROM `restaurant_details` WHERE `Hotel_name`='$hotel_name'";
                  $result = mysqli_query($conn,$sql);
                  if (mysqli_num_rows($result) > 0) {
                     while($row = mysqli_fetch_array($result)) {
                          $total_rating=$row['Hotel_rating'];
                       echo'<img  src="data:image/jpeg;base64,'.$row["Hotel_Image"].'" class="hotel_img_size">
                       <table class="table_">
                          <tr>
                             <td class="title_row"><h1 class="hotel_name">'.$row['Hotel_name'].'</h1></td>
                          </tr>
                          <tr>
                             <td> <h3 class="hotel_loction">'.$row['Location'].'</h3></td>
                          </tr>
                          <tr>
                             <td>
                                 <div style="display:flex;">';
                                   for($i=0;$i<$total_rating;$i++){
                                     echo'<span id="hotel_star_rating" class="fa fa-star checked"></span>';
                                   }
                                     echo'&nbsp;&nbsp; 
                                     <span class="total_rating">'.$total_rating.'</span><small>/5</small>    
                                     <span class="dot_span">&#8739;</span> 
                                     <span Class="timming">
                                            Timing : '.$row['Opening_timing'].' AM - '.$row['Closing_timing'].' PM
                                     </span>                           
                                 </div>
                             </td>
                          </tr>
                       </table>';
                     }
                  }
                       echo'
                  </div>           
               </fieldset>
               <fieldset class="field_3">
                      <form method="POST" action="">
                            <center>
                                   <table  class="table_field">
                                       <tr>
                                          <td class="table_row_1"><input type="text" name="dish_name_search" class="softbox" placeholder="Search for dishes..." required></td>
                                          <td class="table_row_4"><button type="submit" name="submit" class="softbtn"><i class="fa fa-search"></i></button></td>                                        
                                       </tr>
                                   </table>     
                            </center>       
                      </form>
               </fieldset>
               <h2 class="dishe_cusine_type" id="hi"></h2>
         <div style="display:flex;">
               <div class="div_hotel_dishes">
               <div id="main_food_menu">
               ';
               $hotal_name_lower=strtolower($hotel_name_);
               $sql="SELECT * FROM $hotal_name_lower GROUP BY (`Cuisne_type`) HAVING COUNT(*)>=1;";
               $result=mysqli_query($conn,$sql);
            
               if (mysqli_num_rows($result) > 0) {
                  while($row = mysqli_fetch_array($result)) {
                     $dish_type=$row['Cuisne_type'];
                     echo'<h2 class="dishe_cusine_type">'.$dish_type.'</h2>';
                     $dish_food_result=mysqli_query($conn,"SELECT * FROM $hotal_name_lower WHERE `Cuisne_type`='$dish_type'"); 
                     if (mysqli_num_rows($dish_food_result) > 0) {  
                        $i=1;
                        while($row = mysqli_fetch_array($dish_food_result)) {
                           echo'<form action="" method="POST"><table class="table_field_dishe">
                           <tr>
                              <td colspan="2"><img src="Image/Veg-Symbol.webp" class="food_safely"></td>
                              <td rowspan="3">
                              <img src="data:image/jpeg;base64,'.$row["Dish_Image"].'" class="dishe_image"/>
                                  <button class="dishe_add" id="submit'.$i.'" name="submit'.$i.'">ADD</button>
                              </td> 
                           </tr>
                           <tr>
                             <td class="td_width"><h4 class="dishe_name">'.$row["Dish_name"].'</h4></td>
                           </tr> 
                           <tr>
                             <td class="td_width">
                                   <h4 class="dishe_price">&#8377;'.$row["Dish_Price"].'</h4>
                                   <input type="hidden" name="dish_name" value="'.$row["Dish_name"].'"/>
                                   <input type="hidden" name="dish_Price" value="'.$row["Dish_Price"].'"/>
                             </td>
                           </tr> 
                        </table>  
                        <hr class="down_border_line">  
                        </form>                 
                  ';

                       $con=mysqli_connect("localhost","root","","yummy");
                       $payment_id= mysqli_query($con,"SELECT * FROM `customer_cart` WHERE `customer_email` = '$user_email_id'");   
                       while($row = mysqli_fetch_array($payment_id)) {
                          $payment_=$row['Payment'];
                       }
                          $PAY_ID=$payment_;           
                       if(isset($_POST['submit'.$i.''])){
                            $dish_cart_result= mysqli_query($con,"SELECT * FROM `customer_cart` WHERE `customer_email` = '$user_email_id'");
                           

                            while($row = mysqli_fetch_array($dish_cart_result)) {
                               $hotel_name_db=$row['Dish_hotel_name'];
                            }
                           if( $hotel_name_== $hotel_name_db){
                              $regenerateNumber = true;
                              do {
                                  $regNum      = rand(10000,99999);
                                  $booking_ID="CRT".$regNum;
                                  $checkRegNum = "SELECT * FROM `customer_cart` WHERE `Cart_ID` = '$booking_ID'";
                                  $result      = mysqli_query($con,$checkRegNum);
                                 
                                  if (mysqli_num_rows($result) == 0) {
                                      $regenerateNumber = false;
                                  }
                              } while ($regenerateNumber);
      
                                $dishname=$_POST['dish_name'];
                                $dish_Price=$_POST['dish_Price'];
                                $dish_cart_result= mysqli_query($con,"SELECT * FROM `customer_cart` WHERE `customer_email` = '$user_email_id' AND `Dish_name`='$dishname'");
                                      if (mysqli_num_rows($dish_cart_result) == 0) {
                                          $sql="INSERT INTO `customer_cart`(`Payment`,`Cart_ID`, `customer_email`, `Dish_hotel_name`, `Dish_name`, `Dish_price`,`dish_quantity`) VALUES ('$PAY_ID','$booking_ID','$user_email_id','$hotel_name_','$dishname','$dish_Price','1')";
                                          if(mysqli_query($con,$sql)){
                                             echo  '<script type="text/javascript" language="javascript">
                                               location.href=location.href; 
                                          </script>'; 
                                          }
                                       }
                                       else{
                                          while($row = mysqli_fetch_array($dish_cart_result)) {
                                            $number_of_dish=$row['dish_quantity'];
                                            $number_of_dish+=1;
                                            $sql="UPDATE `customer_cart` SET `dish_quantity`='$number_of_dish' WHERE `customer_email` = '$user_email_id' AND `Dish_name`='$dishname'";
                                            if(mysqli_query($con,$sql)){
                                             echo  '<script type="text/javascript" language="javascript">
                                               location.href=location.href; 
                                          </script>'; 
                                             }
                                          }
                                       }
                           }
                           else{
                              if(mysqli_query($con,"DELETE FROM `customer_cart` WHERE `customer_email` = '$user_email_id'")){
                        $regenerateNumber = true;
                        do {
                            $regNum      = rand(10000,99999);
                            $PAY_ID="PAY".$regNum;
                            $checkRegNum = "SELECT * FROM `customer_cart` WHERE `Payment` = '$PAY_ID'";
                            $result      = mysqli_query($con,$checkRegNum);
                            if (mysqli_num_rows($result) == 0) {
                                $regenerateNumber = false;
                            }
                        } while ($regenerateNumber);

                                 $regenerateNumber = true;
                              do {
                                  $regNum      = rand(10000,99999);
                                  $booking_ID="CRT".$regNum;
                                  $checkRegNum = "SELECT * FROM `customer_cart` WHERE `Cart_ID` = '$booking_ID'";
                                  $result      = mysqli_query($con,$checkRegNum);
                                 
                                  if (mysqli_num_rows($result) == 0) {
                                      $regenerateNumber = false;
                                  }
                              } while ($regenerateNumber);
      
                                $dishname=$_POST['dish_name'];
                                $dish_Price=$_POST['dish_Price'];
                                $dish_cart_result= mysqli_query($con,"SELECT * FROM `customer_cart` WHERE `customer_email` = '$user_email_id' AND `Dish_name`='$dishname'");
                                      if (mysqli_num_rows($dish_cart_result) == 0) {
                                          $sql="INSERT INTO `customer_cart`(`Payment`,`Cart_ID`, `customer_email`, `Dish_hotel_name`, `Dish_name`, `Dish_price`,`dish_quantity`) VALUES ('$PAY_ID','$booking_ID','$user_email_id','$hotel_name_','$dishname','$dish_Price','1')";
                                          if(mysqli_query($con,$sql)){
                                             echo  '<script type="text/javascript" language="javascript">
                                               location.href=location.href; 
                                          </script>'; 
                                          }
                                       }
                                       else{
                                          while($row = mysqli_fetch_array($dish_cart_result)) {
                                            $number_of_dish=$row['dish_quantity'];
                                            $number_of_dish+=1;
                                            $sql="UPDATE `customer_cart` SET `dish_quantity`='$number_of_dish' WHERE `customer_email` = '$user_email_id' AND `Dish_name`='$dishname'";
                                            if(mysqli_query($con,$sql)){
                                             echo  '<script type="text/javascript" language="javascript">
                                               location.href=location.href; 
                                          </script>'; 
                                             }
                                          }
                                       }
                              }                   
                           }                        
                       }
                        $i++;}
                     }  
                  }
               }
               echo'</div>';
               if(isset($_POST['submit'])){
                  echo '<script type="text/javascript" language="javascript">
                             document.getElementById("main_food_menu").style.display = "none";
                     </script>';
                     $dishe_name_entered=$_POST['dish_name_search'];
                      $sql=mysqli_query($conn,"SELECT * FROM $hotal_name_lower WHERE `Dish_name`='$dishe_name_entered'");
                      if (mysqli_num_rows($sql) > 0) {  
                        while($row = mysqli_fetch_array($sql)) {
                           echo'<form action="" method="POST"><table class="table_field_dishe">
                           <tr>
                              <td colspan="2"><img src="Image/Veg-Symbol.webp" class="food_safely"></td>
                              <td rowspan="3">
                              <img src="data:image/jpeg;base64,'.$row["Dish_Image"].'" class="dishe_image"/>
                                  <button class="dishe_add" id="submit'.$i.'" name="submit'.$i.'">ADD</button>
                              </td> 
                           </tr>
                           <tr>
                             <td class="td_width"><h4 class="dishe_name">'.$row["Dish_name"].'</h4></td>
                           </tr> 
                           <tr>
                             <td class="td_width">
                                   <h4 class="dishe_price">&#8377;'.$row["Dish_Price"].'</h4>
                                   <input type="hidden" name="dish_name" value="'.$row["Dish_name"].'"/>
                                   <input type="hidden" name="dish_Price" value="'.$row["Dish_Price"].'"/>
                             </td>
                           </tr> 
                        </table>  
                        <hr class="down_border_line">  
                        </form>                 
                  ';

                       $con=mysqli_connect("localhost","root","","yummy");
                       if(isset($_POST['submit'.$i.''])){
                            $dish_cart_result= mysqli_query($con,"SELECT * FROM `customer_cart` WHERE `customer_email` = '$user_email_id'");
                            while($row = mysqli_fetch_array($dish_cart_result)) {
                               $hotel_name_db=$row['Dish_hotel_name'];
                            }
                           if( $hotel_name_==$hotel_name_db){
                              $regenerateNumber = true;
                              do {
                                  $regNum      = rand(10000,99999);
                                  $booking_ID="CRT".$regNum;
                                  $checkRegNum = "SELECT * FROM `customer_cart` WHERE `Cart_ID` = '$booking_ID'";
                                  $result      = mysqli_query($con,$checkRegNum);
                                 
                                  if (mysqli_num_rows($result) == 0) {
                                      $regenerateNumber = false;
                                  }
                              } while ($regenerateNumber);
      
                                $dishname=$_POST['dish_name'];
                                $dish_Price=$_POST['dish_Price'];
                                $dish_cart_result= mysqli_query($con,"SELECT * FROM `customer_cart` WHERE `customer_email` = '$user_email_id' AND `Dish_name`='$dishname'");
                                      if (mysqli_num_rows($dish_cart_result) == 0) {
                                          $sql="INSERT INTO `customer_cart`(`Payment`,`Cart_ID`, `customer_email`, `Dish_hotel_name`, `Dish_name`, `Dish_price`,`dish_quantity`) VALUES ('$PAY_ID','$booking_ID','$user_email_id','$hotel_name_','$dishname','$dish_Price','1')";
                                          if(mysqli_query($con,$sql)){
                                             echo  '<script type="text/javascript" language="javascript">
                                               location.href=location.href; 
                                          </script>'; 
                                          }
                                       }
                                       else{
                                          while($row = mysqli_fetch_array($dish_cart_result)) {
                                            $number_of_dish=$row['dish_quantity'];
                                            $number_of_dish+=1;
                                            $sql="UPDATE `customer_cart` SET `dish_quantity`='$number_of_dish' WHERE `customer_email` = '$user_email_id' AND `Dish_name`='$dishname'";
                                            if(mysqli_query($con,$sql)){
                                             echo  '<script type="text/javascript" language="javascript">
                                               location.href=location.href; 
                                          </script>'; 
                                             }
                                          }
                                       }
                           }
                           else{
                              if(mysqli_query($con,"DELETE FROM `customer_cart` WHERE `customer_email` = '$user_email_id'")){
                                 $regenerateNumber = true;
                              do {
                                  $regNum      = rand(10000,99999);
                                  $booking_ID="CRT".$regNum;
                                  $checkRegNum = "SELECT * FROM `customer_cart` WHERE `Cart_ID` = '$booking_ID'";
                                  $result      = mysqli_query($con,$checkRegNum);
                                 
                                  if (mysqli_num_rows($result) == 0) {
                                      $regenerateNumber = false;
                                  }
                              } while ($regenerateNumber);
      
                                $dishname=$_POST['dish_name'];
                                $dish_Price=$_POST['dish_Price'];
                                $dish_cart_result= mysqli_query($con,"SELECT * FROM `customer_cart` WHERE `customer_email` = '$user_email_id' AND `Dish_name`='$dishname'");
                                      if (mysqli_num_rows($dish_cart_result) == 0) {
                                          $sql="INSERT INTO `customer_cart`(`Payment`,`Cart_ID`,`customer_email`, `Dish_hotel_name`, `Dish_name`, `Dish_price`,`dish_quantity`) VALUES ('$PAY_ID','$booking_ID','$user_email_id','$hotel_name_','$dishname','$dish_Price','1')";
                                          if(mysqli_query($con,$sql)){
                                             echo  '<script type="text/javascript" language="javascript">
                                               location.href=location.href; 
                                          </script>'; 
                                          }
                                       }
                                       else{
                                          while($row = mysqli_fetch_array($dish_cart_result)) {
                                            $number_of_dish=$row['dish_quantity'];
                                            $number_of_dish+=1;
                                            $sql="UPDATE `customer_cart` SET `dish_quantity`='$number_of_dish' WHERE `customer_email` = '$user_email_id' AND `Dish_name`='$dishname'";
                                            if(mysqli_query($con,$sql)){
                                             echo  '<script type="text/javascript" language="javascript">
                                               location.href=location.href; 
                                          </script>'; 
                                             }
                                          }
                                       }
                              }                   
                           }                        
                       }
                        $i++;
                        }
                        
                      }
                      else{
                        $cuisne_type=strtolower($dishe_name_entered);
                        $cuisne_type=ucfirst($cuisne_type);
                        $sql=mysqli_query($conn,"SELECT * FROM $hotal_name_lower WHERE `Cuisne_type`='$cuisne_type'");
                        if (mysqli_num_rows($sql) > 0) {  

                          echo' <h2 class="dishe_cusine_type">'.$cuisne_type.'</h2>';
                          while($row = mysqli_fetch_array($sql)) {
                           echo'<form action="" method="POST"><table class="table_field_dishe">
                           <tr>
                              <td colspan="2"><img src="Image/Veg-Symbol.webp" class="food_safely"></td>
                              <td rowspan="3">
                              <img src="data:image/jpeg;base64,'.$row["Dish_Image"].'" class="dishe_image"/>
                                  <button class="dishe_add" id="submit'.$i.'" name="submit'.$i.'">ADD</button>
                              </td> 
                           </tr>
                           <tr>
                             <td class="td_width"><h4 class="dishe_name">'.$row["Dish_name"].'</h4></td>
                           </tr> 
                           <tr>
                             <td class="td_width">
                                   <h4 class="dishe_price">&#8377;'.$row["Dish_Price"].'</h4>
                                   <input type="hidden" name="dish_name" value="'.$row["Dish_name"].'"/>
                                   <input type="hidden" name="dish_Price" value="'.$row["Dish_Price"].'"/>
                             </td>
                           </tr> 
                        </table>  
                        <hr class="down_border_line">  
                        </form>                 
                  ';

                       $con=mysqli_connect("localhost","root","","yummy");
                       if(isset($_POST['submit'.$i.''])){
                            $dish_cart_result= mysqli_query($con,"SELECT * FROM `customer_cart` WHERE `customer_email` = '$user_email_id'");
                            while($row = mysqli_fetch_array($dish_cart_result)) {
                               $hotel_name_db=$row['Dish_hotel_name'];
                            }
                           if( $hotel_name_==$hotel_name_db){
                              $regenerateNumber = true;
                              do {
                                  $regNum      = rand(10000,99999);
                                  $booking_ID="CRT".$regNum;
                                  $checkRegNum = "SELECT * FROM `customer_cart` WHERE `Cart_ID` = '$booking_ID'";
                                  $result      = mysqli_query($con,$checkRegNum);
                                 
                                  if (mysqli_num_rows($result) == 0) {
                                      $regenerateNumber = false;
                                  }
                              } while ($regenerateNumber);
      
                                $dishname=$_POST['dish_name'];
                                $dish_Price=$_POST['dish_Price'];
                                $dish_cart_result= mysqli_query($con,"SELECT * FROM `customer_cart` WHERE `customer_email` = '$user_email_id' AND `Dish_name`='$dishname'");
                                      if (mysqli_num_rows($dish_cart_result) == 0) {
                                          $sql="INSERT INTO `customer_cart`(`Payment`,`Cart_ID`, `customer_email`, `Dish_hotel_name`, `Dish_name`, `Dish_price`,`dish_quantity`) VALUES ('$PAY_ID','$booking_ID','$user_email_id','$hotel_name_','$dishname','$dish_Price','1')";
                                          if(mysqli_query($con,$sql)){
                                             echo  '<script type="text/javascript" language="javascript">
                                               location.href=location.href; 
                                          </script>'; 
                                          }
                                       }
                                       else{
                                          while($row = mysqli_fetch_array($dish_cart_result)) {
                                            $number_of_dish=$row['dish_quantity'];
                                            $number_of_dish+=1;
                                            $sql="UPDATE `customer_cart` SET `dish_quantity`='$number_of_dish' WHERE `customer_email` = '$user_email_id' AND `Dish_name`='$dishname'";
                                            if(mysqli_query($con,$sql)){
                                             echo  '<script type="text/javascript" language="javascript">
                                               location.href=location.href; 
                                          </script>'; 
                                             }
                                          }
                                       }
                           }
                           else{
                              if(mysqli_query($con,"DELETE FROM `customer_cart` WHERE `customer_email` = '$user_email_id'")){
                                 $regenerateNumber = true;
                              do {
                                  $regNum      = rand(10000,99999);
                                  $booking_ID="CRT".$regNum;
                                  $checkRegNum = "SELECT * FROM `customer_cart` WHERE `Cart_ID` = '$booking_ID'";
                                  $result      = mysqli_query($con,$checkRegNum);
                                 
                                  if (mysqli_num_rows($result) == 0) {
                                      $regenerateNumber = false;
                                  }
                              } while ($regenerateNumber);
      
                                $dishname=$_POST['dish_name'];
                                $dish_Price=$_POST['dish_Price'];
                                $dish_cart_result= mysqli_query($con,"SELECT * FROM `customer_cart` WHERE `customer_email` = '$user_email_id' AND `Dish_name`='$dishname'");
                                      if (mysqli_num_rows($dish_cart_result) == 0) {
                                          $sql="INSERT INTO `customer_cart`(`Payment`,`Cart_ID`, `customer_email`, `Dish_hotel_name`, `Dish_name`, `Dish_price`,`dish_quantity`) VALUES ('$PAY_ID','$booking_ID','$user_email_id','$hotel_name_','$dishname','$dish_Price','1')";
                                          if(mysqli_query($con,$sql)){
                                             echo  '<script type="text/javascript" language="javascript">
                                               location.href=location.href; 
                                          </script>'; 
                                          }
                                       }
                                       else{
                                          while($row = mysqli_fetch_array($dish_cart_result)) {
                                            $number_of_dish=$row['dish_quantity'];
                                            $number_of_dish+=1;
                                            $sql="UPDATE `customer_cart` SET `dish_quantity`='$number_of_dish' WHERE `customer_email` = '$user_email_id' AND `Dish_name`='$dishname'";
                                            if(mysqli_query($con,$sql)){
                                             echo  '<script type="text/javascript" language="javascript">
                                               location.href=location.href; 
                                          </script>'; 
                                             }
                                          }
                                       }
                              }                   
                           }                        
                       }
                        $i++;
                          }                          
                        }
                        else{
                           echo'
                               <h3 class="back">Oops '.$cuisne_type.' Dish is unavaliable..... &#128533;</h3>
                               <button class="back_btn" onclick=back()>Back</button>
                           ';
                           echo'
                             <script>
                               function back(){
                                    location.href="http://localhost/Project_yummy/Hotel_main_page.php";
                               }
                             </script>
                           ';
                        }
                      
                     }
                 }
          echo'
          </div>';
          $cart_result= mysqli_query($con,"SELECT * FROM `customer_cart` WHERE `customer_email` = '$user_email_id'");
          $total_rows=mysqli_num_rows($cart_result);
          if ( $total_rows>0) { 
   echo'<div id="cart_table_row">
          <fieldset class="field_5" >
               <legend><h2 class="cart_title"  >Cart</h2></legend>';

               $cart_result= mysqli_query($con,"SELECT * FROM `customer_cart` WHERE `customer_email` = '$user_email_id'");
               $total_rows=mysqli_num_rows($cart_result);
               if ( $total_rows> 0) { 
                  while($row=mysqli_fetch_array($cart_result)){
                    $hotel_name_cart=$row['Dish_hotel_name'];
                    $hotel_name_cart= str_replace('_', ' ', $hotel_name_cart);
                  }
               }
               echo'<h4 class="hotel_name_cart">To <span class="hotel_name_color">'. $hotel_name_cart.'</span></h4>
               <h3 class="total_cart_item">'.$total_rows.' ITEMS</h3>
               <h3 class="welcome_title">WELCOME50 eligible items</h3>
               <table class="table_cart">';
               $cart_result= mysqli_query($con,"SELECT * FROM `customer_cart` WHERE `customer_email` = '$user_email_id'");
               $total_rows=mysqli_num_rows($cart_result);
               if ( $total_rows> 0) { 
                  $i=1;
                  $total_dish_price=0;
                  while($row=mysqli_fetch_array($cart_result)){
                     $quantity=$row['dish_quantity'];
                     $dish_price=$quantity*$row['Dish_price'];
                         echo'    
                              <form action="" method="POST">
                                  <tr class="cart_row">                                     
                                     <td style="width:9.5vw;"><div style="display:flex;"><img src="Image/Veg-Symbol.webp" class="food_safely_cart"><h3 class="dish_name">'.$row['Dish_name'].'</h3> </div></td>
                                     <td>
                                         <div class="btn_border" style="margin-left:1vw;"><button class="sub_cart_item" name="subract_btn'.$i.'">-</button><span class="total_items">'.$quantity.'</span><button class="add_cart_item" name="add_btn'.$i.'">+</button><h3 class="Dish_price">&#8377;'.$dish_price.'</h3></div>
                                         <input type="hidden" name="dish_name'.$i.'" value="'.$row['Dish_name'].'"/>
                                         <input type="hidden" name="dish_quantity'.$i.'" value="'.$row['dish_quantity'].'"/>
                                     </td>
                                  </tr>
                              </form>
                           ';                          
                           if(isset($_POST["subract_btn$i"])){
                              $cart_dish_name=$_POST['dish_name'.$i.''];
                              $cart_quantity=$_POST['dish_quantity'.$i.''];
                              $cart_quantity-=1;
                              if($cart_quantity==0){
                                 $sql_delete_row="DELETE FROM `customer_cart` WHERE `customer_email` = '$user_email_id' and`Dish_name`='$cart_dish_name' ";          
                                 if(mysqli_query($con,$sql_delete_row)){
                                    echo  '<script type="text/javascript" language="javascript">
                                               location.href=location.href; 
                                          </script>'; 
                                 }
                              }
                              else{
                                 $sub_cart_dish="UPDATE `customer_cart` SET `dish_quantity`='$cart_quantity' WHERE `customer_email` = '$user_email_id' AND `Dish_name`='$cart_dish_name'";
                                 if(mysqli_query($con,$sub_cart_dish)){
                                    echo  '<script type="text/javascript" language="javascript">
                                               location.href=location.href; 
                                          </script>'; 
                                 }
                              }                            
                           }
                           if(isset($_POST["add_btn$i"])){
                              $cart_dish_name=$_POST['dish_name'.$i.''];
                              $cart_quantity=$_POST['dish_quantity'.$i.''];
                              $cart_quantity+=1;                        
                                 $sub_cart_dish="UPDATE `customer_cart` SET `dish_quantity`='$cart_quantity' WHERE `customer_email` = '$user_email_id' AND `Dish_name`='$cart_dish_name'";
                                 if(mysqli_query($con,$sub_cart_dish)){
                                    echo  '<script type="text/javascript" language="javascript">
                                               location.href=location.href; 
                                          </script>'; 
                                 }
                           }
                           $i++;
                           $total_dish_price+=$dish_price;
                         
                  }

               }
               echo'
               </table>
               <table class="table_cart">
                  <tr class="cart_row">
                       <td style="width:9.5vw;"><div style="display:flex;"><h3 class="Sub_total">Subtotal</h3></div><span class="total_Extra">Extra charges may apply</span></td>
                       <td><h3 class="total_price">&#8377;'.$total_dish_price.'</h3></td>
                  </tr>
               </table>  
                <table class="table_cart">
                  <tr class="cart_row">
                       <td><button class="check_out" onclick="checkpage()">CHECKOUT&#8594;</button></td>
                  </tr>
               </table>         
               <script>
               function checkpage(){
                  Swal.fire({
                     title: "Select you order type?",
                     text: "DINE IN (or) ORDER!",
                     icon: "info",
                     showCancelButton: true,
                     showDenyButton: true,
                     confirmButtonColor: "#3cc5f9 ",
                     cancelButtonColor: "#d33",
                     denyButtonColor:"#e9b826",
                     confirmButtonText: "DINE IN",
                     denyButtonText: "ORDER",
                   }).then((result) => {
                     if (result.isConfirmed) {
                        let datepicker
                        Swal.fire({
                          title: "Please enter departure date",
                          input: "text",
                          inputValue: new Date().toISOString(),
                          stopKeydownPropagation: false,
                          showCancelButton: true,
                          confirmButtonText: "Continue",
                          preConfirm: () => {
                            if (datepicker.getDate() < new Date(new Date().setHours(0, 0, 0, 0))) {
                              Swal.showValidationMessage(`The departure date cant be in the past`)
                            }
                            return datepicker.getDate()
                          },
                          didOpen: () => {
                            datepicker = new Pikaday({ field: Swal.getInput() })
                            setTimeout(() => datepicker.show(), 400) // show calendar after showing animation
                          },
                          didClose: () => {
                            datepicker.destroy()
                          },
                        }).then((play) => {
                           if(play.isConfirmed){
                              Swal.fire({
                                 title: "Please Enter the Time ",
                                 text: "Format - HH:MM:AM/PM",
                                 input:"text",
                                 showCancelButton: true,
                                 confirmButtonText: "Continue"
                              }).then((final)=>{
                                 if(final.isConfirmed){
                                    if(final.value!=""){
                                       document.cookie="Date="+play.value;
                                       document.cookie="Time="+final.value;
                                       window.open("TableBooking.php","_parent");
                                    }
                                    else{
                                       alert("You didnt enter the Time");
                                    }
                                 }
                              })
                           }
                        })
                     }
                     else if (result.isDenied) {
                        swal.fire({
                           title:"Address",
                           text:"Enter your current address with Pincode",
                           input: "textarea",
                           showCancelButton: true,
                           confirmButtonText: "Continue",
                        }).then((result)=>{
                           if(result.isConfirmed){
                              if(result.value!=""){
                                    localStorage.setItem("Address", result.value);';
                                    $_SESSION["favcolor"] = "1";
                                    echo'window.open("payment_page.php","_parent");
                              }
                              else{
                                 alert("Enter valid address");
                              }
                           }
                        })
                     }
                   })
               }
            </script>    
          </fieldset>
          </div>';
            }
          echo'</div>
          </body>
          </html>
  ';
?>