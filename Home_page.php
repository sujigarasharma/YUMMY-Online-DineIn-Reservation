<?php
include('Restaurant/config.php');
session_start();
 $Hotel_name = "SELECT * FROM restaurant_details";
 $Hotel_row_result = mysqli_query($conn,$Hotel_name);
 $Hotel_row_table=mysqli_num_rows($Hotel_row_result);
echo'
    <!DOCTYPE html>
        <html lang="en">
           <head>
               <title></title>
                   <link rel="stylesheet" href="CSS/home_page_style.css">
                   <link rel="stylesheet" type="text/css" href="CSS/headstyle.css">
                   <link rel="stylesheet" type="text/css" href="CSS/swal_alert.css">
                   <link  rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.theme.min.css"integrity="sha512-wCwx+DYp8LDIaTem/rpXubV/C1WiNRsEVqoztV0NZm8tiTvsUeSlA/Uz02VTGSiqfzAHD4RnqVoevMcRZgYEcQ=="crossorigin="anonymous" referrerpolicy="no-referrer" />
                   <link  rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.min.css"integrity="sha512-wYsVD8ho6rJOAo1Xf92gguhOGQ+aWgxuyKydjyEax4bnuEmHUt6VGwgpUqN8VlB4w50d0nt+ZL+3pgaFMAmdNQ=="crossorigin="anonymous" referrerpolicy="no-referrer" />    
                   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                   </head>
           <body>
           <div id="body1">
    
         <a href="http://localhost/project_yummy/Home_page.php"><img src="Image/logo.png" name="logo" id="logo"></a>
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
         <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/glide.js" integrity="sha512-isL0X0NIGuM6rzb9zZ0J18tMNlRCDaLew8hfE85AtQUWuM675YRoFovkbUeKssvgQMGg8YQMZ/eJMm8C/bH9HA=="crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <center>
           <div class="main">
             <div class="col-8">
               <div class="glide">
                <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                  <li class="glide__slide"><img  id="adimg" src="UploadImages/coupon/bann/bann1.jpg"/></li>
                  <li class="glide__slide"><img  id="adimg" src="UploadImages/coupon/bann/bann2.jpg"/></li>
                  <li class="glide__slide"><img  id="adimg" src="UploadImages/coupon/bann/bann3.jpg"/></li>
                  <li class="glide__slide"><img  id="adimg" src="UploadImages/coupon/bann/bann4.jpg"/></li>
                  <li class="glide__slide"><img  id="adimg" src="UploadImages/coupon/bann/bann5.jpg"/></li>
                  <li class="glide__slide"><img  id="adimg" src="UploadImages/coupon/bann/bann6.jpg"/></li>
                  <li class="glide__slide"><img  id="adimg" src="UploadImages/coupon/bann/bann1.jpg"/></li>
                  <li class="glide__slide"><img  id="adimg" src="UploadImages/coupon/bann/bann2.jpg"/></li>
                </ul>
              </div>
              <div class="glide__arrows" data-glide-el="controls">
                <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><img class="image_arrows" id="image_arrows_left" src="Image/left-arrow.png"></button>
                <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><img class="image_arrows" id="image_arrows_right" src="Image/right-arrow.png"></button>
              </div>
            </div>
           </div>
        </div> 
        <script>
          new Glide(".glide", {
                           type: "carousel",
                           startAt: 0,
                           perView: 6,   
                   }).mount()
        </script>
        <table class="table_2">
           <tr>
           <form method="POST" action="">
              <th class="th_1"><h3 class="total_rest">'.$Hotel_row_table.' restaurants</h3></th>   
              <th class="th_2"><button  onclick="Relevance()" name="submit1"  id="submit1" class="btn_title_style"><h3 id="Table_head_title1" class="Table_head_title">Relevance</h3></button></th>            
              <th class="th_2"><button onclick="Relevance()" name="submit2" id="submit2" class="btn_title_style"><h3 id="Table_head_title2" class="Table_head_title">Rating</h3></button></th>   
              <th class="th_2"><button onclick="Relevance()" name="submit3" id="submit3" class="btn_title_style"><h3 id="Table_head_title3" class="Table_head_title">Cost: Low To High</h3></button></th>   
              <th class="th_2"><button onclick="Relevance()" name="submit4" id="submit4" class="btn_title_style"><h3 id="Table_head_title4" class="Table_head_title">Cost: High To Low</h3></button></th> 
              <th class="th_6"></th>  
           </form> 
           </tr>
        </table>
        <div class="iframe_outer">
                 <iframe  src="Hotel_Relevance.php" id="iframe_" onload="resizeIframe(this)" height="auto" width=90% style="border:0px;display:block;position: absolute;top:26.2vw; left: 6vw;margin-bottom: 0"></iframe>
        </div>
        <script>
           function resizeIframe(obj) {
                 obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + "px";
            }
           function Relevance(){
               document.getElementById("iframe_").src="Hotel_Relevance.php";
           }
        </script>
        </center>
        </body>
        </html>';
if(isset($_POST['submit1'])){
  $page_number="1";
  $_SESSION["page_num"]=$page_number;
  echo'
       <script>
       document.getElementById("submit1").style.color = "red";
       document.getElementById("submit2").style.color = "black";
       document.getElementById("submit3").style.color = "black";
       document.getElementById("submit4").style.color = "black";
       </script>';
}
if(isset($_POST['submit2'])){
  $page_number="2";
  $_SESSION["page_num"]=$page_number;
   echo'
       <script>
       document.getElementById("submit1").style.color = "black";
       document.getElementById("submit2").style.color = "red";
       document.getElementById("submit3").style.color = "black";
       document.getElementById("submit4").style.color = "black";
       </script>';
}
if(isset($_POST['submit3'])){
  $page_number="3";
  $_SESSION["page_num"]=$page_number;
   echo'
       <script>
       document.getElementById("submit1").style.color = "black";
       document.getElementById("submit2").style.color = "black";
       document.getElementById("submit3").style.color = "red";
       document.getElementById("submit4").style.color = "black";
       </script>';
}
if(isset($_POST['submit4'])){
  $page_number="4";
  $_SESSION["page_num"]=$page_number;
   echo'
       <script>
       document.getElementById("submit1").style.color = "black";
       document.getElementById("submit2").style.color = "black";
       document.getElementById("submit3").style.color = "black";
       document.getElementById("submit4").style.color = "red";
       </script>';
}
?>