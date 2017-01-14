<?php
    function studentResults(){
        $test_id = @trim($_REQUEST['testId']);
        $subject_id = @trim($_REQUEST['subjectId']);
        $stream_id = @trim($_REQUEST['streamId']);
        $result = callStudentResults($test_id, $subject_id, $stream_id);
        if(sizeof($result) > 0){
             $main = array('data'=>$result);
	         echo json_encode($main);
        }else echo "No values";
    }
?>


