<?php
    session_start();
    require_once('includes/fns.php');
    require_once('includes/session.php');
    con();
    $getResponse = '';

    if(isset($_POST['submit'])){


        $name = $_POST['uname'];
        $name = mysql_real_escape_string($name);
        $pers = $_POST['pers'];

        $_SESSION['name'] = $name;
        header("location:nac_cgpa.php?numcrs=$pers");
    }
    
    
?>

<!DOCTYPE html> <html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Official Website of the Nigeria Association of Computer Science Students, Unibadan Chapter">
    <meta name="author" content="Daniel Nkemelu Kenechukwu">
    <meta name="keywords" content="Nacoss, Nacoss Nigeria, Computer Science Nigeria, Unibadan, Computer Science Unibadan, Computer Science Students Unibadan,
    Nacoss Unibadan, Unibadan students, Computer Science in Africa, African Computer Scientists, Nacoss website">
    <title>Resources > CGPA Calculator | Nacoss Unibadan</title>
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
                    <h1>CGPA CALCULATOR</h1>
                    <p>MONITOR YOUR ACADEMIC PROGRESS ON THE GO...</p>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="http://www.nacossui.org.ng">Home</a></li>
                        <li class="active">RESOURCES</li>
                        <li class="active">CGPA CALCULATOR</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/#title-->    

    <section id="portfolio" class="container">
    <blockquote>
                                <strong>Hello!</strong> This module designed using the 7 points grading scale for students of the <b>University of Ibadan</b> helps you calculate your <b>Cummulative Grade Point Average</b>.  
                                Follow the steps below.
     </blockquote>
    </section><!--/#portfolio-->
    <section id="contact-page" class="container">
        <div class="row">
            <div class="col-sm-8">
                <?php echo $getResponse; ?>
                <h4><i class="icon-chevron-right"></i> Enter details...</h4>
                <form method="post"> 
                            <div class="form-group">
                                <input type="text" name="uname" class="form-control" required="required" placeholder="Full name">
                            </div>
                            <div class="form-group">
                                <input type="number" name="pers" class="form-control" required="required" placeholder="Number of courses E.g. 8 ">
                            </div> 
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary" value="Proceed">
                            </div> 
                </form>
            </div><!--/.col-sm-8-->
            <div class="col-sm-4">
                <h4><i class="icon-th"></i> Instruction</h4>
                <blockquote>Enter number of courses in <b>digits</b> E.g. 8, 12. Kindly be informed that this system does not keep your record.</blockquote>
            </div><!--/.col-sm-4-->
        </div>
    </section><!--/#contact-page-->

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
                    &copy; 2015 Designed - <a href="#" title="<?php echo siteCredit(); ?>">Nacoss Unibadan</a>&reg; 
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="http://www.nacossui.org.ng">Home</a></li>
                        <li><a href='http://www.nacossui.org.ng/about.php'>About</a></li>
                        <li><a  href='http://www.nacossui.org.ng/contact.php'>Contact Us</a></li>
                        <li><a id="gototop" class="gototop" href="#"><i class="icon-chevron-up"></i></a></li><!--#gototop-->
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>