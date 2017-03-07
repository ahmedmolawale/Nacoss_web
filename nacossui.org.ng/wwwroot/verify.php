<?php
/**
 * Verify SimplePay transaction
 */

  require_once('includes/fns.php');
    require_once('includes/session.php');
    require_once('includes/nacossite.php');
    con(); 
 
$private_key = 'pr_9b769d97628a4c7f9f469ce33fab7b2c';  // put here your private key

// Retrieve data returned in payment gateway callback
$token = $_POST["sp_token"];
$amount = $_POST["sp_amount"];
$amount_currency = $_POST["sp_currency"];
$sp_status = $_POST["sp_status"];
//$transaction_id = $_POST["transaction_id"]; // we don't really need this here, is just an example
// retrieving what the dues is mearnt for,actual amount, and transaction fees
$paid_for = $_POST["paid_for"];  
$actual_amount = $_POST["actual_amount"];
$transaction_fee = $_POST["transact_fee"];


// Call to charge/verify a payment
//verify again that the student is logged is
     if(!$session->is_logged_in()){  //not log in

      redirect_to("sign_in.php");
  }else{
      $found_nacossite = Nacossite::findNacossite($session->id);

 $data = array(
    'token' => $token,
    'amount' => $amount,
    'amount_currency' => $amount_currency
);
$data_string = json_encode($data);   
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://checkout.simplepay.ng/v2/payments/card/charge/');
curl_setopt($ch, CURLOPT_USERPWD, $private_key . ':');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_CAINFO, './cacert.pem');
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data_string)
));

$curl_response = curl_exec($ch);
$err = curl_error($ch);
if($err){

    die('Curl returned error: '. $err);
}
$curl_response = preg_split("/\r\n\r\n/", $curl_response);
print_r($curl_response);
$response_content = $curl_response[1];
$json_response = json_decode(chop($response_content), TRUE);
print_r($json_response);
$response_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$transaction_id = $json_response['id'];
curl_close($ch);

if ($response_code == '200') {
    // even is http status code is 200 we still need to check transaction had issues or not
    if ($json_response['response_code'] == '20000') {
        // card was successfully charged
        //log the transaction here
        $status= Nacossite::logTransaction($found_nacossite->matric_no,$transaction_id,$found_nacossite->current_level,$actual_amount,'success',$transaction_fee,$paid_for); 
        header('Location: payment_success.php');
        
    } else {
        // failed to charge the card
         $status = Nacossite::logTransaction($found_nacossite->matric_no,$transaction_id,$found_nacossite->current_level,$actual_amount,'fail',$transaction_fee,$paid_for);
        header('Location: payment_failure.php');
    }
} else if ($sp_status == 'true') {
    // even though it failed the call to charge card, card payment was already processed
     $status = Nacossite::logTransaction($found_nacossite->matric_no,$transaction_id,$found_nacossite->current_level,$actual_amount,'success',$transaction_fee,$paid_for);
    
        header('Location: payment_success.php');
        
} else {
    // failed to charge the card
    $status = Nacossite::logTransaction($found_nacossite->matric_no,$transaction_id,$found_nacossite->current_level,$actual_amount,'fail',$transaction_fee,$paid_for);
    header('Location: payment_failure.php');
}
  }
?>
