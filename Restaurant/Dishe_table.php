<?php
include('config.php');
error_reporting(0);
session_start();
 $cuisine=$_SESSION["cuisine"];
 $Hotel_ID=$_SESSION["Hotel_ID"];
 $sql = "SELECT * FROM restaurant_details WHERE Hotel_ID='$Hotel_ID'";
 $result = mysqli_query($conn,$sql);
 if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_array($result)) {
        $Hotel_name=$row["Hotel_name"];
      }
}
 $Hotel_name = "$Hotel_name"; 
 $Hotel_name = str_ireplace (' ', '_',$Hotel_name);
 $F_cuisine_type = "SELECT * FROM $Hotel_name WHERE Cuisne_type='$cuisine'";
 $F_cuisine_result = mysqli_query($conn,$F_cuisine_type);
 $total_rows_table=mysqli_num_rows($F_cuisine_result);

 echo'
 <!DOCTYPE html>
   <html>
     <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/Dishes_table.css">  
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>  
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">        
     </head>      
         <body>
         <center class="center_field">
           <h1 class="cuisine_title">'.$cuisine.' Cuisine Menu</h1><hr class="hor_line">
           <form method="POST" action="" name="frm"  enctype="multipart/form-data">
             <table class="Dishes_table_content" id="ordertable">
                    <tr>
                           <th class="col_1">S.No</th>
                           <th class="col_2">Dish Name</th>
                           <th class="col_3" >Veg/non veg</th>
                           <th class="col_4">Dish Price</th>
                           <th class="col_5">Image of the Dish</th>
                           <th class="col_6">Available Day type </th>
                           <th class="col_8">Delete</th>
                    </tr>';
                    for($i=1;$i<=$total_rows_table;$i++){
                         
                          $sql_sno = "SELECT * FROM $Hotel_name WHERE S_NO='$i' and Cuisne_type='$cuisine'";
                          $result_sno = mysqli_query($conn,$sql_sno);

                         if (mysqli_num_rows($result_sno) > 0) {
                            while($row = mysqli_fetch_array($result_sno)) {
                                   echo'<tr>
                                           <td>'.$i.'</td>
                                           <td>'.$row["Dish_name"].'</td>
                                           <td>'.$row["Veg/Nonveg"].'</td>
                                           <td>'.$row["Dish_Price"].'</td>
                                           <td><i class="fa fa-eye"  id="togglePassword'.$i.'" onclick="activateButton('.$i.')" style="margin-left:auto;margin-right:auto;margin-top:0.3vw;cursor: pointer;font-size:1.2vw"></i></td>
                                           <td>'.$row["Type_of_Meals"].'</td>
                                           <td class="col_8">
                                           <button type="button" name="delete_remove" id="delete_remove'.$i.'"  class="submit" onclick="deleteRow(this);" value="'.$i.'">&#128465;</button>
                                                <div style="display:none" id="delete_slider'.$i.'">
                                                      <div style="display:flex;margin-left:20%;">
                                                          <button name="delete_c_row" class="delete_c_row">&#9989;</button>
                                                          <button name="delete_cancel_row" class="delete_cancel_row">&#10060;</button>
                                                      </div>
                                                </div>
                                           </td></tr>
                                           <script>
                                           function activateButton(x) {
                                                if(x=='.$i.'){
                                                      swal({
                                                            imageUrl: "data:image/jpeg;base64,'.$row["Dish_Image"].'", 
                                                       });    
                                                 }            
                                            }
                                           </script>
                                           ';
                                           
                                 }
                           }
                     }
                   echo'<tbody id="tbody"></tbody>
               </table></center><hr>
                    <div style="display:flex;margin-left:40vw">
                         <button type="button" id="btn"  class="Btn" onclick="addItem();">&#10010; ADD DISH</button>
                         <input type="hidden" id="btnClickedValue" name="btnClickedValue" value=""/>
                         <input type="hidden" id="deleted_row_value" name="deleted_row_value" value=""/>
                         <input type="hidden" id="dish_name_radio" name="dish_name_radio" value=""/>
                         <input type="submit" id="submit" name="submit" class="final-submit" value="Save"/>
                    </div><hr>
          </form>
          <script>
          document.getElementById("submit").style.display="none";
          var items = '.$total_rows_table.';
             function addItem() {  
              items++;       
                 document.getElementById("submit").style.display="block";
                  var html = "<tr>";
                      html += "<td class=\"col_1\">" + items + "</td>";
                      html += "<td class=\"col_2\"><select  name=\"Dishe_name"+ items +"\" id=\"Dishe_name\" onchange=\"get_dish_type()\" class=\"dishe_name\" required>';
                      
                       $cuisines_DropDown= "SELECT * FROM cuisine_menu_list WHERE Dish_type='$cuisine'";
                       $C_Dropdown_list = mysqli_query($conn,$cuisines_DropDown);
                             if (mysqli_num_rows($C_Dropdown_list) > 0) {
                                  while($row = mysqli_fetch_array($C_Dropdown_list)) {
                                      echo' <option>';
                                            echo $row['Dish_name'];
                                       echo' </option>';     
                                                           
                                   }
                               }
                               
                       echo'</select></td>"
                      html += "<td class=\"col_3\"><div style=\"display:flex;margin-left:2vw;margin-right:2vw\"><label class=\"container_cuisine\">Veg<input type=\"radio\" id=\"veg_dishe"+ items +"\" name=\"dishe_type"+ items +"\" value=\"Veg\" required><span class=\"container_cuisine_checkmark\"></span></label><label class=\"container_cuisine\">Non<span style=\"color:white\">.</span>Veg<input type=\"radio\" id=\"non_veg_dishe"+ items +"\" name=\"dishe_type"+ items +"\" value=\"Non-veg\" required><span class=\"container_cuisine_checkmark\"></span></label></div></td>";
                      html += "<td class=\"col_4\"><input type=\"number\" id=\"Dishe_price"+ items +"\" name=\"Dishe_price"+ items +"\" class=\"Dishe_price\" placeholder=\"Price\" required></td>";
                      html += "<td class=\"col_5\"><input type=\"file\" id=\"Dishe_image"+ items +"\" name=\"Dishe_image"+ items +"\" class=\"custom-file-input\" required></td>";
                      html += "<td class=\"col_6\"><div style=\"display:flex;margin-left:2vw;margin-right:2vw\"><label class=\"container_cuisine\">Tiffin<input type=\"checkbox\" id=\"Tiffin"+ items +"\" name=\"Tiffin"+ items +"\" value=\"Tiffin\" ><span class=\"container_cuisine_checkmark\"></span></label><label class=\"container_cuisine\">Lunch<input type=\"checkbox\" id=\"Lunch"+ items +"\" name=\"Lunch"+ items +"\" value=\"Lunch\" ><span class=\"container_cuisine_checkmark\"></span></label><label class=\"container_cuisine\">Dinner<input type=\"checkbox\" id=\"Dinner"+ items +"\" name=\"Dinner"+ items +"\" value=\"Dinner\" ><span class=\"container_cuisine_checkmark\"></span></label></div></td>";
                      html += "<td class=\"col_8\"><button type=\"button\" class=\"submit\" onclick=\"Delete_row(this);\">&#128465;</button></td>"
                      html += "</tr>";
                   var row = document.getElementById("tbody").insertRow();
                       row.innerHTML = html;
                   var rowcount = document.getElementById("ordertable").rows.length;
                                  document.getElementById("btnClickedValue").value = rowcount;
                                 
               }

               function deleteRow(button) {
                     document.getElementById("deleted_row_value").value = button.value;
                     document.getElementById("delete_slider"+button.value+"").style.display="block";
                     document.getElementById("delete_remove"+button.value+"").style.display="none";
                     document.getElementById("btn").style.display="none";
               }
               
               function get_dish_type(){
                     var dish_name=document.getElementById("Dishe_name");
                     var  displaytext=dish_name.options[dish_name.selectedIndex].text;   
                     document.getElementById("dish_name_radio").value=displaytext;
               }

               function Delete_row(button){
                  items--;   
                  button.parentElement.parentElement.remove();
                  var table = document.getElementById("ordertable");
                  var rowcount = document.getElementById("ordertable").rows.length;
                      for(var i=1;i<rowcount;i++){    
                         table.rows[i].cells[0].innerHTML=i;
                      }  
                  document.getElementById("btnClickedValue").value = rowcount;
                  document.getElementById("deleted_row_value").value = button.value;
               } 
               </script>';  
            

           if(isset($_POST['delete_c_row'])){
             $row_valu=$_POST["deleted_row_value"];
             $sql_delete_row="DELETE FROM $Hotel_name WHERE `S_NO`='$row_valu' and Cuisne_type='$cuisine' ";          
                  if(mysqli_query($conn,$sql_delete_row)){
                        echo '<script type="text/javascript" language="javascript">
                                alert("Successfully deleted");
                                location.href=location.href; 
                              </script>';
                       }
                      else{
                            echo '<script type="text/javascript" language="javascript">
                                    alert("unable to Modify your profile.Please try later");
                                    location.href=location.href;  
                                  </script>';
                         }
                  for($i=$row_valu;$i<=$total_rows_table;$i++){
                     $increment_valu=$row_valu+1;
                     $sql_new_row="UPDATE $Hotel_name SET `S_NO`='$row_valu' WHERE `S_NO`='$increment_valu' AND Cuisne_type='$cuisine'";
                        if(mysqli_query($conn,$sql_new_row)){
                            echo '<script type="text/javascript" language="javascript">
                     
                                 </script>';
                        }
                        else{
                            echo '<script type="text/javascript" language="javascript">
                                         
                                  </script>';
                        }
                        $row_valu++;
                  }
           }
        if(isset($_POST['submit'])){
             $Row_count=$_POST["btnClickedValue"]-1;

             for($i=$total_rows_table+1;$i<=$Row_count;$i++){
              $name=$_POST["Dishe_name$i"];
              $dishe_type=$_POST["dishe_type$i"];
              $Dishe_price=$_POST["Dishe_price$i"];
              $Tiffin=$_POST["Tiffin$i"];
              $Lunch=$_POST["Lunch$i"];
              $Dinner=$_POST["Dinner$i"];
           
              $Available_Day_type="$Tiffin  $Lunch  $Dinner";

              $image=$_FILES["Dishe_image$i"]['tmp_name'];
              $image=file_get_contents($image);
              $image_d=base64_encode($image);
          
              $sql="INSERT INTO $Hotel_name(`S_NO`, `Dish_name`, `Veg/Nonveg`, `Cuisne_type`, `Dish_Price`, `Dish_Image`, `Type_of_Meals`)
                                               VALUES ('$i','$name','$dishe_type','$cuisine','$Dishe_price','$image_d','$Available_Day_type')";
             
             if(mysqli_query($conn,$sql)){
                echo '<script type="text/javascript" language="javascript">
                             alert("Successfuly Added Dish");   
                             location.href=location.href;
                        </script>';
             }
              else{
                  echo '<script type="text/javascript" language="javascript">
                            alert("Unable to Added Dish.Try Later");   
                            location.href=location.href;
                        </script>';
                }
             }
        } 

     
 ?>