<?php
	function authenticate()
	{
		//Start session
		session_start();
		
		//Array to store validation errors
		$errmsg_arr = array();
		
		//Validation error flag
		$errflag = false;
		
		//Sanitize the POST values
		$email = @trim($_POST['email']);
		$password = @trim($_POST['password']);
		$userType = @trim($_POST['userType']);

		//Input Validations
		if($email == '') 
		{
			$errmsg_arr[0] = 'Login_Email_Missing';
			$errflag = true;
		}
		if($password == '') 
		{
			$errmsg_arr[1] = 'Password_Missing';
			$errflag = true;
		}
		//If there are input validations, redirect back to the login form
		if($errflag) 
		{
			$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
			session_write_close();
			header("location: ?action=login");
			exit();
		}
      
		switch($userType){
		    case "Teacher":
                $teacher = findTeacher($email, $password);
                conAuthentication($teacher, "teacher_id", $userType);
                break;
            case "Parent":
                $parent = findParent($email, $password);
                conAuthentication($parent, "parent_id", $userType);
                break;
            case "Admin":
                $admin = findTeacher($email, $password);
                conAuthentication($admin, "teacher_id", $userType);
                break;
		}	
	}


    function conAuthentication($user, $idType, $userType){
        if($user != ""){
            if(sizeof($user) == 1) {
                foreach($user as $member){
                  //Login Successful
				    session_regenerate_id();
				    //$member = mysqli_fetch_assoc($user);
                    if($userType == "Admin" && $member['status'] != "Admin"){
                        $_SESSION['LOGIN_FAILED'] = 'User is not authorised to access the admin system';
				        header("location: ?action=login");
				        exit();
                    }else if($member['status'] != "InActive"){
                        $_SESSION['SESS_ID'] = $member['id'];
				        $_SESSION['SESS_MEMBER_ID'] = $member[$idType];
				        $_SESSION['SESS_NAME'] = $member['name'];
				        $_SESSION['SESS_PHONE_NUMBER'] = $member['phone_number'];
				        $_SESSION['SESS_EMAIL'] = $member['email'];
				        $_SESSION['SESS_STATUS'] = $member['status'];
                        $_SESSION['SESS_USER_TYPE'] = $userType;

                    
				        session_write_close();
				        header("location: ?login=loggedIn");
                   
				        exit();
			        }else {
				        //Login failed
				        $_SESSION['LOGIN_FAILED'] = 'User is not authorised to access the system';
				        header("location: ?action=login");
				        exit();
			        }  
                }
				
            }else {
				//Login failed
				$_SESSION['LOGIN_FAILED'] = 'User Email does not match password';
				header("location: ?action=login");
				exit();
			}
        }else {
				//Login failed
				$_SESSION['LOGIN_FAILED'] = 'User Email does not match password';
				//header("location: ?action=login");
				exit();
		}
    }
?>