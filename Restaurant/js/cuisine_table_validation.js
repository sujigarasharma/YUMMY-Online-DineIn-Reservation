

function table_validation(){
  var rowcount = document.getElementById("ordertable").rows.length;
  var valid_exit=["jpeg","png","jpg"];
  for(var i=1;i<rowcount;i++){
      dishe_name=document.getElementById("Dishe_name["+i+"]");
      dishe_veg=document.getElementById("veg_dishe["+i+"]");
      dishe_non_veg=document.getElementById("non_veg_dishe["+i+"]");
      dishe_price=document.getElementById("Dishe_price["+i+"]");
      file_input=document.getElementById("Dishe_image"+i+"");
      Dishe_time=document.getElementById("Dishe_time"+ i +"");
      Tiffin=document.getElementById("Tiffin"+ i +"");
      Lunch=document.getElementById("Lunch"+ i +"");
      Dinner=document.getElementById("Dinner"+ i +"");
 if (dishe_name.value == "") 
 { 
     alert("Select the Dishe in S.No "+i+""); 
     dishe_name.focus(); 
     return false; 
 }
 else if ( ( dishe_veg.checked == false ) && (dishe_non_veg.checked == false ) )
 {
 alert ( "Please choose Dishe Type: Veg or Non-Veg in S.no "+i+"" );
 return false;
 }
 else if (dishe_price.value == "") 
 { 
     alert("Enter Dishe Price in S.No "+i+""); 
     dishe_name.focus(); 
     return false; 
 }
 else if (file_input.value == "") 
      { 
          alert("Please select the Image in S.No "+i+""); 
          dishe_name.focus(); 
          return false; 
      }
 else if(file_input.value!=''){
    var img_ext=file_input.value.substring(file_input.value.lastIndexOf('.')+1);
    var result=valid_exit.includes(img_ext);
    if(result==false){
      alert("Selected file is not an image...... in S.No "+i+"");
      return false;
    }
    else{
      if(parseFloat(file_input.files[0].size/(1020*1020))>=4){
        alert("File size must be smaller than 4 MB. Current File size : "+parseFloat(file_input.files[0].size/(1020*1020)).toFixed(1)+" MB in S.No "+i+"");
        return false;
      }
    }
  }
  if(Tiffin.checked){}
  else if(Lunch.checked){}
  else if(Dinner.checked){}
  else{
    alert("Please Select atleast one day time in S.No "+i+"");
    return false;
  }
}
}