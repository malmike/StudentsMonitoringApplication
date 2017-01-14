<?php
    function callTeacherSubjects($teacher_id){

        $sel = "SELECT a.stream_id, b.stream, a.teacher_id, a.subject_id, c.name as name 
                    FROM stream_has_subject a, stream b, `subject` c
                    WHERE a.stream_id = b.id and c.id = a.subject_id and a.teacher_id = '$teacher_id'";
        $dbh = dbConnect();      
        //$result=mysqli_query($dbh, $sel);       
        //$row = mysqli_fetch_array($result, MYSQLI_BOTH)      
        //return $row;

        $row = $dbh->prepare($sel);
        $row->execute();
        $result=$row->fetchAll(PDO::FETCH_ASSOC);
        
        //foreach($result) echo $result['name'];
        
        return $result;
    }
?>

