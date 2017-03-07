<?php
	session_start();
	require_once('includes/fnc.php');
	con();

	$uname = $_SESSION['uname'];

	// if(!isset($uname) or $_SESSION['logged']=="0"){
    //     unset($_SESSION['uname']);
    //     header("location:index.php");
    // } 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Nacoss UI Admin Panel</title>
			<link rel="shortcut icon" href="assets/images/img-search.png">
            <link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css" />
            <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css" type="text/css" />
			<link rel="stylesheet" href="assets/css/fontfaces.css" type="text/css" />
			<link rel="stylesheet" href="assets/css/common.css" type="text/css" />
            <link rel="stylesheet" href="assets/css/mainlayout.css" type="text/css" />
			
			
			<script src="js/jquery-1.8.2.min.js" type="text/javascript"/></script>
			<script type="text/javascript" src="poll.php"></script>
	</head>
<body>
			<noscript>
                <div class="noscript_header"><div id="inner">PLEASE ENABLE JAVASCRIPT ON THIS BROWSER TO GET A BETTER EXPERIENCE OF THIS PORTAL.</div></div>
                <div class="noscript"></div>
            </noscript>
			
			<div class="cwide main-container">
				<section class="main-search-sec">
		    		<div style="float:left"><h2><a href="index.php">NACOSS UI</a></h2></div>
					<div class="myul" style="float:right">
						<ul style="list-style:none;">
							<li><a href="add_news.php">UPLOAD NEWS</a></li>
							<li><a href="change.php">UPDATE ACCOUNT</a></li>
							<li><a href="index.php?action=logout">LOGOUT</a></li>
						</ul>
					</div>
					<div class="clearfix"></div>
		    	</section>
			
		    	<section class="main-search-sectionz">
		    		<h3><b>Welcome <?php echo ucfirst($uname); ?>!</b> </h3><br/><h4>Select an action to perform.</h4>
		    	</section>
				
		    	
			<section class="main-footer-sect">
				<div class="cwide">
					<div>
						<ul class="footer-ul list-unstyled">
							<li><a><b>&copy; 2015 NACOSS UI &reg;</b></a></li>
							<li><a href="contact.php">Contact</a></li>
							<li><a href="terms.php">Terms of Use</a></li>
						</ul>
					</div>
				</div>
			</div>

            </body>
        </html>