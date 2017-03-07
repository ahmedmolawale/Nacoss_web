<?php
	//all sql functions

	function con(){
		mysql_connect("XpertProCombined","nacossdbs_user","Nacossdb@2016");
		mysql_select_db("nacoss_dbs");
		return true;
	}

	function check_uname($mat,$a,$c){
		$sel=mysql_query("SELECT * FROM nac_admin WHERE uname='$mat' and upass='$a' and logtype='$c'");
		$dan=mysql_affected_rows();
		if($dan<1){
			return 'N';	
		}
	}

	function check_adname($mat){
		$sel=mysql_query("SELECT * FROM nac_admin WHERE uname='$mat'");
		$dan=mysql_affected_rows();
		if($dan>0){
			return 'N';	
		}
	}

	function getCrep($aa){
		if($aa=="crep1"){
			return "100L Course Rep";
		}elseif($aa=="crep2"){
			return "200L Course Rep";
		}elseif($aa=="crep3"){
			return "300L Course Rep";
		}elseif($aa=="crep4"){
			return "400L Course Rep";
		}else{
			return "ADMIN";
		}
	}

	