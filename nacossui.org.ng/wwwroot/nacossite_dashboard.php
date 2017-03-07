<?php
    require_once('includes/fns.php');
    require_once('includes/session.php');
     require_once('includes/nacossite.php');
    con();
    $myAlert = "";
   $found_nacossite = null;

    if(!$session->is_logged_in()){  //not log in
      redirect_to("sign_in.php");
   }else{

        
       $found_nacossite = Nacossite::findNacossite($session->id);
       if(isset($_POST['update'])){
           //grab the update details
           $success = false;
           if($_POST['password'] != ""){
               $password = $_POST['password'];
               $email =  $_POST['email'];
               $address = $_POST['address'];
               $phone_number =  $_POST['phone_number'];
               //hashing the password
               $shaPassword = sha1($password);
               //call a method to do the necessary update
               //check whether email is valid
               if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                    $myAlert = "<div class='alert alert-error'>
                            <button type='button' class='close' data-dismiss='alert'>×</button>
                            <strong>Sorry!</strong> Invalid Email Address!
                        </div>";
                        return;
                    }
		
               $success = Nacossite::updateNacossiteDetails($found_nacossite->matric_no,$shaPassword,$email,$address,$phone_number);
        
           }else{
                $email =  $_POST['email'];
               $address = $_POST['address'];
               $phone_number =  $_POST['phone_number'];
                if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                    $myAlert = "<div class='alert alert-error'>
                            <button type='button' class='close' data-dismiss='alert'>×</button>
                            <strong>Sorry!</strong> Invalid Email Address!
                        </div>";
                        return;
                    }
               $success = Nacossite::updateNacossiteDetails2($found_nacossite->matric_no,$email,$address,$phone_number);

           }
            //sending out a success message
           if($success){
               //we got to refresh the nacossite object with the new details
               $found_nacossite = Nacossite::findNacossite($session->id);
                    $myAlert = "<div class='alert alert-success'>
                            <button type='button' class='close' data-dismiss='alert'>×</button>
                            <strong>Weldone!</strong> Update successful! 
                            Thanks for updating your details.
                        </div>";

               }else{
                    $myAlert = "<div class='alert alert-error'>
                            <button type='button' class='close' data-dismiss='alert'>×</button>
                            <strong>Sorry!</strong> Update failed! 
                            You probably didnt make any changes.
                        </div>";

               }
   } 
   
   
   if(isset($_POST['fileUpload'])){

        $found_nacossite = Nacossite::findNacossite($session->id);

       // never assume the upload succeeded
    if ($_FILES['image']['error'] !== UPLOAD_ERR_OK && $_FILES['signature']['error'] !== UPLOAD_ERR_OK) {
         $myAlert = "<div class='alert alert-warning'>
                            <button type='button' class='close' data-dismiss='alert'>×</button>
                            <strong>Sorry!</strong> Please select image file for either passport  or signature.    
                        </div>";
    }else{
        //either an image or signature has been selected
        //so initialise the necessary variables
         $file_image_dir='';
          $file_signature_dir ='';
            if($found_nacossite->current_level == '100'){
                $file_image_dir = 'assets/images/100/';
                 $file_signature_dir = 'assets/signatures/100/';
            }elseif($found_nacossite->current_level == '200'){
              $file_image_dir = 'assets/images/200/';
                 $file_signature_dir = 'assets/signatures/200/';
            }elseif($found_nacossite->current_level == '300'){
                $file_image_dir = 'assets/images/300/';
                 $file_signature_dir = 'assets/signatures/300/';
            }elseif($found_nacossite->current_level == '400'){
               $file_image_dir = 'assets/images/400/';
                 $file_signature_dir = 'assets/signatures/400/';
            }

         //now if we have only image 
        if($_FILES['image']['error'] == UPLOAD_ERR_OK && $_FILES['signature']['error'] !== UPLOAD_ERR_OK){  //It is the image that we have
            $image_name_tmp = $_FILES['image']['tmp_name'];
            $image_size = $_FILES['image']['size'];
            $path_parts = pathinfo($_FILES["image"]["name"]);
            $extension = $path_parts['extension'];   
            if(checkFile($image_name_tmp,$image_size)===TRUE){
               $myAlert= uploadImage($found_nacossite,$file_image_dir,$image_name_tmp,$extension);
                //got to do this to have the image updated
                 $found_nacossite = Nacossite::findNacossite($session->id);
            }else{
                  $myAlert = checkFile($image_name_tmp,$image_size);
             }     
        }elseif($_FILES['signature']['error'] == UPLOAD_ERR_OK && $_FILES['image']['error'] !== UPLOAD_ERR_OK){  //It is the signature that we have
             $signature_name_tmp = $_FILES['signature']['tmp_name'];
            $signature_size = $_FILES['signature']['size'];
            $path_parts = pathinfo($_FILES["signature"]["name"]);
            $extension = $path_parts['extension'];   
             if(checkFile($signature_name_tmp,$signature_size) === TRUE){
                 
                $myAlert = uploadSignature($found_nacossite,$file_signature_dir,$signature_name_tmp,$extension);
                //got to do this to have the signature updated
                 $found_nacossite = Nacossite::findNacossite($session->id);
             }else{
                  $myAlert = checkFile($signature_name_tmp,$signature_size);
             }   
        }else{//we have both here
            $image_name_tmp = $_FILES['image']['tmp_name'];
            $image_size = $_FILES['image']['size']; 
            $path_parts = pathinfo($_FILES["image"]["name"]);
            $image_extension = $path_parts['extension'];
            $signature_name_tmp = $_FILES['signature']['tmp_name'];
            $signature_size = $_FILES['signature']['size'];  
            $path_parts = pathinfo($_FILES["signature"]["name"]);
            $signature_extension = $path_parts['extension']; 
            
            if(checkFile($image_name_tmp,$image_size) ===TRUE && checkFile($signature_name_tmp,$signature_size)===TRUE){
                $myAlert = uploadImageAndSignature($found_nacossite,$file_image_dir,$image_name_tmp,$image_extension,$file_signature_dir,$signature_name_tmp,$signature_extension);
                 //got to do this to have the image and signature updated
                 $found_nacossite = Nacossite::findNacossite($session->id);
            }else{
                  $myAlert = checkFile($signature_name_tmp,$signature_size);
             }   
        }

    }


    }
   }
   function checkFile($file_name_tmp,$file_size){
        
        $max_file_size = 1097152;  //1 MB
        $file_info = getimagesize($file_name_tmp);
        if ($file_info === FALSE) {
           return $myAlert = "<div class='alert alert-warning'>
                            <button type='button' class='close' data-dismiss='alert'>×</button>
                            <strong>Sorry!</strong> File type not acceptable. Use file of type gif/jpeg/png    
                        </div>";
                        
        }elseif(($file_info[2] !== IMAGETYPE_GIF) && ($file_info[2] !== IMAGETYPE_JPEG) && ($file_info[2] !== IMAGETYPE_PNG)) {
           return  $myAlert = "<div class='alert alert-warning'>
                            <button type='button' class='close' data-dismiss='alert'>×</button>
                            <strong>Sorry!</strong> File has to be of type gif/jpeg/png.     
                        </div>";
                        
        }elseif($file_size >= $max_file_size ){
            return $myAlert = "<div class='alert alert-info'>
                            <button type='button' class='close' data-dismiss='alert'>×</button>
                            <strong>Sorry!</strong> Maximum size allowed is 1MB.      
                        </div>";
                        
        }else{
                return true;
        }
   }

   function uploadImage($found_nacossite,$file_image_dir,$image_name_tmp,$image_extension){
       
        $upload_image_name = $file_image_dir.$found_nacossite->surname."_".$found_nacossite->matric_no.".".$image_extension;
        $move_image = move_uploaded_file($image_name_tmp,$upload_image_name);
        if($move_image){
            //update the nacossite record
            $found_nacossite->image_location = $upload_image_name;
            $result = Nacossite::updateImageLocation($found_nacossite->matric_no,$found_nacossite->image_location);
             return   $myAlert = "<div class='alert alert-success'>
                            <button type='button' class='close' data-dismiss='alert'>×</button>
                            <strong>Success!</strong> Passport uploaded successful.    
                        </div>";
            
        }else{
            return $myAlert = "<div class='alert alert-error'>
                            <button type='button' class='close' data-dismiss='alert'>×</button>
                            <strong>Sorry!</strong> An error occured during the upload. Try again.    
                        </div>";

        }
   }

    function uploadSignature($found_nacossite,$file_signature_dir,$signature_name_tmp,$signature_extension){
        $upload_signature_name = $file_signature_dir.$found_nacossite->surname."_".$found_nacossite->matric_no.".".$signature_extension;
        $move_signature = move_uploaded_file($signature_name_tmp,$upload_signature_name);
        if($move_signature){
             //update the nacossite record
            $found_nacossite->signature_location = $upload_signature_name;
            $result = Nacossite::updateSignatureLocation($found_nacossite);
               return  $myAlert = "<div class='alert alert-success'>
                            <button type='button' class='close' data-dismiss='alert'>×</button>
                            <strong>Success!</strong> Signature uploaded successful.    
                        </div>";
            
        }else{
             return $myAlert = "<div class='alert alert-error'>
                            <button type='button' class='close' data-dismiss='alert'>×</button>
                            <strong>Sorry!</strong> An error occured during the upload. Try again.    
                        </div>";

        }
   }
   function uploadImageAndSignature($found_nacossite,$file_image_dir,$image_name_tmp,$image_extension,$file_signature_dir,$signature_name_tmp,$signature_extension){

       $upload_image_name = $file_image_dir.$found_nacossite->surname."_".$found_nacossite->matric_no.".".$image_extension;
        $move_image = move_uploaded_file($image_name_tmp,$upload_image_name);
        $upload_signature_name = $file_signature_dir.$found_nacossite->surname."_".$found_nacossite->matric_no.".".$signature_extension;
        $move_signature = move_uploaded_file($signature_name_tmp,$upload_signature_name);
        if($move_image && $move_signature){
             //update the nacossite record
            $found_nacossite->image_location = $upload_image_name;
            $found_nacossite->signature_location = $upload_signature_name;
          
            $result = Nacossite::updateImageAndSignatureLocation($found_nacossite);
                return $myAlert = "<div class='alert alert-success'>
                            <button type='button' class='close' data-dismiss='alert'>×</button>
                            <strong>Success!</strong> Image and Signature uploaded successful.    
                        </div>";
            
        }elseif($move_image){
             $found_nacossite->image_location = $upload_image_name;
            $result = Nacossite::updateImageLocation($found_nacossite);
            if($result){
              return $myAlert = "<div class='alert alert-info'>
                            <button type='button' class='close' data-dismiss='alert'>×</button>
                            <strong>Success!</strong> but We are only able to upload the image.
                            Please try the signature again.    
                        </div>";
            }
        }elseif($move_signature){
             $found_nacossite->signature_location = $upload_signature_name;
              $result = Nacossite::updateSignatureLocation($found_nacossite);
            if($result){
           return $myAlert = "<div class='alert alert-info'>
                            <button type='button' class='close' data-dismiss='alert'>×</button>
                            <strong>Success!</strong> but We are only able to upload the signature.
                            Please try the image again.    
                        </div>";
            }
        }else{
             return $myAlert = "<div class='alert alert-error'>
                            <button type='button' class='close' data-dismiss='alert'>×</button>
                            <strong>Sorry!</strong> An error occured during the upload. Try again.    
                        </div>";

        }

   }  
