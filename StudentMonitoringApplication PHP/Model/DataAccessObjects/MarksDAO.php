<?php
    function insertMarksDB(){
        $total = 0;
        $index = $_POST['index'];
        $test_id = $_POST['test'];
        $stream_id = $_SESSION['SESS_STREAM_ID'];
        $subject_id = $_SESSION['SESS_SUBJECT_ID'];
        $streamAv = "";
        $streamGd = "";

        $ins = "INSERT INTO `subject_results`(`marks`,`student_id`,`stream_id`,`test_id`,`subject_id`,`grade`)VALUES";

        for($i = 0; $i < $index; $i++){
            $indexValue = $index;
            $mark = $_POST['stud'.$i];
            $stud_id = $_POST['stud_id'.$i];
            $grade = assignGrade($mark);
            if($i != $indexValue-1){
                $ins = $ins."('{$mark}','{$stud_id}','{$stream_id}','{$test_id}','{$subject_id}','{$grade}'),";
            }else{
                $ins = $ins."('{$mark}','{$stud_id}','{$stream_id}','{$test_id}','{$subject_id}','{$grade}')";
            }
            
            echo $ins."</br>";
            
            $total = computeTotal($mark, $total);
            echo $total."</br>";
        }
        $streamAv = computeAverage($total, $index);
        $streamGd = assignGrade($streamAv);

        $insAV = "INSERT INTO `sma_db`.`stream_averages`(`Marks`,`test_id`,`subject_id`,`stream_id`,`grade`,`number_sat`)
                        VALUES ('{$mark}','{$test_id}','{$subject_id}','{$stream_id}','{$grade}','{$index}')";
        $dbh = dbConnect();
        $row = $dbh->prepare($ins);
        $row->execute();
        $row = $dbh->prepare($insAV);
        $row->execute();

        header("location: ?view=studentList");

    }

    
?>
