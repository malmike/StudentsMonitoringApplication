<?php
    function studentProfile(){
        $student = findStudent($_SESSION['SESS_STUDENT_ID']);
        $sfname = "";
        $studentId = "";
        $slname = "";
        $sid = "";
        $imageURI = "Images/Students/";
        $subjects = callSubjectsStudent($_SESSION['SESS_STUDENT_ID']);

        foreach($student as $stud){
            $studentId = $stud['student_id'];
            $sfname = $stud['student_first_name'];
            $slname = $stud['student_last_name'];
            $imageURI = $imageURI.$stud['imageURI'];
        }
        ?>
<main class="mdl-layout__content">
 <div class="page-content"><!-- Your content goes here -->
  <div class="container">
    <div class="classInfo" style="background-color:#eee">
        <!-- Square card -->
<style>
.demo-card-square.mdl-card {
  width: 240px;
  height: 120px;
}
.demo-list-icon {
  width: 300px;
}
.demo-card-square > .mdl-card__title {
  color: #fff;
  background:
    url('<?php echo $imageURI;?>') bottom right 50% no-repeat #46B6AC;
}
</style>
        <?php   
?>
    <div class="demo-card-square mdl-card mdl-shadow--2dp">
  <div class="mdl-card__title mdl-card--expand">
    <h2 class="mdl-card__title-text"><?php echo $sfname.' '.$slname?></h2>
  </div>
  <div class="mdl-card__supporting-text">
    <?php echo $studentId;?>
  </div>
    <?php

            
       
    ?>

</div>
        <div class="smaContent">
        <div style="margin-left:20%">
        <table style="width:50%" class="table table-hover">
		    <caption> List of Subjects</caption>
		    <thead>
		    <tr>
			    <th>CODE</th>
			    <th>NAME</th>
		    </tr>
		    </thead>
		    <tbody>
            <?php 
                foreach($subjects as $subject){
                    echo"<tr><td>
    <span class='mdl-list__item-primary-content'>
                            <a href=?action=viewResults&&subjectId={$subject['id']}&&sfname=$sfname&&slname=$slname>
                            <i class='material-icons'>book</i>\t{$subject['code']}</a></td>
						    <td>{$subject['name']}</td></tr>
						    ";
                }
                
            ?>
            </tbody>
	    </table>
        </div>
        </div>
        </div>
        </div>
        </div>
        </main>
    	
<?php
    }
?>