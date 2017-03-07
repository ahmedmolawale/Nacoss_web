<?php
    require_once('includes/fns.php');
    require_once('includes/session.php');
    con();  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Official Website of the Nigeria Association of Computer Science Students, Unibadan Chapter">
    <meta name="author" content="Daniel Nkemelu Kenechukwu">
    <meta name="keywords" content="Nacoss, Nacoss Nigeria, Computer Science Nigeria, Unibadan, Computer Science Unibadan, Computer Science Students Unibadan,
    Nacoss Unibadan, Unibadan students, Computer Science in Africa, African Computer Scientists, Nacoss website">
    <title>Home | NACOSS Unibadan</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    
    <link rel="shortcut icon" href="Images/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/a144.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/a114.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/a72.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/a57.png">

    <script src="js/jquery.js"></script>
    <script type="text/javascript" src="../js/jquery.easing.min.js"></script>
    <script type="text/javascript" src="../js/jquery.easy-ticker.js"></script>

    <script type="text/javascript">
$(document).ready(function(){

    var dd = $('.vticker').easyTicker({
        direction: 'up',
        easing: 'easeInOutBack',
        speed: 'slow',
        interval: 3000,
        height: 'auto',
        visible: 1,
        mousePause: 1,
        controls: {
            up: '.up',
            down: '.down',
            toggle: '.toggle',
            stopText: 'Stop !!!'
        }
    }).data('easyTicker');
    
   
});
</script>

<style>

</style>

