<?php
    session_start();
    include'teacherIncludeParameters.php';
    

    $a = $_REQUEST['action'];
	$b = $_REQUEST['connect'];
    $subjectId = $_REQUEST['subjectId'];
    $streamId = $_REQUEST['streamId'];
    $sfname = $_REQUEST['sfname'];
    $slname = $_REQUEST['slname'];
    $studentid = $_REQUEST['studentid'];
    $view = $_REQUEST['view'];

    if(!$a && !$b && !$view){
        teacherHome();
    }
    switch($a){
	        case "logout":
                logout();
                break;
            case "students":
                teacherNavigation();
                setVariables($streamId, $subjectId);
                setStudent($studentid);
                viewSubjectStream($streamId, $subjectId);
                break;
            case "viewResults":
                teacherNavigation();
                viewIndividualResults($subjectId, $sfname, $slname, $studentid);
                break;
            case "home":
                unsetVariables();
                teacherHome();
                break;
            case "selectTest":
                teacherNavigation();
                $test = findTest();
                displayTestMarks($test);
                break;
            case "insMarks":
                teacherNavigation();
                selectTests(2);
                break;
            case "insertTest":
                teacherNavigation();
                $test = findTest();
                proveTest($test, $_SESSION['SESS_SUBJECT_ID'], $_SESSION['SESS_STREAM_ID']);
                if($_SESSION['SESS_TEST_ERROR'] == "" || $_SESSION['SESS_TEST_ERROR'] == NULL){
                    insertMarks($test);
                }             
                break;
            case "insertMarks":
                insertMarksDB();
                break;
            
	}

    switch($view){
        case "studentList":
             teacherNavigation();
             viewSubjectStream($_SESSION['SESS_STREAM_ID'], $_SESSION['SESS_SUBJECT_ID']);
             break;

        case "viewMarks":
            teacherNavigation();
            selectTests(1);
            break;
        
    }
?>

