<?php 
	function streamRegistrationForm()
	{
?>
<main class="mdl-layout__content">
        <div class="page-content"><!-- Your content goes here -->
        <div class="container">
        <div class="classInfo" style="background-color:#fff; border:1px Solid #eeeeee; padding:1%; width:65%; margin-left:10%">

		<form role="form" method="post" action="?connect=streamReg"> 
			<h3>REGISTER STREAM </h3>			
			<div class="form-group"> 
				<label for="name">STREAM</label> 
				<input type="text" class="form-control" name="stream" id="stream" placeholder = "Enter Stream"> 
			</div>			
			<div class="form-group"> 
				<label for="name">CLASS</label> 
				<input type="text" class="form-control" name="class" id="class" placeholder = "Enter Class"> 
			</div>			
			<div class="form-group"> 
				<label for="name">YEAR</label> 
				<input type="text" class="form-control" name="year" id="year" placeholder = "Enter Year of Study"> 
			</div>			
			<button type="submit" class="btn btn-default">CONTINUE</button> 
		</form>
		</div></div></div></main>
<?php
	}
?>

