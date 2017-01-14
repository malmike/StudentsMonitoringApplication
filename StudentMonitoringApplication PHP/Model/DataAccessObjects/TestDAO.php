<?php
    function callTests(){
        $sel = "SELECT DISTINCT year FROM test";
        $dbh = dbConnect();
        $row = $dbh->prepare($sel);
        $row->execute();
        $result=$row->fetchAll(PDO::FETCH_ASSOC);
           
        return $result;
    }

    function proveTest($tests, $subject_id, $stream_id){
        $id = "";
        foreach($tests as $test){
            $id = $test['id'];
        }
        $sel = "SELECT DISTINCT test_id FROM subject_results WHERE test_id={$id} and subject_id={$subject_id} and stream_id={$stream_id}";
        $dbh = dbConnect();
        $row = $dbh->prepare($sel);
        $row->execute();
        $result=$row->fetchAll(PDO::FETCH_ASSOC);


        if(sizeof($result) != 0 || sizeof($result) != NULL){
            $error="<p align='center'>TEST MARKS ALREADY EXSIST FOR THIS STREAM </br><a href='?action=insMarks'><b>PRESS HERE IF YOU WANT TO INSERT OTHER RESULTS</b></a></p>";
            setTestMarksExsit($error);
            echo $error;
        }
    }

    function findTest(){
        $year = @trim($_POST['year']);
        $test_type = @trim($_POST['test_type']);
        $term = @trim($_POST['term']);

        $sel = "SELECT * FROM test WHERE year='$year' AND term='$term' AND test_type='$test_type'";
        $dbh = dbConnect();
        $row = $dbh->prepare($sel);
        $row->execute();
        $result=$row->fetchAll(PDO::FETCH_ASSOC);
           
        return $result;
    }


    function callStudentResults($test_id, $subject_id, $stream_id){
        $sel = "SELECT b.student_first_name as sfname, b.student_last_name as slname, a.subject_id,  a.marks, a.grade
                    FROM subject_results a, student b, test d
                    WHERE b.id = a.student_id and d.id = a.test_id and a.test_id = {$test_id} and a.subject_id = {$subject_id} and a.stream_id = {$stream_id}";
        $dbh = dbConnect();
        $row = $dbh->prepare($sel);
        $row->execute();
        $result=$row->fetchAll(PDO::FETCH_ASSOC);
           
        return $result;
    }

    function callStudentTestResults($test_id, $student_id){
       $sel = "SELECT b.name, a.marks, d.id, a.grade
            FROM subject_results a, subject b, test d
            WHERE b.id = a.subject_id and d.id = a.test_id and d.id = '$test_id'  and a.student_id = '$student_id'";
        $dbh = dbConnect();
        $row = $dbh->prepare($sel);
        $row->execute();
        $result=$row->fetchAll(PDO::FETCH_ASSOC);  
        return $result;
    }

    function callIndividualResults($studentid, $subjectid){
        $sel = "SELECT a.test_type, a.term, a.year, b.marks, a.id, b.grade
                    FROM test a, subject_results b, `subject` c, student d
                    WHERE a.id = b.test_id and c.id = b.subject_id and d.id=b.student_id and d.id='$studentid' and b.subject_id='$subjectid' ORDER BY a.id ASC";
        $dbh = dbConnect();
        $row = $dbh->prepare($sel);
        $row->execute();
        $result=$row->fetchAll(PDO::FETCH_ASSOC);  
        return $result;
    
    }

    function callStreamAverage($stream_id, $subject_id){
        $sel = "SELECT a.test_type, a.term, a.year, b.marks, a.id, b.grade
                    FROM test a, stream_averages b, `subject` c
                    WHERE a.id = b.test_id and c.id = b.subject_id and b.subject_id='$subject_id' and b.stream_id='$stream_id' ORDER BY a.id ASC";
        $dbh = dbConnect();
        $row = $dbh->prepare($sel);
        $row->execute();
        $result=$row->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    
    }
?>

