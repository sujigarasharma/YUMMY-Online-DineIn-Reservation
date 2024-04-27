
	
function ValidateForm(frm) 
{
	if (frm.dishid.value == "") 
	{ 
		alert('dishid is required.'); 
		frm.dishid.focus(); 
		return false; 
	}
	if (frm.dishname.value == "")
	{ 
		alert('dishname is required.'); 
		frm.dishname.focus(); 
		return false; 
	}
 	if (frm.DishType.value == "") 
	{ 
		alert('DishType is required.');
		frm.DishType.focus(); 
		return false; 
	}
 	if (frm.VegorNonveg.value == "") 
	{ 
		alert('VegorNonveg is required.');
		frm.VegorNonveg.focus(); 
		return false; 
	}
}
