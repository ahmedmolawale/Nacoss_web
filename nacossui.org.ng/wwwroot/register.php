<?php
    require_once('includes/fns.php');
    con();
    $myAlert = "";
    if(isset($_POST['register'])){

    $nacossite = array();
    $nacossite['matric_no'] = $_POST['matric_no'];
    $nacossite['surname'] = $_POST['surname'];
    $nacossite['firstname'] = $_POST['firstname'];
    $nacossite['other_name'] = $_POST['other_name'];
    $nacossite['password'] = sha1($_POST['password']);
    $level = $_POST['level'];
    
    if($level == 1){
        $nacossite['current_level'] = '100';
        $nacossite['mode_of_entry'] = 'UTME';

    }else{
        $nacossite['current_level'] = '200';
        $nacossite['mode_of_entry'] = 'DE';
    }
    
        if(authMatricNo($nacossite['matric_no'])){
            $myAlert = "<div class='alert alert-info'>
                            <button type='button' class='close' data-dismiss='alert'>×</button>
                            <strong>Oops!</strong> Matric No already exist!
                            Please sign in <i class='icon-hand-right'></i> <a href='sign_in.php'>here</a> if your are not a fresher.
                            
                        </div>";
        }else{
            if(registerNacossite($nacossite)){
            $myAlert = "<div class='alert alert-success'> 
                            <button type='button' class='close' data-dismiss='alert'>×</button>
                            <strong></strong>Registration successful
                            Sign in <i class='icon-hand-right'></i> <a href='sign_in.php'>here</a>
                        </div>";
        }else{

             $myAlert = "<div class='alert alert-error'> 
                            <button type='button' class='close' data-dismiss='alert'>×</button>
                            <strong></strong>Registration error. Please try again.
                            
                        </div>";

        }
        
        
    } 
    }                                                                                                                                          
?>

<!DOCTYPE html> <html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Register | Nacoss Unibadan</title>
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
      <?php  
         $header_add_on = "Sign In";
    
    echo thishead($header_add_on); 
     ?>    <!--/header-->
    <section id="title" class="opahead">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Register</h1>
                    <p>Please register below if you are a fresher else please sign in.</p>
                    
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Register</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/#title-->    

    <section id="reg_form" class="container">
    <blockquote>
                                <strong>Hello!</strong> Please enter your details below</strong>
            
     </blockquote>
     <?php echo $myAlert; ?>
        <form method="POST" class="center" role="form">
            <fieldset class="registration-form">
                <div class="form-group">
                    <input type="text" id="matric_no" name="matric_no" placeholder="Matric No." required="required" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" id="surname" name="surname" placeholder="Surname" required="required" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" id="firstname" name="firstname" placeholder="Firstname" required="required" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" id="other_name" name="other_name" placeholder="Other name" required="required" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password" placeholder="Password" required="required" class="form-control">
                </div>
                <div class="form-group">
                <select id = 'level' name='level'>
                <option value = '1'>100 (UTME)</option>
                <option value = '2'>200 (DE)</option>
                </select>
                </div>
                <div class="form-group">
                    <input type="submit" name="register" class="btn btn-primary btn-md" value="Register">
                </div>
            </fieldset>
        </form>
        
    </section><!--/#log in-->

    

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

<?php
        echo thisfooter();

?>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>