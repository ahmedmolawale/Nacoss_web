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
        <link href="css/signup-login.css" rel="stylesheet">
        <link href="css/signup-login.css" rel="stylesheet">
        <link href="css/stu_details.css" rel="stylesheet">
        <link href="css/fonts.googleapis.com.css" rel="stylesheet">


        <link rel="shortcut icon" href="/nacossui/images/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/a144.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/a114.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/a72.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/a57.png">


        <script type="text/javascript" src="js/jquery.easing.min.js"></script>
        <script type="text/javascript" src="js/jquery.easy-ticker.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/app.js"></script>
        <script type="text/javascript" src="js/stu_details.js"></script>

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
        <header class='main_h' role='banner'>
            <div class="navbar navbar-inverse navbar-fixed-top wet-asphalt">
                <div class='container'>
                    <div class='navbar-header'>
                        <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-collapse'>
                            <span class='sr-only'>Toggle navigation</span>
                            <span class='icon-bar'></span>
                            <span class='icon-bar'></span>
                            <span class='icon-bar'></span>
                        </button>
                        <a class='navbar-brand' href='http://www.nacoss.org'><img src='/nacossui/images/ico/logo.png' alt='logo'></a>
                    </div>

                    <div class='collapse navbar-collapse'>
                        <ul class='nav navbar-nav navbar-right'>

                            <li><a href='http://www.nacossui.org.ng/about.php'><i class='icon-flag'></i> About Us</a></li>
                            <li><a href='http://www.nacossui.org.ng/team.php'><i class='icon-user'></i> NACOSS Team</a></li>
                            <li><a href='http://www.nacossui.org.ng/contact.php'><i class='icon-globe'></i> Contact</a></li>


                            <li class='dropdown'>
                                <a href='#' class='dropdown-toggle' data-toggle='dropdown'><i class='icon-hdd'></i> Resources <i class='icon-angle-down'></i></a>
                                <ul class='dropdown-menu'>
                                    <li><a href='http://www.nacossui.org.ng/elibrary.php'><i class='icon-folder-open'></i> E-library</a></li>
                                    <li><a href='http://www.nacossui.org.ng/etest.php'><i class='icon-ok'></i> E-test</a></li>
                                    <li><a href='http://www.nacossui.org.ng/career_guide.php'><i class='icon-road'></i> Career</a></li>
                                    <li><a href='http://www.nacossui.org.ng/cgpa.php'><i class='icon-th'></i> CGPA calculator</a></li>
                                    <li><a href='http://www.nacossui.org.ng/authuser.php'><i class='icon-exclamation-sign'></i> Programmer's Forum</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href='register-login.php' id="loginform"><i class='icon-globe'></i> Login</a></li>


                        </ul>
                    </div>
                </div>
            </div>
        </header>
		<div class="main-container" id="main-container">
			<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">
						<div class="page-header" style="margin-left: 20px;">
							<h3>
								Welcome PoG, <em>please update your details before making payment</em>
							</h3>
						</div><!-- /.page-header -->
						<div class="row" style="margin: auto;">
							<div class="col-xs-12">
								<div class="hr hr-24"></div>

								<div class="row">
                                    <div class="col-xs-12 col-sm-3">
										<div class="widget-box">
                                            <div class="widget-header">
                                                <h4>Profile</h4>
											</div>
                                            <div class="widget-body center">
                                                <div>
    												<span class="profile-picture">
    													<img id="avatar" class=""src="images/avatar.png"/>'
                                                    </span>
													<span class="profile-signature">
    													<img id="avatar" src="images/sprite_x.png"/>
                                                    </span>
												</div>
											</div>
										</div>
                                        <br />
                                        <button onclick="openUpdate()" class="btn btn-primary">update profile</button>
                                        <ul id="list_update">
                                            <li onclick="openInput()"><a href="#">update picture</a></li>
                                            <form id="form_file">
                                                <div>
                                                    Passport: <input id="" name="" type="file" class="autosize-transition form-control" required></input>
                                                </div>
                                                <div>
                                                    Signature: <input id="" name="" type="file" class="autosize-transition form-control" required></input>
                                                </div>
                                                <div class="right" id="submit">
                                                    <button type="submit" class="btn btn-sm btn-primary">
                                                        update
                                                        <i class="fa fa-arrow-up"></i>
                                                    </button>
                                                </div>
                                            </form>
                                            <li onclick="changePassword()"><a href="#">change password</a></li>
                                            <form id="form_password">
                                                <div>
                                                    Password: <input id="" name="" type="password" class="autosize-transition form-control" placeholder="PASSWORD" required></input>
                                                </div>
                                                <div>
                                                    Enter Again:<input id="" name="" type="password" class="autosize-transition form-control" placeholder="CONFIRM PASSWORD" required></input>
                                                </div>
                                                <div class="right" id="submit">
                                                    <button type="submit" class="btn btn-sm btn-primary">
                                                        update
                                                        <i class="fa fa-arrow-up"></i>
                                                    </button>
                                                </div>
                                            </form>
                                            <li onclick="changeInfo()"><a href="#">update info</a></li>
                                            <form id="form_others">
                                                <div>
                                                    Email: <input id="" name="" type="email" class="autosize-transition form-control" placeholder="EMAIL" required></input>
                                                </div>
                                                <div>
                                                    Address: <input id="" name="" type="text" class="autosize-transition form-control" placeholder="ADDRESS" required></input>
                                                </div>
                                                <div>
                                                    Phone No: <input id="" name="" type="text" class="autosize-transition form-control" placeholder="PHONE NUMBER" required></input>
                                                </div>
                                                <div class="right" id="submit">
                                                    <button type="submit" class="btn btn-sm btn-primary">
                                                        update
                                                        <i class="fa fa-arrow-up"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </ul>
                                        <form class="form_update" id="form_update" name="form_update">
                                            <div class="widget-main">

                                                <hr />

                                            </div>
                                        </form>
									</div><!-- /.span -->

                                    <div class="col-xs-12 col-sm-4">
										<div class="widget-box">
											<div class="widget-header">
												<h4 class="widget-title">Basic Information</h4>
											</div>
                                            <hr />
											<div class="widget-body">
                                                <div class="profile-user-info profile-user-info-striped">
    												<div class="info-row">
    													<div class="info-name"><span class="info-title">Surname: </span><span class="info-data">Akintola</span></div>
    												</div>
                                                    <br />
                                                    <div class="info-row">
    													<div class="info-name"><span class="info-title">First Name: </span><span class="info-data">Oluwafemi</span></div>
    												</div>
                                                    <br />
                                                    <div class="info-row">
    													<div class="info-name"><span class="info-title">Other: </span><span class="info-data">Micheal</span></div>
    												</div>
                                                    <br />
                                                    <div class="info-row">
    													<div class="info-name"><span class="info-title">Matric No: </span><span class="info-data">179163</span></div>
    												</div>
                                                    <br />
                                                    <div class="info-row">
    													<div class="info-name"><span class="info-title">Mode: </span><span class="info-data">UTME</span></div>
    												</div>
                        						</div>
    										</div>
                                        </div>
									</div><!-- /.span -->

									<div class="col-xs-12 col-sm-4">
										<div class="widget-box">
											<div class="widget-header">
												<h4 class="widget-title">Payment Info</h4>
											</div>
                                            <hr />
                                            <div class="widget-body">
                                                <div class="profile-user-info profile-user-info-striped">
    												<div class="info-row">
    													<div class="info-name"> Full Name: <span>Akintola Oluwafemi M.</span></div>
    												</div>
                                                    <br />
                                                    <div class="info-row">
    													<div class="profile-info-name"> Matric No: <span>179163</span></div>
    												</div>
                                                    <br />
                                                    <div class="info-row">
    													<div class="info-name"> Level: <span>400</span></div>
    												</div>
                                                    <br />
                                                    <div class="info-row">
    													<div class="info-name"> Amount: <span>6 000</span></div>
    												</div>
                                                    <br />
                                                    <div class="info-row">
    													<div class="info-name"> Billing Address: <span>B32, Independence Hall, UI.</span></div>
    												</div>
                        						</div>
    										</div>
                                            <br />
                                            <div class="right">
                                                <button type="button" class="btn btn-sm btn-success">
                                                    pay due
                                                    <i class="fa fa-arrow-right"></i>
                                                </button>
                                            </div>
										</div>
									</div><!-- /.span -->

								</div><!-- /.row -->

							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">

					</div>
				</div>
			</div>
		</div><!-- /.main-container -->
	</body>
</html>
