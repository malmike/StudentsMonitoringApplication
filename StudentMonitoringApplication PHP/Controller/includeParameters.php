<?php
    include'Views/Login.php';
    include'Views/ParentRegistration.php'; 
    include'Views/TeacherRegistration.php'; 
    include'Views/UserRegistration.php';
    include'Model/DataAccessObjects/TeacherDao.php';
    include'Model/DataAccessObjects/ParentDao.php';
    include'Model/DataAccessObjects/StudentDAO.php';
    include'Model/DBConnectionConfigurations/DBConnect.php';
    include'Model/Login/authentication.php';
    include'Model/Utilities/setVariables.php';
    include'Model/DataAccessObjects/PictureUpload.php';   	
?>