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
    <meta name="keywords" content="Nacoss, Nacoss Nigeria, Computer Science Nigeria, Unibadan, Computer Science Unibadan, Computer Science Students Unibadan,
    Nacoss Unibadan, Unibadan students, Computer Science in Africa, African Computer Scientists, Nacoss website">
    <title>The Team | Nacoss Unibadan</title>
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
                    <h1>Nacoss Team</h1>
                    <p>Get to know members of the team.</p>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="http://www.nacossui.org">Home</a></li>
                        <li class="active">Nacoss Team</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/#title-->

    <section id="about-us" class="container">
        <div class="gap"></div>
        <h1 class="center">Meet the Executives</h1>
        <p class="lead center">We are made up of young, vibrant and dynamic executives working together with our departmental staff and students to achieve our goals.</p>
        <div class="gap"></div>

        <div id="meet-the-team" class="row">
            <div class="col-md-2 col-xs-6">
                <div class="center">
                    <p><img class="img-responsive img-thumbnail img-circle" src="images/team/Remy_president.jpg" alt="" ></p>
                    <h5>Ohajinwa Remy<small class="designation muted">President</small></h5>
                    <p>08182191115 / 400 Level</p>
                </div> 
            </div>

            <div class="col-md-2 col-xs-6">
                <div class="center">
                    <p><img class="img-responsive img-thumbnail img-circle" src="images/team/Wale_vp.jpg" alt="" ></p>
                    <h5>Ahmed Olawale<small class="designation muted">Vice President</small></h5>
                    <p>07033843810 / 300 Level</p>
                </div>
            </div>    
            <div class="col-md-2 col-xs-6">
                <div class="center">
                    <p><img class="img-responsive img-thumbnail img-circle" src="images/team/gen_sec.jpeg" alt="" ></p>
                    <h5>Deji Omitola<small class="designation muted">General Secretary</small></h5>
                    <p>08131580721/ 400 Level</p>
                </div>
            </div>          
             <div class="col-md-2 col-xs-6">
                <div class="center">
                    <p><img class="img-responsive img-thumbnail img-circle" src="images/team/Daniel_Financial.jpg" alt="" ></p>
                    <h5>Fidelis Daniel<small class="designation muted">Financial Secretary</small></h5>
                    <p>08139545259 / 400 Level</p>
                </div> 
            </div>
            <div class="col-md-2 col-xs-6">
                <div class="center">
                    <p><img class="img-responsive img-thumbnail img-circle" src="images/team/Ofure_Treasurer.jpg" alt="" ></p>
                    <h5>Ebhomielen Ofure Mary<small class="designation muted">Treasurer</small></h5>
                    <p>08177428231 / 300 Level</p>
                </div> 
            </div>
               
            <div class="col-md-2 col-xs-6">
                <div class="center">
                    <p><img class="img-responsive img-thumbnail img-circle" src="images/passport_default.jpg" alt="" ></p>
                    <h5>Not Available<small class="designation muted">Assistant General Secretary</small></h5>
                    <p></p>
                </div>
            </div>
        </div><!--/#meet-the-team-->
        <div id="meet-the-team" class="row">
             <div class="col-md-2 col-xs-6">
                <div class="center">
                    <p><img class="img-responsive img-thumbnail img-circle" src="images/team/Omowale_sport.jpg" alt="" ></p>
                    <h5>Yusuf Omowale<small class="designation muted">Sports Director</small></h5>
                    <p>07033983339 / 400 Level</p>
                </div>
            </div>    
            <div class="col-md-2 col-xs-6">
                <div class="center">
                    <p><img class="img-responsive img-thumbnail img-circle" src="images/team/Obed_Social_D.jpg" width="200" height="200" alt="" ></p>
                    <h5>Obed Balogun<small class="designation muted">Social Director</small></h5>
                    <p>07067417382 / 400 Level</p>
                </div>
            </div>   
            <div class="col-md-2 col-xs-6">
                <div class="center">
                    <p><img class="img-responsive img-thumbnail img-circle" src="images/team/tolu_pro.jpg" alt="" ></p>
                    <h5>Toluwalemi Oluwadare<small class="designation muted">Public Relations Officer</small></h5>
                    <p>09097227597 / 200 Level</p>
                </div>
            </div>   
            <div class="col-md-2 col-xs-6">
                <div class="center">
                    <p><img class="img-responsive img-thumbnail img-circle" src="images/passport_default.jpg" alt="" ></p>
                    <h5>Not Avialable<small class="designation muted">Librarian</small></h5>
                    <p></p>
                </div>
            </div>    
           <div class="col-md-2 col-xs-6">
                <div class="center">
                    <p><img class="img-responsive img-thumbnail img-circle" src="images/passport_default.jpg" alt="" ></p>
                    <h5>Not Available<small class="designation muted">Academic Director</small></h5>
                    <p></p>
                </div>
            </div>        
            <div class="col-md-2 col-xs-6">
                <div class="center">
                    <p><img class="img-responsive img-thumbnail img-circle" src="images/passport_default.jpg" alt="" ></p>
                    <h5>Not Available<small class="designation muted">Deputy Academic Director</small></h5>
                    <p></p>
                </div>
            </div>
           
        </div><!--/#meet-the-team-->

        <div class="gap"></div>
        <h1 class="center">Meet the Departmental Staff</h1>
        <p class="lead center">At the University of Ibadan, we are tutored by champions.</p>
        <div class="gap"></div>

        <div id="meet-the-team" class="row">
            <div class="col-md-2 col-xs-6">
                <div class="center">
                    <p><img class="img-responsive img-thumbnail img-circle" src="images/team/staff/posofisan.png" alt="" ></p>
                    <h5>Prof. Adenike O. Osofisan<small class="designation muted">Professor</small></h5>
                </div> 
            </div>
                 <div class="col-md-2 col-xs-6">
                <div class="center">
                    <p><img class="img-responsive img-thumbnail img-circle" src="images/team/staff/oladejo.jpg" alt="" ></p>
                    <h5>Dr Oladejo B. F.<small class="designation muted">Head of Department</small></h5>
                </div> 
            </div>
            <div class="col-md-2 col-xs-6">
                <div class="center">
                    <p><img class="img-responsive img-thumbnail img-circle" src="images/team/staff/abadeyemo.jpg" alt="" ></p>
                    <h5>Dr. A.B. Adeyemo<small class="designation muted">Lecturer</small></h5>
                </div> 
            </div>
            <div class="col-md-2 col-xs-6">
                <div class="center">
                    <p><img class="img-responsive img-thumbnail img-circle" src="images/team/staff/akinkunmi.jpg" alt="" ></p>
                    <h5>Dr. B. O. Akinkunmi<small class="designation muted">Lecturer</small></h5>
                </div> 
            </div>
            <div class="col-md-2 col-xs-6">
                <div class="center">
                    <p><img class="img-responsive img-thumbnail img-circle" src="images/team/staff/makolo.jpg" alt="" ></p>
                    <h5>Dr Angela U. Makolo<small class="designation muted">Lecturer</small></h5>
                </div> 
            </div>
            <div class="col-md-2 col-xs-6">
                <div class="center">
                    <p><img class="img-responsive img-thumbnail img-circle" src="images/team/staff/robert.jpg" alt="" ></p>
                    <h5>Dr A.B.C. Robert<small class="designation muted">Lecturer</small></h5>
                </div> 
            </div>
            <div class="col-md-2 col-xs-6">
                <div class="center">
                    <p><img class="img-responsive img-thumbnail img-circle" src="images/team/staff/akinola.jpg" alt="" ></p>
                    <h5>Dr S. O. Akinola<small class="designation muted">Lecturer</small></h5>
                </div> 
            </div>
         
            <div class="col-md-2 col-xs-6">
                <div class="center">
                    <p><img class="img-responsive img-thumbnail img-circle" src="images/team/staff/ayorinde.jpg" alt="" ></p>
                    <h5>Dr I.T. Ayorinde<small class="designation muted">Lecturer</small></h5>
                </div> 
            </div>
            <div class="col-md-2 col-xs-6">
                <div class="center">
                    <p><img class="img-responsive img-thumbnail img-circle" src="images/team/staff/onifade.jpg" alt="" ></p>
                    <h5>Dr O.F.W. Onifade<small class="designation muted">Lecturer</small></h5>
                </div> 
            </div>
            <div class="col-md-2 col-xs-6">
                <div class="center">
                    <p><img class="img-responsive img-thumbnail img-circle" src="images/team/staff/folajimi.jpg" alt="" ></p>
                    <h5>Dr Yetunde O. Folajimi<small class="designation muted">Lecturer</small></h5>
                </div> 
            </div>
             <div class="col-md-2 col-xs-6">
                <div class="center">
                    <p><img class="img-responsive img-thumbnail img-circle" src="images/team/staff/woods.jpg" alt="" ></p>
                    <h5>Mrs N. C. Woods<small class="designation muted">Lecturer</small></h5>
                </div> 
            </div>
        
            <div class="col-md-2 col-xs-6">
                <div class="center">
                    <p><img class="img-responsive img-thumbnail img-circle" src="images/team/staff/akomolafe.jpg" alt="" ></p>
                    <h5>Dr Oladeji Akomolafe<small class="designation muted">Lecturer</small></h5>
                </div> 
            </div>
         </div>   
         <div id="meet-the-team" class="row">
            <div class="col-md-2 col-xs-6">
                <div class="center">
                    <p><img class="img-responsive img-thumbnail img-circle" src="images/team/staff/ojo.jpg" alt="" ></p>
                    <h5>Mrs A.K. Ojo<small class="designation muted">Lecturer</small></h5>
                </div> 
            </div>
            <div class="col-md-2 col-xs-6">
                <div class="center">
                    <p><img class="img-responsive img-thumbnail img-circle" src="images/team/staff/adeniji.jpg" alt="" ></p>
                    <h5>Mr Adeniji O. D.<small class="designation muted">Lecturer</small></h5>
                </div> 
            </div>
            <div class="col-md-2 col-xs-6">
                <div class="center">
                    <p><img class="img-responsive img-thumbnail img-circle" src="images/team/staff/melefa.jpg" alt="" ></p>
                    <h5>Mr O. Melefa<small class="designation muted">Lecturer</small></h5>
                </div> 
            </div>
            <div class="col-md-2 col-xs-6">
                <div class="center">
                    <p><img class="img-responsive img-thumbnail img-circle" src="images/team/staff/oguntunde.jpg" alt="" ></p>
                    <h5>Mr T. Oguntunde<small class="designation muted">Lecturer</small></h5>
                </div> 
            </div>  
           <div class="col-md-2 col-xs-6">
                <div class="center">
                    <p><img class="img-responsive img-thumbnail img-circle" src="images/team/staff/ogunseye.jpg" alt="" ></p>
                    <h5>Mrs E. O. Ogunseye<small class="designation muted">Data Analyst</small></h5>
                </div> 
            </div>
            <div class="col-md-2 col-xs-6">
                <div class="center">
                    <p><img class="img-responsive img-thumbnail img-circle" src="images/team/staff/akinwale.jpg" alt="" ></p>
                    <h5>Mr I.O.I. Akinwale<small class="designation muted">Technologist</small></h5>
                </div> 
            </div>
         </div>   
    </section><!--/#about-us-->


     <section id="bottom" class="green-sea">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <h4><i class="icon-user"></i> Who We Are</h4>
                    <p><strong>NACOSS</strong> is the student body for all students of Computer Science in higher institutions of learning.</p>
                    <p><stro ng>NACOSS</strong> provides opportunities for students to explore, fulfill their potentials and become more competitive in the IT environment both locally and globally.</p>
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
                        <li><a href='http://www.nacossui.org.ng/contact.php'>Contact Us</a></li>
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