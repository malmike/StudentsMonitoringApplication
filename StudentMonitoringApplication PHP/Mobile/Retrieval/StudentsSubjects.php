<?php
    function studentsSubjects(){
        $stream_id = @trim($_POST['streamId']);
        $subject_id = @trim($_POST['subjectId']);
        $result = callStudentSubject($stream_id, $subject_id);
        if(sizeof($result) > 0){
             $main = array('data'=>$result);
	         echo json_encode($main);
        }else echo "No values";
    }
?>

