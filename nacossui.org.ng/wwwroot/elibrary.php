<?php
    require_once('includes/fns.php');
    require_once('includes/session.php');
    con();
    
    
?>

<!DOCTYPE html> <html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Resources > Elibrary | Nacoss Unibadan</title>
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
                    <h1>ELIBRARY</h1>
                    <p>Enjoy our rich catalogue of books.</p>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="index-2.html">Home</a></li>
                        <li class="active">RESOURCES</li>
                        <li class="active">ELIBRARY</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/#title-->    

    <section id="portfolio" class="container">
    <?php     
                                $sel = mysql_query("SELECT * FROM nac_lib ORDER BY id DESC");
                                $n = mysql_num_rows($sel);
                                $bsel = mysql_query("SELECT * FROM  nac_lib WHERE type='ebook' ORDER BY id DESC");
                                $bn = mysql_num_rows($bsel);
                                $vsel = mysql_query("SELECT * FROM  nac_lib WHERE type='video' ORDER BY id DESC");
                                $vn = mysql_num_rows($vsel);
                                $psel = mysql_query("SELECT * FROM  nac_lib WHERE type='project' ORDER BY id DESC");
                                $pn = mysql_num_rows($psel);

    ?>      
        <font><?php echo $n; ?> entries in total, <?php echo $bn; ?> ebook(s), <?php echo $vn; ?> video(s) and <?php echo $pn; ?> project abstract(s).</font><br/><br/>
                      
        <ul class="portfolio-filter">
            <li><a class="btn btn-default active" href="#" data-filter="*">All</a></li>
            <li><a class="btn btn-default" href="#" data-filter=".ebook">Ebooks</a></li>
            <li><a class="btn btn-default" href="#" data-filter=".video">Video Links</a></li>
            <li><a class="btn btn-default" href="#" data-filter=".project">Project Abstracts</a></li>
        </ul><!--/#portfolio-filter-->
        
        <ul class="portfolio-items col-6">
        <?php 
                                while($res = mysql_fetch_array($sel)){
                                $type = $res['type'];  ?>
                <li class="portfolio-item <?php echo $type; ?>">
                <div class="item-inner">
                    <img src="images/ico/<?php echo getImg($type); ?>" width="75" height="75" alt=""/>
                    <h5>TITLE: <?php echo $res['title']; ?></h5>
                    <h5>VIA: <?php echo $res['upldby'];?></h5>
                    <a style="font-size:12px" target="_blank" href="<?php echo $res['location']; ?>"><?php echo getRep($type).' '.ucfirst($type); ?></a>
                </div>           
            </li><!--/.portfolio-item-->
        <?php } ?>    
           
        </ul>
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
                        <li><a href="www.nacossui.org.ng/about.php">About</a></li>
                        <li><a href="www.nacossui.org.ng/contact.php">Contact Us</a></li>
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