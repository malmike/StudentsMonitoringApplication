<?php error_reporting(0); ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<title>SMA</title>
	<link href="Views/mdl/material.min.css" rel="stylesheet" />
	<link href="Views/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,600' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="Views/bootstrap/js/bootstrap.min.js"></script>
	<script src="Views/mdl/material.min.js"></script>
	<script type="text/javascript" src="Views/JS/jquery-1.7.1.min.js" ></script>
	<script type="text/javascript" src="Views/JS/loginSelection.js"></script>
</head>
<body>
	<p style="color:#ffffff; display: block; float:right; margin: 0.5% 0.5%"><a href="app/">Checkout our app</a></p>
	<img src="Images/SRMA_Logo.png" style="margin:10px 0 -70px 45%;display:inline; width:100px">
	<header class="cd-main-header" style="margin-bottom:-30px">
		<h1>Student Results Monitoring Application</h1>
	</header>
	<div class="container"> 
				<div class="row">
					<?php 
                        
                        session_start();
                        //include 'Controller/functioncalls.php'; 
                        if($_SESSION['SESS_USER_TYPE'] == ""){
                           
                            include 'Controller/functioncalls.php';
                        }else{
                            switch($_SESSION['SESS_USER_TYPE']){
                                case "Teacher":
                                     
                                    include 'Controller/teacherFunctionCalls.php';
                                    break;
                                case "Parent":
                                     
                                    include 'Controller/parentFunctionCalls.php';
                                    break;
                                case "Admin":
                                     
                                    include 'Controller/adminFunctionCalls.php';
                                    break;
                            }
                        }                     
						                   
					?>
			</div>
	</div>
		<a href="#0" class="cd-close"></a>
	</div> <!-- .cd-form -->
	
	<div class="cd-overlay"></div> <!-- shadow layer -->
<script src="js/jquery-2.1.4.js"></script>
<script src="js/velocity.min.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>
