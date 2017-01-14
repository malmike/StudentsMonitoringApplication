<?php
    function changeStatus($teacherId){
        foreach(selectTeacher($teacherId) as $status){
            if($status['status'] == "Active"){
                //sql statement to change it to inactive
                updateTeacher("InActive",$teacherId);
            }
            else{
                //sql statement to change it to active
                updateTeacher("Active",$teacherId);
            }
        }
        header("location: ?view=viewTeachers");
    }
?>
