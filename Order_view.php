<?php
  session_start();
  $user_email_id=$_SESSION['email_id'];
 echo'
 <!DOCTYPE html>
          <html lang="en">
             <head><title>
                  Book your hotel seats from Home.Book from Yummy.com</title>
                  <link rel="stylesheet" href="CSS/payment_style.css">
                  <link rel="stylesheet" href="CSS/hotel_style.css">
                  <link rel="stylesheet" href="CSS/order.css">
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
                               <img src="Image/order.png" name="user"  id="user"/>
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
                         <fieldset class="fieldset_1" style="margin-top:2vw;width:75vw">';
                         $con=mysqli_connect("localhost","root","","yummy");
                         $result= mysqli_query($con,"SELECT * FROM `customer_orders` WHERE customer_email='$user_email_id' ORDER BY `customer_orders`.`Date` DESC");
                         $total_orders=mysqli_num_rows($result);
                        
                         $i=1;
                        
                            echo'<table class="table_1" style="margin-left:-62vw">
                               <tr>
                                <td><img src="Image/order_..png" class="wallet_icon"></td>
                                <td><h1 class="payment_title">Order</h1></td>
                               </tr>
                            </table>
                            <hr>  
                            <div class="fieldset_3" style="height:30vw;">';
                            date_default_timezone_set('Asia/Kolkata');
                            $yesterday_date=date('d-m-Y',strtotime("-1 days"));
                            $totday=date('d-m-Y');
                            while($row = mysqli_fetch_array($result)) {
                                 $date=$row['Date/time'];

                                 if($date==$totday){
                                     $date_="Today";
                                 }
                                 else if($date==$yesterday_date){
                                    $date_="Yesterday";
                                 }
                                 else{
                                    $date_= $date;
                                    $date_ = date("d-M-Y", strtotime($date_)); 
                                 }
                                  
                                 $hotel_name_=$row['Hotel_name'];
                                 $hotel_name = str_replace('_', ' ', $hotel_name_);
                                 $order=$row['total_seats'];
                                echo'<table class="table_">
                                   <tr>
                                      <td colspan="3"><h3 class="date_">'.$date_.'</h3></td>
                                   </tr>
                                   <tr>
                                       <td><h3 class="order_list" style="margin-left:1vw">Payment ID : '.$row['Payment_id'].'</h3></td>
                                       <td><h3 class="order_list">Email ID : '.$row['customer_email'].'</h3></td>
                                       <td><h3 class="order_list">Hotel name : '.$hotel_name.'</h3></td>
                                    <tr/><tr>   
                                       <td><h3 class="order_list" style="margin-left:1vw">Total dishs : '.$row['Total_items'].'</h3></td>                                           
                                       <td><h3 class="order_list" style="float:left">Dish names : <div class="fieldset_3" style="width:12.5vw;height:2vw;border:none;margin-left:.25vw">'.$row['Dish_names'].'</div></h3></td>
                                       <td><h3 class="order_list">Total price : '.$row['total_amount_paid'].'.00</h3></td>
                                       <tr/><tr>                                                                     
                                      
                                       <td><h3 class="order_list" style="margin-left:1vw">Totel seats : '.$order.'</h3></td>';
                                       if($order=="Online Order"){
                                          echo' <td><h3 class="order_list">Location : '.$row['Date'].'</h3></td>';
                                       }
                                       else{
                                          echo' <td><h3 class="order_list">Booked Date : '.$row['Date'].'</h3></td>';
                                       }
                                       echo'<td><h3 class="order_list">'.$row['payment_details'].'</h3></td>
                                   </tr>
                                </table>
                                <hr style="width:70vw">
                                ';
                                $i++;
                            }
                           echo' </div>                 
                          </fieldset>
                       </center>
                    </body>
                </html>
            ';
?>