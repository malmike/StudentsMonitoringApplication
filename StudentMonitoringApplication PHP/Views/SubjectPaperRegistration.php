<?php 
	function EmployeeRegistrationForm()
	{
?>
<main class="mdl-layout__content">
        <div class="page-content"><!-- Your content goes here -->
        <div class="container">
        <div class="classInfo" style="background-color:#fff; border:1px Solid #eeeeee; padding:1%; width:65%; margin-left:10%">
		<form role="form" method="post" action="?connect=subjectPaperReg"> 
			<h3>REGISTER SUBJECT PAPER </h3>
			<div class="form-group"> 
				<label for="name">CODE</label> 
				<input type="text" class="form-control" name="code" id="code" placeholder = "Enter Subject Paper Code"> 
			</div>			
			<div class="form-group"> 
				<label for="name">NAME</label> 
				<input type="text" class="form-control" name="name" id="name" placeholder = "Enter Name"> 
			</div>			
			<div class="form-group"> 
				<label for="name">NUMBER</label> 
				<input type="number" class="form-control" name="paperNumber" id="paperNumber" placeholder = "Enter Paper Number"> 
			</div>			
			<div class="form-group"> 
				<label for="name">FINAL SCORE AVERAGE</label> 
				<input type="number" class="form-control" name="average" id="average" placeholder = "Enter Final Score Average"> 
			</div> 			
			<button type="submit" class="btn btn-default">SUBMIT</button> 
		</form>
		</div></div></div></main>
<?php
	}
?>

