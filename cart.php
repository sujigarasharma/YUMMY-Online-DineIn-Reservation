<?php
  session_start();
  $user_email_id=$_SESSION['email_id'];
  error_reporting(0);
 echo'
 <!DOCTYPE html>
          <html lang="en">
             <head><title>
                  Book your hotel seats from Home.Book from Yummy.com</title>
                  <link rel="stylesheet" href="CSS/payment_style.css">
                  <link rel="stylesheet" href="CSS/hotel_style.css">
                  <link rel="stylesheet" href="CSS/Cart.css">
                  <link rel="stylesheet" type="text/css" href="CSS/headstyle.css">
                  <link rel="stylesheet" type="text/css" href="CSS/swal_alert.css">
                  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                   <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
                   <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
             </head>
             <body>
             <div id="body1">
             <input type="button" value="Back" id="back" onclick=back() class="button">
                 <img src="Image/logo.png" name="logo" id="logo">
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
                           <button class="btn-1"  onclick=btn_4()>
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
              function btn_4(){
               window.open("profile.php","_parent");
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
                <fieldset class="fieldset_2" style="width:50vw;height:42vw;margin-top:0.8vw">
                <h3 class="Sub_total" style="margin-left:-44vw;font-size:2vw">Cart</h3><hr style="margin-top:-1.25vw;width:47.5vw">';
                $con=mysqli_connect("localhost","root","","yummy");
                $conn=mysqli_connect("localhost","root","","restaurant");
                $cart_result= mysqli_query($con,"SELECT * FROM `customer_cart` WHERE `customer_email` = '$user_email_id'");
                $total_rows=mysqli_num_rows($cart_result);
                if($total_rows<=0){
                 echo  '<script type="text/javascript" language="javascript">  
                        
                     </script>'; 
                }
                else{
                  echo'<div id="cart_table_row" style="margin-top:-1.5vw">
                  <fieldset class="field_5" >';                        
                       $cart_result= mysqli_query($con,"SELECT * FROM `customer_cart` WHERE `customer_email` = '$user_email_id'");
                       $total_rows=mysqli_num_rows($cart_result);
                       if ( $total_rows> 0) { 
                          while($row=mysqli_fetch_array($cart_result)){
                            $hotel_name_cart=$row['Dish_hotel_name'];
                            $hotel_name_cart_= str_replace('_', ' ', $hotel_name_cart);
                          }
                       }
                       $cart_result= mysqli_query($conn,"SELECT * FROM `restaurant_details` WHERE `Hotel_name` = '$hotel_name_cart_'");
                       while($row=mysqli_fetch_array($cart_result)){

                             echo'
                                  <table>
                                      <tr>
                                         <td><img src="data:image;base64,'.$row["Hotel_Image"].'" class="hotel_img_" style="border-radius:0.5vw;margin-top:.25vw"></td>
                                         <td><h2 class="cart_title_new" style="font-size:1.45vw">'.$hotel_name_cart_.'</h2></td>
                                      </tr>
                                  </table>
                             ';
                       }
                }
               if($total_rows>0){
              echo'</fieldset>
                  <div class="fieldset_3" style="height:15vw;width:47.5vw">';
                  echo'<h4 class="hotel_name_cart">To <span class="hotel_name_color">'. $hotel_name_cart.'</span></h4>
                  <h3 class="total_cart_item">'.$total_rows.' ITEMS</h3>
                  <table class="table_cart">';
                  $cart_result= mysqli_query($con,"SELECT * FROM `customer_cart` WHERE `customer_email` = '$user_email_id'");
                  $total_rows=mysqli_num_rows($cart_result);
                  if ( $total_rows> 0) { 
                     $i=1;
                     $total_dish_price=0;
                     while($row=mysqli_fetch_array($cart_result)){
                       $Payment=$row['Payment'];
                        $quantity=$row['dish_quantity'];
                        $dish_price=$quantity*$row['Dish_price'];
                            echo'    
                                 <form action="" method="POST">
                                     <tr class="cart_row">                                     
                                        <td style="width:9.5vw;"><div style="display:flex;"><img src="Image/Veg-Symbol.webp" class="food_safely_cart"><h3 class="dish_name">'.$row['Dish_name'].'</h3> </div></td>
                                        <td>
                                            <div class="btn_border" style="margin-left:1vw;border:none"><button class="sub_cart_item" name="subract_btn'.$i.'">-</button><span class="total_items">'.$quantity.'</span><button class="add_cart_item" name="add_btn'.$i.'">+</button><h3 class="Dish_price">&#8377;'.$dish_price.'</h3></div>
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
                  $total_dicount=0;
                  if($total_rows>=3){
                     $total_dicount=80;
                  }
                  else if($total_rows>=6 && $total_rows<=10){
                    $total_dicount=100;
                  }
                  else if($total_rows>=11 && $total_rows<=20){
                    $total_dicount=120;
                  }
                  else if($total_rows>=21){
                    $total_dicount=150;
                  }
                  $tax=30;
                  $total_payment=$total_dish_price;
                  $total_payment-=$total_dicount;
                  $total_payment+=$tax;
                
                  echo'
                  </table>                           
                  </div>
                  </table>
                  <table class="table_cart">
                     <tr>
                        <td colspan=2><h3 class="Sub_total">Bill Details</h3></td>
                     </tr>
                     <tr>
                        <td colspan=2><hr class="hr_line"></td>
                     </tr>
                     <tr>
                        <td><span class="bil_details">Item Total</span></td>
                        <td><span style="margin-left:5vw;" class="bil_details">&#8377;'.$total_dish_price.'.00</span></td>
                     </tr>
                     <tr>
                        <td><span class="bil_details1">Item Discount</span></td>
                        <td><span style="margin-left:5vw; display: block;" class="bil_details1">&#8377;'.$total_dicount.'.00</span></td>
                     </tr>
                     <tr>
                        <td><span class="bil_details1">Taxes and Charges</span></td>
                        <td><span style="margin-left:5vw; display: block;" class="bil_details1">&#8377;'.$tax.'.00</span></td>
                     </tr>
                     <tr>
                        <td colspan=2><hr class="hr_line2"></td>
                     </tr>
                     <tr>
                        <td><h3 class="Sub_total" style="margin-left:1vw; display: block;">TO PAY</h3></td>
                        <td><h3 class="Sub_total" style="margin-left:5vw; display: block;">&#8377;'.$total_payment.'.00</h3></td>
                     </tr>
                     <tr>
                        <td colspan=2>
                           <button class="check_out" name="button1" onclick="checkpage()" style="width:8vw;margin-top:-.5vw;margin-left:10vw">PAY</button>
                         </td>
                     </tr>
                  </table>';
                  }
                  else{
                     echo'<h3 id="cartemptystyle">Cart is Empty</h3>';
                  }
                  echo' 
             </fieldset>
             </center>
             </body>
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
   </html>';
   ?>