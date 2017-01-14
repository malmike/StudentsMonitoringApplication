<?php
    function studentsSubjects(){
        $stream_id = @trim($_REQUEST['streamId']);
        $subject_id = @trim($_REQUEST['subjectId']);
        $result = callStudentSubject($stream_id, $subject_id);
        if(sizeof($result) > 0){
             $main = array('data'=>$result);
	         echo json_encode($main);
        }else echo "No values";
    }
?>

