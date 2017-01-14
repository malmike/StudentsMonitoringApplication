<?php 
	function DisplayTeachers(){
       
?>   
    <main class="mdl-layout__content">
        <div class="page-content"><!-- Your content goes here -->
        <div class="container">
        <div class="classInfo">
        <span class="mdl-layout-title">All Registered Teachers</span>
        <div class="mdl-layout-spacer"><br><br><br></div>
		    <table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp" style="margin-left:15%; width:70%">
  <thead>
    <tr>
      <th class="mdl-data-table__cell--non-numeric">Name</th>
      <th>PHONE NUMBER</th>
			    <th class="mdl-data-table__cell--non-numeric">EMAIL</th>
			    <th class="mdl-data-table__cell--non-numeric">STATUS</th>
			    <th>TEACHER ID</th>
    </tr>
  </thead>
		    <tbody>
		    <?php
			    
                foreach(callAllTeachers() as $teacher){
				    echo"<tr>
						    <td class='mdl-data-table__cell--non-numeric'>{$teacher['name']}</td>
						    <td class='mdl-data-table__cell--non-numeric'>{$teacher['phone_number']}</td>
						    <td class='mdl-data-table__cell--non-numeric'>{$teacher['email']}</td>
						    <td class='mdl-data-table__cell--non-numeric'>{$teacher['status']}</td>
						    <td class='mdl-data-table__cell--non-numeric'>{$teacher['teacher_id']}</td>
					    </tr>";
			    }
		    ?>
		    </tbody>
	    </table>
	    </div>
	    </div></div></main>
	    <br><br>
<?php
	}
?>