  <?php
  error_reporting(0);
  include('Restaurant/config.php');
  session_start();
  $page_number=$_SESSION["page_num"];
  $Hotel_name = "SELECT * FROM restaurant_details";
  if($page_number==2){
    $Hotel_name="SELECT * FROM `restaurant_details` ORDER BY `restaurant_details`.`Hotel_rating` DESC";
  }
  else if($page_number==3){
    $Hotel_name = "SELECT * FROM `restaurant_details` ORDER BY `restaurant_details`.`Hotel_dish_analysis` DESC";
  }
  else if($page_number==4){
   $Hotel_name = "SELECT * FROM `restaurant_details` ORDER BY `restaurant_details`.`Hotel_dish_analysis` ASC";
  } 
   $Hotel_row_result = mysqli_query($conn,$Hotel_name);
   $Hotel_row_table=mysqli_num_rows($Hotel_row_result);
  echo'
      <!DOCTYPE html>
          <html lang="en">
             <head>
                 <title></title>
                 <link rel="stylesheet" href="CSS/relevance_style_new.css">
                 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                 <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
             </head>
             <body>
                <center>';   
                   echo'<div class="hotel_table_outer">
                     <form method="POST" action="">';
                        if (mysqli_num_rows($Hotel_row_result) > 0) {
                            echo'<div style="display:flex;flex-wrap:wrap;">';
                            $i=1;
                               while($row = mysqli_fetch_array($Hotel_row_result)) {
                                  echo'  <button class="hotel_content_outer" name="submit'.$i.'" onclick="new_table('.$i.')">
                                               <div class="card">
                                                   <img src="data:image;base64,'.$row["Hotel_Image"].'" class="hotel_img_size">
                                                       <div class="container">
                                                           <div style="display:flex">
                                                                <table class="content_table">
                                                                     <tr>
                                                                        <td class="title_coloum_width" colspan="5"> 
                                                                            <div class="for_displaying_in_same_line">';
                                                                            $hotel_name=$row["Hotel_name"];
                                                                            $Hotel_name = "$hotel_name"; 
                                                                            $Hotel_name = str_ireplace (' ', '_',$Hotel_name);
                                                                                  echo'<h1 class="hotel_name" name"hotel_name" id="hotel_name'.$i.'">'.$row["Hotel_name"].'</h1>
                                                                                  <input type="hidden" name="hotel_name'.$i.'" value='.$Hotel_name.'>
                                                                                  <h3>'.$row["Hotel_Special"].'</h3>
                                                                                  <h4>location : '.$row["Location"].'</h4>
                                                                               <div class="hotel_rating" style="display:flex">';
                                                                                          $total_rating=$row["Hotel_rating"];
                                                                                          echo'<span class="total_rating">'.$total_rating.'</span><small>/5</small>&nbsp;&nbsp;';
                                                                                          for($j=0;$j<$total_rating;$j++){
                                                                                                echo'<span id="hotel_star_rating" class="fa fa-star checked"></span>';
                                                                                          }  
                                                                                          echo'<span class="dot_span">&#8739;</span>
                                                                                   <span Class="timming">
                                                                                     Timing : '.$row["Opening_timing"].' AM - '.$row["Closing_timing"].' PM
                                                                                   </span>
                                                                               </div>
                                                                            </div>
                                                                         </td>
                                                                     </tr>
                                                                </table>
                                                            </div>
                                                       </div>
                                               </div>
                                           </button>';  
                                           $i++;
                                   }
                                   echo' </div> ';
                             }
                      echo' 
                    </div></form>';                  
                echo'</center>
             </body>
          </html>
          <script>
           function new_table(x){
             i=x;
              hotelname=document.getElementById("hotel_name"+i+"").innerHTML;
              console.log(hotelname);
           }
        </script>';
        for($i=1;$i<=$Hotel_row_table;$i++){
          if(isset($_POST["submit$i"])){
                                $_SESSION['hotel_name']=$_POST["hotel_name$i"];
                                echo  '<script type="text/javascript" language="javascript">
                                         window.open("Hotel_main_page.php","_parent");
                                       </script>';               
          }
      }
  ?>