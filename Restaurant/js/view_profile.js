    document.getElementById("submit").style.display = 'none';
    document.getElementById("file_input").style.display='none'


  function edit(){
    input=document.getElementsByClassName("input");
    document.getElementById("phone_number").disabled = false;
    document.getElementById("landline_number").disabled = false ;
    document.getElementById("opening_time").disabled = false;
    document.getElementById("closing_time").disabled = false;
    document.getElementById("password").disabled = false;
    document.getElementById("submit").style.display = 'block';
    document.getElementById("file_input").style.display='block'
    input[0].style.backgroundColor = "white";
    input[1].style.backgroundColor = "white";
    input[2].style.backgroundColor = "white";
    input[3].style.backgroundColor = "white";
    input[5].style.backgroundColor = "white";
  }


  function validateform(){
    phone_number=document.getElementById("phone_number");
    Landline_number=document.getElementById("landline_number");
    Hotel_opening_timing=document.getElementById("opening_time");
    Hotel_close_timing=document.getElementById("closing_time");
    Email_id=document.getElementById("Email_id");
    password=document.getElementById("password");
    file_input=document.getElementById("file_input");
    var lowerCaseLetters = /[a-z]/g;
	  var upperCaseLetters = /[A-Z]/g;
  	var numbers = /[0-9]/g;
  	var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;

   if(phone_number.value==""){
     alert("phone number is required");
     phone_number.focus(); 
	   return false; 
   }
   else if(phone_number.value.length != 10)
   { 
     alert('Please enter a valid Phone Number.'); 
     phone_number.focus(); 
     return false; 
   }
   if (phone_number.value.match(upperCaseLetters)||phone_number.value.match(lowerCaseLetters)||phone_number.value.match(format))
   { 
     alert('Please enter a valid Phone Number.'); 
     phone_number.focus(); 
     return false; 
  }
   else if(Landline_number.value==""){
    alert("Landline_number is required");
    Landline_number.focus(); 
    return false; 
   }
   else if(Landline_number.value.length != 10){
    alert("Landline_number is required");
    Landline_number.focus(); 
    return false; 
   }
   else if(Hotel_opening_timing.value==""){
    alert("Opening Timing is required");
    Hotel_opening_timing.focus(); 
    return false; 
   }
   else if(Hotel_close_timing.value==""){
    alert("Closing Timing is required");
    Hotel_close_timing.focus(); 
    return false; 
   }
   else if(Email_id.value==""){
    alert("Email id is required");
    Email_id.focus(); 
    return false; 
   }
   else if (Email_id.value.indexOf("@") < 1 || Email_id.value.indexOf(".") < 1) 
	 { 
		alert('Please enter a valid email address.'); 
		Email_id.focus(); 
		return false; 
	 }
    else if (password.value == "") 
   { 
     alert('Password is required.'); 
     password.focus(); 
     return false; 
   }
  if (lowerCaseLetters.test(password.value))
   { 
      if (upperCaseLetters.test(password.value))
     { 
        if (numbers.test(password.value))
       { 
          if (password.value.length >= 8)
         { 
           
         }
         else
         {
           alert('Password length should be more than 8 characters.'); 
           password.focus(); 
           return false; 
         }
       }
       else
       {
         alert('Numbers is required.'); 
         password.focus(); 
         return false; 
       }
     }
     else
     {
       alert('Upper Case Letters is required.'); 
       password.focus(); 
       return false; 
     }
    }
    else
    {
      alert('lower Case Letters is required.'); 
      password.focus(); 
      return false; 
    }
   if(file_input.value==""){
    alert('Hotel image is required'); 
    file_input.focus(); 
    return false; 
   }         
   var valid_exit=["jpeg","png","jpg"];
    if(file_input.value!=''){
      var img_ext=file_input.value.substring(file_input.value.lastIndexOf('.')+1);
      var result=valid_exit.includes(img_ext);
      if(result==false){
        alert("Selected file is not an image......");
        return false;
      }
      else{
        if(parseFloat(file_input.files[0].size/(1020*1020))>=4){
          alert("File size must be smaller than 4 MB. Current File size : "+parseFloat(file_input.files[0].size/(1020*1020)).toFixed(1)+" MB");
          return false;
        }
      }
    }
}