<?php
    function subjectsStudent(){
        $id = @trim($_POST['id']);
        $result = callSubjectsStudent($id);
        if(sizeof($result) > 0){
             $main = array('data'=>$result);
	         echo json_encode($main);
        }else echo "No values";
    }
?>


