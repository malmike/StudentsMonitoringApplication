<?php
    session_start();

    function setVariables($streamId, $subjectId){
        session_regenerate_id();
        $_SESSION['SESS_STREAM_ID'] = $streamId;
	    $_SESSION['SESS_SUBJECT_ID'] = $subjectId;
        session_write_close();  
    }

    function unsetVariables(){
        unset($_SESSION['SESS_STREAM_ID']);
		unset($_SESSION['SESS_SUBJECT_ID']);
    }

    function setStudent($studentId){
        session_regenerate_id();
        $_SESSION['SESS_STUDENT_ID'] = $studentId;
        session_write_close();
    }

    function unsetStudentVariables(){
        unset($_SESSION['SESS_STUDENT_ID']);
    }

    function setImageError($error){
        session_regenerate_id();
        $_SESSION['SESS_IMAGES_ERROR'] = $error;
        session_write_close();
    }

    function setTestMarksExsit($error){
        session_regenerate_id();
        $_SESSION['SESS_TEST_ERROR'] = $error;
        session_write_close();
    }

?>

