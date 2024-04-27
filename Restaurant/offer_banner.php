<?php
error_reporting(0);
session_start();
include('config.php');
$Hotel_ID=$_SESSION["Hotel_ID"];

$sql = "SELECT * FROM restaurant_banner WHERE Hotel_ID='$Hotel_ID'";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_array($result)) {
    $total_images=$row["Total_banners"];
   echo'
     <!DOCTYPE html>
        <html>
          <head>
             <meta name="viewport" content="width=device-width, initial-scale=1">
             <link rel="stylesheet" href="css/offer_banner.css">
             <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>  
             <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
          </head>
          
              <body>
                <form action="" method="post">
                    <table align=center >
                         <tr>
                             <td class="table_date_bording_1" colspan="3">Restaurants Banners</td>
                         </tr>
                         <tr class="epmty"></tr>
                         <tr>
                             <td class="select_image_text">Select Total image :</td>
                             <td class="select_total_banners">&ensp;
                                 <select class="select_input" name="total_name" id="total_image_value">
                                       <option hidden>'.$total_images.'</option>
                                       <option>1</option>
                                       <option>2</option>
                                       <option>3</option>
                                       <option>4</option>
                                       <option>5</option>
                                 </select>
                             </td>
                             <td class="select_botton_left"><input type="Submit"  name="submit" class="botton" value="&#9989; Submit"/><td>
                         </tr>
                     </table>
                     <br>
                </form>
              
                       <table class="table_border_2" border=1px align=center>
                       <tr class="col_h">
                           <th >S.No</th>
                           <th >Banner Name</th>
                           <th >Upload Image    </th>
                       </tr>
                     
               ';

                       $query=mysqli_query($conn,"SELECT * FROM restaurant_banner WHERE Hotel_ID='$Hotel_ID'");
                       $result = mysqli_num_rows($query);
                       if($total_images==0 || $total_images>0 && $total_images<=5){
                           if(isset($_POST['submit'])){
                             $total_image_selected=$_POST['total_name'];
                             if($result>0){
                                  $sql="UPDATE `restaurant_banner` SET `Total_banners`='$total_image_selected' WHERE `Hotel_ID` = '$Hotel_ID'";
                                  if(mysqli_query($conn,$sql)){
                                               echo '<script type="text/javascript" language="javascript">
                                                            location.href=location.href;
                                                     </script>';
                                       }
                                       else{
                                               echo '<script type="text/javascript" language="javascript">
                                                            alert("unable to Modify your profile.Please try later");   
                                                            history.go(-1);
                                                     </script>';
                                       }
                          }
                        }
                       }
                     
                           for($i=1;$i<=$total_images;$i++){
                            echo'
                            <form action="" method="post" enctype="multipart/form-data">
                            <tr>
                                    <td class="col">'.$i.'</td>
                                    <td class="col_1" name="image_name'.$i.'"><div style="display:flex;"><input type="text" class="input" name="image_name'.$i.'" id="image_name'.$i.'" value="'.$row["Image_name[$i]"].'" Disabled /><i class="fa fa-eye"  id="togglePassword'.$i.'" onclick="activateButton('.$i.')" style="margin-left:auto;margin-right:auto;margin-top:0.3vw;cursor: pointer;font-size:1.2vw"></i></div></td>
                                   
                                   
                                    <td class="col_1" name="image'.$i.'">
                                    <div style="display:flex;">
                                    &nbsp;<input type="file" name="image'.$i.'" class="custom-file-input" id="file_input'.$i.'" required/>
                                              <button name="image_submit'.$i.'"  class="image_upload" id="submit'.$i.'" ><img src="img/arrow.png" class="uploader"></button></form>
                                              <input type="image" src="img\edit-image.png"  class="image_edit" id="edit'.$i.'" onclick="edit('.$i.')" />
                                              <input type="image" src="img\close.png" class="edit" id="cancel'.$i.'" onclick="cancel('.$i.')" />
                                              </div>
                                     </td>
                    
                               </tr>
                             ';
                            if(isset($_POST["image_submit$i"])){

                              $image=$_FILES["image$i"]['tmp_name'];
                              $name=$_FILES["image$i"]['name'];
                              $image=file_get_contents($image);
                              $image_d=base64_encode($image);
                              if($result>0){
                                $sql="UPDATE `restaurant_banner` SET `Banner_image_$i`='$image_d',`image_name[$i]`='$name' WHERE `Hotel_ID` = '$Hotel_ID'";
                                       if(mysqli_query($conn,$sql)){
                                               echo '<script type="text/javascript" language="javascript">
                                                            alert("Successfully Modified your profile.");  
                                                           location.href=location.href;
                                                     </script>';
                                       }
                                       else{
                                               echo '<script type="text/javascript" language="javascript">
                                                            alert("unable to Modify your profile.Please try later");   
                                                            history.go(-1);
                                                     </script>';
                                       }
                               }
                               else{
                                        echo '<script type="text/javascript" language="javascript">
                                                     alert("Error Please try later");   
                                                     history.go(-1);
                                              </script>';
                               }
                             }
                         }
                         echo' </table>
                          </body>
                            <script src="js/offer_banner_new.js"></script>
                            <script>
                            function activateButton(x) {
                            
                              if(x==1){
                                    swal({  
                                          imageUrl: "data:image/jpeg;base64,'.$row["Banner_image_1"].'",  
                                          imageHeight: 450,
                                          imageWidth: 600,
                                          width: "30vw", 
                                          Height:"30vw",         
                                    });
                              }
                              if(x==2){
                                swal({  
                                     imageUrl: "data:image/jpeg;base64,'.$row["Banner_image_2"].'",
                                     imageHeight: 450,
                                     imageWidth: 600,
                                     width: 600,
                                     Height: 450,
                                });
                              }
                              if(x==3){
                                swal({  
                                     imageUrl: "data:image/jpeg;base64,'.$row["Banner_image_3"].'",
                                     imageHeight: 450,
                                     imageWidth: 600,
                                     width: 600,
                                     Height: 450,
                                });
                              }
                              if(x==4){
                                swal({  
                                     imageUrl: "data:image/jpeg;base64,'.$row["Banner_image_4"].'",
                                     imageHeight: 450,
                                     imageWidth: 600,
                                     width: 600,
                                     Height: 450,
                                });
                              }
                              if(x==5){
                                swal({  
                                     imageUrl: "data:image/jpeg;base64,'.$row["Banner_image_5"].'",
                                     imageHeight: 450,
                                     imageWidth: 600,
                                     width: 600,
                                     Height: 450,
                                });
                              }
                            }
                              
                            </script>
                          </html>';
                      
       }
    }
     else {
       
      echo '<script type="text/javascript" language="javascript">
                alert("Error at Login.Please Re-Login");
            </script>';
      }
?>