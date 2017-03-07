<?php
	session_start();
	require_once('includes/fnc.php');
	con();

	$uname = $_SESSION['uname'];

	if(!isset($uname) or $_SESSION['logged']=="0"){
        unset($_SESSION['uname']);
        header("location:index.php");
    } 

    $t=$_GET['delid'];
	if(($_GET['action']) == 'delete'){
			$del=mysql_query("DELETE FROM nac_news where id='$t'");	
	}

	if(isset($_POST['submit'])){
		
		$fname = $_POST['fname'];
		$ui = $_POST['uname'];
		$uname = mysql_real_escape_string($uname);
		$upass = $_POST['upass'];
		$udate = date("d M, Y");

		if(!$fname or !$ui){
			$regerr = "<div class='alert alert-error' style='margin:10px; font-size: 14px; font-family:'Segoe UI''>
                                    <strong>Oops! </strong>All fields are required.
                       </div>";
		}else{
			$ins = mysql_query("INSERT INTO nac_news VALUES ('null','$fname','$upass','ADMIN','$ui','$udate')");
			if($ins){
				$regerr = "<div class='alert alert-success' style='margin:10px; font-size: 14px; font-family:'Segoe UI''>
                                    <strong>Cool! </strong>Update successful.</div>";
			}else{
				$regerr = "<div class='alert alert-error' style='margin:10px; font-size: 14px; font-family:'Segoe UI''>
                                    <strong>Oops! </strong>An error occured. Kindly try again.
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
		    		<h3>Welcome, <?php echo $uname; ?><br/><br/> <b>Upload News</b></h3>
		    		<?php echo $regerr; ?>
		    		<form method="POST">
		    		<table cellpadding="10" width="100%">
		    			<tr><td colspan="2"><B>NEWS DETAILS</B></td></tr>
		    			<tr><td>Title:</td><td><input type="text" value="" name="fname" style="padding:3px; font-size: 13px; width: 250px;"></td></tr>
		    			<tr><td>Uploaded By:</td><td><input type="text" disabled='disabled' value="ADMIN" name="umail" style="padding:3px; font-size: 13px; width: 250px;"></td></tr>
		    			<tr><td>Content:</td><td><input type="text" value="" name="uname" style="padding:3px; font-size: 13px; width: 250px; height: 50px"></td></tr>
		    			<tr><td>Any External Link?:</td><td><input type="text" value="" placeholder="Ignore if none, else start link with http://" name="upass" style="padding:3px; font-size: 13px; width: 250px;"></td></tr>		    			
		    			<tr><td colspan="6"><input type="submit" name="submit" value="UPLOAD NEWS" style="background-color:#005128; color: #FFF; font-size: 18px; padding: 7px; float: right; font-weight: bold"></td></tr>
		    		</table>
		    		</form>
		    		<br/><br/><br/>
		    		<table cellpadding="10" width="100%">
		    			<tr><td colspan="2"><B>NEWS LIST</B></td></tr>
		    			<tr><td><b>NEWS TITLE</b></td><td><b>Action</b></td></tr>
		    			<?php $ret = mysql_query("SELECT * FROM nac_news");
		    				  while($d=mysql_fetch_array($ret)){
		    				  	?><tr><td><?php echo $d['title']; ?></td><td><a href="add_news.php?action=delete&delid=<?php echo $d['id']; ?>">DELETE</a></td></tr><?php
		    				  } ?>
		    		</table>
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