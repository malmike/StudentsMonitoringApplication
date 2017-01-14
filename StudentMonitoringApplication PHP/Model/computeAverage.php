<?php
    include'DataAccessObjects/TeacherDao.php';
    include'DataAccessObjects/ParentDao.php';
    include'DataAccessObjects/StudentDAO.php';
    include'DataAccessObjects/SubjectDao.php';
    include'DataAccessObjects/TestDAO.php';
    include'DataAccessObjects/TeacherSubjectDao.php';
    include'DBConnectionConfigurations/DBConnect.php';
    include'Utilities/Grading.php';

    //$dbh = dbConnect();

    //$total = "";
    //$i = 0;

    //$test_id = 1;
    //$subject_id = 1;
    //$stream_id = 1;

    //while($test_id <= 6){
    //    $sel = "SELECT * FROM `stream_averages` WHERE `subject_id`='{$subject_id}' and `stream_id` = '{$stream_id}' and `test_id` = '{$test_id}'";
    //    $rows = $dbh->prepare($sel);
    //    $rows->execute();
    //    $result = $rows->fetchAll(PDO::FETCH_ASSOC);

    //    if(sizeof($result) == 0){
    //        $result = callStudentResults($test_id, $subject_id, $stream_id);
    //        foreach($result as $result){
    //            $total = computeTotal($result['marks'], $total);
    //            $i++;
    //        }

    //        $mark = computeAverage($total, $i);
    //        $grade = assignGrade($mark);


    //        $insAV = "INSERT INTO `sma_db`.`stream_averages`(`Marks`,`test_id`,`subject_id`,`stream_id`,`grade`,`number_sat`)
    //                            VALUES ('{$mark}','{$test_id}','{$subject_id}','{$stream_id}','{$grade}','{$i}')";
    //        $dbh = dbConnect();
    //        $row = $dbh->prepare($insAV);
    //        $row->execute();
    //        echo 123;
    //        $test_id++;
    //    }
    //}

    $result = callStreamAverage(1, 1);
    echo json_encode($result);

?>

