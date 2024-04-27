total= document.getElementById("total_image_value").value;
for(i=1;i<=total;i++){
    document.getElementById("submit"+i+"").style.display = 'none';
    document.getElementById("file_input"+i+"").style.display='none';
    document.getElementById("cancel"+i+"").style.display='none';
} 
function edit(x){
    for(i=1;i<=total;i++){
        document.getElementById("togglePassword"+i+"").style.display='none';
    }
    for(i=1;i<=x;i++){
        if(x==i){
            document.getElementById("submit"+i+"").style.display = 'block';
            document.getElementById("file_input"+i+"").style.display='block';
            document.getElementById("cancel"+i+"").style.display='block';
            document.getElementById("edit"+i+"").style.display='none';
           }
    }
}
function cancel(x){
    for(i=1;i<=x;i++){
        if(x==i){
    document.getElementById("submit"+i+"").style.display = 'none';
    document.getElementById("file_input"+i+"").style.display='none';
    document.getElementById("cancel"+i+"").style.display='none';
    document.getElementById("edit"+i+"").style.display='block';
    for(i=1;i<=total;i++){
      document.getElementById("togglePassword"+i+"").style.display='block';
  }
  }
   }
   
}

function validation(x){
      
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

   