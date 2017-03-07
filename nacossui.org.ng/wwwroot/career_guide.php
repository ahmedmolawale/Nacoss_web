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
    <title>Career Guide | Nacoss Unibadan</title>
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
                    <h1>CAREER GUIDE</h1>
                    <p>GET PROPER GUIDANCE TO KICK-START YOUR COMPUTER SCIENCE CAREER</p>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="http://www.nacossui.org.ng">Home</a></li>
                        <li class="active">RESOURCES</li>
                        <li class="active">CAREER GUIDE</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/#title-->

   <section id="career" class="container">
    <div class="center">
      <h2>New to Computer Science? No need to worry...</h2>
      <p>Compiled by Nkemelu Daniel | Also see <a href="http://www.nacossui.org/career_list.php">CAREER LIST</a></p>
    <br/></div>
    <p>WHAT EXACTLY IS COMPUTER SCIENCE?</p>
    <hr>
    <p>Computer Science is the science of using computers to solve problems. Mostly, this involves designing software (computer programs) and addressing fundamental scientific questions about the nature of computation but also involves many aspects of hardware and architecting the large computer systems that form the infrastructure of commercial and government enterprises. Computer scientists work in many different ways: pen-and-paper theoretical work on the foundations and fundamentals, programming work at the computer and collaborative teamwork in doing research and solving problems.</p>
    <br/>
    <p>WHAT COMPUTER SCIENCE IS NOT ...</p>
    <hr>
    <p>Computer Science is not about using software, such as spreadsheets (like Excel), word processors (like Word) or image tools (like Photoshop). Many software packages are complicated to master (such as Photoshop or Excel) and it is true that many jobs depend on expertise in using such tools, but computer science is not about using the tools. It is not about expertise in computer games, it is not about about writing content in websites, and it is not about assembling computers or knowing which computers are best buys. Edsger Dijkstra, a famous award-winning computer scientist once said, "Computer Science is no more about computers than Astronomy is about telescopes". Computer Science is about the principles behind building the above software packages, about the algorithms used in computer games, about the technology behind the internet and about the architecture of computing devices.</p>
    <br/>
    <p>WHY IS COMPUTER SCIENCE SO HARD?</p>
    <hr>
    <p>Initially, it does seem that way. The reason is that, programming is challenging and is introduced "cold" to students in a first computer science course. Compare this to the study of mathematics: math is with us since Grade 1 and introduced in small steps right through school. Programming is a similar intellectual skill that takes time to master, usually about 4-5 courses. While there are always students to appear to find programming easy and unnecessarily intimidate others into believing they are not suited to computer science, most of us learn skills step-by-step over time. Can anyone with no musical background learn a musical instrument in one semester? Can you learn to speak a foreign language fluently with a single course? Many students tend to give up because of a combination of "others seem to get it and I don't" and "why isn't it coming to me?". Any skill acquisition is hard if viewed negatively. But like any skill acquisition, it can be acquired with patience and persistence. And once the skills are acquired, the supposedly "super-smart" kids who "got it" earlier don't seem that unreachably smart anymore.</p>
    <br/>
    <p>WHAT IS PROGRAMMING?</p>
    <hr>
    <p>Programming is the intellectual endeavor of creating individual software programs. Part of it involves thinking (design, analysis), part of it involves coding (translating a design into instructions via a programming languages such as Java or C++) and part of it involves testing (subjecting software to a battery of tests to make sure it works). Programming has been likened to mathematics (analytic thinking) to writing (artfully telling a story), to engineering (building larger software out of smaller software units) and to art (exercising creativity). The part of programming that is most easily identified in Hollywood depictions is coding, the process of typing instructions in a programming language (such as Java or C++); this involves the stereotypical hunching over a monitor, pounding at the keyboard and watching the software execute.</p>
    <br/>
    <p>IS COMPUTER SCIENCE MOSTLY PROGRAMMING?</p>
    <hr>
    <p>Far from it. Initially, it may seem that it is all about programming because it is the skill whose teaching we start with (because it's fun, it's challenging and it's a prerequisite to further computer science). However, most undergraduate curricula devote 3 to 4 courses exclusively to programming, leaving 10-15 other computer science courses. Some of these use a student's programming skills acquired earlier, but most concentrate on some aspect of computer science central to the discipline. So, what are these areas of computer science? You can: learn about how computers are built (architecture), the principles behind important "infrastructure" software systems (operating systems, databases), study classic algorithms and learn to design your own, learn how compilers and language translation is done, study specialized computer science areas such as artificial intelligence, parallel computing, networks, graphics, bioinformatics, robotics, education or multimedia.</p>
    <br/>
    <p>WHAT'S INTERESTING ABOUT COMPUTER SCIENCE?</p>
    <hr>
    <p>Why do people find computer science interesting? Initially, interest usually begins with programming and mastering the many details and thought processes involved in programming. Later, once programming is "been there, done that", people get interested in designing large software systems, or in computer architecture, or in one of the many specialized areas of computer science. Many people believe that the golden age of computing has just begun.</p>
    <br/>
    <p>WHAT KINDS OF CAREERS ARE OPEN TO ME WITH A DEGREE IN COMPUTER SCIENCE?</p>
    <hr>
    <p>Many people incorrectly believe that a computer science career is all about programming. While it is true that most entry-level jobs after a Bachelor's degree involve programming, most practioners eventually graduate to other responsibilities such as design, coordination, testing, planning and management.</p>
    <br/>
    <p>ARE THERE CAREERS IN COMPUTER SCIENCE THAT INVOLVE PEOPLE-SKILLS, OR WILL I BE STARING AT A SCREEN ALL DAY?</p>
    <hr>
    <p>Most career paths in computer science involve people skills and interacting with people. Beyond an entry-level position as a software engineer, almost any corporate position requires working with people. The creation of software is most often a team effort, and software companies are organizations of people like any other type of company. Thus, if your career path is typical, you will not be alone in your cubicle staring at the screen.</p>
    <br/>
    <p>WHAT IF I LIKE PROGRAMMING ALL DAY?</p>
    <hr>
    <p>There is of course a rich tradition of computer scientists who love developing software and who are happy spending most of their time in programming or designing software. Some are so motivated that they often spend hours on programming beyond their time at work. Many of these efforts have resulted in the vast amount of free open-source software available on Linux and other systems.</p>
    <br/>
    <p>WHAT ARE HOT TOPICS IN COMPUTER SCIENCE TODAY?</p>
    <hr>
    <p>The core areas of computer science, including software engineering, graphics, networks, databases, multimedia and artificial intelligence remain strong today. At the same time, some of the most exciting new work in computer science is occurring at the intersection between computer science and other fields. For example, computer science is changing the way biological research is conducted in fundamental ways, leading to a new field called bioinformatics at the intersection of biology and computer science. Similarly, computer simulations are making it possible to study problems in physics, chemistry, economics and geology that were difficult without computers.</p>
    <br/>
    <p>WHAT ARE SOME CHALLENGES LEFT OPEN IN COMPUTER SCIENCE FOR MY GENERATION?</p>
    <hr>
    <p>Some people wonder if all the "important" problems in computer science have been solved, leaving only tinkering for future generations.A seemingly mundane problem shows no sign of being solved: how to rapidly and easily create large software systems without errors. Similarly, applications of computer science to other disciplines have only begun to scratch the surface. Are you interested in these challenges?</p>
    <br/>
    <p>WHAT DOES IT TAKE TO BE SUCCESSFUL IN COMPUTER SCIENCE?</p>
    <hr>
    <p>Computer science is about a unique kind of problem-solving: creatively solving problems using computation. If you are creative, if you like puzzles, if you like problem-solving in other domains (engineering, mathematics, sciences), if you are comfortable with abstract thinking, if you like working at the intersection of multiple disciplines - if any of these apply to you, then Computer Science is for you.</p>
    <br/><br/>
    <p>Page credit to our friends at www.cs.gwu.edu</p>

    
  </section>
  <!-- /Career -->


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