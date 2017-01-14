<?php
    function returnAverageResults(){
        $streamId = @trim($_REQUEST['streamId']);
        $subjectId = @trim($_REQUEST['subjectId']);

        $result = callStreamAverage($streamId, $subjectId);
        if(sizeof($result) > 0){
	         $main = array('data'=>$result);
	         echo json_encode($main);
        }else echo "No values";
    }
?>