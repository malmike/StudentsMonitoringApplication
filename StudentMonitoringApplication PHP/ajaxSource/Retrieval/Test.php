<?php
    function test(){
        $result = findTest();
        if(sizeof($result) > 0){
             $main = array('data'=>$result);
	         echo json_encode($main);
        }else echo "No values";
    }
?>
