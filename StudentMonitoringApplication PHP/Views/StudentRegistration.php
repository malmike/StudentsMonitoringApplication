<?php 
	function StudentRegistrationForm()
	{
?>
<main class="mdl-layout__content">
        <div class="page-content">
        <div style="margin:10% 30%">
		<form role="form" method="post" action="?connect=studentReg"> 
			<h3>REGISTER STUDENT </h3>
			<div class="form-group"> 
				<label for="name">STUDENT ID</label> 
				<input type="text" class="form-control" name="studentId" id="studentId" placeholder = "Enter Student ID"> 
			</div>			
			<div class="form-group"> 
				<label for="name">STUDENT FIRST NAME</label> 
				<input type="text" class="form-control" name="fname" id="fname" placeholder = "Enter First Name"> 
			</div>	
            <div class="form-group"> 
				<label for="name">STUDENT LAST NAME</label> 
				<input type="text" class="form-control" name="lname" id="lname" placeholder = "Enter Last Name"> 
			</div>	
            <div class="form-group"> 
				<label for="name">PARENT NAME</label> 
				<input type="text" class="form-control" name="pname" id="pname" placeholder = "Enter Parent Names"> 
			</div>		
			<div class="form-group"> 
				<label for="name">PARENT PHONE NUMBER</label> 
				<input type="text" class="form-control" name="phone" id="phone" placeholder = "Enter Phone Number"> 
			</div>			
			<div class="form-group"> 
				<label for="name">PARENT EMAIL</label> 
				<input type="email" class="form-control" name="email" id="email" placeholder = "Enter Email"> 
			</div> 	
			<div class="form-group">
				<label for="subjects">Select Subjects</label>
				<select multiple class="form-control">
					<?php 
						
							foreach(callAllSubjects() as $subject){
								echo"<option>{$subject['name']}</option>";
							}	
					?>
				</select>
			</div>	
			<div class="form-group"> 
                <label for="name">INSERT PROFILE PICTURE</label>
                <input type="file" name="fileToUpload" id="fileToUpload">
            </div>		
			<button type="submit" name="submit" id="submit" class="btn btn-default">SUBMIT</button> 
		</form></div>
		</div></main>
		
<?php
	}
?>