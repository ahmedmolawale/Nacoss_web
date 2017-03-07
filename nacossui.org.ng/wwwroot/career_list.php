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
    <title>Career List | Nacoss Unibadan</title>
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
                    <h1>CAREER LIST</h1>
                    <p>FIND LIST OF SOME CAREER PATHS IN COMPUTER SCIENCE</p><br/>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="http://www.nacossui.org.ng">Home</a></li>
                        <li class="active">RESOURCES</li>
                        <li class="active">CAREER LIST</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/#title-->

   <section id="career" class="container">
    <div class="center">
      <h2>Career List...</h2>
      <p>Compiled by Nkemelu Daniel | Also see <a href="http://www.nacossui.org/career_guide.php">CAREER GUIDE</a></p><br/>
      <img src="images/ico/job.png" width="50%" title="Job Scale">
    <br/></div>
 <h4>ASP Developer</h4><hr/>
 <p>Active server page (ASP) programmers design interactive functions on Web pages such as database registries, survey voting platforms and online shopping carts. </p><br/>

<h4>Computer Artists</h4><hr/>

 <p>Computer Artists use computer technology and multimedia tools to enhance the visual images they create. Their work is used in various forms of media, including film, television, Web programming and computer games. </p><br/>

<h4>Computer Game Designers</h4><hr/>
<p> Computer Game Designers are responsible for the overall look, sound and action of a computer game. A Computer Game Designer works with other creative and technological professionals to produce a finished product.</p><br/>

<h4>Computer Graphics Designer</h4><hr/>
 <p>A Computer Graphics Designer, a specialized graphics designer, uses a computer to create visual products and presentations for web developers, publishers, health care providers and many other industries.</p><br/>

 <h4>Computer Information Manager</h4><hr/>
 <p>A Computer Information Manager evaluates and manages the computer-related needs of a company, including planning for and coordinating the installation of equipment necessary to a systems upgrade.</p><br/>

<h4>Computer Information Technician</h4><hr/>
<p> A Computer Information Technician installs and maintains computer systems and solves computer-related problems for individuals and companies. </p><br/>

<h4>Computer Systems Manager</h4><hr/>
 <p>A Computer Systems Manager is trained in computer systems management technology and works at a strategic and management level, overseeing the application of technology for the employer's business.</p><br/>
 <h4>Data Communications Technician</h4><hr/>
 <p>A Data Communications Technician works with communication lines and computer equipment.</p><br/>

<h4>Database Developer</h4><hr/><p>

 <p>If you love math, computers, complex problems, and precise, detailed work and complex puzzles, and you're willing to consider getting a degree with a major in computer science or software development, solid job opportunities may await you in a career as a Database Developer. </p><br/>
 
<h4>Game Designers</h4><hr/>
 <p>Game Designers work with a team to design and develop video and computer games. Game Designers typically have a degree in Game Design, Computer Engineering or Computer Science.</p><br/>

 <h4>HTML Programmers</h4><hr/>
 <p>HTML Programmers develop Web sites and Web-based applications using the Hyper Text Markup Language (HTML) and typically have a B.S. in Computer Science. They can have careers in Web design, freelance programming, interactive media, project.</p><br/>

 
 <h4>HVAC Systems Technicians</h4><hr/>
 <p>HVAC systems technicians help maintain climate-controlled environments in buildings by keeping the heating, ventilation and air-conditioning (HVAC) systems running smoothly and efficiently.</p><br/>

<h4>IT Managers</h4><hr/>
 Information technology (IT) managers, also known as information systems managers, supervise computer software engineers, programmers, analysts and support staff and serve as a bridge between technical and non-technical staff and executives....</p><br/>

<h4>IT Analyst</h4><hr/>
<p> An IT Analyst determines the most efficient computer-based solutions for organizations to maximize productivity. An IT Analyst must combine computer knowledge with business acumen.</p><br/>

 <h4>IT Technician</h4><hr/>