?>
<!DOCTYPE html> <html lang="en">
<html>

    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Official Website of the Nigeria Association of Computer Science Students, Unibadan Chapter">
    <meta name="author" content="Daniel Nkemelu Kenechukwu">
    <meta name="keywords" content="Nacoss, Nacoss Nigeria, Computer Science Nigeria, Unibadan, Computer Science Unibadan, Computer Science Students Unibadan,
    Nacoss Unibadan, Unibadan students, Computer Science in Africa, African Computer Scientists, Nacoss website">
    <title>Dashboard | Nacoss Unibadan</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">


    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
          
    <link rel="shortcut icon" href="images/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/a144.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/a114.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/a72.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/a57.png">
    

     <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
     <script src="js/stu_details.js"></script>
    <script src="js/jquery-1.8.2.min.js"></script>
<style type="text/css">

    #amount {
           
            border: none;
            background: transparent;
        }
          #transaction_fee {
           
            border: none;
            background: transparent;
        }
          #total_payable {
           
            border: none;
            background: transparent;
        }
        </style>
    </head>
    <body>
              <?php   if($session->is_logged_in()){
                            $header_add_on = "Log out";
      
    }else{
         $header_add_on = "Sign In";
    }
    echo thishead($header_add_on); 
     ?>    <!--/header-->
        <div class="container" style="margin-top: 30px">
            <div class="row panel panel-default" style="border-width: 0px">
                    <blockquote class="help-block">Welcome <strong> <?php echo $found_nacossite->full_name();?> </strong>. Please Update Your details, it is important for password retrieval and payment of dues! 
                        
                    </blockquote>
                     <blockquote class="help-block">Your <strong>passport</strong> and <strong> signature</strong> are needed to process your NACOSS ID Card.  
                       
                    </blockquote>
                     <?php echo $myAlert;?>
                    <hr>
                    <div class="col-lg-4">
                        <div class="panel panel-warning reach">
                            <div class="panel-heading">
                               <strong> Upload Passport and Signature</strong> 
                            </div>
                            <div class='panel-body'>
                            <form method='POST' enctype="multipart/form-data">
                            <!--Image-->
                            <div  align="center" class="space">
                                <?php 
                                if($found_nacossite->image_location ==""){
                                    echo "<img src='images/passport_default.jpg' alt='image_name' class='img-responsive' width='100px' height='100px'>";
                                }else{
                    
                                     echo "<img src='$found_nacossite->image_location' alt='image_name' class='img-responsive' width='100px' height='100px'>";
                                }
  
                                ?>
                        
                            </div>
                            
                            <div class="input-group pull-left panel-body">
                                <label class="input-group-btn">
                                    <span class="btn btn-primary">
                                        Choose Passport&hellip; <input type="file" name='image' style="display: none;" multiple>
                                    </span>
                                </label>
                                <input type="text" class="form-control" readonly>
                            </div>

                            <!-- Signature -->
                            <div align="center" class="space">
                                 <?php 
                                if($found_nacossite->signature_location ==""){
                                    
                                    echo "<img src='images/signature_default.png' alt='signature_name' class='img-responsive' width='100px' height='100px'>";
                                }else{
                                   
                                     echo "<img src='$found_nacossite->signature_location' alt='image_name' class='img-responsive' width='100px' height='100px'>";
                                }
      
                                ?>
        
                            </div>

                            <div class="input-group pull-left panel-body">

                                 <label class="input-group-btn">
                                    <span class="btn btn-primary">
                                        Choose Signature&hellip; <input type="file" name='signature' style="display: none;" multiple>
                                    </span>
                                </label>
                                <input type="text" class="form-control" readonly>
                                
                            </div>

                            <div class="input-group pull-left panel-body center">
                                 <button type="submit" name="fileUpload" class="btn btn-info col-lg-12">Update</button>  
                            </div>
                            </form>
                    </div>
                    </div>
                    </div>
                    
                    
                    <!-- Students information -->
                    <div class="col-lg-4">
                        
                        <div class="panel-group">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                   <h4> Student information </h4>
                                </div>

                                <!--Basic information-->
                                <div class="panel-heading" >
                                         <strong>Basic Details </strong> 
                                </div>
                                <div class="panel-body">
                                    <table>
                                        <tr>
                                            <td class="text-muted"><strong>Surname:</strong></td> <td> <?php echo $found_nacossite->surname;?></td>
                                        </tr>
                                        <tr>
                                            <td  class="text-muted"><strong>Firstname:</strong></td> <td> <?php echo $found_nacossite->firstname;?></td>
                                        </tr>
                                        <tr>
                                            <td  class="text-muted"><strong>Othername: </strong></td> <td> <?php echo $found_nacossite->othername;?></td>
                                        </tr>
                                        <tr>
                                            <td  class="text-muted"><strong>Matric No. :</strong></td> <td><?php echo $found_nacossite->matric_no;?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted"><strong>Mode:</strong></td> <td><?php echo $found_nacossite->mode_of_entry;?></td>
                                        </tr>
                                    </table>
                                </div>
                                
                                <!--Update Details-->
                                <div class="panel-heading">
                                   <strong> Update Details</strong> 
                                </div>
                                <div class="panel-body">
                                    <form method ="post">
                                        <div class="form-group">
                                            <label for="password">New Password</label>
                                            <input type="password" name="password" class="form-control" placeholder="New password">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <?php
                                            if($found_nacossite->email == ""){
                                               echo "<input type='email' id='em' name='email' class='form-control' required='required' placeholder='Email'>";
                                            }else{
                                                echo "<input type='email' id='em' name='email' class='form-control' value='$found_nacossite->email'>";
                                            }
                                            ?>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                             <?php
                                            if($found_nacossite->address == ""){
                                               echo "<input type='text' id='address' name='address' class='form-control' required='required' placeholder='Enter Address'>";
                                            }else{
                                                 echo "<input type='text' id='address' name='address' class='form-control' value='$found_nacossite->address'>";
                                            }
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone_number">Phone Number</label>
                                            <?php
                                            if($found_nacossite->phone_number == ""){
                                               echo "<input type='number' id='phone_number' name='phone_number' class='form-control' required='required' placeholder='Phone Number'>";
                                            }else{
                                                 echo "<input type='number' id='phone_number' name='phone_number' class='form-control' value='$found_nacossite->phone_number'>";
                                            }
                                            ?>
                        
                                        </div>
                                            <button type="submit" name="update" class="btn btn-info col-lg-12">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>



                    <div class="col-lg-4">
                        <div class="panel panel-success reach">
                            <div class="panel-heading">
                                <h4>Payment information</h4>
                                 <form id='checkout_form' method= 'post' action='verify.php'>
                                    <input type="hidden" name="sp_token" id="sp_token" value="">
                                     <input type="hidden" name="sp_status" id="sp_status" value="">
                                    <input type="hidden" name="sp_amount" id="sp_amount" value="">
                                     <input type="hidden" name="sp_currency" id="sp_currency" value="NGN">
                                    <input type="hidden" name="transaction_id" id="transaction_id" value="">
                                    <input type="hidden" name="paid_for" id="paid_for" value="Basic Dues + Dinner + Shirt">
                                    <input type="hidden" name="actual_amount" id="actual_amount" value="6000">
                                    <input type="hidden" name="transact_fee" id="transact_fee" value="124">
                                    </form>
                            </div>

                            <!--Payment Details-->
                            <div class="panel-body">
                               
                                    <table>
                                        <tr>
                                            <td class="text-muted">Full Name : </td> <td><?php echo $found_nacossite->full_name();?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Matric No.: </td> <td> <?php echo $found_nacossite->matric_no;?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Level :</td> <td> <?php echo $found_nacossite->current_level;?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Select Dues: </td> 

                                            <?php
                                                //if the student has paid. the select button should be disabled
                                                $status = Nacossite::hasPaid($found_nacossite->matric_no,$found_nacossite->current_level);
                                                 if($status){
                                                    echo "<td><select disabled id='dues'>";
                                                 }else{
                                                      echo "<td><select id='dues'>";
                                                 }
                                            //checking for fresher/finalist here
                                             
                                                if($found_nacossite->current_level == '100' || ($found_nacossite->current_level == '200' && ($found_nacossite->mode_of_entry == 'DE' || $found_nacossite->mode_of_entry == 'TRA' )) ||  $found_nacossite->current_level == '400'){
                                                echo 
                                                "
                                                <option value ='1'>Basic Dues + Dinner + Shirt -  &#8358;6000</option>
                                                <option value ='2'>Basic Dues + Dinner -  &#8358;4000</option>
                                                ";
                                            }else{
                                                 echo 
                                                "
                                                <option value ='1'>Basic Dues + Dinner + Shirt -  &#8358;6000</option>
                                                <option value ='2'>Basic Dues + Dinner -  &#8358;4000</option>
                                                <option value ='3'>Basic Dues + Shirt -  &#8358;4000</option>
                                                <option value ='4'>Basic Dues - &#8358;2000</option>
                                                ";
                                            }
                                           
                                            echo "</select></td>
                                            </tr> 
                                             <tr>";                                      
                                        if(Nacossite::hasPaid($found_nacossite->matric_no,$found_nacossite->current_level)){
                                            $paymentDetails = Nacossite::getPaymentDetails($found_nacossite->matric_no);
                                            $amount = $paymentDetails['amount'];
                                            $transaction_fee = $paymentDetails['transaction_fee'];
                                            $total_payable = $amount + $transaction_fee;
                                           
                                         echo   "<td class='text-muted'>Amount : </td> <td> &#8358; <input type='text' id='amount' name='amount' value='$amount' readonly/></td>
                                        </tr>
                                        <tr>
                                            <td  class='text-muted'>Transaction fee: </td> <td > &#8358; <input type='text' id='transaction_fee' name='transaction_fee' value='$transaction_fee' readonly/></td>
                                        </tr>
                                        <tr>
                                            <td  class='text-muted'>Total Payable: </td> <td > &#8358; <input type='text' id='total_payable' name='total_payable' value='$total_payable' readonly/></td>
                                        </tr>";
                                        
                                        }else{

                                        echo   "<td class='text-muted'>Amount : </td> <td> &#8358; <input type='text' id='amount' name='amount' value='6000' readonly/></td>
                                        </tr>
                                        <tr>
                                            <td  class='text-muted'>Transaction fee: </td> <td > &#8358; <input type='text' id='transaction_fee' name='transaction_fee' value='124' readonly/></td>
                                        </tr>
                                        <tr>
                                            <td  class='text-muted'>Total Payable: </td> <td > &#8358; <input type='text' id='total_payable' name='total_payable' value='6124' readonly/></td>
                                        </tr>";
                                        }
                                           
                                            if($found_nacossite->email == ""){
                                               echo "<td class='text-muted'>Email :</td> <td> Update your details</td>";
                                            }else{
                                                 echo  "<td class='text-muted'>Email :</td> <td>$found_nacossite->email</td>";
                                            }
                                            echo "</tr>";
                                            echo "<tr>";
                                            if($found_nacossite->address == ""){
                                               echo "<td class='text-muted'>Billing Address :</td> <td> Update your details</td>";
                                            }else{
                                                 echo  "<td class='text-muted'>Billing Address :</td> <td>$found_nacossite->address</td>";
                                            }
                                            echo "</tr>";
                                            echo  "</table>";
                                            if($found_nacossite->address == "" || $found_nacossite->email == "" ){
    
                                                echo "<button  disabled name='pay' class='btn btn-warning col-lg-12 space'>Pay</button>";
                                            }else{
                                                //if the student has paid. the pay button should trigger receipt 
                                                 $status = Nacossite::hasPaid($found_nacossite->matric_no,$found_nacossite->current_level);
                                                 if($status){
                                                      echo "<a href='receipt.php'><button class='btn btn-warning col-lg-12 space'>Paid, print Receipt</button></a>";
                                                 }else{
                                                    echo "<button  id='pay' name='pay' class='btn btn-warning col-lg-12 space'>Pay</button>";
                                                }
                                            }

                                            ?>               
                            </div>
                        </div>
                    </div>
            </div>
        </div>

    
    <script src="https://checkout.simplepay.ng/v2/simplepay.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
