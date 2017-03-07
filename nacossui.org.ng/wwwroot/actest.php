<?php
    require_once('includes/fns.php');
    require_once('includes/session.php');
    con();
    
    $crs = $_GET['course'];
    $cet = array(20);
       

        if(isset($_POST['calc'])){
            $score=0;
            for($i=1;$i<=20;$i++){
                $det = "id".$i;
                $ret[$i] = $_POST[$det];
                $sel = mysql_query("SELECT * FROM nac_test WHERE course='$crs' and id='$i'");
                $fsel = mysql_fetch_array($sel);
                $asel = $fsel['ans'];
                if($ret[$i]==$asel){
                    $score+=1;
                }else{
                    continue;
                }
            }

            $score=$score*5;
            $myAlert = "<div class='alert alert-<?php echo scoreCol($score); ?>'>
                            <button type='button' class='close' data-dismiss='alert'>×</button>
                            <?php echo scoreTxt($score); ?>
                        </div>";
        }
    


?>

<!DOCTYPE html> <html lang="en">

<head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Official Website of the Nigeria Association of Computer Science Students, Unibadan Chapter">
    <meta name="author" content="Daniel Nkemelu Kenechukwu">
    <meta name="keywords" content="Nacoss UI, Nacoss, Nacoss Nigeria, Computer Science Nigeria, Unibadan, Computer Science Unibadan, Computer Science Students Unibadan,
    Nacoss Unibadan, Unibadan students, Computer Science in Africa, African Computer Scientists, Nacoss website">
    <title>Resources > E-test | Nacoss Unibadan</title>
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

    <script src="js/jquery.js"></script>
    <script type="text/javascript">
        var settimmer = 0;
        $(function(){
                window.setInterval(function() {
                    var timeCounter = $("b[id=show-time]").html();
                    var updateTime = eval(timeCounter)- eval(1);
                    $("b[id=show-time]").html(updateTime);

                    if(updateTime == 0){
                        window.location = ("etest.php");
                    }
                }, 1000);

        });
    </script>
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
                    <h1>ONLINE TEST</h1>
                    <p>Take online tests based on course work.</p>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="index-2.html">Home</a></li>
                        <li class="active">RESOURCES</li>
                        <li class="active">ONLINE TEST</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/#title-->    

    <section id="portfolio" class="container">
    <blockquote>You have selected <b><?php echo $crs; ?></b>. Attempt to answer 20 questions in 4mins.  
    <font style="color:red; float:right">Time left: <b id="show-time">240</b> seconds</font></blockquote>
    <?php echo $myAlert; ?>
    <table border="0" cellpadding="3">
    <form method="POST">
    <?php     

                                $sel = mysql_query("SELECT * FROM nac_test WHERE course='$crs' LIMIT 20");
                                $n = mysql_num_rows($sel);
                                if($n<21){
                                    echo "<div class='alert alert-error'>No test entries currently. Unable to spool 20 questions. Check back later.
                                    <font style='float: right'><a href='etest.php'>Back</a></font></div>";
                                }else{
                                    $i = 0;
                                    while($res = mysql_fetch_array($sel)){
                                    $i++;    
                                    $crs = $res['course'];
                                    $qstn = $res['qstn'];
                                    $opt1 = $res['opt1'];
                                    $opt2 = $res['opt2'];
                                    $opt3 = $res['opt3'];
                                    $opt4 = $res['opt4'];
                                    $conc = "id";
                                    $qid = $conc.$i;

                                 ?>   
                                    <tr><td><b><?php echo $i.'. '.$qstn; ?></b></td></tr>
                                    <tr><td><input type="hidden" value="<?php echo $nid; ?>"></td></tr>
                                    <tr><td><input name="<?php echo $qid; ?>" type="radio" value="1"> <?php echo $opt1; ?></td></tr>
                                    <tr><td><input name="<?php echo $qid; ?>" type="radio" value="2"> <?php echo $opt2; ?></td></tr>
                                    <tr><td><input name="<?php echo $qid; ?>" type="radio" value="3"> <?php echo $opt3; ?></td></tr>
                                    <tr><td><input name="<?php echo $qid; ?>" type="radio" value="4"> <?php echo $opt4; ?></td></tr>
    <?php                             }  ?>
                                    <tr><td><input type="submit" name="calc" class="btn btn-primary" value="SUBMIT"></td></tr>
    <?php                                }
    ?>      

                                    
    </form>                                
    </table>
        
                      
    </section><!--/#portfolio-->

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