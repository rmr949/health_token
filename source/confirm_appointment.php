<?php
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}
	$pid=$_POST['pa_id'];
	$did=$_POST['doc_id'];
	$date=$_POST['date'];
	$slots=$_POST['slots'];
	$selected_slot=$_POST['selected_slot'];
	$name=$fgmembersite->UserFullName();
	$email=$fgmembersite->UserEmail();

	$times=explode("-",$selected_slot);
	$from=$times[0];
	$to=$times[1];

if(isset($_POST['confirmed']))
{	
	$pid=$_POST['pa_id'];
	$did=$_POST['doc_id'];
	$date=$_POST['date'];
	$slots=$_POST['slots'];
	$selected_slot=$_POST['selected_slot'];
	$name=$fgmembersite->UserFullName();
	$email=$fgmembersite->UserEmail();

	$times=explode("-",$selected_slot);
	$from=$times[0];
	$to=$times[1];
	$from=$from+(15*60);			// change If u want
	//echo date("h:i A",$from);		// time to be updated
	if($from >= $to)
		$replace="NA";
	else
		$replace=$from."-".$to;
	echo "</br>";
	$new_slots=str_replace($selected_slot,$replace,$slots);		// Handle all exceptions

	/// UPDATE DB //////

	if(!$fgmembersite->DBLogin())
        {
                $fgmembersite->HandleError("Database login failed!");
                        return false;
        }
	$query="INSERT INTO booked_slots(pid, did, date, available, slot) VALUES ('".$pid."','".$did."','".$date."','".$new_slots."','".$times[0]."')";
        $result=mysql_query($query,$fgmembersite->connection) or die(mysql_error());
	
	/// send confirmation mail /////

	echo "<p> Confirmation mail is sent </p>";

}
else
{
	
	?>

	<html>
	 <head>
	 </head>
	<body>
	 <h2>Health Token appointment details</h2>
	 <form method="post" action="#">
		<p>Name : <?php echo $name;?></p>
	 	<p>Email : <?php echo $email;?></p>
	 	<p>Appointment time :<?php echo date("h:i A",$from);?></p>
	 	<input type="hidden" name="doc_id" value="<?php echo $did ?>"/>
        	<input type="hidden" name="pa_id" value="<?php echo $pid ?>"/>
        	<input type="hidden" name="date" value="<?php echo $date ?>"/>
        	<input type="hidden" name="slots" value="<?php echo $slots ?>"/>
        	<input type="hidden" name="selected_slot" value="<?php echo $selected_slot ?>"/>
		<a href=""><input type="button" value="go back"/></a> 
	 	<input type="submit" value="continue" name="confirmed"/>
	</form>
	</body>
	</html>

<?php
}
?>
