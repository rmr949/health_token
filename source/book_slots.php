<?PHP
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Le styles -->
    <script src="scripts/book_slots.js"></script>
    <link href="assets/css/bootstrap.css" rel="stylesheet">

      <link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css" />
      <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>

    <style>
      body { padding-top: 60px; /* 60px to make the container go all the way
      to the bottom of the topbar */ }
    </style>
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js">
      </script>
    <![endif]-->
    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
    <style>
    </style>
  </head>
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
    	<div class="navbar-inner">
    		<div class="container">
    			<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
    				<span class="icon-bar"></span>
    				<span class="icon-bar"></span>
    				<span class="icon-bar"></span>
    			</button>
    			<a class="brand" href="#">Health Token</a>
    			<div class="nav-collapse collapse">
    				<ul class="nav">
    					<li>
    						<a href="pa-login-home.php">Home</a>
    					</li>
    					<li>
    						<a href="about.html">About</a>
    					</li>
    					<li>
    						<a href="contact.html">Contact</a>
    					</li>
    				</ul>
				<ul class="nav pull-right">
					<li>
    						<a class="pull-right" href="pa-login-home.php"><?= $fgmembersite->UserFullName(); ?></a>
    					</li>
					<li>
    						<a class="pull-right" href="logout.php">Logout</a>
    					</li>
				</ul>
    			</div>
    			<!--/.nav-collapse -->
    		</div>
    	</div>
    </div>

<!-- Form Code Start -->
        <form method="post" action="">
                <!-- <p>Select date : <input type="text" id="datepicker" name ="date" onchange="check_date()" /></p> -->
		
		<label>Select Date : <input type="date"  id="picker" name ="date" onchange="check_date()" /></label>
		<input type="hidden" name="doc_id" value="<?php echo $_GET['id'] ?>"/>
		<button type="submit" name="search" class="btn btn-primary" onclick="return show_alert()">
    				Check
		</button>
        </form>
<?php

if(isset($_POST['check_slot']))
{       
	$doc_id=$_POST['doc_id'];
	
	if(!$fgmembersite->DBLogin())
	{
 		$fgmembersite->HandleError("Database login failed!");
            		return false;
	}	
	$date=$_POST['date'];
	//list($month,$day,$year)=split('/',$date);
	list($year,$month,$day)=split('-',$date);
	$selected=mktime(0,0,0,intval($month),intval($day),intval($year));	// SELECTED DATE BY PATIENT
	$week_day = strtolower(date('D',$selected));
	
	$query="select ".$week_day." from slots where id='".$doc_id."'"; 
  	$result=mysql_query($query,$fgmembersite->connection) or die(mysql_error());;
        $row=mysql_fetch_array($result);
	$slots=$row[$week_day];
	//echo $slots;			// time slots on that day

	$usermail=$fgmembersite->UserEmail();
	$query="select uid from pa where email='".$usermail."'";
        $result=mysql_query($query,$fgmembersite->connection) or die(mysql_error());
        $row=mysql_fetch_array($result);
        $pa_id=intval($row['uid']);
	
	////////////// check if any other apoointments are there on same day //////////
	$query="SELECT available,date FROM booked_slots WHERE did='".$doc_id."'";
        $result=mysql_query($query,$fgmembersite->connection) or die(mysql_error());
        while($row=mysql_fetch_array($result))
	{	if($row['date'] == $selected)
			$slots=$row['available'];		
	}
	$timings=explode("/",$slots);
	echo "</br>";
	echo "<h4>available timings</h4>";
	echo "<form method=\"POST\" id=\"form_timeslot\" action=\"confirm_appointment.php\">";
	foreach($timings as $key=>$val)
	{
		if($val != "NA")
		{
			$times=explode("-",$val);
			$from=date("h:i A",$times[0]);
			$to=date("h:i A",$times[1]);
			echo "<label><input type=\"radio\" name=\"selected_slot\" value=\"".$val."\" />&nbsp".$from." to ".$to."</label>";
			echo "</br>";
		}
	}	
	?>
	<input type="hidden" name="doc_id" value="<?php echo $doc_id ?>"/>
	<input type="hidden" name="pa_id" value="<?php echo $pa_id ?>"/>
	<input type="hidden" name="date" value="<?php echo $selected ?>"/>
	<input type="hidden" name="slots" value="<?php echo $slots ?>"/>
	</br>
	<input type="submit" value="get appointment" name="submitted" onclick="return confirm('Are you sure you want to continue')" />
<?php		
}

?>

</body>
</html>



