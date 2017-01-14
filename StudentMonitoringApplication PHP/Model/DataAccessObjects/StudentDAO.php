<?php    
    function insertStudent(){
        $studentId = @trim($_POST['studentId']);
		$fname = @trim($_POST['fname']);
        $lname = @trim($_POST['lname']);
		$pname = @trim($_POST['pname']);
        $pname = @trim($_POST['pname']);
		$phone = @trim($_POST['phone']);
		$email = @trim($_POST['email']);

        $uploadOk = 1;
        $imageName = $_FILES["fileToUpload"]["name"];
        $imageSize = $_FILES["fileToUpload"]["size"];
        $image = $_FILES["fileToUpload"]["tmp_name"];
        $target_dir = "Images/Teachers/";
        $baseName = basename($imageName);
        $imageFileType = pathinfo($baseName,PATHINFO_EXTENSION);
        $pictureName = $fname." ".$lname.".".$imageFileType;
        $target_file = $target_dir . $pictureName;
        
        $userIcon = "user-icon.jpg";

        //Verify Whether the parent exsist in the database
        $dbh = dbConnect();
        $selectStudent = "SELECT * FROM `student` WHERE `student_id`='$studentId'";
        $row3 = $dbh->prepare($selectStudent);
        $row3->execute();
        $exsistingStudent = $row3->fetchAll(PDO::FETCH_ASSOC);
        //

        if(sizeof($exsistingStudent) == 0){
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
                //header("location: ?action=registerTeacher");
                exit();
            }else{
                $ins = "INSERT INTO student (student_id, student_first_name, student_last_name, parent_name, parent_email, parent_phone_number, imageURI) VALUES ('$studentId', '$fname', $lname, '$pname', '$email', '$phone', '$pictureName')";
                $dbh = dbConnect();
                $row = $dbh->prepare($ins);
                $row->execute();
            }
        }else{
            session_start();
            session_regenerate_id();
            $_SESSION['SESS_REGISTRATION_ERR'] = "Student is already registered";
            session_write_close();  
            //header("location: ?action=register");
            exit();
        }                         
    }
    
    function callStudentSubject($stream_id, $subject_id){
        $sel = "SELECT a.id, a.student_first_name as sfname, a.student_last_name as slname, d.name, a.imageURI 
                    FROM student a, student_in_stream b, student_has_subject c, `subject` d
                    WHERE a.id = b.student_id and c.student_id = a.id and d.id = c.subject_id and b.stream_id = '$stream_id' and c.subject_id = '$subject_id'";
        $dbh = dbConnect();
        $row = $dbh->prepare($sel);
        $row->execute();
        $result=$row->fetchAll(PDO::FETCH_ASSOC);
            
        return $result;
    }

    function findStudent($studentId){
        $sel = "SELECT * FROM student WHERE id = '$studentId'";
        $dbh = dbConnect();
        $row = $dbh->prepare($sel);
        $row->execute();
        $result=$row->fetchAll(PDO::FETCH_ASSOC);
            
        return $result;
    } 

    function callStudents(){
        $sel = "SELECT * FROM student";
        $dbh = dbConnect();         
        $row = $dbh->prepare($sel);
        $row->execute();
        $result=$row->fetchAll(PDO::FETCH_ASSOC);
        echo sizeof($result);
        return $result;
    }

    function callStudentSubjects($stream_id, $subject_id){
        $sel = "SELECT DISTINCT b.student_first_name as sfname, b.student_last_name as slname, b.id
                    FROM student b, student_has_subject c, student_in_stream d
                    WHERE b.id = c.student_id and d.student_id = b.id and d.stream_id = '$stream_id' and c.subject_id = '$subject_id'";
        $dbh = dbConnect();
        //$result=mysqli_query($dbh, $sel);       
        //$row = mysqli_fetch_array($result, MYSQLI_BOTH); 
        
        $row = $dbh->prepare($sel);
        $row->execute();
        $result=$row->fetchAll(PDO::FETCH_ASSOC);
           
        return $result;
    }

    function getStream($studentId){
       $sel = "SELECT stream_id From student_in_stream where student_id='$studentId'";
       $dbh = dbConnect();
       $row = $dbh->prepare($sel);
       $row->execute();
       $result=$row->fetchAll(PDO::FETCH_ASSOC);
           
       return $result;
    }

?>

