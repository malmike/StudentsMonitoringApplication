<?php
    function studentTestResults(){
        $test_id = @trim($_REQUEST['testId']);
        $student_id = @trim($_REQUEST['studentId']);
        $result = callStudentTestResults($test_id, $student_id);
        if(sizeof($result) > 0){
             $main = array('data'=>$result);
	         echo json_encode($main);
        }else echo "No values";
    }
?>


