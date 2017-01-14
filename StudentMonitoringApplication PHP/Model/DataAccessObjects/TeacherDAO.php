<?php  
    function insertTeacher(){
        $teacherId = @trim($_POST['teacherId']);
		$name = @trim($_POST['name']);
		$phone = @trim($_POST['phone']);
		$email = @trim($_POST['email']);
		$password = @trim($_POST['password']);
        $status = "InActive";

        $uploadOk = 1;
        $imageName = $_FILES["fileToUpload"]["name"];
        $imageSize = $_FILES["fileToUpload"]["size"];
        $image = $_FILES["fileToUpload"]["tmp_name"];
        $target_dir = "Images/Teachers/";
        $baseName = basename($imageName);
        $imageFileType = pathinfo($baseName,PATHINFO_EXTENSION);
        $pictureName = $name.".".$imageFileType;
        $target_file = $target_dir . $pictureName;
        
        $userIcon = "user-icon.jpg";

        //Verify Whether the parent exsist in the database
        $dbh = dbConnect();
        $selectTeacher = "SELECT * FROM `teacher` WHERE `email`='$email'";
        $row3 = $dbh->prepare($selectTeacher);
        $row3->execute();
        $exsistingTeacher = $row3->fetchAll(PDO::FETCH_ASSOC);
        //

        if(sizeof($exsistingTeacher) == 0){
            if(fakeImage($image) == 0){
                $pictureName = $userIcon;
            }else{
                //$uploadOk = imageExists($target_file);
                $uploadOk = limitSize($imageSize);
                $uploadOk = limitFormat($imageFileType);
                if($uploadOk != 0) {
                    uploadImage($image, $target_file);
                }
            }

            if($_SESSION['SESS_IMAGES_ERROR'] != "" || $_SESSION['SESS_IMAGES_ERROR'] != NULL){
                header("location: ?action=registerTeacher");
                exit();
            }else{
                $ins = "INSERT INTO teacher (teacher_id, name, phone_number, email, password, status, imageURI) VALUES ('$teacherId', '$name', '$phone', '$email', '$password', '$status', '$pictureName')";
                $row = $dbh->prepare($ins);
                $row->execute(); 
                header("location: ?action=login");
            }
        }else{
            session_start();
            session_regenerate_id();
            $_SESSION['SESS_REGISTRATION_ERR'] = "Teacher is already registered";
            session_write_close();  
            header("location: ?action=register");
            exit();
        }                        
    }
    
    function findTeacher($email, $password){
        $sel = "SELECT * FROM teacher WHERE email = '$email' AND password = '$password'";
        $dbh = dbConnect();
        //$result=mysqli_query($dbh, $sel);       
        //if(!$result) $result = "";       
        //return $result;

        $row = $dbh->prepare($sel);
        $row->execute();
        $result=$row->fetchAll(PDO::FETCH_ASSOC);
           
        return $result;
    } 

    function callSingleTeacher($id){
        $sel = "SELECT * FROM teacher WHERE id = '$id'";
        $dbh = dbConnect();
        //$result=mysqli_query($dbh, $sel);       
        //if(!$result) $result = "";       
        //return $result;

        $row = $dbh->prepare($sel);
        $row->execute();
        $result=$row->fetchAll(PDO::FETCH_ASSOC);
           
        return $result;
    } 

    function callAllTeachers(){
        $sel = "SELECT * FROM teacher";
        $dbh = dbConnect();
        //$result = mysqli_query($dbh, $sel);  
        //$row = mysqli_fetch_array($result, MYSQLI_BOTH);     
        //return $row;

        $row = $dbh->prepare($sel);
        $row->execute();
        $result=$row->fetchAll(PDO::FETCH_ASSOC);
           
        return $result;

    }

    function updateTeacher($status, $teacher_id){
        $upd = "UPDATE teacher SET status = '$status' WHERE teacher_id = '$teacher_id'";
        $dbh = dbConnect();
        //$result=mysqli_query($dbh, $upd); 
        $row = $dbh->prepare($upd);
        $row->execute();
        header("location: index.php"); 
    }

    function updateTeacherPushURI($id, $PushURI, $Device){
        $upd = "UPDATE teacher SET $Device = '$PushURI' WHERE id = '$id'";
        $dbh = dbConnect();
        $row = $dbh->prepare($upd);
        $row->execute();
        return "Success";
    }
?>

