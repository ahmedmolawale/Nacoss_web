<?php
    require_once('includes/fns.php');
    con();
    $myAlert = "";


    if(isset($_POST['send'])){

    $umsg = $_POST['umsg'];
    $umsg = mysql_real_escape_string($umsg);
    $umail = $_POST['umail'];
    $fname = $_POST['fname'];
    $sname = $_POST['sname'];
    $uname = ucfirst(($fname.' '.$sname));
    $mdate = date("d/M/Y g:i A");


    if(!$umg or !$umail or !$uname){
       $myAlert = "<div class='alert alert-error'>
                            <button type='button' class='close' data-dismiss='alert'>×</button>
                            <strong>Oops!</strong> All fields are required.
                        </div>";
    }else{
        $sel=mysql_query("INSERT INTO nac_contact (id,name,email,msg,msgdate) VALUES (null,'$uname','$umail','$umsg','$mdate')");
        if($sel){
            $myAlert = "<div class='alert alert-success'>
                            <button type='button' class='close' data-dismiss='alert'>×</button>
                            <strong>Thanks!</strong> Message sent successfully!
                        </div>";
        }else{
            $myAlert = "<div class='alert alert-error'>
                            <button type='button' class='close' data-dismiss='alert'>×</button>
                            <strong>Oops!</strong> An error occured. Please try again later.
                        </div>";
        }
     }
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
    <title>Contact Us | Nacoss Unibadan</title>
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
     <?php echo thishead(); ?>    <!--/header-->
    <!--/header-->

    <section id="title" class="opahead">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Contact Us</h1>
                    <p>We would love to hear from you.</p>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="http://www.nacossui.org.ng">Home</a></li>
                        <li class="active">Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/#title-->    

    <section id="contact-page" class="container">
        <div class="row">
            <div class="col-sm-8">
                <?php echo $myAlert; ?>
                <h4><i class="icon-pencil"></i> Write to us...</h4>
                <form method="post">
                    <div class="row">
                        <div class="col-sm-7">
                            <textarea name="umsg" id="message" required="required" class="form-control" rows="8" placeholder="Message"></textarea>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <input type="text" name="fname" class="form-control" required="required" placeholder="First Name">
                            </div>
                            <div class="form-group">
                                <input type="text" name="sname" class="form-control" required="required" placeholder="Last Name">
                            </div>
                            <div class="form-group">
                                <input type="email" name="umail" class="form-control" required="required" placeholder="Email address">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="send" class="btn btn-primary btn-lg" value="Send Message">
                            </div>
                        </div>
                    </div>
                </form>
            </div><!--/.col-sm-8-->
            <div class="col-sm-4">
                <h4><i class="icon-globe"></i> On the map...</h4>
                <iframe width="100%" height="215" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.ng/maps?q=University+of+Ibadan,+Ibadan&amp;hl=en&amp;sll=9.084576,8.674253&amp;sspn=9.363061,14.128418&amp;oq=univer&amp;t=h&amp;hq=University+of+Ibadan,&amp;hnear=Ibadan,+Oyo&amp;ie=UTF8&amp;ll=7.446364,3.898269&amp;spn=0.002298,0.003449&amp;output=embed"></iframe>
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

    
 <?php echo thisfooter(); ?>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>