<p> An IT Technician serves as a company's primary troubleshooter for desktop and laptop computers and for the hardware and software related to them, including printers, servers and other peripherals. </p><br/>


<h4>LAN Administrator</h4><hr/>
<p> A LAN Administrator manages an organization's local computer network, which provides high-speed computer communication, particularly Internet service and local network access.</p><br/>

<h4>Linux Programmer</h4><hr/>
 <p>Linux is an open source operating system that is seen as the main alternative to the proprietary Unix and Microsoft operating systems that dominate the marketplace. A Linux Programmer uses Linux, originally written in 1991 by Linus Torvalds.</p><br/>

 <h4>Networking managers and technicians</h4><hr/>
 <p>Networking managers and technicians ensure efficient operation of computer, telecommunications and data communications networks. By using various diagnostic tools, they oversee network equipment and software management and support, optimizing performance. They install, monitor, improve, diagnose and repair networks, to make sure an organization's communications backbone runs smoothly.</p><br/>
 
<h4>Oracle Database Administrator</h4><hr/>
<p>Oracle is an enterprise software company that developed a relational database management system (DBMS) which runs on multiple platforms. Oracle database administrators manage and customize these systems, ensuring optimum performance. Oracle Database Specialists, also referred to as Oracle database administrators, design, program, secure, configure and maintain Oracle databases.</p><br/>

<h4>PHP programmers</h4><hr/>
 <p>PHP programmers build database-driven, Web-based applications. PHP script enables Web pages to be dynamic by coding them to respond from databases to user requests. </p><br/>


<h4>SAPs </h4><hr/>
<p> SAP (Systems, Applications and Products in Data Processing) produces software designed to make companies operate more efficiently in a variety of areas, including finance, information technology (IT), manufacturing and purchasing. SAP is an international software provider which markets a suite of business components, or 'solutions,' to client companies. An SAP solution architect has mastered many SAP solutions, and is adept at integrating them into complex suites.</p><br/>

<h4>SQL Developers</h4><hr/>
 <p>SQL Developers, also referred to as database developers, create and maintain database applications and handle storage, efficiency, organization and security within particular systems. </p><br/>

<h4>Web Developer</h4><hr/>
<p> A Web Developer's responsibilities can include the development and maintenance of websites, overseeing the design and development of complex websites and using programming and scripting languages to develop new user interfaces. These...
Server Technology Manager: Job Outlook and Info About a Career in Server Technology Management </p><br/>

<h4>Systems Analysts</h4><hr/>
<p> There are specific types of Systems Analysts such as systems architects or systems designers but a Systems Analyst generally works in the computer department of a company providing the research and information necessary to maintain an up-to-date information system.</p><br/>

<h4>Technology Manager</h4><hr/>
<p> A technology manager coordinates information systems for companies, nonprofits, government agencies and other organizations. They ensure that computer hardware, software, database management systems, Internet servers, and telecommunications are working properly.</p><br/>

<h4>Web Developers and Administrators</h4><hr/>
<p>Web coordinators help to administer, manage and develop websites and Web activities for organizations and businesses. It requires training in website development, Internet culture and online marketing. They develop, create and maintain Internet websites for companies and businesses and make sure that content is available for potential consumers and readers. They are responsible for the daily upkeep of websites. More important than formal educations, Website Coders must have experience with the various coding languages, including HTML, Java and PHP, involved in developing and maintaining websites.</p><br/>


<br/><br/>
    <p>Page credit to our friends at www.cs.gwu.edu</p><br/>

    
  </section>
  <!-- /Career -->


    <section id="bottom" class="green-sea">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <h4><i class="icon-user"></i> Who We Are</h4>
                    <p><strong>NACOSS</strong> is the student body for all students of Computer Science in higher institutions of learning.</p><br/>
                    <p><strong>NACOSS</strong> provides opportunities for students to explore, fulfill their potentials and become more competitive in the IT environment both locally and globally.</p><br/>
                    <p>This website is exclusive to the <strong>Unibadan</strong> chapter of <strong>NACOSS</strong>.</p><br/>
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