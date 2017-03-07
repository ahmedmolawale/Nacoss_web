<?php
    require_once('includes/fns.php');
    require_once('includes/session.php');
    con();
    if($session->is_logged_in()){
      $session->logout();
    }
    $myAlert = "";
    if(isset($_POST['btn_in'])){
    $matric_no = $_POST['matric_no'];
    $password = $_POST['password'];
    $shaPassword = sha1($password); 

        if(!authMatricNo($matric_no)){
            $myAlert = "<div class='alert alert-info'>
                            <button type='button' class='close' data-dismiss='alert'>×</button>
                            <strong>Oops!</strong> Matric No does not exist! 
                            Contact the admin <i class='icon-hand-right'></i> <a href='contact.php'>here</a> if you are a bonafide NACOSSITE.
                        </div>";
        }elseif(!authNacossite($matric_no,$shaPassword)){
            $myAlert = "<div class='alert alert-error'>
                            <button type='button' class='close' data-dismiss='alert'>×</button>
                            <strong>Sorry!</strong> Invalid login details!
                            If its your first time, use your <strong>surname in UPPER CASE</strong> as password
                        </div>";
        }else{  //correct credentials, log the session in
            $session->login($matric_no);
            $lockuid = sha1($matric_no);
            redirect_to("nacossite_dashboard.php");
        }
    }                                                                                                                                           
?>

<!DOCTYPE html> <html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sign In | Nacoss Unibadan</title>
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
                    <h1>Sign In</h1>
                    <p>Log in to gain access to your dashboard</p>
                    <p>Pay up departmental dues and many more...</p>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Sign In</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/#title-->    

    <section id="sign_in" class="container">
    <blockquote>
                                <strong>Hello!</strong> Enter your Matric no and Password. If you are a <strong>Non-fresher</strong> and this is your first time here, enter your <strong>surname in UPPER CASE</strong> as password. 
                             If you are a <strong>fresher</strong>, use the password provided during registration.
                               
     </blockquote>
 <blockquote>
                               If you have forgotten your password, click 
                                <i class='icon-hand-right'></i> <a href="forgot_password.php">here</a>.
     </blockquote>
     <?php echo $myAlert; ?>
        <form method="POST" class="center" role="form">
            <fieldset class="registration-form">
                <div class="form-group">
                    <input type="text" id="matric_no" name="matric_no" placeholder="Matric No." required="required" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password" placeholder="Password" required="required" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" name="btn_in" class="btn btn-primary btn-md" value="Sign In">
                </div>
            </fieldset>
        </form>
        
    </section><!--/#log in-->

    

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