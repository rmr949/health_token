function check_date()
{
//alert("got");
var ele=document.getElementById("picker");
var dat=ele.value;
var str=dat.split("-");
var date=new Date(parseInt(str[0]),parseInt(str[1])-1,parseInt(str[2]));
var today= new Date();
var diff=date.getTime() - today.getTime();
if(parseInt(diff / 1000 / 60 / 60 / 24)< 0)
	{
	 ele.value="";
	 alert("Selected date is not valid");
	}
}

function show_alert()
{
var ele=document.getElementById("picker");
var dat=ele.value;
if(!dat)
{	
	alert("Please select a date");
    	return false;
}

}
