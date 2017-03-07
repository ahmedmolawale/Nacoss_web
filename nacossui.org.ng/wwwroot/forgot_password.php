<?php
 
     require_once "Mail.php";  //Mail.php is already installed on the Web Server. You do not need to upload this file
    require_once('includes/fns.php');
    require_once('includes/session.php');
    require_once('includes/nacossite.php');
    con();
    
    $myAlert = "";



    if(isset($_POST['btn_in'])){
       
    $matric_no = $_POST['matric_no'];

        if(!authMatricNo($matric_no)){
            $myAlert = "<div class='alert alert-error'>
                            <button type='button' class='close' data-dismiss='alert'>×</button>
                            <strong>Oops!</strong> Matric No. does not exist! 
                            Contact the admin <i class='icon-hand-right'></i> <a href='contact.php'>here</a> if you are a bonafide NACOSSITE.
                        </div>";
        }else{
            $found_nacossite = Nacossite::findNacossite($matric_no);
            if($found_nacossite->email !=""){ //he has provided an email address before
                //generate a random password and send
                  $salt = "498#2D83B631%3800EBD!801600D*7E3CC13";

                 // Create the unique user password reset key
                 $password = hash('sha512', $salt.$matric_no.$found_nacossite->email);
                 
                  $pwrurl = "www.nacossui.org.ng/reset_password.php?q=".$password;

                
                    $from = "Admin Sender <admin@nacossui.org.ng>";
                    $to = $found_nacossite->full_name(). " Recipient <".$found_nacossite->email.">";
                    $subject = "Password Recovery";
                    $mailbody = "Dear nacossite,\n\nIf this e-mail does not apply to you, please 
                            ignore it. It appears that you have requested a password reset at our website www.nacossui.org.ng\n\nTo reset your password, please click the link below. If you cannot click it, please paste it into your web browser's address bar.\n\n" . $pwrurl . "\n\nThanks,\nThe Administrator.";

                    $host = "smtp.nacossui.org.ng"; //replace this with your domain's SMTP address
                    $username = "admin@nacossui.org.ng";
                    $password = "admin@Nacossui2017";

                    $headers = array ('From' => $from,
                    'To' => $to,
                    'Subject' => $subject);
                    $smtp = Mail::factory('smtp',
                    array ('host' => $host,
                    'auth' => true,
                    'username' => $username,
                    'password' => $password));

                    $mail = $smtp->send($to, $headers, $mailbody);

                    if (PEAR::isError($mail)) 
                    {
                        $myAlert = "<div class='alert alert-error'>
                            <button type='button' class='close' data-dismiss='alert'>×</button>
                            <strong>Oops!</strong> An error occured while sending the email
                            Contact the admin <i class='icon-hand-right'></i> <a href='contact.php'>here</a>
                        </div>";
                    } 
                    else 
                    {
                         $myAlert = "<div class='alert alert-success'>
                            <button type='button' class='close' data-dismiss='alert'>×</button>
                            <strong>Yeah!</strong> Your password recovery key has been sent to your e-mail address. 
                            Please check your email.
                        </div>";
                        echo("Message successfully sent!");
                    }
            }else{
                 $myAlert = "<div class='alert alert-info'>
                            <button type='button' class='close' data-dismiss='alert'>×</button>
                            <strong>Oops!</strong> If this your first time, please use your surname as password! on the sign in page.
                            If not, then you did not update your email as we strongly adviced. 
                            Contact the admin <i class='icon-hand-right'></i> <a href='contact.php'>here</a>
                        </div>";
            }      
    }                                                                                                                                           
    }
?>

<!DOCTYPE html> <html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Recover Password | Nacoss Unibadan</title>
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
</head><!--/head-->
<body>
      <?php   if($session->is_logged_in()){
        $header_add_on = "Log out";
      
    }else{
         $header_add_on = "Sign In";
    }
    echo thishead($header_add_on); 
     ?>    <!--/header-->


    <section id="title" class="opahead">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Recover Password</h1>
                    <p>Please provide your matric no below.</p>
                    <p>And check your email for password retrieval steps...</p>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Forgot Password</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/#title-->    

    <section id="sign_in" class="container">
    <blockquote>
                                <strong>Hello!</strong> Provide your matric no. If this is your first time here, use your <strong>surname</strong> as password 
                                <i class='icon-hand-right'></i> <a href="sign_in.php">here</a>.
     </blockquote>
     <?php echo $myAlert; ?>
        <form method="POST" class="center" role="form">
            <fieldset class="registration-form">
                <div class="form-group">
                    <input type="text" id="matric_no" name="matric_no" placeholder="Matric No." required="required" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" name="btn_in" class="btn btn-primary btn-md" value="Recover Password">
                </div>
            </fieldset>
        </form>
        
    </section><!--/#recover password-->

    

     <section id="bottom" class="green-sea">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <h4><i class="icon-user"></i> Who We Are</h4>
                    <p><strong>NACOSS</strong> is the student body for all students of Computer Science in higher institutions of learning.</p>
                    <p><strong>NACOSS</strong> provides opportunities for students to explore, fulfill their potentials and become more competitive in the IT environment both locally and globally.</p>
                    <p>This website is exclusive to the <strong>Unibadan</strong> chapter of <strong>NACOSS</strong>.</p>
                </div><!--/.col-md-3-->

                <div class="col-md-4 col-sm-6">
                    <h4><i class="icon-globe"></i> Where We Are</h4>
                    <address>
                        <strong>Department of Computer Science,</strong><br>
                        Faculty of Science<br>
                        University of Ibadan<br>
                        Ibadan<br/>
                        Nigeria.<br/>
                    </address>
                </div> <!--/.col-md-3-->


                <div class="col-md-4 col-sm-6">
                    <h4><i class="icon-question-sign"></i> Did you know?</h4>
                    <div>
                        <ul class="arrow">
                            <blockquote>
                             <?php
                                $br = "<br/>";
                                $sel = mysql_query("SELECT * FROM nac_didyou ORDER BY RAND() LIMIT 1");
                                $res = mysql_fetch_array($sel);
                                $result = $res['content'];
                                echo $result;
                                mysql_free_result($sel);
                            ?>
                        </blockquote> 
                        </ul>
                    </div>
                </div><!--/.col-md-3-->
           
            </div>
        </div>
    </section><!--/#bottom-->

<?php
        echo thisfooter();

?>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>