</head><!--/head-->
<body>
   <?php 
    if($session->is_logged_in()){
        $header_add_on = "Log out";
      
    }else{
         $header_add_on = "Sign In";
    }
    echo thishead($header_add_on); 
   
    ?>
    <!--/header-->

    <section id="recent-works">
   
        <div class="container">
        
            <div class="row">
            
             <h2><marquee>Welcome, you can now pay your dues online. Its simple, fast and easy!!! Sign in <i class='icon-hand-right'></i> <a href="sign_in.php"><strong>here</strong></a> to begin.</marquee></h2>
                <div class="col-md-4">
                    <h2>Welcome</h2>
                    <p>This is the official website of the Nigeria Association of Computer Science Students, NACOSS <b>Unibadan Chapter</b>. Feel free to explore the site and <a href='http://www.nacossui.org/contact'>drop a feedback</a> if you wish.</p>
                    <div class="btn-group">
                        <a class="btn btn-danger" href="#scroller" data-slide="prev"><i class="icon-angle-left"></i></a>
                        <a class="btn btn-danger" href="#scroller" data-slide="next"><i class="icon-angle-right"></i></a>
                    </div>
                    <p class="gap"></p>
                </div>
                <div class="col-md-8">
                    <div id="scroller" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="row-fluid"> 
                                        <a  href='http://www.nacossui.org.ng/career_guide.php' title="Learn from FAQs in Computer Science" class="quick-button metro greendan col-md-3 col-sm-6 m20">
                                            <i class="icon-question-sign"></i>
                                            <p>New to Comp Sci?</p>
                                        </a>
                                        <a  href='http://www.ui.edu.ng' target="_blank" title="Visit the Official Website of the University of Ibadan" class="quick-button metro yellow col-md-3 col-sm-6 m20">
                                            <i class="icon-refresh"></i>
                                            <p>Visit UI Website</p>
                                        </a>
                                        <a  href='http://www.nacossui.org.ng/register.php' title="Registration for freshers" class="quick-button metro black col-md-2 col-sm-6 m20">
                                            <i class="icon-user"></i>
                                            <p>Create Account</p>
                                        </a>
                                        <a  href='http://www.nacossui.org.ng/sign_in.php' title="Sign In and be part of an exciting programmer's forum" class="quick-button metro red col-md-2 col-sm-6 m20">
                                            <i class="icon-lock"></i>
                                            <p>Sign in</p>
                                        </a>
                                        <a  href='http://www.nacossui.org.ng/cgpa.php' title="Keep track of your academic performance, calculate your CGPA on the go" class="quick-button metro red col-md-3 col-sm-6 m20">
                                            <i class="icon-signal"></i>
                                            <p>Calculate CGPA online</p>
                                        </a>
                                        <a  href='http://www.nacossui.org.ng/elibrary.php' title="Take advantage of online materials" class="quick-button metro black col-md-3 col-sm-6 m20">
                                            <i class="icon-book"></i>
                                            <p>Online Library</p>
                                        </a>
                                        <a  href='http://www.facebook.com/groups/62648414154' target="_blank" title="Join Us On Facebook" class="quick-button metro blue col-md-2 col-sm-6 m20">
                                            <i class="icon-facebook"></i>
                                            <p>facebook</p>
                                        </a>
                                        <a  href='http://www.twitter.com/nacossui' target="_blank" title="Follow Us On Twitter" class="quick-button metro blueLight col-md-2 col-sm-6 m20">
                                            <i class="icon-twitter"></i>
                                            <p>twitter</p>
                                        </a>
                                        
                                        <div class="clearfix"></div>
                                                        
                                    </div><!--/row-->
                            </div><!--/.item-->
                            <div class="item">
                                <div class="row"> 
                                        <a  href='http://www.nacossui.org.ng/etest.php' title="Test yourself for speed and accuracy" class="quick-button metro orange col-md-3 col-sm-6 m20">
                                            <i class="icon-question-sign"></i>
                                            <p>Take online tests</p>
                                        </a> 
                                        <a  href='http://www.ncs.org.ng' target="_blank"  title="Visit Official Website of the Nigeria Computer Society" class="quick-button metro red col-md-3 col-sm-6 m20">
                                            <i class="icon-refresh"></i>
                                            <p>Visit NCS website</p>
                                        </a>
                                        <a  href='http://www.nacossui.org.ng/contact.php' title="Drop us a feedback, we would love to hear from you" class="quick-button metro black col-md-2 col-sm-6 m20">
                                            <i class="icon-globe"></i>
                                            <p>Contact Us</p>
                                        </a>
                                        <a href='http://www.nacossui.org.ng/sign_in.php' title="Sign In and be part of an exciting programmer's forum" class="quick-button metro red col-md-2 col-sm-6 m20">
                                            <i class="icon-lock"></i>
                                            <p>Sign in</p>
                                        </a>
                                        <a  href='http://www.nacossui.org.ng/career_list.php' title="Find career paths in Computer Science"  class="quick-button metro yellow col-md-3 col-sm-6 m20">
                                            <i class="icon-road"></i>
                                            <p>Career Paths in CSc</p>
                                        </a>
                                        <a href='http://www.nacoss.org.ng' target="_blank" title="Visit the Nacoss National Official website" class="quick-button metro pinkDark col-md-3 col-sm-6 m20">
                                            <i class="icon-retweet"></i>
                                            <p>Nacoss National</p>
                                        </a>
                                        <a  href='http://www.facebook.com/groups/62648414154' target="_blank" title="Join Us On Facebook" class="quick-button metro blue col-md-2 col-sm-6 m20">
                                            <i class="icon-facebook"></i>
                                            <p>facebook</p>
                                        </a>
                                        <a  href='http://www.twitter.com/nacossui' target="_blank" title="Follow Us On Twitter" class="quick-button metro blueLight col-md-2 col-sm-6 m20">
                                            <i class="icon-twitter"></i>
                                            <p>twitter</p>
                                        </a>
                                        <div class="clearfix"></div>
                                </div>
                            </div><!--/.item-->
                        </div>
                    </div>
                </div>
            </div><!--/.row-->
        </div>
    </section><!--/#recent-works-->
    <section id="services" class="green-sea">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="media">
                        <div class="pull-left">
                            <i class="icon-certificate icon-md"></i>
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">Nacoss Unibadan</h3>
                            <p>Over the years, NACOSS has given to the economy and society the finest professionals in Information and Communications Technology and is dedicated to doing even more in future.</p>
                        </div>
                    </div>
                </div><!--/.col-md-4-->
                <div class="col-md-4 col-sm-6">
                    <div class="media">
                        <div class="pull-left">
                            <i class="icon-hdd icon-md"></i>
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">Online Resources</h3>
                            <p>Take advantage of our numerous online resources such as the online library, taking online tests based on course work and the programmer's forum. Fun.</p>
                        </div>
                    </div>
                </div><!--/.col-md-4-->
                <div class="col-md-4 col-sm-6">
                    <div class="media">
                        <div class="pull-left">
                            <i class="icon-road icon-md"></i>
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">Building Tech Giants</h3>
                            <p>Through consistent and professional exposure, NACOSS provides an excellent foundation for Computer Scientists, Engineers and other IT related disciplines in Nigeria.</p>
                        </div>
                    </div>
                </div><!--/.col-md-4-->
            </div>
        </div>
    </section><!--/#services-->

    <section id="career" class="container">
    <div class="center">
        <blockquote><p style="font-size:18px">Computer science is about a unique kind of problem-solving: creatively solving problems using computation. If you are creative, if you like puzzles, if you like problem-solving in other domains (engineering, business, mathematics, sciences), if you are comfortable with abstract thinking, if you like working at the intersection of multiple disciplines - if any of these apply to you, then Computer Science is for you.</p></blockquote>
    </div>
    </section>


    <section id="testimonial" class="white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="center">
                        <h2>NACOSS Online Press Desk</h2>
                        <p>Stay up-to-date with happenings in the department, faculty, school and in the world of Information Technology.</p>
                        
                    </div>
                    <div class="gap"></div>
                    <div class="row">
                        <div class="col-md-6">
                                <div class="priority low"><span><i class='icon-calendar'></i> News &amp; Events</span></div> 
                                <div class="vticker task low">  
                                    <ul> 
                                    <?php $ron = mysql_query("SELECT * FROM nac_news ORDER BY id LIMIT 5");
                                          while($fron = mysql_fetch_array($ron)){ ?>                               
                                       <li><div class="desc"><div class="title"><?php echo $fron['title'];   ?></div> 
                                           <div style="text-align: justify; font-size: 13px;"><?php echo $fron['content']; ?><br/><br/>
                                           External Link: <?php echo getLinkStat($fron['newslink']); ?> | Posted by: <i class='icon-user'></i> <?php echo $fron['uploadby'];   ?> </div></div>
                                           <div class="time">
                                                <div class="date"><?php echo $fron['date']; ?></div>
                                            </div></li> 
                                    <?php } ?>
                                    </ul>
                                    <div class="clearfix"></div>        
                                </div> <!--end vticker-->
                            </div><!--/#col6-1-->
                            <div class="col-md-6">
                                <div class="priority medium"><span><i class='icon-th'></i> Press E-mag</span></div> 
                                    <div class="vticker task medium">  
                                    <ul> 
                                    <?php $ron = mysql_query("SELECT * FROM nac_press ORDER BY id LIMIT 5");
                                          while($fron = mysql_fetch_array($ron)){ ?>                               
                                       <li><div class="desc"><div class="title"><?php echo $fron['title'];   ?></div> 
                                           <div style="text-align: justify; font-size: 13px;"><a href="<?php echo $fron['location']; ?>" target="_blank" title="Download E-mag">Click here to download PDF</a>. Feel free to give us a feedback via our <a href="contact.php">contact us</a> page.<br/><br/>
                                           Uploaded by: <i class='icon-user'></i> <?php echo $fron['uploadby'];   ?></div></div>
                                           <div class="time">
                                                <div class="date"><?php echo $fron['date']; ?></div>
                                            </div></li> 
                                    <?php } ?>
                                    </ul>
                                    <div class="clearfix"></div>        
                                </div> <!--end vticker-->
                            </div><!--/#col6-2-->
                
                    </div><!--/#row-->
                </div><!--/#col12-->
            </div><!--/#row-->
        </div><!--/#container-->

   </section><!--/#testimonial-->

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
    
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>