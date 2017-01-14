<?php
    session_start();
    include'adminIncludeParameters.php';
    adminHome();

    $a = $_REQUEST['action'];
	$b = $_REQUEST['connect'];
    $c = $_REQUEST['view'];
    $d = $_REQUEST['insert'];

    switch($a){
	    case "logout":
            logout();
            break;        
	}
    switch($b){
        case "subjectReg":
            insertSubject();
            break;
        case "streamReg":
            $stream_id = insertStream();
            if(sizeof($stream_id) == 1){
                streamRegistration2($stream_id);
            }else{
                streamRegistrationForm();
            }
            break;
        case "streamReg2":
            insertStreamParameters();
            break;
    }
    switch($c){
        case "viewTeachers":
            DisplayTeachers();
            break;
        case "insStream":
            streamRegistrationForm();
            break;
        case "viewStream";
            viewStreams();
            break;
        case "viewSubject":
             viewSubjects();
             break;
        case "viewStudent":
            viewStudents();
            break;
        case "viewParents":
            viewParents();
            break;
    }
    switch($d){
        case "insStudent":
            StudentRegistrationForm();
            break;
        case "insSubject":
            subjectRegistrationForm();
            break;
        case "insertParameters":
            insertStreamParameters();
            break;
        
    }

?>

