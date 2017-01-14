<?php 
	function TeacherRegistrationForm()
	{
        $imgerr = "";
        session_start();
        if($_SESSION['SESS_IMAGES_ERROR'] != "" || $_SESSION['SESS_IMAGES_ERROR'] != NULL) 
		{
			$err = $_SESSION['SESS_IMAGES_ERROR'];
            unset($_SESSION['SESS_IMAGES_ERROR']);
		}
?>
<main class="mdl-layout__content">
        <div class="page-content"><!-- Your content goes here -->
        <div class="container">
        <div class="classInfo" style="background-color:#fff; border:1px Solid #eeeeee; padding:1%; width:65%; margin-left:10%">
		<form role="form" method="post" action="?connect=teacherReg" enctype="multipart/form-data"> 
			<h3>REGISTER TEACHER<small><?php
                                       if($err != ""){
                                           echo $err;
                                       }
                                   ?></small></h3> <br><br>
			<div class="form-group"> 
				<label for="name">TEACHER ID</label> <br>
				<input type="text" class="form-control" name="teacherId" id="teacherId" placeholder = "Enter Teacher ID"> 
			</div>			
			<div class="form-group"> 
				<label for="name">TEACHER NAME</label> <br>
				<input type="text" class="form-control" name="name" id="name" placeholder = "Enter Name in format (FirstName LastName)"> 
			</div>			
			<div class="form-group"> 
				<label for="name">PHONE NUMBER</label> <br>
				<input type="text" class="form-control" name="phone" id="phone" placeholder = "Enter Phone Number"> 
			</div>			
			<div class="form-group"> 
				<label for="name">EMAIL</label> <br>
				<input type="email" class="form-control" name="email" id="email" placeholder = "Enter Email"> 
			</div> 
			<div class="form-group"> 
				<label for="name">PASSWORD</label> <br>
				<input type="password" class="form-control" name="password" id="password" placeholder = "Enter Password"> 
			</div>
			
			<div class="form-group"> 
				<label for="name">RE-ENTER PASSWORD</label> <br>
				<input type="password" class="form-control" name="cpassword" id="password" placeholder = "Re-enter Password"> 
			</div>			
			<div class="form-group"> 
                <label for="name">INSERT PROFILE PICTURE</label><br>
                <input type="file" name="fileToUpload" id="fileToUpload">
            </div>		<br>
			<button type="submit" name="submit" id="submit" class="btn btn-default">SUBMIT</button> 
		</form>
		</div></div></div></main>
		
<?php
	}
?>

