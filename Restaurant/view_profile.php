<?php
error_reporting(0);
session_start();
 include('config.php');
 $Hotel_ID=$_SESSION["Hotel_ID"];
 $sql = "SELECT * FROM restaurant_details WHERE Hotel_ID='$Hotel_ID'";
 $result = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/view_profile_style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body id="body">

<?php
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_array($result)) {
      $Hotel_name=$row["Hotel_name"];
      $_SESSION["Hotel_name"]=$Hotel_name;
?>

  <table class="content_table">
<!--for Displaying the hotel name's-->
      <tr>
           <td class="title_coloum_width" colspan="5"> 
               <div class="for_displaying_in_same_line">
                      <h1 class="hotel_name">&#127869; <?php echo "$Hotel_name";?> </h1>
<!--for Displaying the hotel star ratings-->
                 <div class="hotel_rating">
                      <span id="hotel_star_rating" class="fa fa-star"></span>
                      <span id="hotel_star_rating" class="fa fa-star"></span>
                      <span id="hotel_star_rating" class="fa fa-star"></span>
                      <span id="hotel_star_rating" class="fa fa-star"></span>
                      <span id="hotel_star_rating" class="fa fa-star"></span>
                   </div>
               </div>
           </td>
<!--for Displaying hotel Image-->
           <td rowspan="9" colspan="2" class="image_outer">
             <div class="image_uploader">
               <div class="card">
                 <img src='<?php echo"data:image;base64,{$row["Hotel_Image"]}"; ?>'  width="100%" border="1px" height="100%">
               </div>
             </div>
           </td>
     </tr>
     <tr>
<!--For Displaying hotel location-->
         <td colspan="5">
             <h3 class="hotal_location"  >location :  <?php echo  $row["Location"] ?></h3>
         </td>
     </tr>
     <tr class="row_height"></tr>
     <tr class="row_height_1"></tr>
<!--for Displaying the hotel hotel ID and Gst code-->
      <tr>
        <td class="extra_table_width"></td>
        <td class="td_test_align">  <label class="label_tell">HOTEL ID &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&#8282;</label> </td>
        <td class="td_test_align">   <h3 class="text">#<?php echo  $row["Hotel_ID"] ?></h3>            </td>
        <td class="td_test_align">  <label class="label_tell">GST NUMBER &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&#8282; </label> </td>
        <td class="td_test_align">   <h3 class="text">@<?php echo  $row["Hotel_GST_code"] ?></h3>             </td>
     <tr>
 <!--For displaying phone number and landline number of the hotel-->
  <form action="view_profile.php" method="post" onsubmit=" return validateform()" enctype="multipart/form-data">
       <tr class="row_height_1"></tr>
             <td class="extra_table_width"></td>
             <td class="td_test_align">  <label class="label_tell">Phone number&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&nbsp;&nbsp;&#8282;</label> </td>
             <td class="td_test_align">  <input type="text" class="input" name="phone_number" id="phone_number" value="<?php echo  $row["Phone_number"] ?>" disabled/>              </td>
             <td class="td_test_align">  <label class="label_tell">Landline number&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&nbsp;&#8282;</label> </td>
             <td class="td_test_align">  <input type="text" class="input" name="landline_number" id="landline_number" value="<?php echo  $row["Landline_number"] ?>" disabled/>              </td>
      </tr>
      <tr class="row_height_1"></tr>
 <!--for dispalying opening time and closing time of the hotel-->
      <tr>
             <td class="extra_table_width"></td>
             <td class="td_test_align">  <label class="label_tell">Hotel Opening Time&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&#8282;</label> </td>
             <td class="td_test_align">  <input type="text" class="input" name="opening_time" id="opening_time" value="<?php echo  $row["Opening_timing"] ?>" disabled/>              </td>
             <td class="td_test_align">  <label class="label_tell">Hotel Closing Time&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&#8282;</label> </td>
             <td class="td_test_align">  <input type="text" class="input" name="closing_time" id="closing_time" value="<?php echo  $row["Closing_timing"] ?>" disabled/>              </td>
             <td class="image_border" colspan="2"><input type="file" name="image" class="custom-file-input" id="file_input" /></td>
      </tr>
      <tr class="row_height_1"></tr>
<!--for displaying Email ID the password -->
      <tr>
             <td class="extra_table_width"></td>
             <td class="td_test_align">  <label class="label_tell">Email ID&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&nbsp;&#8282;</label> </td>
             <td class="td_test_align">  <input type="text" class="input" name="Email_id" id="Email_id" value="<?php echo  $row["Email_ID"] ?>" disabled/>              </td>
             <td class="td_test_align">  <label class="label_tell">Password&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&nbsp;&nbsp;&nbsp;&#8282;</label> </td>
             <td class="td_test_align">  <input type="password" class="input" name="password" id="password" value="<?php echo  $row["Password"] ?>" disabled/>              </td>
      </tr>
 <!--final edit and Save Button-->
      <tr>
        <td colspan="5"></td>
             <td  class="final_row"><input  type="submit" name="submit" class="submit" id="submit" value="&#10004; Save"/></td>
              </form>
                  <td><button class="edit_page" onclick="edit()">&#128397; Edit</button>
            </td>
      </tr>
      <?php  }
} else {
    echo "0 results";
}

$conn->close();

if(isset($_POST['submit'])){
session_start();
 include('config.php');
 $Hotel_ID=$_SESSION["Hotel_ID"];
 $phone_number=$_POST['phone_number'];
 $landline_number=$_POST['landline_number'];
 $opening_timing=$_POST['opening_time'];
 $closing_timing=$_POST['closing_time'];
 $password=$_POST['password'];
//image encode
 $image=$_FILES['image']['tmp_name'];
 $name=$_FILES['image']['name'];
 
 $image=file_get_contents($image);
 $image_d=base64_encode($image);

  $query=mysqli_query($conn,"SELECT * FROM restaurant_details WHERE Hotel_ID='$Hotel_ID'");
  $result = mysqli_num_rows($query);
  if($result>0){
    $sql="UPDATE `restaurant_details` SET `Password`='$password',`Phone_number`='$phone_number',`Landline_number`='$landline_number',`Opening_timing`='$opening_timing',`Closing_timing`='$closing_timing',`Hotel_Image`='$image_d' WHERE `Hotel_ID` = '$Hotel_ID'";
    if(mysqli_query($conn,$sql)){
        echo '<script type="text/javascript" language="javascript">
        alert("Successfully Modified your profile.");   
        history.go(-1);
        </script>';
      }
      else{
        echo '<script type="text/javascript" language="javascript">
        alert("unable to Modify your profile.Please try later");   
        history.go(-1)
        </script>';
      }
  }
  else{
    echo '<script type="text/javascript" language="javascript">
    alert("Error Please try later");   
    history.go(-1)
    </script>';
  }
}
?>

      <script src="js/view_profile.js"></script>
</html>

