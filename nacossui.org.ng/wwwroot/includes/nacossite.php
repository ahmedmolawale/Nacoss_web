
<?php
	require_once('fns.php');
	 require_once "Mail.php";
	con();

class Nacossite{

protected static $table_name = "nacossite"; //specifying the table name 
	
	public $id;
	public $matric_no;
	public $surname;
	public $firstname;
	public $othername;
	public $password;
	public $email;
	public $phone_number;
	public $address;
	public $mode_of_entry;
	public $current_level;
	public $status;
    public $image_location;
    public $signature_location;

protected static $db_fields = array('id','staff_id','title','username','password',
	'first_name','last_name','gender','phone_number','address','email');
	//methods unique to this class user
	public function full_name(){

		if(isset($this->surname) && isset($this->firstname) && isset($this->othername)){
			return $this->surname. " ". $this->firstname. " ". $this->othername ;
		}else{
			return "";
		}
	}
	public static function findNacossite($matric_no){
		$result = getNacossiteDetails($matric_no);
		return self::instantiate($result);
	
	}
	public static function hasPaid($matric_no,$current_level){
		return getPaidStatus($matric_no,$current_level);
	}
	public static function updateNacossiteDetails($matric_no,$shaPassword,$email,$address,$phone_number){
	 return	updateNacossite($matric_no,$shaPassword,$email,$address,$phone_number);
	}
	public static function updateNacossiteDetails2($matric_no,$email,$address,$phone_number){

	 return	updateNacossite2($matric_no,$email,$address,$phone_number);
	}
	public static function updateImageLocation($matric_no,$image_location){
			return updateImage($matric_no,$image_location);

	}
	public static function updateSignatureLocation($found_nacossite){
			return updateSignature($found_nacossite->matric_no,$found_nacossite->signature_location);

	}
	public static function updateImageAndSignatureLocation($found_nacossite){
			return updateImageAndSignature($found_nacossite->matric_no,$found_nacossite->image_location,$found_nacossite->signature_location);

	}
	public static function updatePassword($matric_no,$shaPassword){

		return update_password($matric_no,$shaPassword);
	
	}

public static function logTransaction($matric_no,$transaction_id,$current_level,$amount,$paid,$transaction_fee,$paid_for){
	if($paid=="success"){
	
	$from = "Admin <admin@nacossui.org.ng>";
	$toTreasurer = "<ahmedmolawale@gmail.com>";
	$toFinancial = "<mgb4reel@gmail.com>";
                   
                    $subject = "Payment Notification";
                    $mailbody = "Hi,
					\n\nThis is to notify you that the student below made payment at www.nacossui.org.ng
					\nMatric No: ".$matric_no.
					"\nAmount paid: ".$amount.
					"\nDescription: Being payment for ".$paid_for.
					"\n\nThanks,
					\nAdministrator."
					;				
                    $host = "smtp.nacossui.org.ng"; //replace this with your domain's SMTP address
                    $username = "admin@nacossui.org.ng";
                    $password = "admin@Nacossui2017";

                    $headers1 = array ('From' => $from,
                    'To' => $toTreasurer,
                    'Subject' => $subject);
			//headers for the financial secretary
		$headers2 = array ('From' => $from,
                    'To' => $toFinancial,
                    'Subject' => $subject);

                    $smtp = Mail::factory('smtp',
                    array ('host' => $host,
                    'auth' => true,
                    'username' => $username,
                    'password' => $password));
					
		
                   

                    $mail1 = $smtp->send($toTreasurer, $headers1, $mailbody);
		$mail2 = $smtp->send($toFinancial, $headers2, $mailbody);

					
}
			 return log_transaction($matric_no,$transaction_id,$current_level,$amount,$paid,$transaction_fee,$paid_for);   //defined in the fns file
}
public static function getTransaction($matric_no,$current_level){

			$result = getTransaction($matric_no,$current_level);  //defined in the fns file
			$transaction_id = $result['transaction_id'];
			return $transaction_id;
}

public static function getPaymentDetails($matric_no){
		return paymentDetails($matric_no);
}


	public static function instantiate($record){
		$object = new Nacossite();  
//lets see a short-form approach...cos what if we have 50 columns for a particular record, do we have to do the above 50 times>
//that will be crazy, mehn!!!

	foreach($record as $attribute=>$value){
		if($object->has_attribute($attribute)){ //calling that method to confirm if the attribute actuall exist
			$object->$attribute = $value;
	}
}
return $object;
}
private function has_attribute($attribute){
//get_object_vars returns an associative array with all attributes
	//(incl. private ones!) as the keys and their current values as the value
	$object_vars = get_object_vars($this);
	//we dont care about the value, we just wanna know if the key exists
	//will return true/false
	return array_key_exists($attribute, $object_vars);
}


}
?> 