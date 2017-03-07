<?php
	session_start();
	require_once('includes/fnc.php');
	con();
       
	if($_GET['action']== "logout"){
        unset($_SESSION['uname']);
        $_SESSION['logged']="0";
    }


	if(isset($_POST['submit'])){
		
		$uname = $_POST['uname'];
		$upass = $_POST['upass'];
		$utype = $_POST['utype'];
		$shapass = sha1($upass);

		if(!$upass or !$uname or !$utype){
			$regerr = "<div class='alert alert-error' style='margin:10px; font-size: 14px; font-family:'Segoe UI''>
                                    <strong>Oops! </strong>All fields are required.
                       </div>";
		}elseif(check_uname($uname, $shapass, $utype)=='N'){
			$regerr = "<div class='alert alert-error' style='margin:10px; font-size: 14px; font-family:'Segoe UI''>
                                    <strong>Oops! </strong>Login details for <b>".$uname."</b> is incorrect. Kindly try again.
                       </div>";
		}else{
				if($utype=='admin'){
					$_SESSION['uname'] = $uname;
					$_SESSION['logged'] = 1;
					header("location:dashboard.php");
				}elseif($utype=='pro'){
					$_SESSION['uname'] = $uname;
					$_SESSION['logged'] = 1;
					header("location:pro.php");
				}elseif($utype=='press'){
					$_SESSION['uname'] = $uname;
					$_SESSION['logged'] = 1;
					header("location:press.php");
				}elseif($utype=='crep1' or $utype=='crep2'  or $utype=='crep3' or $utype=='crep4'){
					$_SESSION['uname'] = $uname;
					$_SESSION['crep'] = $utype;
					$_SESSION['logged'] = 1;
					header("location:crep.php");
				}else{
					$regerr = "<div class='alert alert-error' style='margin:10px; font-size: 14px; font-family:'Segoe UI''>
                                    <strong>Oops! </strong>Unable to proceed.
                       </div>";	
				}
		}
	}
	

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
					
					<div class="clearfix"></div>
		    	</section>
			
		    	<section class="main-search-sectionz">
		    		<h3><b>Admin Login</b></h3>
		    		<?php echo $regerr; ?>
		    		<form method="POST">
		    		<table cellpadding="10" width="100%">
		    			<tr><td colspan="2"><B>LOGIN DETAILS</B></td></tr>
		    			<tr><td>Username:</td><td><input type="text" value="<?php echo $uname; ?>" name="uname" style="padding:3px; font-size: 13px; width: 200px;"></td></tr>
		    			<tr><td>Password:</td><td><input type="password" value="<?php echo $upass; ?>" name="upass" style="padding:3px; font-size: 13px; width: 200px;"></td></tr>
		    			<tr><td>Log In As:</td><td><select name="utype" style="width: 200px; padding: 3px; font-size: 13px;"><option value="">--Log In Type--</option><option value="pro">PRO</option><<option value="press">Press</option><option value="crep1">100L Course Rep</option><option value="crep2">200L Course Rep</option><option value="crep3">300L Course Rep</option><option value="crep4">400L Course Rep</option><option value="admin">Administrator</option></select></td></tr>
		    			<tr><td colspan="6"><input type="submit" name="submit" value="LOGIN" style="background-color:#005128; color: #FFF; font-size: 18px; padding: 7px; float: right; font-weight: bold"></td></tr>
		    		</table>
		    		</form>
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