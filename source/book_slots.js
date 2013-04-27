function check_date()
{
var ele=document.getElementById("datepicker");
var dat=ele.value;
var str=dat.split("/");
//alert(str[2]);
var date=new Date(parseInt(str[2]),parseInt(str[0])-1,parseInt(str[1]));
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
if(confirm("Do you really want to do  this?"))
    document.getElementById('form_timeslot').submit();
  else
    return false;


}
