<?php
    session_start();
    include'parentIncludeParameters.php';
    parentHome();
    

    $a = $_REQUEST['action'];
	$b = $_REQUEST['connect'];
    $studentid = $_REQUEST['studentid'];
    $subjectId = $_REQUEST['subjectId'];
    $sfname = $_REQUEST['sfname'];
    $slname = $_REQUEST['slname'];

    if(!$a && !$b){
        parentProfile();
    }

    switch($a){
	        case "logout":
                logout();
                break;
            case "profile":
                parentProfile();
                break;

            case "studentProfile":
                setStudent($studentid);
                studentProfile();
                break;

            case "viewResults":
                viewIndividualResults($subjectId, $sfname, $slname, $_SESSION['SESS_STUDENT_ID']);
                break;

            case "viewTest":
                selectTests(1);
                break;

            case "selectTest":
                $test = findTest();
                displayIndividualTestMarks($test);
                break;
	}
?>


