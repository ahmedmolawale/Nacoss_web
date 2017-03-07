<?php 
    require_once('includes/fns.php');
    require_once('includes/session.php');
    require_once('includes/nacossite.php');
    con();
    if(!$session->is_logged_in()){  //not log in
      redirect_to("sign_in.php");
    }
    else{

         $found_nacossite = Nacossite::findNacossite($session->id);

         $transaction_id = Nacossite::getTransaction($found_nacossite->matric_no,$found_nacossite->current_level);
         $paymentDetails = Nacossite::getPaymentDetails($found_nacossite->matric_no);
    }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Official Website of the Nigeria Association of Computer Science Students, Unibadan Chapter">
    <meta name="author" content="Daniel Nkemelu Kenechukwu, Olawale Ahmed">
    <meta name="keywords" content="Nacoss, Nacoss Nigeria, Computer Science Nigeria, Unibadan, Computer Science Unibadan, Computer Science Students Unibadan,
    Nacoss Unibadan, Unibadan students, Computer Science in Africa, African Computer Scientists, Nacoss website">
    <title>Reciept | Nacoss Unibadan</title>
    
     <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">


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
    <script src="js/jquery-1.8.2.min.js" type="text/javascript"/></script>
     <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    <script src="js/jquery.min.js"></script>


  
</head>

<body>

    <?php 

      if($session->is_logged_in()){
        $header_add_on = "Log out";
      
    }else{
         $header_add_on = "Sign In";
    }
    echo thishead($header_add_on); 
        
    ?>
    <section>
    <div class="container">
        <div class="col-lg-9 col-lg-offset-2">
            <div class="panel panel-success ">
                <div class="panel-heading text-center">
                    <h3> Nigeria Association of Computer Science Students </h3>
                    <h2>Payment Receipt</h2>
                </div>
                
                <!--Payment Details-->
                <div class="panel-body">
                    <table id="table-receipt">
                        <tr>
                            <td class="text-muted" id="td">Transaction Id:</td>
                            <td id="td"><?php echo  $transaction_id; ?></td>
                        </tr>
                        <tr>
                            <td class="text-muted space" id="td">Surname:</td>
                            <td id="td"><?php echo $found_nacossite->surname;?></td>
                            <td class="text-muted" >First name:</td>
                            <td id="td"> <?php echo $found_nacossite->firstname;?></td>
                        </tr>
                        <tr>
                            <td class="text-muted" id="td">Other name:</td>
                            <td id="td"> <?php echo $found_nacossite->othername;?></td>
                             <td class="text-muted">Matric No.:</td>
                            <td id="td"> <?php echo $found_nacossite->matric_no;?></td>
                        </tr>
                        <tr>
                            <td class="text-muted" id="td">Level: </td>
                            <td id="td"><?php echo $found_nacossite->current_level;?></td>
                             <td class="text-muted">Amount:</td>
                            <td id="td">&#8358; <?php echo $paymentDetails['amount'];?></td>
                        </tr>
                        
                    </table>
                    <div align='center' class="row">
                        <h4 class="space text-muted">Being payment for NACOSS <?php echo $paymentDetails['paid_for'];?></h4>
                        <button type="submit" onclick='window.print();' class="btn btn-success btn-lg space col-lg-4 col-lg-offset-4">Print</button>
                    </div>
                    <div class="blockquote row" align='center'>
                        <blockquote class="bg-warning space">
                            <span class="text-warning">Please take this slip to NACOSS Secretariat to collect the Actual Receipt!</span>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js">
    </script>
</body>

</html>