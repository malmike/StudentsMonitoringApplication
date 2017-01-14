<?php
	function login()
	{
        session_start();
		if($_SESSION['ERRMSG_ARR'][0] != "") 
		{
			$email = $_SESSION['ERRMSG_ARR'][0];
		}else
		{
			$email = "Enter_User_Email";
		}
		
		if($_SESSION['ERRMSG_ARR'][1] != "") 
		{
			$pass = $_SESSION['ERRMSG_ARR'][1];
		}else
		{
			$pass = "Enter_Password";
		}

?>		
    <div class="container" style="margin-top:1%">
		<ul class="cd-pricing">
		    <li>
			    <header class="cd-pricing-header">
				    <h2>Parent</h2>

				    <div class="cd-price">
					    <span>(Or</span>
					    <span>Guardian)</span>
				    </div>
			    </header> <!-- .cd-pricing-header -->

			    <div class="cd-pricing-features">
				    <ul>
					    <li class="available" style="text-align:left; margin-left:10px"><em>Check results</em></li>
					    <li class="available" style="text-align:left; margin-left:10px"><em>Chat with teachers</em></li>
					    <li class="available" style="text-align:left; margin-left:10px"><em>Check results</em></li>
				    </ul>
			    </div> <!-- .cd-pricing-features -->

			    <footer class="cd-pricing-footer">
				    <a href="#" onclick="parentSelection();">Select</a>
			    </footer> <!-- .cd-pricing-footer -->
		    </li>
		
		    <li>
			    <header class="cd-pricing-header">
				    <h2>Administrator</h2>
			    <div class="cd-price">
					    <span>(Or</span>
					    <span>Head Teacher)</span>
				    </div>
			    </header> <!-- .cd-pricing-header -->

			    <div class="cd-pricing-features">
				    <ul>
					    <li class="available" style="text-align:left; margin-left:10px"><em>Approve registered parents</em></li>
					    <li class="available" style="text-align:left; margin-left:10px"><em>Add subjects</em></li>
					    <li class="available" style="text-align:left; margin-left:10px"><em>Add classes</em></li>
					    <li class="available" style="text-align:left; margin-left:10px"><em>Add Students</em></li>

				    </ul>
			    </div> <!-- .cd-pricing-features -->

			    <footer class="cd-pricing-footer">
				    <a href="#" onclick="adminSelection();">Select</a>
			    </footer> <!-- .cd-pricing-footer -->
		    </li>

		    <li>
			    <header class="cd-pricing-header">
				    <h2>Teacher</h2>
				    <div class="cd-price">
					    <span>(Or</span>
					    <span>Data entrant)</span>
				    </div>
			    </header> <!-- .cd-pricing-header -->

			    <div class="cd-pricing-features">
				    <ul>
					    <li class="available" style="text-align:left; margin-left:10px"><em>Add and Remove marks</em></li>
					    <li class="available" style="text-align:left; margin-left:10px"><em>Chat with parents</em></li>
					    <li class="available" style="text-align:left; margin-left:10px"><em>Upload work</em></li>
					
				    </ul>
			    </div> <!-- .cd-pricing-features -->

			    <footer class="cd-pricing-footer">
				    <a href="#" onclick="teacherSelection();">Select</a>
			    </footer> <!-- .cd-pricing-footer -->
		    </li>
	    </ul> <!-- .cd-pricing -->
    </div>

	<div class="cd-form">
		
		<div class="cd-plan-info">
			<!-- content will be loaded using jQuery - according to the selected plan -->
		</div>

		<div class="cd-more-info">
			<h3>Need help?</h3>
			<p>Contact BSE-16-58 on +256701500799 for more help</p>
		</div>
		
		<form role="form" method="post" action="?login=login">
		    
            <div id="target" class="half-width">
		        <input type="hidden" name="userType" id="userType">
		    </div>

		    <h3><small><?php if($_SESSION['LOGIN_FAILED'] != '') echo $_SESSION['LOGIN_FAILED'];?></small></h3>
			<fieldset>
				<legend>Login</legend>
                
				<div class="half-width">
					<label for="name">USER EMAIL</label>  
				<input type="email" class="form-control" name="email" id="email" placeholder = <?php echo $email ?>>
				</div>
				
				<div class="half-width">
					<label for="name">PASSWORD</label> 
					<input type="password" class="form-control" name="password" id="password" placeholder = <?php echo $pass ?>> 
				</div>

			</fieldset>
			
			<fieldset>
				<div>
					<input type="submit" value="Submit" style="background-color:#26a69a; margin-right:5%">
					<label>or <a href="?action=register">REGISTER</a></label>
				</div>
			</fieldset>

		</form>
		</div>

<?php
		//clear $_SESSION['ERRMSG_ARR'] 
		$_SESSION['ERRMSG_ARR'] = '';
		$_SESSION['LOGIN_FAILED'] = '';
	}
?>


