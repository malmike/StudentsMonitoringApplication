<?php
    function teacherSubject(){
        $teacher_id = @trim($_POST['teacherId']);
        $result = callTeacherSubjects($teacher_id);
        if(sizeof($result) > 0){
             $main = array('data'=>$result);
	         echo json_encode($main);
        }else echo "No values";
    }
?>

