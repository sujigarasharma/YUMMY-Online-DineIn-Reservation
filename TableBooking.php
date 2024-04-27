<?php
error_reporting(0);
  include('Restaurant/config.php');
  session_start();
  $user_email_id=$_SESSION['email_id'];
  $hotel_name_=$_SESSION['hotel_name']."_seat";
  $hotel_name = str_replace('_', ' ', $hotel_name_);
  $dateandtime=$_COOKIE['Date'];
  $inputedtime=$_COOKIE['Time'];
  $_SESSION["order_date"]=$dateandtime." ".$inputedtime;
  $time=substr($inputedtime,0 ,5);
  $noon=substr($inputedtime,6 ,8);
  $dateandtime=substr($dateandtime,4 , 11);
  $dateandtime=date('Y-m-d', strtotime($dateandtime));
  $finaltime=$time.' '.$noon;
  $finaltimevalue=date("H:i", strtotime($finaltime));
  $finaltimeplued=($finaltimevalue-2).":".$finaltimevalue[3].$finaltimevalue[4];
  $curentdate=date("Y-m-d");

  $sql_Delte="DELETE FROM $hotel_name_ WHERE `Datevalue`<'$curentdate'";
  mysqli_query($conn,$sql_Delte); 

  date_default_timezone_set('Asia/Kolkata');
  $currecttimevalue=date('H:i',strtotime('-2 hours'));
  $sql_row="DELETE FROM $hotel_name_ WHERE `Datevalue`='$curentdate' and Timevalue<='$currecttimevalue'";
  mysqli_query($conn,$sql_row); 

  $sql = "SELECT * FROM $hotel_name_ WHERE datevalue='$dateandtime' and Timevalue>='$finaltimevalue' ";
  $result = mysqli_query($conn,$sql);
  $tempseat=NULL;
  if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_array($result)) {
       if(abs($finaltimevalue-$row['Timevalue'])>2){
         $tempseat=NULL;
       }
       else{
         $tempseat=$tempseat.$row['Seat_Number'];
       }
   }
  }
  $sql = "SELECT * FROM $hotel_name_ WHERE datevalue='$dateandtime' and Timevalue>='$finaltimeplued' ";
  $result = mysqli_query($conn,$sql);
  if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_array($result)) {
       if(abs($finaltimevalue-$row['Timevalue'])>2){
         $tempseat=NULL;
       }
       else{
         $tempseat=$tempseat.$row['Seat_Number'];
       }
   }
  }
   $str_arr = explode (",", $tempseat); 
  echo'
  <!DOCTYPE html>
          <html lang="en">
             <head>
                 <title></title>
                 <link rel="stylesheet" href="CSS/hotel_style.css">
                 <link rel="stylesheet" type="text/css" href="CSS/headstyle.css">
                 <link rel="stylesheet" type="text/css" href="CSS/swal_alert.css">
                 <link rel="stylesheet" type="text/css" href="CSS/seatbooking.css">
                 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                 <script>
var x = 0;
$(document).ready(function(){
  $("div").scroll(function(){
  });
});
</script>             </head>
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
             function btn_4(){
               window.open("profile.php","_parent");
             }

           function btn_3(){
               window.open("cart.php","_parent");
               }
            </script>
