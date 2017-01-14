<?php
    function returnAverageResults(){
        $streamId = @trim($_REQUEST['streamId']);
        $subjectId = @trim($_REQUEST['subjectId']);

        $result = callStreamAverage($streamId, $subjectId);
        if(sizeof($result) > 0){
	         echo json_encode($result);
        }else echo "No values";
    }
?>