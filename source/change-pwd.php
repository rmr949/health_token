<?PHP
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}

if(isset($_POST['submitted']))
{
   if($fgmembersite->ChangePassword())
   {
        $fgmembersite->RedirectToURL("changed-pwd.html");
   }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Change password</title>
            <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>

      <!--<link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css">-->
    <link href="assets/css/bootstrap.css" rel="stylesheet">  
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
    			<a class="brand" href="#">Health Token</a>
    			<div class="nav-collapse collapse">
    				<ul class="nav">
    					<li class="active">
    						<a href="pa-login-home.php">Home</a>
    					</li>
    					<li>
    						<a href="about.php">About</a>
    					</li>
    					<li>
    						<a href="contact.php">Contact</a>
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
<br/><br/><br/>
<div class="container">
    	<!-- Main hero unit for a primary marketing message or call to action
    	-->
    	<div class="hero-unit pull-left">

<!-- Form Code Start -->
<form id='changepwd' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>

<input type='hidden' name='submitted' id='submitted' value='1'/>

<div class='short_explanation'>* required fields</div>

<div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>

    <div class="control-group">
    				<div class="controls">
    <label for='oldpwd' >Old Password*:</label>
    <input type='password' name='oldpwd' id='oldpwd' maxlength="50" />
    <span id='changepwd_oldpwd_errorloc' class='error'></span>
</div>
</div>

<div class="control-group">
    				<div class="controls">
    <label for='newpwd' >New Password*:</label>
    <input type='password' name='newpwd' id='newpwd' maxlength="50" />
    <span id='changepwd_newpwd_errorloc' class='error'></span>
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
			Make sure your new password is hard to crack !
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
    var pwdwidget = new PasswordWidget('oldpwddiv','oldpwd');
    pwdwidget.enableGenerate = false;
    pwdwidget.enableShowStrength=false;
    pwdwidget.enableShowStrengthStr =false;
    pwdwidget.MakePWDWidget();
    
    var pwdwidget = new PasswordWidget('newpwddiv','newpwd');
    pwdwidget.MakePWDWidget();
    
    
    var frmvalidator  = new Validator("changepwd");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("oldpwd","req","Please provide your old password");
    
    frmvalidator.addValidation("newpwd","req","Please provide your new password");

// ]]>
</script>

</div>
<!--
Form Code End (see html-form-guide.com for more info.)
-->

</body>
</html>