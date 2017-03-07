<?php
    session_start();
    require_once('includes/fns.php');
    con();

    function checkStatus($a){
        $sel = mysql_query("SELECT * FROM airtime WHERE netwk ='$a'");
        $n = mysql_fetch_array($sel);
        $stat = $n['status'];
        if($stat=='N'){
            return 'N';
        }else{
            return 'Y';
        }
    }

    function getCode($a){
        $sel = mysql_query("SELECT * FROM airtime WHERE netwk ='$a'");
        $n = mysql_fetch_array($sel);
        $stat = $n['code'];
        return $stat;
    }

    if(isset($_POST['submit'])){

        $q1 = $_POST['q1'];
        $q2 = $_POST['q2'];
        $q3 = $_POST['q3'];
        $q4 = $_POST['q4'];
        $q5 = $_POST['q5'];
        if(!$q1 or !$q2 or !$q3 or !$q4){
            $myAlert="<div class='alert alert-error' style='margin:10px; font-size: 14px; font-family:'Segoe UI''>
                                    <button type='button' class='close' data-dismiss='alert'>×</button>
                                    Answer all questions.
                                </div>";
        }elseif($q1!=3 or $q2!=4 or $q3!=3 or $q4!=1){
            $myAlert="<div class='alert alert-error' style='margin:10px; font-size: 14px; font-family:'Segoe UI''>
                                    <button type='button' class='close' data-dismiss='alert'>×</button>
                                    <b>Oops!</b> Some questions not correct.
                                </div>";
        }elseif(checkStatus($q5)=='N'){
            $upd = mysql_query("UPDATE airtime SET status='Y' where netwk='$q5'");
            $myAlert="<div class='alert alert-success' style='margin:10px; font-size: 14px; font-family:'Segoe UI''>
                                    <button type='button' class='close' data-dismiss='alert'>×</button>
                                    <b>Congrats!</b> Contact admin with this code: ".getCode($q5).".
                                </div>";
        }else{
            $myAlert="<div class='alert alert-error' style='margin:10px; font-size: 14px; font-family:'Segoe UI''>
                                    <button type='button' class='close' data-dismiss='alert'>×</button>
                                    <b>Oops!</b> Airtime has been won by another participant.
                                </div>";
        }
        
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
    <title>Test/Airtime Giveaway | NACOSS Unibadan</title>

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
                    <h1>TEST/AIRTIME GIVEAWAY</h1>
                    <p>Answer for airtime.</p>
                </div>
                <div class="col-sm-6">

                    <ul class="breadcrumb pull-right">
                        <li><a href="http://www.nacossui.org.ng">Home</a></li>
                        <li class="active">Test/Airtime Giveaway</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/#title-->


    <section id="privacy-policy" style="text-align:justify" class="container">
      <form method="POST">
        <blockquote><b>Welcome!</b> Answer the 4 questions correctly and get a chance to win airtime. You can try as many times as possible. </blockquote>
        <?php echo $myAlert; ?>
        <p>1. Who is the first HOD of Computer Science?</p>
        <input type="radio" name="q1" value="1"> Prof Farai<br/>
        <input type="radio" name="q1" value="2"> Prof Odaibo<br/>
        <input type="radio" name="q1" value="3"> Prof Longe<br/>
        <input type="radio" name="q1" value="4"> Prof Adewole<br/>
        <br/>
        <p>2. What is the official twitter handle of NACOSS UI?</p>
        <input type="radio" name="q2" value="1"> @uinacoss<br/>
        <input type="radio" name="q2" value="2"> @nacossUninadan<br/>
        <input type="radio" name="q2" value="3"> @weAreNacossUI<br/>
        <input type="radio" name="q2" value="4"> @nacossui<br/>
        <br/>
        <p>1. The department of Computer Science, Unibadan was established in?</p>
        <input type="radio" name="q3" value="1"> 1964<br/>
        <input type="radio" name="q3" value="2"> 1954<br/>
        <input type="radio" name="q3" value="3"> 1974<br/>
        <input type="radio" name="q3" value="4"> 1968<br/>
        <br/>
        <p>4. What is the name of the road from the Ivory Tower(Admin Office) to the school gate?</p>
        <input type="radio" name="q4" value="1"> Oduduwa Road<br/>
        <input type="radio" name="q4" value="2"> Queens Road<br/>
        <input type="radio" name="q4" value="3"> Amina Way<br/>
        <input type="radio" name="q4" value="4"> Trenchard Road<br/>
        <br/>
        <p>5. What network do you use?</p>
        <input type="radio" value="mtn" name="q5"> MTN<br/>
        <input type="radio" value="atl" name="q5"> Airtel<br/>
        <input type="radio" value="eti" name="q5"> etisalat<br/>
        <input type="radio" value="glo" name="q5"> GLO<br/>
        <br/>
        <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" value="Proceed">
        </div> 
      </form>
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
                    &copy; 2015 Designed - <a href="#" title="Site Credit: Nkemelu Daniel K (@KNDanified | Web Developer), Abiodun Salawu (Team Lead), Titilayo Samuel O (Project Manager)                    Okemakinde Samson, Afolabi Williams J, Akindele Akinyemi(Content Contributors)">Nacoss Unibadan</a>&reg; 
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