<?php
    session_start();
    require_once('includes/fns.php');
    con();
    $myAlert = "";

    if($_GET['action']== "logout"){
        unset($_SESSION['uname']);
        $_SESSION['logged']="0";
    }

    if(isset($_POST['btn_in'])){

    $uname = $_POST['uname'];
    $pw = $_POST['pw'];
    $shapw = sha1($pw); 


        if(authUname($uname)=='N'){
            $myAlert = "<div class='alert alert-error'>
                            <button type='button' class='close' data-dismiss='alert'>×</button>
                            <strong>Oops!</strong> Username does not exist!
                        </div>";
        }elseif(authUser($uname,$shapw)=='N'){
            $myAlert = "<div class='alert alert-error'>
                            <button type='button' class='close' data-dismiss='alert'>×</button>
                            <strong>Sorry!</strong> Invalid login details!
                        </div>";
        }else{
            $_SESSION['uname'] = $uname;
            $_SESSION['logged'] = 1;
            $lockuid = sha1($uname);
            header("location:forum.php");
        }
    }                                                                                                                                           
    
?>

<!DOCTYPE html> <html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Resources > Sign In | Nacoss Unibadan</title>
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
    <?php echo thishead(); ?><!--/header-->

    <section id="title" class="opahead">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Sign In</h1>
                    <p>Join a community of UG&amp;PG programmers.</p>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="">Home</a></li>
                        <li class="active">Sign In</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/#title-->    

    <section id="registration" class="container">
    <blockquote>
                                <strong>Hello!</strong> Enter your username and password. If you are new, click <i class='icon-hand-right'></i> 
                                <a href="adduser.php">here</a>. If you have forgotten your password, click 
                                <i class='icon-hand-right'></i> <a href="i_forgot.php">here</a>.
     </blockquote>
     <?php echo $myAlert; ?>
        <form method="POST" class="center" role="form">
            <fieldset class="registration-form">
                <div class="form-group">
                    <input type="text" id="email" name="uname" placeholder="Username" required="required" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="pw" placeholder="Password" required="required" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" name="btn_in" class="btn btn-primary btn-md" value="Sign In">
                </div>
            </fieldset>
        </form>
    </section><!--/#registration-->

    

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

    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2015 Designed - <a target="_blank" href="" title="Nacoss, University of Ibadan">Nacoss Unibadan</a>. 
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="www.nacossui.org.ng">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                        <li><a id="gototop" class="gototop" href="#"><i class="icon-chevron-up"></i></a></li><!--#gototop-->
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>