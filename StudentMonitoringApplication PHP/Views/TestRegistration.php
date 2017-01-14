<?php 
	function EmployeeRegistrationForm()
	{
?>
<main class="mdl-layout__content">
        <div class="page-content"><!-- Your content goes here -->
        <div class="container">
        <div class="classInfo" style="background-color:#fff; border:1px Solid #eeeeee; padding:1%; width:65%; margin-left:10%">
		<form role="form" method="post" action="?connect=emp"> 
			<h3>REGISTER TEST </h3>
			<div class="form-group"> 
				<label for="name">TERM</label> 
				<input type="text" class="form-control" name="term" id="term" placeholder = "Enter Term"> 
			</div>			
			<div class="form-group"> 
				<label for="name">TEST TYPE</label> 
				<input type="text" class="form-control" name="testType" id="testType" placeholder = "Enter Test Type"> 
			</div>	
			<button type="submit" class="btn btn-default">SUBMIT</button> 
		</form>
		</div></div></div></main>
<?php
	}
?>

