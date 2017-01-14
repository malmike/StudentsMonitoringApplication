<?php
	function logout()
	{
		session_start();
        unset($_SESSION['SESS_ID']);
		unset($_SESSION['SESS_MEMBER_ID']);
		unset($_SESSION['SESS_NAME']);
		unset($_SESSION['SESS_PHONE_NUMBER']);
		unset($_SESSION['SESS_EMAIL']);
		unset($_SESSION['SESS_STATUS']);
        unset($_SESSION['SESS_USER_TYPE']);

        header("location: index.php");
        
	}
?>