<script type="text/javascript">
    // Use the "token" to validate the payment
    function processPayment(token, paid) {
        // put token, status, amount and transaction ID to be sent forward
        // token, status and amount need to be passed forward
        $('#sp_token').val(token);
        $('#sp_status').val(paid);
        $('#sp_amount').val(SimplePay.amountToLower($('#total_payable').val()));
        $('#transaction_id').val('1234TRID');  //basically useless
        $('#checkout_form').submit();
    }

    var handler = SimplePay.configure({
        token: processPayment,
        key: 'pu_69214971fb814e16a82dcb1b0f854995',  // put you public key here
        image: '' // put your logo here (please note you need to put a public web url)
    });

    $('#pay').on('click', function (e) {
        e.preventDefault();

        handler.open(SimplePay.CHECKOUT,
                {
                     email: "<?php  echo $found_nacossite->email; ?>",
                    phone: "<?php  echo $found_nacossite->phone_number; ?>",
                    description: 'NACOSS dues payment',
                    address: "<?php  echo $found_nacossite->address; ?>",
                    postal_code: '110001',
                    city: 'Ibadan',
                    country: 'NG',
                    amount: SimplePay.amountToLower($('#total_payable').val()),
                    currency: 'NGN'
                });
    });

    $('#dues').change(function() {
    var optionSelected = $(this).val();
    if(optionSelected == 1){
        var amount = 6000; 
        var transactionFee = 1.9/100 * amount + 10;  
        var totalPayable = amount + transactionFee; 
        $('#amount').val(amount);
        $('#transaction_fee').val(transactionFee);
         $('#total_payable').val(totalPayable);

        //sending these details to the verify.php so that we can log in database
        $('#paid_for').val('Basic Dues + Dinner + Shirt'); 
         $('#actual_amount').val('6000'); 
          $('#transact_fee').val('124'); 

        
    }
    if(optionSelected == 2){
         var amount = 4000;   
        var transactionFee = 1.9/100 * amount + 10; 
        var totalPayable = amount + transactionFee;
        
         $('#amount').val(amount);
    $('#transaction_fee').val(transactionFee);  
     $('#total_payable').val(totalPayable);

     //sending these details to the verify.php so that we can log in database
        $('#paid_for').val('Basic Dues + Dinner');
       $('#actual_amount').val('4000'); 
          $('#transact_fee').val('86'); 

    }
    if(optionSelected == 3){
         var amount = 4000;   
        var transactionFee = 1.9/100 * amount + 10; 
        var totalPayable = amount + transactionFee;
       
         $('#amount').val(amount);
    $('#transaction_fee').val(transactionFee);  
     $('#total_payable').val(totalPayable);
     //sending these details to the verify.php so that we can log in database
        $('#paid_for').val('Basic Dues + Shirt');
       $('#actual_amount').val('4000'); 
          $('#transact_fee').val('86'); 

    }

    if(optionSelected == 4)
    {
         var amount = 2000;  
        var transactionFee = 1.9/100 * amount + 10;
        var totalPayable = amount + transactionFee; 
      
         $('#amount').val(amount);
        $('#transaction_fee').val(transactionFee);
         $('#total_payable').val(totalPayable);
          //sending these details to the verify.php so that we can log in database
        $('#paid_for').val('Basic Dues');
       $('#actual_amount').val('2000'); 
        $('#transact_fee').val('48'); 
    }
});
</script>
    </body>

</html>