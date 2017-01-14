<?php
    function studentResults(){
        $test_id = @trim($_POST['testId']);
        $subject_id = @trim($_POST['subjectId']);
        $stream_id = @trim($_POST['streamId']);
        $result = callStudentResults($test_id, $subject_id, $stream_id);
        if(sizeof($result) > 0){
             $main = array('data'=>$result);
	         echo json_encode($main);
        }else echo "No values";
    }
?>