<!--Seat Booking field-->
             <center>
                <fieldset id="Bfield1">
                
                     <!--header title-->
                         <div id="Btitle">
                           <h2>Select Seat</h2>
                         </div>
                     <!--Booking info--> 
                         <div id="Binfo">
                             <table id="table">
                               <tr>
                                  <td><img src="Image/emptychair.png" id="emptychair" class="chair"/></td>
                                  <td><h5 id="intotext">- Avaliable</h5></td>
                               </tr>
                               <tr>
                                  <td><img src="Image/Selectedchair.png" id="Selectedchair" class="chair"/></td>
                                  <td><h5 id="intotext">- Selected</h5></td>
                               </tr>
                               <tr>
                                  <td><img src="Image/Bookedchair.png" id="Bookedchair" class="chair"/></td>
                                  <td><h5 id="intotext">- Booked</h5></td>
                               </tr>
                             </table>
                         </div>
                     <!--reception-->
                         <div id="receptioncounter">
                             <img src="Image/desk.png" id="counter"/>
                             <h2 id="Rarea">Counter area</h2>
                         </div>
                     <!--seating-->
                     <form method="POST" action="">
                         <div id="seatingouterbox">
                           <!--left end seating part-->
                               <div id="left_End">
                                  <div>       
                                    <input type="hidden" id="chair_1_selected" name="seat1" value="0"/>  
                                    <input type="hidden" id="chair_2_selected" name="seat2" value="0"/>                           
                                    <img src="Image/twoseater.png" id="table_1">
                                    <img src="Image/emptychair.png" id="table_2_chair" class="table_1_2" onclick="selected(2)"/>
                                    <img src="Image/emptychair.png" id="table_1_chair" class="table_1_1" onclick="selected(1)">                                   
                                  </div>
                                  <div>                           
                                    <input type="hidden" id="chair_3_selected" name="seat3" value="0"/>  
                                    <input type="hidden" id="chair_4_selected" name="seat4" value="0"/>  
                                    <img src="Image/twoseater.png" id="table_2">
                                    <img src="Image/emptychair.png" id="table_3_chair" class="table_2_1" onclick="selected(3)">
                                    <img src="Image/emptychair.png" id="table_4_chair" class="table_2_2" onclick="selected(4)" >
                                  </div>
                                    <div>   
                                       <input type="hidden" id="chair_5_selected" name="seat5" value="0"/>  
                                       <input type="hidden" id="chair_6_selected" name="seat6" value="0"/>                           
                                       <img src="Image/twoseater.png" id="table_3">
                                       <img src="Image/emptychair.png" id="table_5_chair" class="table_3_1" onclick="selected(5)">
                                       <img src="Image/emptychair.png" id="table_6_chair" class="table_3_2" onclick="selected(6)">
                                    </div>
                                    <div>
                                       <input type="hidden" id="chair_7_selected" name="seat7" value="0"/>  
                                       <input type="hidden" id="chair_8_selected" name="seat8" value="0"/>
                                       <img src="Image/twoseater.png" id="table_4">
                                       <img src="Image/emptychair.png" id="table_7_chair" class="table_4_1" onclick="selected(7)">
                                       <img src="Image/emptychair.png" id="table_8_chair" class="table_4_2" onclick="selected(8)">
                                    </div>
                               </div>
                           <!--Middle end seating part-->
                               <div id="middle_end">
                                    <div>     
                                       <input type="hidden" id="chair_9_selected" name="seat9" value="0"/>  
                                       <input type="hidden" id="chair_10_selected" name="seat10" value="0"/>
                                       <input type="hidden" id="chair_11_selected" name="seat11" value="0"/>  
                                       <input type="hidden" id="chair_12_selected" name="seat12" value="0"/>
                                       <input type="hidden" id="chair_13_selected" name="seat13" value="0"/>  
                                       <input type="hidden" id="chair_14_selected" name="seat14" value="0"/>
                                       <input type="hidden" id="chair_15_selected" name="seat15" value="0"/>  
                                       <input type="hidden" id="chair_16_selected" name="seat16" value="0"/>                                  
                                         <img src="Image/eightseater.png" id="seater_1">
                                       <img src="Image/emptychair.png" id="table_9_chair" class="table_5_1" onclick="selected(9)">
                                       <img src="Image/emptychair.png" id="table_10_chair" class="table_5_2" onclick="selected(10)">
                                       <img src="Image/emptychair.png" id="table_11_chair" class="table_5_3" onclick="selected(11)">
                                       <img src="Image/emptychair.png" id="table_12_chair" class="table_5_4" onclick="selected(12)">
                                       <img src="Image/emptychair.png" id="table_13_chair" class="table_5_5" onclick="selected(13)">
                                       <img src="Image/emptychair.png" id="table_14_chair" class="table_5_6" onclick="selected(14)">
                                       <img src="Image/emptychair.png" id="table_15_chair" class="table_5_7" onclick="selected(15)">
                                       <img src="Image/emptychair.png" id="table_16_chair" class="table_5_8" onclick="selected(16)">
                                    </div>
                                    <div>
                                       <input type="hidden" id="chair_17_selected" name="seat17" value="0"/>  
                                       <input type="hidden" id="chair_18_selected" name="seat18" value="0"/>
                                       <input type="hidden" id="chair_19_selected" name="seat19" value="0"/>  
                                       <input type="hidden" id="chair_20_selected" name="seat20" value="0"/>
                                       <input type="hidden" id="chair_21_selected" name="seat21" value="0"/>  
                                       <input type="hidden" id="chair_22_selected" name="seat22" value="0"/>
                                       <input type="hidden" id="chair_23_selected" name="seat23" value="0"/>  
                                       <input type="hidden" id="chair_24_selected" name="seat24" value="0"/>                  
                                         <img src="Image/eightseater.png" id="seater_2">
                                       <img src="Image/emptychair.png" id="table_17_chair" class="table_6_1" onclick="selected(17)">
                                       <img src="Image/emptychair.png" id="table_18_chair" class="table_6_2" onclick="selected(18)">
                                       <img src="Image/emptychair.png" id="table_19_chair" class="table_6_3" onclick="selected(19)">
                                       <img src="Image/emptychair.png" id="table_20_chair" class="table_6_4" onclick="selected(20)">
                                       <img src="Image/emptychair.png" id="table_21_chair" class="table_6_5" onclick="selected(21)">
                                       <img src="Image/emptychair.png" id="table_22_chair" class="table_6_6" onclick="selected(22)">
                                       <img src="Image/emptychair.png" id="table_23_chair" class="table_6_7" onclick="selected(23)">
                                       <img src="Image/emptychair.png" id="table_24_chair" class="table_6_8" onclick="selected(24)">
                                    </div>
                               </div>
                           <!--Right end seating part-->
                               <div id="right_End">
                                    <div>         
                                       <input type="hidden" id="chair_25_selected" name="seat25" value="0"/>  
                                       <input type="hidden" id="chair_26_selected" name="seat26" value="0"/>                                 
                                       <img src="Image/twoseater.png" id="Rtable_1">
                                       <img src="Image/emptychair.png" id="table_25_chair" class="table_7_1" onclick="selected(25)">
                                       <img src="Image/emptychair.png" id="table_26_chair" class="table_7_2" onclick="selected(26)">
                                    </div>
                                    <div>                
                                       <input type="hidden" id="chair_27_selected" name="seat27" value="0"/>  
                                       <input type="hidden" id="chair_28_selected" name="seat28" value="0"/>                          
                                       <img src="Image/twoseater.png" id="Rtable_2">
                                       <img src="Image/emptychair.png" id="table_28_chair" class="table_8_2" onclick="selected(28)">
                                       <img src="Image/emptychair.png" id="table_27_chair" class="table_8_1" onclick="selected(27)">
                                    </div>
                                    <div>                             
                                       <input type="hidden" id="chair_29_selected" name="seat29" value="0"/>  
                                       <input type="hidden" id="chair_30_selected" name="seat30" value="0"/>             
                                       <img src="Image/twoseater.png" id="Rtable_3">
                                       <img src="Image/emptychair.png" id="table_30_chair" class="table_9_2" onclick="selected(30)">
                                       <img src="Image/emptychair.png" id="table_29_chair" class="table_9_1" onclick="selected(29)">
                                    </div>
                                    <div>      
                                       <input type="hidden" id="chair_31_selected" name="seat31" value="0"/>  
                                       <input type="hidden" id="chair_32_selected" name="seat32" value="0"/>   
                                       <input type="hidden" id="chair_33_selected" name="seat33" value="0"/>
                                       <p id="demo"></p>                                 
                                       <img src="Image/twoseater.png" id="Rtable_4">
                                       <img src="Image/emptychair.png" id="table_32_chair" class="table_10_2" onclick="selected(32)">
                                       <img src="Image/emptychair.png" id="table_31_chair" class="table_10_1" onclick="selected(31)">
                                    </div>
                               </div>
                               <div id="continueBTN">
                                   <button class="check_out" name="button2" id="cancel" onclick="cancel()" >Cancel</button>
                                   <button class="check_out" name="continue" id="continue">continue</button>
                               </div>
                         </div>
                    </form>
                </fieldset>
                ';      
             
                  for ($x = 0; $x <=count($str_arr); $x++) {
                     echo'<script>
                                       document.getElementById("table_'.$str_arr[$x].'_chair").src="Image/Bookedchair.png";
                                       document.getElementById("chair_'.$str_arr[$x].'_selected").value=-1;
                          </script>';
                   }   
                
                     
                if(isset($_POST['continue'])){
                    $seat_[1]=$_POST['seat1'];
                    $seat_[2]=$_POST['seat2'];

                    $seat_[3]=$_POST['seat3'];
                    $seat_[4]=$_POST['seat4'];

                    $seat_[5]=$_POST['seat5'];
                    $seat_[6]=$_POST['seat6'];

                    $seat_[7]=$_POST['seat7'];
                    $seat_[8]=$_POST['seat8'];

                    $seat_[9]=$_POST['seat9'];
                    $seat_[10]=$_POST['seat10'];
                    $seat_[11]=$_POST['seat11'];
                    $seat_[12]=$_POST['seat12'];
                    $seat_[13]=$_POST['seat13'];
                    $seat_[14]=$_POST['seat14'];
                    $seat_[15]=$_POST['seat15'];
                    $seat_[16]=$_POST['seat16'];

                    $seat_[17]=$_POST['seat17'];
                    $seat_[18]=$_POST['seat18'];
                    $seat_[19]=$_POST['seat19'];
                    $seat_[20]=$_POST['seat20'];
                    $seat_[21]=$_POST['seat21'];
                    $seat_[22]=$_POST['seat22'];
                    $seat_[23]=$_POST['seat23'];
                    $seat_[24]=$_POST['seat24'];

                    $seat_[25]=$_POST['seat25'];
                    $seat_[26]=$_POST['seat26'];

                    $seat_[27]=$_POST['seat27'];
                    $seat_[28]=$_POST['seat28'];

                    $seat_[29]=$_POST['seat29'];
                    $seat_[30]=$_POST['seat30'];

                    $seat_[31]=$_POST['seat31'];
                    $seat_[32]=$_POST['seat32'];
                     
                    $temp=NUll;
                    $date=$_POST['dateinput'];
                    $time=$_POST['time'];

                    for($i=1;$i<=32;$i++){
                         if($seat_[$i]!=0 && $seat_[$i]!=-1){
                           if($temp==NULL){
                              $temp=$seat_[$i];     
                           }
                           else{
                              $temp=$temp.",".$seat_[$i];                           
                           }
                         }
                    }

                    if($temp==NULL){
                     echo '<script>
                               Swal.fire({
                                 title: "Please select the seat",
                                 text: "Please select the seat",
                                 icon: "warning",
                                 showCancelButton: true,
                                 confirmButtonColor: "#3085d6",
                                 cancelButtonColor: "#d33",
                                 confirmButtonText: "OK"
                               }).then((result) => {
                                 if (result.isConfirmed) {
                                  
                                 }
                               })
                          </script>';
                    }
                    else{
                       
                           echo '<script>
                               Swal.fire({
                                   title: "You have selected",
                                   text: "Seat Number - '.$temp.' || Date/Time - '.$dateandtime.'/'.$inputedtime.'",
                                   icon: "info",
                                   showCancelButton: true,
                                   confirmButtonColor: "#3085d6",
                                   cancelButtonColor: "#d33",
                                   confirmButtonText: "Yes,Processed",
                                 }).then((result) => {
                                   if (result.isConfirmed) {
                                      window.open("payment_page.php","_parent");
                                   }
                                 })
                            </script>';
                           $_SESSION["selected_seat"]=$temp.",";
                           $_SESSION["favcolor"]="2";
                           $_SESSION["selecteddate"]=$dateandtime;
                           $_SESSION["selectedtime"]=$finaltimevalue;
                        }
                                  
                }
                echo'<script>
                   function selected(x){
                          for(i=1;i<=32;i++){
                              if(x==i){
                                 if(document.getElementById("chair_"+i+"_selected").value==0){
                                     document.getElementById("table_"+i+"_chair").src="Image/Selectedchair.png";
                                     document.getElementById("chair_"+i+"_selected").value=i;
                                 }
                                 else if(document.getElementById("chair_"+i+"_selected").value==-1){
                                     alert("Seat already Booked");
                                 }
                                 else{
                                     document.getElementById("table_"+i+"_chair").src="Image/emptychair.png";
                                     document.getElementById("chair_"+i+"_selected").value=0;
                                 }                          
                              }
                          }
                        }
                </script>
             </center>
            </body>
            </html>
    ';
  ?>