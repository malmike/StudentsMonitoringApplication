<?php
 include 'ajaxIncludeParameters.php';
 
 $a = @trim($_REQUEST['Action']);

 switch($a){
    case "login":
        login();
        break;
    case "IndividualResults":
        individualResults();
        break;
    case "ParentKids":
        parentKids();
        break;
    case "StudentResults":
        studentResults();
        break;
    case "StudentsSubjects":
        studentsSubjects();
        break;
    case "StudentTestResults":
        studentTestResults();
        break;
    case "Subject":
        subject();
        break;
    case "SubjectsStudent":
        subjectsStudent();
        break;
    case "TeacherSubject":
        teacherSubject();
        break;
    case "TestYears":
        testYears();
        break;
    case "Test":
        test();
        break;
    case "Average":
        returnAverageResults();
        break;
 }

?>

