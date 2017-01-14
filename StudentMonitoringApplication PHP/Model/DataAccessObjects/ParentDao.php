<?php  
    function insertParent(){
        $x = "";
		$name = @trim($_POST['name']);
		$phone = @trim($_POST['phone']);
		$email = @trim($_POST['email']);
		$password = @trim($_POST['password']);
        
        $uploadOk = 1;
        $imageName = $_FILES["fileToUpload"]["name"];
        $imageSize = $_FILES["fileToUpload"]["size"];
        $image = $_FILES["fileToUpload"]["tmp_name"];
        $target_dir = "Images/Parents/";
        $baseName = basename($imageName);
        $imageFileType = pathinfo($baseName,PATHINFO_EXTENSION);
        $pictureName = $name.".".$imageFileType;
        $target_file = $target_dir . $pictureName;
        
        $userIcon = "user-icon.jpg";


        //Verify Whether the parent exsist in the database
        $dbh = dbConnect();
        $selectParent = "SELECT * FROM `parent` WHERE `email`='$email'";
        $row3 = $dbh->prepare($selectParent);
        $row3->execute();
        $exsistingParent=$row3->fetchAll(PDO::FETCH_ASSOC);
        //

        if(sizeof($exsistingParent) == 0){         
            $sel = "SELECT `id`FROM `student` WHERE `parent_email`='$email'";
            $row = $dbh->prepare($sel);
            $row->execute();

            $result=$row->fetchAll(PDO::FETCH_ASSOC);


            if(sizeof($result) == 0){
                session_start();
                session_regenerate_id();
                $_SESSION['SESS_REGISTRATION_ERR'] = "Parent doesn't exsist in the database";
                session_write_close();  
                header("location: ?action=register");
                exit();
            }else{
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
                    header("location: ?action=registerParent");
                    exit();
                }else{
                    $ins = "INSERT INTO parent (name, phone_number, email, password, imageURI) VALUES ('$name', '$phone', '$email', '$password', '$pictureName')";
                    $row = $dbh->prepare($ins);
                    $row->execute();

                    $select = "SELECT `id`FROM `parent` WHERE `email`='$email'";
                    $row2 = $dbh->prepare($select);
                    $row2->execute();
                    $results=$row2->fetchAll(PDO::FETCH_ASSOC);

                    foreach($results as $parent){
                        $x = $parent['id'];
                    }

                    foreach($result as $kid){
                        $y = $kid['id'];
                        $ins = "INSERT INTO `parent_has_student` (`parent_id`,`student_id`) VALUES ('$x','$y')";
                        $row = $dbh->prepare($ins);
                        $row->execute();
                    }
       
                    header("location: ?action=login");                              
                }
            }
        }else{
            session_start();
            session_regenerate_id();
            $_SESSION['SESS_REGISTRATION_ERR'] = "Parent is already registered";
            session_write_close();  
            header("location: ?action=register");
            exit();
        }                  
    } 

    function findParent($email, $password){
        $sel = "SELECT * FROM parent where email = '$email' AND password = '$password'";
        $dbh = dbConnect();
        //$result=mysqli_query($dbh, $sel);
        //if(!$result) $result = "";
        //return $result;

        $row = $dbh->prepare($sel);
        $row->execute();
        $result=$row->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } 

    function callSingleParent($id){
        $sel = "SELECT * FROM parent where id = '$id'";
        $dbh = dbConnect();
        $row = $dbh->prepare($sel);
        $row->execute();
        $result=$row->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } 

    function findStudents($id){
        $sel = "SELECT b.student_first_name as sfname, b.student_last_name as slname, b.id, b.student_id, b.imageURI, d.stream_id, e.stream
		            FROM student b, parent_has_student c, student_in_stream d, stream e
		            WHERE b.id = c.student_id and d.student_id = b.id and d.stream_id = e.id and c.parent_id = '$id'";
        $dbh = dbConnect();
        //$result=mysqli_query($dbh, $sel);
        //if(!$result) $result = "";
        //return $result;

        $row = $dbh->prepare($sel);
        $row->execute();
        $result=$row->fetchAll(PDO::FETCH_ASSOC);
           
        return $result;
    }

    function callAllParents(){
         $sel = "SELECT * FROM parent";
        $dbh = dbConnect();
        //$result = mysqli_query($dbh, $sel);  
        //$row = mysqli_fetch_array($result, MYSQLI_BOTH);     
        //return $row;

        $row = $dbh->prepare($sel);
        $row->execute();
        $result=$row->fetchAll(PDO::FETCH_ASSOC);
           
        return $result;
    }

    function updateParentPushURI($id, $PushURI, $Device){
        $upd = "UPDATE parent SET $Device = '$PushURI' WHERE id = '$id'";
        $dbh = dbConnect();
        $row = $dbh->prepare($upd);
        $row->execute();
        return "Success";
    }
?>

