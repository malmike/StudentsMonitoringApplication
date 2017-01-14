<?php
	include'includeParameters.php';
    
	$a = $_REQUEST['action'];
	$b = $_REQUEST['connect'];
    $l = $_REQUEST['login'];

    

    ////$sel = "SELECT * FROM student";
    ////$row = $dbo->prepare($sel);
    ////$row->execute();
    ////$result=$row->fetchAll(PDO::FETCH_ASSOC);

    //$result = callStudents();
    ////if($result != NULL) echo "$result";
    ////    //$row = $dbo->prepare($qry);
    ////    //$row->execute();
    ////    //$result=$row->fetchAll(PDO::FETCH_ASSOC);  
    //foreach($result as $now) echo $now['student_first_name'];

    if(!$a && !$b && !$l && !$d)
	{
        login();
	}else{
	    switch($a){
	        case "register":
                userRegistration();
                ParentRegistrationForm();
                break;
            case "registerParent":
                userRegistration();
                ParentRegistrationForm();
                break;
            case "registerTeacher":
                userRegistration();
                TeacherRegistrationForm();
                break;
            case login:
                login();
                break;
	    }
        switch($b){
            case "teacherReg":      
                insertTeacher();
                break;
            case "parentReg":      
                insertParent();
                break;
        }
        switch($l){
            case "login":
                authenticate();
                break;
            case "loggedIn":
                header("location: index.php");               
                break;
        }
	}
?>