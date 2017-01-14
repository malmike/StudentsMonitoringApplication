<?php
    function UpdatePushURI(){
        $PushURI = @trim($_POST['PushURI']);
        $Device = @trim($_POST['Device']);
        $User = @trim($_POST['User']);
        $UserID = @trim($_POST['UserID']);

        if($User == "Parent"){
            $result = updateParentPushURI($UserID, $PushURI, $Device);
            echo $result;
        }else if($User == "Teacher"){
            $result2 = updateTeacherPushURI($UserID, $PushURI, $Device);
            echo $result2;
        }
    }
?>

