<?php
    function individualResults(){
        $studentId = @trim($_REQUEST['studentId']);
        $subjectId = @trim($_REQUEST['subjectId']);

        $result = callIndividualResults($studentId, $subjectId);
        if(sizeof($result) > 0){
	         echo json_encode($result);
        }else echo "No values";
    }
?>
