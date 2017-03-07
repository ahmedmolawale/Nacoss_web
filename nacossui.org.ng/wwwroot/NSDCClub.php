<?php


    session_start();
    require_once('includes/fns.php');
    con();
    $myAlert = "";

   
    if(isset($_POST['btn_in'])){

    $umatric = $_POST['matric'];
    $uemail = $_POST['email'];
	$uname = $_POST['name'];
	$ulevel = $_POST['level'];
    $uphoneno = $_POST['phoneno'];
  
if(checkmatricsdc($umatric)=='N'){
            $myAlert = "<div class='alert alert-error'>
                            <button type='button' class='close' data-dismiss='alert'>×</button>
                            <strong>Oops!</strong> User already exist!
                        </div>";
						
        
        }
		/**elseif(!uphoneno){
            $myAlert = "<div class='alert alert-error'>
                            <button type='button' class='close' data-dismiss='alert'>×</button>
                            <strong>Sorry!</strong> Invalid phone Number
                        </div>";
		}**/
        
		elseif(!filter_var($uemail,FILTER_VALIDATE_EMAIL)){
            $myAlert = "<div class='alert alert-error'>
                            <button type='button' class='close' data-dismiss='alert'>×</button>
                            <strong>Sorry!</strong> Invalid Email Address!
                        </div>";
        }
		
		
		
		else{
			
			insertsdc($umatric,$uname,$uphoneno,$ulevel,$uemail);
			            $myAlert = "<div class='alert alert-success'>
                            <button type='button' class='close' data-dismiss='alert'>×</button>
                            <strong>Success!</strong> Thank you for registering, we will get back to you soon!
                        </div>";
        }
    }   
	
    
?>

<!DOCTYPE html> <html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Resources > SDC REGISTER | Nacoss Unibadan</title>
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
                    <h1>Register </h1>
                    <p>NACOSS Software Development Club (NSDC) .</p>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="index.html">Home</a></li>
                        <li class="active"> Register</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/#title-->    

   <section id="registration" class="container">
   <blockquote>
                               <center><strong>Hello!</strong> Enter your Correct Details  <i class="icon-hand-down"></i> 
                                <a> We will get back to you as soon as possible. </a></center>
                                
     </blockquote>
   
     <?php echo $myAlert; ?>
        <form method="POST" role=form" class="center" >
            <fieldset class="registration-form" size="75%" >
                <div class="form-group">
                    <input type="text"  name="matric" placeholder="matric number" required class="form-control" size="50%" align="center">
                </div>
				 <div class="form-group">
                    <input type="text"  name="name" placeholder="Full Name" required class="form-control">
                </div>
				  <div class="form-group">
                    <input type="text" id="email" name="email" placeholder="Email" required class="form-control">
                </div>
				  <div class="form-group">
                    <input type="text" id="phoneno" name="phoneno" placeholder="Phone Number" required class="form-control">
                </div>
               <div class="form-group">
                    <select name="level"  required="required" class="form-control"><option>Select your level</option><option value=100" >100 </option><option value="200" >200 </option><option value="300" >300 </option><option value="400" >400 </option></select>
                </div>
                <div class="form-group">
                    <input type="submit" name="btn_in" class="btn btn-primary btn-md" value=" Register">
                </div>
            </fieldset>
        </form>
		</section><!--/#registration-->

    

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
    <script src="js/main.js"></script>
</body>
</html>