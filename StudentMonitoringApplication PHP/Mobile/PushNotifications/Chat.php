<?php
    
    include'../../Model/DataAccessObjects/TeacherDao.php';
    include'../../Model/DataAccessObjects/ParentDao.php';
    include'../../Model/DataAccessObjects/StudentDAO.php';
    include'../../Model/DataAccessObjects/SubjectDao.php';
    include'../../Model/DataAccessObjects/TestDAO.php';
    include'../../Model/DataAccessObjects/TeacherSubjectDao.php';
    include'../../Model/DBConnectionConfigurations/DBConnect.php';
    include'PushNotifications.php';

    $result = callSingleTeacher(1);
    $result2 = callSingleParent(3);
    $WPPushURI = "";
    $UserName = "";
    $imageURI = "";
    $ChatId = "";
    $Message = "What is up !!!";
    $WPushURI = NULL;
    foreach($result as $teacher){
        $WPPushURI = $teacher['WP'];  
    }
    
    foreach($result2 as $parent){
        $UserName = $parent['name'];
        $imageURI = $parent['imageURI'];
        $ChatId = $parent['id'];
    }

    //foreach($result as $parent){
    //    $WPPushURI = $teacher['WP'];  
    //}
    //
    //foreach($result2 as $teacher){
    //    $UserName = $parent['name'];
    //    $imageURI = $parent['imageURI'];
    //    $ChatId = $parent['id'];
    //}

    pushNotification($WPushURI, $WPPushURI, $UserName, $Message, $ChatId, $imageURI);

?>
