<?php
  session_start();
  error_reporting(0);
session_start();
 include('config.php');
 $Hotel_ID=$_SESSION["Hotel_ID"];
 $sql = "SELECT * FROM restaurant_details WHERE Hotel_ID='$Hotel_ID'";
 $result = mysqli_query($conn,$sql);
 if (mysqli_num_rows($result) > 0) {
   // output data of each row
   while($row = mysqli_fetch_array($result)) {
     $Hotel_name=$row["Hotel_name"];
     $hotel_name = str_replace(' ', '_', $Hotel_name);
   }
}
 echo'
 <!DOCTYPE html>
          <html lang="en">
             <head><title>
                  Book your hotel seats from Home.Book from Yummy.com</title>
                  <link rel="stylesheet" href="CSS_new/payment_style.css">
                  <link rel="stylesheet" href="CSS_new/hotel_style.css">
                  <link rel="stylesheet" href="CSS_new/order.css">
                  <link rel="stylesheet" type="text/css" href="CSS/headstyle.css">
             </head>
             <style>
             .table_date_bording_1{
               height:3vw;
               font-size: 1.5vw;
               border-bottom: 1px solid black;
               font-family:"josefin sans semibold";
           }
           .epmty{
               height:1vw;
           }
             </style>
             <body>
              <form action="" method="post">
                    <table align=center >
                         <tr>
                             <td class="table_date_bording_1" colspan="3">Orders</td>
                         </tr>
                         <tr class="epmty"></tr>
                     </table>
                     <br>
                </form>
                <center>
                         <fieldset class="fieldset_1" style="margin-left:-0vw;margin-top:-2.5vw;width:75vw">';
                         $con=mysqli_connect("localhost","root","","yummy");
                         $result= mysqli_query($con,"SELECT * FROM `customer_orders` WHERE Hotel_name='$hotel_name'");
                         $i=1;
                        
                            echo'   
                            <div class="fieldset_3" style="height:30vw;">
                            <h3 class="date_">Today</h3>
                            ';
                            date_default_timezone_set('Asia/Kolkata');
                            $yesterday_date=date('d-m-Y',strtotime("-1 days"));
                            $totday=date('d-m-Y');
                            while($row = mysqli_fetch_array($result)) {
                                 $date=$row['Date'];

                                 if($date==$totday){
                                     $date_="Today";
                                 }
                                 $hotel_name_=$row['Hotel_name'];
                                 $hotel_name = str_replace('_', ' ', $hotel_name_);
                                 $order=$row['total_seats'];
                                echo'<table class="table_">
                                   <tr>
                                      <td colspan="3"><h3 class="date_" >#'.$i.'</h3></td>
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
                                       <td><h3 class="order_list" style="margin-left:1vw">Totel seats : '.$row['total_seats'].'</h3></td>';
                                       if($order=="Online Order"){
                                          echo' <td><h3 class="order_list">Location : '.$row['Date'].'</h3></td>';
                                       }
                                       else{
                                          echo' <td><h3 class="order_list">Booked Date : '.$row['Date'].'</h3></td>';
                                       }
                                       echo'
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