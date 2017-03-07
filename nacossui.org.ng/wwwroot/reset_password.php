<?php
    require_once('includes/fns.php');
    require_once('includes/nacossite.php');

$myAlert ="";
    
// Was the form submitted?
if (isset($_POST["reset_password"]))
{
	// Gather the post data
	$matric_no = $_POST["matric_no"];
	$password = $_POST["new_password"];
	$confirmpassword = $_POST["confirm_new_password"];
	$hash = $_POST["q"];

	// Use the same salt from the forgot_password.php file
	$salt = "498#2D83B631%3800EBD!801600D*7E3CC13";

     if(!authMatricNo($matric_no)){
            $myAlert = "<div class='alert alert-info'>
                            <button type='button' class='close' data-dismiss='alert'>×</button>
                            <strong>Oops!</strong> Matric No does not exist! 
                            Contact the admin <i class='icon-hand-right'></i> <a href='contact.php'>here</a> if you are a bonafide NACOSSITE.
                        </div>";
    }else{
    //get the nacossite
    $found_nacossite = Nacossite::findNacossite($matric_no);
	// Generate the reset key
	$resetkey = hash('sha512', $salt.$matric_no.$found_nacossite->email);

	// Does the new reset key match the old one?
	if ($resetkey == $hash)
	{
		if ($password == $confirmpassword)
		{

               $shaPassword = sha1($password);
               //call a method to do the necessary update
               $success = Nacossite::updatePassword($found_nacossite->matric_no,$shaPassword);
               if($success){
			        $myAlert = "<div class='alert alert-success'>
                            <button type='button' class='close' data-dismiss='alert'>×</button>
                            <strong>Success!</strong> Password reset successful! 
                            Sign in <i class='icon-hand-right'></i> <a href='sign_in.php'>here</a>
                        </div>";

               }else{
                   echo "An error occured during the passeword update";
               }
    	}
		else{
			$myAlert = "<div class='alert alert-error'>
                            <button type='button' class='close' data-dismiss='alert'>×</button>
                            <strong>Oh!</strong> Password does not match! 
                            Try again.
                        </div>";
        }
    }
	else
	    $myAlert = "<div class='alert alert-error'>
                            <button type='button' class='close' data-dismiss='alert'>×</button>
                            <strong>Oh!</strong> Password reset key is invalid! 
                    </div>";
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
      <?php 
      
    
         $header_add_on = "Sign In";
    
    echo thishead($header_add_on); 
     ?>    <!--/header-->


    <section id="title" class="opahead">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Reset Password</h1>
                    <p>Please reset your password below.</p>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Reset Password</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/#title-->    

    <section id="reset" class="container">
    <blockquote>
                   <strong>Hello!</strong> Provide your Matric no. and new password below.
     </blockquote>
        <?php
        
        echo $myAlert;
        
        ?>
        <form method="POST" action= 'reset_password.php' class="center" role="form">
            <fieldset class="registration-form">
                <div class="form-group">
                    <input type="text" id="matric_no" name="matric_no" placeholder="Matric No." required="required" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" id="new_password" name="new_password" placeholder="New Password" required="required" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" id="confirm_new_password" name="confirm_new_password" placeholder="Confirm New Password" required="required" class="form-control">
                </div>

                <?php
                    echo '<input type="hidden" name="q" value="';
                    if(isset($_GET["q"])){
                        echo $_GET["q"];
                    }
                        echo '"/>';
                    ?>
                <div class="form-group">
                    <input type="submit" name="reset_password" class="btn btn-primary btn-md" value="Reset Password">
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