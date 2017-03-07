<?php
    session_start();
    require_once('includes/fns.php');
    con();

    $pers = $_GET['numcrs'];
    $name = $_SESSION['name'];

    if(!isset($name) or $pers==''){
        header("location:http://www.nacossui.org.ng/cgpa.php");
    }

    $ret = array($pers);
    $cet = array($pers);


    for($i=1; $i<=$pers; $i++){
            $dnum = "num".$i; 
            $dunit = "unit".$i;
            $ret[$i] = $_POST[$dnum];
            $cet[$i] = $_POST[$dunit];
            if($ret[$i]<0 or $cet[$i]<0 or $ret[$i]>100 or $cet[$i]>100){
                $wah = 1;
            }
    }

    $wgp =0; $sumgp = 0; $sumunit = 0;
    $getResponse = "";

    if(isset($_POST['calc'])){
        for($i=1; $i<=$pers; $i++){ 
            $grade = getGrade($ret[$i]);
                           
                $wgp = $grade * $cet[$i];
                $sumgp += $wgp;
                $sumunit += $cet[$i];
            }

          if($wah==1){
                 $getResponse="<div class='alert alert-error'' style='margin:10px; font-size: 14px; font-family:'Segoe UI''>
                                    <button type='button' class='close' data-dismiss='alert'>×</button>
                                    <strong>Oops!</strong> . An error occured. Likely wrong input.
                                </div>";
             }else{
                $usercgpa = round(($sumgp/$sumunit),1);

                $alerttype = getAlertType($usercgpa);
                $adviceUser = getAdvise($usercgpa); 
                $det = mysql_query("SELECT * FROM nac_gp WHERE status='$adviceUser' ORDER BY rand() LIMIT 1");
                $vdet = mysql_fetch_array($det);
                $mainAdv = $vdet['comment'];  
                $getResponse="<div class='alert alert-".$alerttype."' style='margin:10px; font-size: 14px; font-family:'Segoe UI''>
                                    <button type='button' class='close' data-dismiss='alert'>×</button>
                                    <strong>Dear, ".ucfirst($name)."!</strong> . <br/>
                                    Your CGPA is <b>".$usercgpa."</b> <br/><br/>"
                                    .$mainAdv." 
                                </div>";

                $dtel = mysql_query("INSERT INTO nac_gpstore VALUES ('NULL','$name','$usercgpa')");
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
                        <li><a href="http://www.nacossui.org">Home</a></li>
                        <li class="active">RESOURCES</li>
                        <li class="active">CGPA CALCULATOR</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/#title-->    

    <section id="portfolio" class="container">
    <blockquote>
                                <strong>Hello, <?php echo ucfirst($name); ?>!</strong> . Kindly fill the form below, be sure to enter the course unit and scores correctly.
     </blockquote>
                            <div><?php echo $set_er; ?>
                                <?php echo $getResponse; ?>
                            </div>
    </section><!--/#portfolio-->
    <section id="contact-page" class="container">

        <div class="row">
            <div class="col-sm-8">
                <?php echo $myAlert; ?>
                <h4><i class="icon-signal"></i> Enter scores...</h4>
                <form method="POST">
                                <table class="table table-bordered">
                                    <?php
                                        for($i=1; $i<=$pers; $i++){ 
                                        $num = "num".$i;
                                        $unit = "unit".$i;
                                        ?>
                                    <tr>
                                        <td width="33%">COURSE <?php echo $i; ?>:</td>
                                        <td width="33%"><input name="<?php echo $num; ?>" type="number" class="form-control" min="0" max="100" required="required" placeholder="Score <?php echo $i; ?>" value=""/></td>
                                        <td width="33%"><input name="<?php echo $unit; ?>" type="number" class="form-control" min="0" max="7" required="required" placeholder="Unit for Course <?php echo $i; ?>" value=""/></td>
                                    </tr>
                                    <tr>
                                <?php } ?>
                                    </tr>


                                </table>
                                
                                <div class="form-actions">
                                <a href="cgpa.php" class="btn btn-primary">BACK </a> <input type="submit" name="calc" value="CALCULATE" class="btn btn-primary"/>
                              </div>
                          </form>
            </div><!--/.col-sm-8-->
            <div class="col-sm-4">
                <h4><i class="icon-th"></i> Instruction</h4>
                <blockquote>Kindly endeavour to enter course scores and units properly as this would determine the displayed grade point. <br/><br/>In order to make this
                                as easy-to-use and as stress-free as possible, you do not need to enter course title.</blockquote>
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
                        <li><a href="www.nacossui.org">Home</a></li>
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
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>