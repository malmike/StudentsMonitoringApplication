<?php 
  
    function insertSubject(){
        $code = @trim($_POST['code']);
		$name = @trim($_POST['name']);
		$pnumber = @trim($_POST['paperNumber']);

        $ins = "INSERT INTO subject (code, name, pnumber) VALUES ('$code', '$name', '$pnumber')";
 
        $dbh = dbConnect();
        $row = $dbh->prepare($ins);
        $row->execute();
        header("location: ?action=adminHome");
                           
    }
    
    function findSubject($code){
        $sel = "SELECT * FROM subject WHERE code = '$code'";
        $dbh = dbConnect();
        $row = $dbh->prepare($sel);
        $row->execute();
        $result=$row->fetchAll(PDO::FETCH_ASSOC);         
        return $result;
    } 

    function callAllSubjects(){
        $sel = "SELECT * FROM subject";
        $dbh = dbConnect();
        $row = $dbh->prepare($sel);
        $row->execute();
        $result=$row->fetchAll(PDO::FETCH_ASSOC);         
        return $result;
    } 

    function callSubjectsStudent($id){
        $sel = "SELECT distinct c.id, c.code, c.name FROM student_has_subject a, student b, subject c
					where b.id = a.student_id and c.id = a.subject_id and a.student_id = '$id'";
        $dbh = dbConnect();
        $row = $dbh->prepare($sel);
        $row->execute();
        $result=$row->fetchAll(PDO::FETCH_ASSOC);         
        return $result;
    }

?>