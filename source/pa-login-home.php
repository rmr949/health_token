<?PHP
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Home page</title>
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
    						<a href="#">Home</a>
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
<div class="container">
    	<!-- Main hero unit for a primary marketing message or call to action
    	-->
    	<div class="hero-unit">
    		<h1>
    			Hello <?= $fgmembersite->UserFullName(); ?>!
    		</h1>
    		<p>
    			How do you do today ! Want to get a checkup ? hit search !
    		</p>
    		<hr class="">
    		<a href="access-controlled.php" class="btn btn-primary btn-large">Search »</a>
    		<a href="pa-history.php" class="btn btn-primary btn-large">History »</a>
    	</div>
    	<!-- Example row of columns -->
    	<hr>
    	<footer>
    		<p class="jetstrap-highlighted">
    			© health token 2013
    		</p>
    	</footer>
    </div>
    <!-- /container -->

    <style>
      
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }

    </style>
<!--

<div id='fg_membersite_content'>
<h2>Home Page</h2>
Welcome back !

<p><a href='change-pwd.php'>Change password</a></p>

<p><a href='access-controlled.php'>A sample 'members-only' page</a></p>
<br><br><br>
<p><a href='logout.php'>Logout</a></p>
</div>
-->
</body>
</html>
