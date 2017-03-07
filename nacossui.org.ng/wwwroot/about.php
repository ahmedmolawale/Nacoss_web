<?php
    require_once('includes/fns.php');
    require_once('includes/session.php');
    con();
?>

<!DOCTYPE html> <html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="Official Website of the Nigeria Association of Computer Science Students, Unibadan Chapter">
    <meta name="author" content="Daniel Nkemelu Kenechukwu">
    <meta name="keywords" content="Nacoss UI, Nacoss, Nacoss Nigeria, Computer Science Nigeria, Unibadan, Computer Science Unibadan, Computer Science Students Unibadan,
    Nacoss Unibadan, Unibadan students, Computer Science in Africa, African Computer Scientists, Nacoss website">
    <title>About Us | Nacoss Unibadan</title>
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
</head>
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
                    <h1>About Us</h1>
                    <p>Get to know about us, our vision and slogan.</p>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="http://www.nacossui.org.ng">Home</a></li>
                        <li class="active">About Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/#title-->

    <section id="privacy-policy" style="text-align:justify" class="container">
        <p>NACOSS is the student body for all students of Computer Science in higher institutions of learning across Nigeria. 
        The association is an affiliate of the <a href="http://www.ncs.org.ng" target="_blank">NIGERIA COMPUTER SOCIETY(NCS)</a>. Units of the association in higher institutions are referred to as CHAPTERS. 
        The motto of the association is "TOWARDS ADVANCED TECHNOLOGY". This website is exclusive to the Unibadan chapter of NACOSS.</p>

        <p>&nbsp;</p>
        <h3>Slogan</h3>
        <p>Greatest Nacossite, Networking the World.</p>

        <p>&nbsp;</p>

        <h3>History</h3>
        <p>The Nigeria Association of Computer Science Students (NACOSS) is a student professional body with presence in almost all tertiary institutions in Nigeria (both private and government owned). NACOSS was founded by groups of students in July 1993 with the backing of Nigerian Computer Society (NCS) as its parent body. It provides avenues for students (in any IT related field) to highlight and champion issues of interest in a coordinated and organized manner. NACOSS members (NACOSSites) are students in tertiary institutions studying computer related disciplines including: Computer Science, Computer Engineering and Information Technology.</p>

        <p>&nbsp;</p>

        <h3>Focus</h3>
        <p>NACOSS provides opportunities for students to explore, fulfill their potentials and become more competitive in the IT environment both locally and globally. Through consistent and professional exposure, NACOSS provides an excellent foundation for Computer Scientists, Engineers and any IT related disciplines in Nigeria. Over the years, NACOSS has given to the economy and society the finest professionals in Information and Communications Technology and is dedicated to doing even more in future.</p>

        <p>&nbsp;</p>
        <h3>Anthem</h3>
        <p>Awake o ye NACOSSITE amids obscurity<br/>
            Awake my dexterity in skill to heights<br/>
            Take up the challenge catch the flame bright<br/>
            Shining as the sun.<br/>
            This is the time, this is age advance and light the touch information technology is our legacy to posterity.<br/><br/>

            Awake great Nigerians to make our country great<br/>
            Awake small but mighty ones<br/>
            The sleeping giant awake<br/>
            Guide our leaders’ path<br/>
            Help our youth the truth to know in love and honest<br/>
            To grow in living and true information technology is our legacy to posterity.</p>


            <h3>Computer Science in UI</h3>
            <p>
                The department of Computer Science is located in the University of Ibadan, the Premier Institution in Nigeria. The department was established in 1974 and was conceived as a means of training manpower to meet the demand for increasing computerization. The department trains students to create, adapt and manage computation tools that meet basic goals of correctness, efficiency, security, user-friendliness, fault-tolerance and intelligence.
<br/><br/>
We currently offer B.Sc, M.Sc, M.C.S, MPhil and PhD in Computer Science with options in Software Engineering, Data Mining, Mobile Agent, Knowledge Discovery, System Modelling – Annotation, Economic Intelligence and Internet Security
<br/><br/>
The department presently has 21 academic staff, 9 non-academic staff and has graduated over 2000 plus students at the first degree level with 8 PhDs and more than 400 Masters students. The department is located along Africanus Horton Road beside Chemistry Department and just behind the Department of Geology.
<br/><br/>
The departmental academic staff are dedicated, effective and committed to teaching computer science at the University level. Both undergraduate and postgraduate classes are backed up by demonstrations and a strong practical content which makes the classes very effective. We have well equipped computer science laboratories and research laboratory.
            </p>
    </section><!--/#privacy-policy-->


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
                    <h4><i class="icon-question-sign"></i> Did you know that?</h4>
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
    <script src="js/main.js"></script>
</body>
</html>