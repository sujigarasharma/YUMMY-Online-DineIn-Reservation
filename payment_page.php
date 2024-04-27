<?php
  session_start();
  $user_email_id=$_SESSION['email_id'];
  $type=$_SESSION["favcolor"];

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
               Swal.fire({
                  title: "Your payment will be canceled",
                  icon: "info",
                  showCancelButton: true,
                  confirmButtonColor: "#3085d6",
                  cancelButtonColor: "#d33",
                  confirmButtonText: "OK",
                }).then((result) => {
                  if (result.isConfirmed) {
                     window.open("http://localhost/Project_yummy/Home_page.php","_parent");
                  }
                })
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
                  <div style="display:flex;margin-top:-3.5vw">
                       <fieldset class="fieldset_1">
                          <table class="table_1">
                             <tr>
                                <td><img src="Image/wallet.png" class="wallet_icon"></td>
                                <td><h1 class="payment_title">Choose payment method</h1></td>
                             </tr>
                          </table>
                          <hr>
                          <div  style="display:flex">
                               <div class="payment_selection">
                                  <button class="button_1" id="button_1" onclick="debit_Card()">
                                      <table class="">
                                        <tr>
                                            <td><img src="Image/credit-card.png" class="debit_card"></td>
                                            <td><h3 class="debit_card_text" >Debit Cards</h3></td>
                                        </tr>
                                      </table>
                                  </button>
                                     <button class="button_2" id="button_2" onclick="upi()">
                                      <table class="">
                                        <tr>
                                            <td><img src="Image/nfc-card.png" class="debit_card"></td>
                                            <td><h3 class="debit_card_text">UPI</h3></td>
                                        </tr>
                                      </table>
                                  </button>
                               </div>
                               <div class="payment_view">
                               <div id="debit_card_details" >
                               <form method="POST" action="">
                                    
                                    <table class="debit_card_details_table" >
                                        <tr>
                                            <td><h3 class="card_title">WE ACCEPT</h3></td> 
                                            <td><img src="Image/visa.png" class="card_types"></td>
                                            <td><img src="Image/maestro.png" class="card_types"></td>
                                            <td><img src="Image/american-express.png" class="card_types"></td>
                                            <td><img src="Image/rupay-logo.png" class="card_types"></td>  
                                        </tr>
                                      </table>
                                      <table class="payment_card_details">
                                        <tr>
                                            <td colspan="2">
                                               <div class="group">      
                                                   <input type="text" name="card_number" id="cardnumber" class="input" required >
                                                   <label>Card number</label>
                                               </div>
                                            </td>                                           
                                        </tr>
                                        <tr>
                                            <td>
                                               <div class="group">      
                                                   <input type="text" name="valid_year" id="valid_year" class="input2" required >
                                                   <label>Valid through(MM/YY)</label>
                                               </div>
                                            </td>
                                           <td>
                                               <div class="group">      
                                                   <input type="text" name="cvv" id="cvv" class="input3" required >
                                                   <label>CVV</label>
                                               </div>
                                            </td>
                                        </tr>
                                        <tr>
                                           <td colspan="2">
                                              <div class="group">      
                                                   <input type="text" name="name_on_card" id="name_on_card" class="input" required >
                                                   <input type="hidden" name="address" id="address" value="" >
                                                   <label>Name on card</label>
                                               </div>
                                           </td>
                                        </tr>
                                         <tr>
                                           <td colspan="2">
                                                <button class="check_out" name="button1" onclick="checkpage()">PAY</button>
                                           </td>
                                        </tr>
                                        </form>
                                      </table>
                                    </div>
                                    <div id="UPI_details">

                                    <form method="POST" action="">
                                    <table class="debit_card_details_table" >
                                    <tr>
                                        <td><h3 class="card_title">WE ACCEPT</h3></td> 
                                        <td><img src="Image/google-pay.png" class="card_types"></td>
                                        <td><img src="Image/upi.jpg" class="card_types"></td>
                                        <td><img src="Image/phonepe.png" class="card_types"></td>
                                        <td><h3 class="card_title">& more</h3></td>
                                    </tr>
                                  </table>
                                  <table class="payment_card_details">
                                    <tr>
                                       <td>
                                          <div class="upi_outer">
                                           <h2 class="upi_title">Pay via New VPA</h2>
                                           <h4 class="upi_solgan">You must have a Virtual Payment Address</h4>
                                          </div>
                                       </td>
                                    </tr>
                                    <tr>
                                        <td>
                                           <div class="group" id="group_input">      
                                               <input type="text" name="UPL_id" id="UPL_id" class="input" required >
                                               <input type="hidden" name="upiaddress" id="address2" value="" >
                                               <label>Enter VPN </label>
                                           </div>
                                        </td>                                           
                                    </tr>
                                     <tr>
                                       <td>
                                            <button class="check_out" name="button2" id="button_upi" onclick="checkpage()">PAY</button>
                                       </td>
                                    </tr>
                                    </form>
                                  </table>

                                    </div> 
                               </div>
                          </div>
                           
                       </fieldset>
                        <script>
                          function checkpage(){
                           document.getElementById("address").value=localStorage.getItem("Address");
                           document.getElementById("address2").value=localStorage.getItem("Address");
                          }
                        </script>

                       <fieldset class="fieldset_2">';
                          $con=mysqli_connect("localhost","root","","yummy");
                          $conn=mysqli_connect("localhost","root","","restaurant");
                          $cart_result= mysqli_query($con,"SELECT * FROM `customer_cart` WHERE `customer_email` = '$user_email_id'");
                          $total_rows=mysqli_num_rows($cart_result);
                          if($total_rows<=0){
                           echo  '<script type="text/javascript" language="javascript">  
                               location.href="http://localhost/Project_yummy/Hotel_main_page.php";
                          </script>'; 
                        }
                          if ( $total_rows>0) { 
                           echo'<div id="cart_table_row">
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
                                                         <td><img src="data:image;base64,'.$row["Hotel_Image"].'" class="hotel_img_"></td>
                                                         <td><h2 class="cart_title_new">'.$hotel_name_cart_.'</h2></td>
                                                      </tr>
                                                  </table>
                                             ';
                                       }
                                    }
                        echo'</fieldset>
                            <div class="fieldset_3">';
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
                               $total_dicount=40;
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
                            if($type==1){
                              $tax=30;
                            }
                            else{
                              $tax=0;
                            }
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
                            </table>  
                       </fieldset>
                  </div>
                </center>
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
             </body>
          </html>
 ';




 if(isset($_POST['button1'])){
   $cart_result= mysqli_query($con,"SELECT * FROM `customer_cart` WHERE `customer_email` = '$user_email_id'");
   while($row=mysqli_fetch_array($cart_result)){
      $Payment=$row['Payment'];
   }
   $Total_seats=$_SESSION["selected_seat"];
   $card_details=$_POST['card_number'];
   $name_on_card=$_POST['name_on_card'];
   date_default_timezone_set('Asia/Kolkata');
   $date_time=date('d-m-Y H:i a');
   $date=date('d-m-Y');
   $Address=$_POST['address'];

   $selecteddate=$_SESSION["selecteddate"];
   $selectedtime=$_SESSION["selectedtime"];
   $hotel_name_=$_SESSION['hotel_name']."_seat";
   $mixeddate=$selecteddate." ".$selectedtime;
   $date_ = date("d-m-Y", strtotime($selecteddate)); 
   $sql="INSERT INTO `customer_payment`(`Payment_ID`, `customer_email`, `Total_items`, `Total_payment`, `Payment_type`, `Other_details`) 
                       VALUES ('$Payment','$user_email_id','$total_rows','$total_payment','Debit card','Card Number : $card_details Name on card : $name_on_card Time : $date_time')";
  if(mysqli_query($con,$sql)){
   $cart_r= mysqli_query($con,"SELECT * FROM `customer_cart` WHERE `customer_email` = '$user_email_id'");   
   $dish_number=1; 
   while($row=mysqli_fetch_array($cart_r)){
     $Dish_name.="$dish_number.".$row['Dish_name']."   ";
     $dish_number++;
  }       
   if($type==1){
       $final_order="INSERT INTO `customer_orders`(`Payment_id`, `customer_email`, `Total_items`, `Dish_names`, `total_seats`, `Hotel_name`, `Date/time`, `total_amount_paid`, `payment_details`,`Date`) 
       VALUES ('$Payment','$user_email_id','$total_rows','$Dish_name','Online Order','$hotel_name_cart','$date','$total_payment','Card Number : $card_details Name on card : $name_on_card Time : $date_time','$Address')";
   }
   else{
       $final_order="INSERT INTO `customer_orders`(`Payment_id`, `customer_email`, `Total_items`, `Dish_names`, `total_seats`, `Hotel_name`, `Date/time`, `total_amount_paid`, `payment_details`,`Date`) 
        VALUES ('$Payment','$user_email_id','$total_rows','$Dish_name','$Total_seats','$hotel_name_cart','$date_','$total_payment','Card Number : $card_details Name on card : $name_on_card Time : $date_time','$mixeddate')";

       $sqlseat="INSERT INTO $hotel_name_(`Order_ID`, `Customer_name`, `Seat_Number`, `Datevalue`, `Timevalue`, `Bill_amount`, `Dish_name`) 
       VALUES ('$Payment','$user_email_id','$Total_seats','$selecteddate','$selectedtime','$total_payment','$Dish_name')";
       mysqli_query($conn,$sqlseat);
   }
                                     if( mysqli_query($con,$final_order)){
                                           $delete_all_cart="DELETE FROM `customer_cart` WHERE `customer_email` = '$user_email_id'";
                                           if(mysqli_query($con,$delete_all_cart)){
                                              echo  '<script type="text/javascript" language="javascript">
                                                        alert("successfully Ordered");
                                                        window.open("Home_page.php","_parent");
                                               </script>'; 
                                           }                                               
                                     }
                                     else{
                                      echo  '<script type="text/javascript" language="javascript">
                                      alert("Unable to Order,Please try Later");
                                      history.go(-1);
                                  </script>'; 
                                     }                   
  }
  else{
      echo  '<script type="text/javascript" language="javascript">
                                                alert("Unable to Order,Please try Later");
                                            </script>'; 
  }
 }

 if(isset($_POST['button2'])){
   $cart_result= mysqli_query($con,"SELECT * FROM `customer_cart` WHERE `customer_email` = '$user_email_id'");
   while($row=mysqli_fetch_array($cart_result)){
      $Payment=$row['Payment'];
   }
   $UPL_id=$_POST['UPL_id'];
   $Total_seats=$_SESSION["selected_seat"];
   $date_seat=$_POST['date_seat'];
   date_default_timezone_set('Asia/Kolkata');
   $date_time=date('d-m-Y H:i a');
   $date=date('d-m-Y');
   $Address=$_POST['upiaddress'];

   $selecteddate=$_SESSION["selecteddate"];
   $selectedtime=$_SESSION["selectedtime"];
   $hotel_name_=$_SESSION['hotel_name']."_seat";
   $mixeddate=$selecteddate." ".$selectedtime;
   $date_ = date("d-m-Y", strtotime($selecteddate)); 
   $sql="INSERT INTO `customer_payment`(`Payment_ID`, `customer_email`, `Total_items`, `Total_payment`, `Payment_type`, `Other_details`) 
                       VALUES ('$Payment','$user_email_id','$total_rows','$total_payment','UPI','UPI ID : $UPL_id Time : $date_time')";
  
  if(mysqli_query($con,$sql)){
       $cart_r= mysqli_query($con,"SELECT * FROM `customer_cart` WHERE `customer_email` = '$user_email_id'");   
       $dish_number=1; 
       while($row=mysqli_fetch_array($cart_r)){
         $Dish_name.="$dish_number.".$row['Dish_name']."   ";
         $dish_number++;
      }       

if($type==1){
   $final_order="INSERT INTO `customer_orders`(`Payment_id`, `customer_email`, `Total_items`, `Dish_names`, `total_seats`, `Hotel_name`, `Date/time`, `total_amount_paid`, `payment_details`,`Date`) 
   VALUES ('$Payment','$user_email_id','$total_rows','$Dish_name','Online Order','$hotel_name_cart','$date','$total_payment','UPI ID : $UPL_id Time : $date_time','$Address')";
}
else{
   $final_order="INSERT INTO `customer_orders`(`Payment_id`, `customer_email`, `Total_items`, `Dish_names`, `total_seats`, `Hotel_name`, `Date/time`, `total_amount_paid`, `payment_details`,`Date`) 
    VALUES ('$Payment','$user_email_id','$total_rows','$Dish_name','$Total_seats','$hotel_name_cart','$date_','$total_payment','UPI ID : $UPL_id Time : $date_time','$mixeddate')";

   $sqlseat="INSERT INTO $hotel_name_(`Order_ID`, `Customer_name`, `Seat_Number`, `Datevalue`, `Timevalue`, `Bill_amount`, `Dish_name`) 
   VALUES ('$Payment','$user_email_id','$Total_seats','$selecteddate','$selectedtime','$total_payment','$Dish_name')";
   mysqli_query($conn,$sqlseat);
}

                                         if( mysqli_query($con,$final_order)){
                                               $delete_all_cart="DELETE FROM `customer_cart` WHERE `customer_email` = '$user_email_id'";
                                               if(mysqli_query($con,$delete_all_cart)){
                                                  echo  '<script type="text/javascript" language="javascript">
                                                            alert("successfully Ordered");
                                                            window.open("Home_page.php","_parent");
                                                   </script>'; 
                                               }                                               
                                         }
                                         else{
                                          echo  '<script type="text/javascript" language="javascript">
                                          alert("Unable to Order,Please try Later");
                                          history.go(-1);
                                      </script>'; 
                                         }
  }
  else{
      echo  '<script type="text/javascript" language="javascript">
                                                alert("Unable to Order,Please try Later");
                                                history.go(-1);
                                            </script>'; 
  }
 }






























   for($i=1;$i<=2;$i++){
      
   }
?>