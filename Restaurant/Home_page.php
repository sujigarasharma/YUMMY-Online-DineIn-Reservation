<!DOCTYPE html>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/Home_style.css">
<iframe  src = "top.html" scrolling ="no"  width =99% style=" border:0px; height:5.5vw;position:absolute;top: 1vw;"></iframe>
</head>
<body>
<hr class="hr_line"><br>
         <div id="mySidebar" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&#9932;</a>
            <a href="#" onclick="call_profile()">1.Profile</a>
            <a href="#" onclick="call_Banner()">2.Banner</a>
            <a href="#" onclick="call_cuisin()">3.Dishes</a>
            <a href="#" onclick="call_Order()">4.Order List</a>
            <a href="#" onclick="sign_out()"></a>
        </div>

        <div id="main">
            <button class="openbtn" onclick="openNav()"> &#9776; Menu</button>  
       </div>
<hr class="hr_line1"> 
      <div class="iframe_outer">
            <iframe  src = "" id="iframe_" width =99.8% style="border:0px; height:37.1vw;display:block;position: absolute;top: 9.9vw;margin-bottom: 0;"></iframe>
      </div>
<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "15vw";
  document.getElementById("main").style.marginLeft = "15.2vw";
  document.getElementById("iframe_").style.width="84.8%";
  document.getElementById("iframe_").style.marginLeft = "15%";
}
function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.getElementById("iframe_").style.width="99.8%";
  document.getElementById("iframe_").style.marginLeft = "0";
  document.getElementById("iframe_").style.transition="0.5s";
}
function call_profile(){
   document.getElementById("iframe_").src="view_profile.php";
   closeNav();
}
function call_Banner(){
   document.getElementById("iframe_").src="offer_banner.php";
   closeNav();
}
function call_cuisin(){
   document.getElementById("iframe_").src="Add_dishes.php";
   closeNav();
}
function call_Order(){
   document.getElementById("iframe_").src="Order.php";
   closeNav();
}
</script>
</body>
</html> 
