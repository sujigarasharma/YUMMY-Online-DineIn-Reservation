<?php
error_reporting(0);
session_start();
 include('config.php');
 $Hotel_ID=$_SESSION["Hotel_ID"];
 $sql = "SELECT * FROM restaurant_details WHERE Hotel_ID='$Hotel_ID'";
 $result = mysqli_query($conn,$sql);
 if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_array($result)) {
 echo'
 <!DOCTYPE html>
    <html>
      <head>
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="css/Dishe.css">  
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">   
         <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&amp;display=swap">          
      </head>      
          <body>
              <div style="display:flex;">
                <fieldset class="category_border" >
                    <center>           
                      <table class="hotel_mean_table">
                      <form action="" method="post" >
                         <tr class="table_row_1">
                            <td  colspan="4" class="table_col_1"><h2 class="hotel_name">'; echo $row["Hotel_name"]; }}echo'</h2><h2 class="edit_menu">Edit Food Menu</h2></td>
                         </tr>
                         <tr class="empty_row"></tr>
                         <tr class="table_row_2"  > 
                            <td colspan="4" >
                                  <h3 class="col_title_text">Select the Cuisine type : </h3>                                  
                            </td> 
                          </tr>
                        <tr class="table_row_5" >                            
                             <td>
                                 <label class="container_cuisine">Kashmiri
                                    <input type="radio" id="Kashmiri" name="cuisine" value="Kashmiri">
                                    <span class="container_cuisine_checkmark"></span>
                                 </label>
                             </td>
                             <td>
                                 <label class="container_cuisine">Punjabi
                                    <input type="radio" id="Punjabi" name="cuisine" value="Punjabi">
                                    <span class="container_cuisine_checkmark"></span>
                                 </label>
                             </td>
                             <td>
                                 <label class="container_cuisine">Uttar_Pradesh
                                    <input type="radio" id="Uttar_Pradesh" name="cuisine" value="Uttar_Pradesh">
                                    <span class="container_cuisine_checkmark"></span>
                                 </label>
                             </td>  
                             <td>
                                  <label class="container_cuisine">Maghalai
                                    <input type="radio" id="Maghalai" name="cuisine" value="Maghalai">
                                    <span class="container_cuisine_checkmark"></span>
                                 </label>
                             </td>                           
                        </tr>
                        <tr class="table_row_5" >
                            <td>
                                 <label class="container_cuisine">Rajasthan
                                    <input type="radio" id="Rajasthan" name="cuisine" value="Rajasthan">
                                    <span class="container_cuisine_checkmark"></span>
                                 </label>
                             </td>
                             <td>
                                 <label class="container_cuisine">Gujarat
                                    <input type="radio" id="Gujarat" name="cuisine" value="Gujarat">
                                    <span class="container_cuisine_checkmark"></span>
                                 </label>
                             </td>
                             <td>
                                 <label class="container_cuisine">Bengali
                                    <input type="radio" id="Bengali" name="cuisine" value="Bengali">
                                    <span class="container_cuisine_checkmark"></span>
                                 </label>
                             </td>
                             <td>
                                 <label class="container_cuisine">Andhra
                                    <input type="radio" id="Andhra" name="cuisine" value="Andhra">
                                    <span class="container_cuisine_checkmark"></span>
                                 </label>
                             </td>
                        </tr>
                        <tr class="table_row_5" >
                            <td>
                                 <label class="container_cuisine">Goan
                                    <input type="radio" id="Goan" name="cuisine" value="Goan">
                                    <span class="container_cuisine_checkmark"></span>
                                 </label>
                             </td>
                             <td>
                                 <label class="container_cuisine">Tamilian
                                    <input type="radio" id="Tamilian" name="cuisine" value="Tamilian">
                                    <span class="container_cuisine_checkmark"></span>
                                 </label>
                             </td>
                             <td>
                                 <label class="container_cuisine">Kerala
                                    <input type="radio" id="Kerala" name="cuisine" value="Kerala">
                                    <span class="container_cuisine_checkmark"></span>
                                 </label>
                             </td>
                             <td>
                                 <label class="container_cuisine">Other
                                    <input type="radio" id="Other" name="cuisine" value="Other">
                                    <span class="container_cuisine_checkmark"></span>
                                 </label>
                             </td>
                        </tr>
                        <tr class="last_row">                       
                            <td colspan="4">
                               <input type="submit" name="submit" class="btn_submit"  id="btn_submit" value="Apply" />
                            </td>
                        </tr>
                        </form>
                 </table>                      
                    </center>';
                    if(isset($_POST['submit'])){
                     $cuisine=$_POST['cuisine'];
                    if($cuisine!=""){
                        echo '<style type="text/css">
                        #Add_dishes_field{
                            display: block;
                        }
                        </style>';
                     }
                     $_SESSION["part_of_day"]=$_POST['part_of_day'];
                     $_SESSION["cuisine"]=$cuisine;
                    }
                   echo'</fieldset>
                     <div id="Add_dishes_field" class="content_border">
                     <fieldset class="field_border">
                          <iframe  src = "Dishe_table.php" id="iframe_" width =99.8% style="overflow-y: hidden;border:1px; height:32.8vw;"></iframe>               
                     </fieldset>
                      </div>                       
              </div>
          </body>
          <script src="js/Add_new_dishes.js"></script>
    </html>';
?>
