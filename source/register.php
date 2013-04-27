<?PHP
require_once("./include/membersite_config.php");

if(isset($_POST['submitted']))
{
   if($fgmembersite->RegisterUser())
   {
        $fgmembersite->RedirectToURL("thank-you.html");
   }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
    <meta charset="utf-8">
    <title>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <script type="text/javascript">
	function validate(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}
    </script>
    <!-- Le styles -->
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
    						<a href="home.html">Home</a>
    					</li>
    					<li>
    						<a href="about.html">About</a>
    					</li>
    					<li>
    						<a href="contact.html">Contact</a>
    					</li>
    				</ul>
    			</div>
    			<!--/.nav-collapse -->
    		</div>
    	</div>
    </div>

<!-- Form Code Start -->
<div class="container">
    	<!-- Main hero unit for a primary marketing message or call to action
    	-->
    	<!-- Example row of columns -->
	<br><br><br>
    	<div class="hero-unit pull-left">
	<form id='register' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>

	<input type='hidden' name='submitted' id='submitted' value='1'/>
	<!--<input type='text'  class='spmhidip' name='<?php echo $fgmembersite->GetSpamTrapInputName(); ?>' />-->
	<div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>

			<div class="control-group">
    				<div class="controls">
					<label for='name' >name*:</label>
    					<input type="text" name='name' id='name' maxlength="50">
					<span id='register_name_errorloc' class='error'></span>
    				</div>
    			</div>
			<div class="control-group">
    				<div class="controls">
					<label for='email' >Email Address*:</label>
    					<input type="text" name='email' id='email' maxlength="50">
					<span id='register_email_errorloc' class='error'></span>
    				</div>
    			</div>
    			
			
<div class="control-group">
    				<div class="controls">
    <label for='mob' >Mobile Number*:</label>
    <input type='text' onkeypress='validate(event)' name='mob' id='mob' maxlength="10"  />
    <span id='register_mob_errorloc' class='error'></span>
</div>
</div>
<div class="control-group">
    				<div class="controls">
    <label for='age' >Age*:</label>
    <input type='text' name='age' id='age' onkeypress='validate(event)' maxlength="3"  />
    <span id='register_age_errorloc' class='error'></span>
</div>
</div>
<div class="control-group">
    				<div class="controls">
    <label for='sex' >You are*:</label>
	<select name="sex">
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
    <span id='register_sex_errorloc' class='error'></span>
</div>
</div>
<div class="control-group">
    				<div class="controls">
    <label for='address' >Address*:</label>
    <input type='text' name='address' id='address' value='<?php echo $fgmembersite->SafeDisplay('address') ?>' maxlength="250" /><br/>
    <span id='register_address_errorloc' class='error'></span>
</div>
</div>
<div class="control-group">
    				<div class="controls">
    <label for='city' >City*:</label>
    <input type='text' name='city' id='city' value='<?php echo $fgmembersite->SafeDisplay('city') ?>' maxlength="50" /><br/>
    <span id='register_city_errorloc' class='error'></span>
</div>
</div>
<div class="control-group">
    				<div class="controls">
    <label for='state' >State*:</label>
    <input type='text' name='state' id='state' value='<?php echo $fgmembersite->SafeDisplay('state') ?>' maxlength="50" /><br/>
    <span id='register_state_errorloc' class='error'></span>
</div>
</div>
<div class="control-group">
    				<div class="controls">
    <label for='country' >Country*:</label>
    <input type='text' name='country' id='country' value='<?php echo $fgmembersite->SafeDisplay('country') ?>' maxlength="50" /><br/>
    <span id='register_country_errorloc' class='error'></span>
</div>
</div>
<div class="control-group">
    				<div class="controls">
    <label for='password' >Password*:</label>
    <input type='password' name='password' id='password' maxlength="50" />
</div>
</div>

<button type="submit" class="btn btn-primary">
    				Submit
</button>

</form>
</div>
	<br><br><br><br>
	<div class="well">
		<h3>
			Your are just one step away from joining us !
		</h3>
	</div>

    </div>
    <!-- /container -->
      <footer>
      <hr>
      &copy health token
      </footer>
<style>
      
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js">
    </script>
    <script src="assets/js/bootstrap.js">
    </script>
    <script>

    </script>
<!-- client-side Form Validations:
Uses the excellent form validation script from JavaScript-coder.com-->

<script type='text/javascript'>
// <![CDATA[
    var pwdwidget = new PasswordWidget('thepwddiv','password');
    pwdwidget.MakePWDWidget();
    
    var frmvalidator  = new Validator("register");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("name","req","Please provide your name");

    frmvalidator.addValidation("email","req","Please provide your email address");

    frmvalidator.addValidation("email","email","Please provide a valid email address");
    
    frmvalidator.addValidation("password","req","Please provide a password");

    frmvalidator.addValidation("mob","req","Please provide a valid mobile number");
  
    frmvalidator.addValidation("mob","maxlen=10","Please provide a valid mobile number");

    frmvalidator.addValidation("mob","numeric","Please provide a valid mobile number");


    frmvalidator.addValidation("age","gt=0","Please provide age");

    frmvalidator.addValidation("age","lt=150","Please provide age");

    frmvalidator.addValidation("age","req","Please provide age");

    frmvalidator.addValidation("city","req","Please provide city");

    frmvalidator.addValidation("state","req","Please provide state");

    frmvalidator.addValidation("country","req","Please provide country");

    frmvalidator.addValidation("city","maxlen=50","Please provide valid city <50 chars");

    frmvalidator.addValidation("state","maxlen=50","Please provide valid state <50 chars");

    frmvalidator.addValidation("country","maxlen=50","Please provide valid country <50 chars");


    frmvalidator.addValidation("address","req","Please provide valid address");

    frmvalidator.addValidation("address","maxlen=250","Please provide valid address < 250 chars");

    

// ]]>
</script>

<!--
Form Code End (see html-form-guide.com for more info.)
-->

</body>
</html>