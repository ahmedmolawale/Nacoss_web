<?php
		//require_once('includes/nacossite');
	
	function con(){
		 $connection = mysql_connect("XpertProCombined","nacossdbs_user","Nacossdb@2016");
		 //$connection = mysql_connect("localhost","root","");
		 
      if(!$connection){
        die("Could not create a connection to the server: ". mysql_error());
      }
      else{
          $select_db = mysql_select_db("nacoss_dbs");
          if(!$select_db){
              die("Could not connect to database: ". mysql_error());
          }else{
			  return true;
		  }
      }
		
	}

	function isValid($a){
		if($a!=1 and $a!=2 and $a!=3 and $a!=4 and $a!=5 and $a!=6 and $a!=7){
			return 'N';
		}
	}

	function authMatricNo($matric_no){
		$que="SELECT * FROM nacossite WHERE matric_no ='$matric_no'";
			$sel=mysql_query($que);
			$n = mysql_num_rows($sel);
			if($n < 1){
				return false;
			}else{
				return true;
			}
	}
	function registerNacossite($nacossite){
			$matric_no = $nacossite['matric_no'];
			$surname = $nacossite['surname'];
			$firstname = $nacossite['firstname'];
			$other_name = $nacossite['other_name'];
			$password = $nacossite['password'];
			$current_level = $nacossite['current_level'];
			$mode_of_entry = $nacossite['mode_of_entry'];									
			 $que="INSERT INTO nacossite VALUES (null,'$matric_no','$surname','$firstname','$other_name','$password','','','','$mode_of_entry','$current_level','','');";
				$sele = mysql_query($que) or die(mysql_error());
				$affected = mysql_affected_rows();
				if($affected >0){
					
				 return true;
				}else{
					return false;
				}
	}
	

		function authNacossite($matric_no,$shaPassword){
			$que = "SELECT * FROM nacossite WHERE matric_no='$matric_no' and password='$shaPassword'";
			$sel=mysql_query($que);
			$n=mysql_num_rows($sel);
			if($n<1){
				return false;
			}else{
				return true;
			}
	}
	function getNacossiteDetails($matric_no){
		$query = "SELECT * FROM nacossite WHERE matric_no = '$matric_no'";
		$sel=mysql_query($query);
		//getting the row returned
		$result = mysql_fetch_array($sel);
		return $result;
	}
	function log_transaction($matric_no,$transaction_id,$current_level,$amount,$paid,$transaction_fee,$paid_for){
		$date_time = date('Y/m/d'). " ". date("h:i:sa");
		 $que="INSERT INTO transaction VALUES (null,'$transaction_id','$matric_no','$amount','$transaction_fee','$current_level','$paid','$paid_for','$date_time');";
				$sele = mysql_query($que) or die(mysql_error());
				$affected = mysql_affected_rows();
				if($affected >0){
					
				 return true;
				}else{
					return false;
				}
	}
	function paymentDetails($matric_no){

		$query = "SELECT * FROM transaction WHERE matric_no = '$matric_no'";
		$sel=mysql_query($query);
		//getting the row returned
		$result = mysql_fetch_array($sel);
		return $result;
	}
	function update_password($matric_no,$shaPassword){
		$query = "UPDATE nacossite SET password = '$shaPassword' WHERE matric_no = '$matric_no'";
				mysql_query($query);
				$affected = mysql_affected_rows();
				if($affected >0){
				 return true;
				}else{
					return false;
				}
	}
	function updateImage($matric_no,$image_location){
		$query = "UPDATE nacossite SET image_location = '$image_location' WHERE matric_no = '$matric_no'";
				mysql_query($query);
				$affected = mysql_affected_rows();
				if($affected >0){
				 return true;
				}else{
					return false;
				}
	}
	function updateSignature($matric_no,$signature_location){
		$query = "UPDATE nacossite SET signature_location = '$signature_location' WHERE matric_no = '$matric_no'";
				mysql_query($query);
				$affected = mysql_affected_rows();
				if($affected >0){
				 return true;
				}else{
					return false;
				}
	}
	function updateImageAndSignature($matric_no,$image_location,$signature_location){
		$query = "UPDATE nacossite SET image_location ='$image_location', signature_location = '$signature_location' WHERE matric_no = '$matric_no'";
				mysql_query($query);
				$affected = mysql_affected_rows();
				if($affected >0){
				 return true;
				}else{
					return false;
				}
	}
	function getTransaction($matric_no,$current_level){

		$que="SELECT * FROM transaction WHERE matric_no ='$matric_no' AND level ='$current_level' AND paid ='success'";
			$sel=mysql_query($que);
			$n=mysql_num_rows($sel);
			if($n >0){  
				$result= mysql_fetch_array( $sel );
				return $result;
			}else{
				return false;
			}



	}
	function getPaidStatus($matric_no,$current_level){

		$que="SELECT * FROM transaction WHERE matric_no ='$matric_no' AND level ='$current_level' AND paid ='success'";
			$sel=mysql_query($que);
			$n=mysql_num_rows($sel);
			if($n >0){  
				return true;
			}else{
				return false;
			}
	}


	//the below functions are overloaded 
	function updateNacossite($matric_no,$shaPassword,$email,$address,$phone_number){

		$query = "UPDATE nacossite SET password = '$shaPassword', email = '$email',
		 address = '$address', phone_number = '$phone_number' WHERE matric_no = '$matric_no'";
				mysql_query($query);
				$affected = mysql_affected_rows();
				if($affected >0){
				 return true;
				}else{
					return false;
				}
	}
	function updateNacossite2($matric_no,$email,$address,$phone_number){

		$query = "UPDATE nacossite SET email = '$email',
		 address = '$address', phone_number = '$phone_number' WHERE matric_no = '$matric_no'";
				mysql_query($query);
				$affected = mysql_affected_rows();
				if($affected >0){
				 return true;
				}else{
					return false;
				}
	}

	function hashPasswords(){
		$que="SELECT id,password FROM nacossite"; //get every nacossite
			$sel=mysql_query($que);
			$n=mysql_num_rows($sel);
			if($n >0){  
				while($resultRow= mysql_fetch_array( $sel )){
				$password = $resultRow['password'];
				$id = $resultRow['id'];
				//hash it and update the row back
				$shaPassword = sha1($password);
				$query = "UPDATE nacossite SET password = '$shaPassword' WHERE id = '$id'";
				mysql_query($query);
				$affected = mysql_affected_rows();
				if($affected >0){
				$message = "Hashed ". $id. $shaPassword;
				}
				}
			return $message;
			}else{
				return "Unable";
			}
	}
	
	function checkmatricsdc($a){
		$que="SELECT * FROM sdc_user WHERE matric='$a'";
			$sel=mysql_query($que);
			$n=mysql_num_rows($sel);
			if($n>0){
				return 'N';
			}
			
	}
	function checkmatricdinner($a){
		$que="SELECT * FROM dinner_user WHERE matric='$a'";
			$sel=mysql_query($que);
			$n=mysql_num_rows($sel);
			if($n>0){
				return 'N';
			}
	}
	 function insertdinner($umatric,$uname,$phoneno,$ulevel,$uemail){
			 
			 $que="INSERT INTO dinner_user VALUES ('$umatric','$uname','$phoneno','$ulevel','$uemail') ";
			 $sel=mysql_query($que);
		 }
		 
		 
		 function insertsdc($umatric,$uname,$phoneno,$ulevel,$uemail){
			 
			 $que="INSERT INTO sdc_user VALUES ('$umatric','$uname','$phoneno','$ulevel','$uemail') ";
			 $sel=mysql_query($que);
		 }


	function getLinkStat($a){
		if($a==''){
			return "<i class='icon-remove'></i> None";
		}else{
			return "<a href='$a' target='_blank' title='Click to open link'><i class='icon-ok'></i> $a</a>";
		}
	}

		function thishead($header_add_on){
		$ret =  "<header class='navbar navbar-inverse navbar-fixed-top wet-asphalt' role='banner'>
        <div class='container'>
            <div class='navbar-header'>
                <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-collapse'>
                    <span class='sr-only'>Toggle navigation</span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                </button>
                <a class='navbar-brand' href='http://www.nacoss.org.ng'><img src='images/ico/logo.png' alt='logo'></a>
            </div>
            <div class='collapse navbar-collapse'>
                <ul class='nav navbar-nav navbar-right'>
                    <li><a href='index.php'><i class='icon-home'></i>Home</a></li>
					<li><a href='http://www.nacossui.org.ng/register.php'><i class='icon-home'></i>Register</a></li>
					 <li><a href='http://www.nacossui.org.ng/sign_in.php'><i class='icon-flag'></i>$header_add_on</a></li>
					 <li><a href='http://www.nacossui.org.ng/team.php'><i class='icon-user'></i> Nacoss Team</a></li> 
                    <li><a href='http://www.nacossui.org.ng/about.php'><i class='icon-flag'></i> About Us</a></li>
                    
                    <li><a href='http://www.nacossui.org.ng/contact.php'><i class='icon-globe'></i> Contact</a></li>
                    <li class='dropdown'>
                        <a href='#' class='dropdown-toggle' data-toggle='dropdown'><i class='icon-hdd'></i> Resources <i class='icon-angle-down'></i></a>
                        <ul class='dropdown-menu'>
                            <li><a href='http://www.nacossui.org.ng/elibrary.php'><i class='icon-folder-open'></i> E-library</a></li>
                            <li><a href='http://www.nacossui.org.ng/etest.php'><i class='icon-ok'></i> E-test</a></li>
                            <li><a href='http://www.nacossui.org.ng/career_guide.php'><i class='icon-road'></i> Career</a></li>
                            <li><a href='http://www.nacossui.org.ng/cgpa.php'><i class='icon-th'></i> CGPA calculator</a></li>
                           
                        </ul>
                </ul>
            </div>
        </div>
    </header>";

    	return $ret; 
	}

	
	function thisfooter(){
		$copyright = date('Y');

	$ret = "<footer id='footer' class='midnight-blue'>
        <div class='container'>
            <div class='row'>
                <div class='col-sm-6'>
                    &copy; $copyright Designed - <a>Nacoss Unibadan</a>&reg; 
                </div>
                <div class='col-sm-6'>
                    <ul class='pull-right'>
                        <li><a href='index.php'>Home</a></li>
                        <li><a href='http://www.nacossui.org.ng/about.php'>About</a></li>
                        <li><a  href='http://www.nacossui.org.ng/contact.php'>Contact Us</a></li>
                        <li><a id='gototop' class='gototop' href='#''><i class='icon-chevron-up'></i></a></li><!--#gototop-->
                    </ul>
                </div>
            </div>
        </div>
    </footer>";
	return $ret;


}




	function getRep($a){
		if($a=="ebook"){
			return "<i class='icon-print'></i> Download"; 
		}elseif($a=="video"){
			return "<i class='icon-play'></i> Link"; 
		}else{
			return "<i class='icon-print'></i> Download"; 
		}

	}

	function getImg($a){
		if($a=="ebook"){
			return "pdf.png"; 
		}elseif($a=="video"){
			return "vid.png"; 
		}else{
			return "rdf.png"; 
		}

	}

	function getAlertType($a){
			if($a>=6.0 and $a<=7.0){	//first class
				return "success";
			}elseif($a>=4.6 and $a<6.0){ //2nd class upper
				return "info";
			}elseif($a>=2.6 and $a<4.6){ //2nd class lower
				return "block";
			}elseif($a>=1.6 and $a<2.5){ //3rd class
				return "block";
			}elseif($a>=1.0 and $a<1.5){ //pass
				return "error";
			}else{
				return "error";
			}
	}

	function getAdvise($a){
			if($a>=6.5 and $a<=7.0){	//first class
				return "F1";
			}elseif($a>=6.3 and $a<6.5){ 
				return "F2";
			}elseif($a==6.2){ 
				return "F3";
			}elseif($a>=6.0 and $a<6.2){ 
				return "F4";
			}elseif($a==5.9){ //2nd class UPPER
				return "SCU1";
			}elseif($a>=5.6 and $a<5.9){ 
				return "SCU2";
			}elseif($a>=5.1 and $a<5.6){ 
				return "SCU3";
			}elseif($a>=4.6 and $a<5.1){ 
				return "SCU4";
			}elseif($a>=4.3 and $a<4.6){ //SECOND CLASS LOWER
				return "SCL1";
			}elseif($a>=3.9 and $a<4.3){ 
				return "SCL2";
			}elseif($a>=3.5 and $a<3.9){ 
				return "SCL3";
			}elseif($a>=3.0 and $a<3.5){ 
				return "SCL4";
			}elseif($a>=2.6 and $a<3.0){ 
				return "SCL5";
			}elseif($a>=2.0 and $a<2.6){ //3rd class
				return "TC1";
			}elseif($a>=1.6 and $a<2.0){ 
				return "TC2";
			}elseif($a>=1.3 and $a<1.6){ //PASS
				return "P1";
			}elseif($a>=1.1 and $a<1.3){ 
				return "P2";
			}elseif($a==1){ 
				return "P3";
			}elseif($a>=0.6 and $a<1.0){ //FAIL
				return "FAIL";
			}else{ 
				return "error";
			}
	}

	function siteCredit(){
		return "Site Credit: Nkemelu Daniel K (@KNDanified | Web Developer), Abiodun Salawu (Team Lead), Titilayo Samuel O (Project Manager)                    Okemakinde Samson, Afolabi Williams J, Akindele Akinyemi(Content Contributors)";
	}

	function getGrade($a){
			if($a>=70 and $a<=100){
				return 7;
			}elseif($a>=65 and $a<70){
				return 6;
			}elseif($a>=60 and $a<65){
				return 5;
			}elseif($a>=55 and $a<60){
				return 4;
			}elseif($a>=50 and $a<55){
				return 3;
			}elseif($a>=45 and $a<50){
				return 2;
			}elseif($a>=40 and $a<45){
				return 1;
			}else{
				return 0;
			}
	}
	
	function checkMatric($a){
			$que="SELECT * FROM nac_user WHERE matric='$a'";
			$sel=mysql_query($que);
			$n=mysql_num_rows($sel);
			if($n>0){
				return 1;
			}else{
				return 0;
			}
	}	

	function payPrint($a,$fname){
		if($a!=PAID){
			$ret="<a href='#' class='btn btn-danger' data-rel='popover' data-content='Unfortunately, it seems you have not paid the dues $fname.
			If you have paid, you are advised to wait for 24hrs for bank confirmation. If you still have issues after this period, kindly 
			contact us on XXXXXXXXXXX' title='Not Yet Paid'>UNABLE TO PRINT</a>";
		}else{
			$ret="<div class='form-actions'><input type='submit' name='submit' value='GET RECEIPT' class='btn btn-primary' style='font-size:13px;'/></div>";
		}
		return $ret;
	}


	//nacoss ends here

	function checkqstn($x){
			$que="SELECT * FROM question_bank WHERE qstn='$x'";
			$sel=mysql_query($que);
			$n=mysql_num_rows($sel);
			if($n>0){
				return 1;
			}
	}

	function qstn_total(){
			$que=mysql_query("SELECT * FROM question_bank");
			$n=mysql_num_rows($que);
			echo $n;
	}

	function getcount($x,$y){
			$que=mysql_query("SELECT * FROM question_bank where pers='$x' and asm_title='$y'");
			$n=mysql_num_rows($que);
			echo $n;
	}









	//stop here
	
	function email_exists($email){
			$que="SELECT * FROM mails WHERE email='$email' AND flag='U'";
			$sel=mysql_query($que);
			$n=mysql_num_rows($sel);
			if($n>0){
				return "Y";
			}
	}	
	
	function generate_id($val,$flag)
					{
						$rand_num = rand(1000000,9999999);
						$x = $val.microtime().$rand_num;
						$ret = SHA1(md5(SHA1($x)));
						return $ret;
					}
	
	function get_email_uname($x){
			$sel=mysql_query("SELECT * FROM users WHERE email='$x' 	AND flag='U'");
			$row=mysql_fetch_array($sel);
			$val=$row['fn']." ".$row['ln'];
			return $val;
		}
	
		
		function validate_email($email)
		{
			if(!ereg('^([a-z0-9_]|\\-|\\.)+'.'@'.'(([a-z0-9_]|\\-)+\\.)+'.'[a-z]{2,4}$',$email))
			{
				return 'N';
			}
		}
		function redirect_to( $location = NULL ) {
 			 if ($location != NULL) {
    		header("Location: {$location}");
    		exit;
  }
}
	
?> 
