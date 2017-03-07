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
			$del=mysql_query("DELETE FROM nac_press where id='$t'");	
	}

	if(isset($_POST['submit'])){
		
		if($_FILES['file']['name']==""){
			$regerr = "<div class='alert alert-error' style='margin:10px; font-size: 14px; font-family:'Segoe UI''>
                                    <strong>Oops! </strong>No book found.
                       </div>";
		}

		$fname = $_POST['fname'];
		$udate = date("d M, Y");
			//for file
			$file_dir="../assets/press/";
			$file_d="assets/press/";

			$temp_file=$_FILES['file']['tmp_name'];
			$file_name=$_FILES['file']['name'];
			$file_size=$_FILES['file']['size'];
			$file_type=$_FILES['file']['type'];

			$uploadfile = $file_dir.$file_name;
			$file_r = $file_d.$file_name;
					
			$move_file=move_uploaded_file($temp_file,$uploadfile);


		if(!$fname or !$file_name){
			$regerr = "<div class='alert alert-error' style='margin:10px; font-size: 14px; font-family:'Segoe UI''>
                                    <strong>Oops! </strong>All fields are required.
                       </div>";
		}else{
			$ins = mysql_query("INSERT INTO nac_press VALUES ('null','$fname','$file_r','NACOSS PRESS','$udate')");
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
		    		<div style="float:left"><h2><a href="index.php">NACOSS</a></h2></div>
					<div class="myul" style="float:right">
						<ul style="list-style:none;">
							<li><a href="change.php">CHANGE PASSWORD</a></li>
							<li><a href="index.php?action=logout">LOGOUT</a></li>
						</ul>
					</div>
					<div class="clearfix"></div>
		    	</section>
			
		    	<section class="main-search-sectionz">
		    		<h3>Welcome, <?php echo $uname; ?><br/><br/> <b>Upload Article</b></h3>
		    		<?php echo $regerr; ?>
		    		<form method="POST" enctype="multipart/form-data">
		    		<table cellpadding="10" width="100%">
		    			<tr><td colspan="2"><B>ARTICLE DETAILS</B></td></tr>
		    			<tr><td>Title:</td><td><input type="text" value="" name="fname" style="padding:3px; font-size: 13px; width: 250px;"></td></tr>
		    			<tr><td>Uploaded By:</td><td><input type="text" disabled='disabled' value="NACOSS PRESS" name="umail" style="padding:3px; font-size: 13px; width: 250px;"></td></tr>
		    			<tr><td>Upload File:</td><td><input name="file" type="file" id="file" size="10"></td></tr>	    			
		    			<tr><td colspan="6"><input type="submit" name="submit" value="UPLOAD NEWS" style="background-color:#005128; color: #FFF; font-size: 18px; padding: 7px; float: right; font-weight: bold"></td></tr>
		    		</table>
		    		</form>
		    		<br/><br/><br/>
		    		<table cellpadding="10" width="100%">
		    			<tr><td colspan="2"><B>LIST OF PRESS RELEASES</B></td></tr>
		    			<tr><td><b>NEWS TITLE</b></td><td><b>Action</b></td></tr>
		    			<?php $ret = mysql_query("SELECT * FROM nac_press");
		    				  while($d=mysql_fetch_array($ret)){
		    				  	?><tr><td><?php echo $d['title']; ?></td><td><a href="press.php?action=delete&delid=<?php echo $d['id']; ?>">DELETE</a></td></tr><?php
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