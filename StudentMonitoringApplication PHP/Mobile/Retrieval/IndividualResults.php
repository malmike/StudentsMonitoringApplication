<?php
    function individualResults(){
        $studentid = @trim($_POST['studentId']);
        $subjectId = @trim($_POST['subjectId']);

        $result = callIndividualResults($studentid, $subjectId);
        if(sizeof($result) > 0){
             $main = array('data'=>$result);
	         echo json_encode($main);
        }else echo "No values";
    }
?>
