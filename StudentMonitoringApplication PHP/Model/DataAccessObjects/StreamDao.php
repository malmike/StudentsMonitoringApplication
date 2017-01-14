<?php
    
    function insertStream(){
        $class = @trim($_POST['class']);
        $stream = @trim($_POST['stream']);
        $year = @trim($_POST['year']);

        $ins = "INSERT INTO stream (class, stream, year) VALUES ('$class', '$stream', '$year')";

        $dbh = dbConnect();
        $row = $dbh->prepare($ins);
        $row->execute();
        //header("location: ?action=adminHome");

        $sel = "SELECT id FROM stream WHERE class = '$class' AND stream = '$stream' AND year = '$year'";
        $dbh = dbConnect();
        $row = $dbh->prepare($sel);
        $row->execute();
        $result=$row->fetchAll(PDO::FETCH_ASSOC);         
        return $result;

    }

    function insertStreamParameters(){

        $index = @trim($_POST['index']);

        for($i=0; $i<$index; $i++){
        $subjectId = @trim($_POST['subject'.$i]);
        $streamId = @trim($_POST['stream']);
        $teacherId = @trim($_POST['teacher'.$i]);
        $ins = "INSERT INTO stream_has_subject (stream_id, subject_id, teacher_id) VALUES ('$streamId', '$subjectId', '$teacherId')";

        $dbh = dbConnect();
        $row = $dbh->prepare($ins);
        $row->execute();
        }
    }

    function callAllStreams(){
        $sel = "SELECT * FROM stream";
        $dbh = dbConnect();
        $row = $dbh->prepare($sel);
        $row->execute();
        $result=$row->fetchAll(PDO::FETCH_ASSOC);         
        return $result;
    }
?>


