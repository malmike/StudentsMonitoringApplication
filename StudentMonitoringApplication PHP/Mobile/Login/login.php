<?php
    function login(){
        $email = @trim($_POST['Email']);
	    $password = @trim($_POST['Password']);
	    $userType = @trim($_POST['User']);
        $valid = "";
        switch($userType){
		    case "Teacher":
                $teacher = findTeacher($email, $password);
                foreach($teacher as $member){
                    if($member['status'] != "InActive") 
                        $valid = "valid";
                }
                if(sizeof($teacher) == 1 && $valid == "valid"){
                    $main = array('data'=>$teacher);
	                echo json_encode($main);
                }
                else echo "error";
                break;
            case "Parent":
                $parent = findParent($email, $password);
                if(sizeof($parent) == 1){
                    $main = array('data'=>$parent);
	                echo json_encode($main); 
                }
                else echo "error";                  
                break;
		}	
        //echo 123;
    }
    
?>

