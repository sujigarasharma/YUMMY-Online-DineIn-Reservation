<?php
  session_start();
 echo'
 <!DOCTYPE html>
          <html lang="en">
             <head><title>
                  Book your hotel seats from Home.Book from Yummy.com</title>
                  <link rel="stylesheet" href="CSS_new/payment_style.css">
                  <link rel="stylesheet" href="CSS_new/hotel_style.css">
                  <link rel="stylesheet" href="CSS_new/order.css">
                  <link rel="stylesheet" type="text/css" href="CSS/headstyle.css">
                   <iframe  src = "header.html" scrolling ="no" height =12%  width =99.2% style=" border:0px; position:absolute;top:0.2vw"></iframe>
             </head>
             <body>
                <center>
                         <fieldset class="fieldset_1" style="margin-left:-0vw;margin-top:7.5vw;width:75vw">';
                         $con=mysqli_connect("localhost","root","","yummy");
                         $result= mysqli_query($con,"SELECT * FROM `customer_orders` ORDER BY `customer_orders`.`Date` DESC");
                         $i=1;
                            echo'<table class="table_1" style="margin-left:-62vw">
                               <tr>
                                <td></td>
                                <td><h1 class="payment_title">Order list</h1></td>
                               </tr>
                            </table>
                            <hr>        
                            <div class="fieldset_3" style="height:30vw;">';
                            date_default_timezone_set('Asia/Kolkata');
                            $yesterday_date=date('d-m-Y',strtotime("-1 days"));
                            $totday=date('d-m-Y');
                            while($row = mysqli_fetch_array($result)) {
                                 $date=$row['Date'];

                                 if($date==$totday){
                                     $date_="Today";
                                 }
                                 else if($date==$yesterday_date){
                                    $date_="Yesterday";
                                 }
                                 else{
                                    $date_= $date;
                                 }

                                 $hotel_name_=$row['Hotel_name'];
                                 $hotel_name = str_replace('_', ' ', $hotel_name_);
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
                                       <td><h3 class="order_list">Booking Date : '.$row['Date/time'].'</h3></td>  
                                       <td><h3 class="order_list" style="float:left">Dish names : <div class="fieldset_3" style="width:12.5vw;height:2vw;border:none;margin-left:.25vw">'.$row['Dish_names'].'</div></h3></td>
                                    <tr/><tr>                                                                     
                                      
                                       <td><h3 class="order_list" style="margin-left:1vw">Totel seats : '.$row['total_seats'].'</h3></td>
                                       <td><h3 class="order_list">Total price : '.$row['total_amount_paid'].'.00</h3></td>
                                       <td><h3 class="order_list">'.$row['payment_details'].'</h3></td>
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