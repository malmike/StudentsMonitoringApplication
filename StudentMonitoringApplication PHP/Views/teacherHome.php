<?php	
    session_start();
    function teacherHome(){
?>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <header class="mdl-layout__header">
      <div class="mdl-layout__header-row">
      <!-- Title -->
        <span class="mdl-layout-title">Teacher</span>
      <!-- Add spacer, to align navigation to the right -->
        <div class="mdl-layout-spacer"></div>
        <!-- Navigation. We hide it in small screens. -->
          <nav class="mdl-navigation mdl-layout--large-screen-only">
            
            <a class="mdl-navigation__link" href="?action=logout"><span class="glyphicon glyphicon-log-out"></span> LOGOUT</a>
          </nav>
      </div>
  </header>
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title">Parent</span>
    <nav class="mdl-navigation">
        <a class="mdl-navigation__link" href="?action=logout"><span class="glyphicon glyphicon-log-out"></span> LOGOUT</a>
    </nav>
  </div>
</div>
<main class="mdl-layout__content">
        <div class="page-content"><!-- Your content goes here -->
        <div class="container">
        <div class="classInfo" style="background-color:#eee">
	     <table class="table">
			    <thead>
				    <tr>
					    <th>Subject</th>
					    <th>Stream</th>
                        <th>Link</th>
				    </tr>
			    </thead>
			    <tbody>	
			    <?php
				    foreach(callTeacherSubjects($_SESSION['SESS_ID']) as $subject){
					    echo"<tr>
							    <td>{$subject['name']}</td>
							    <td>{$subject['stream']}</td>
                                <td><a href= ?action=students&&subjectId={$subject['subject_id']}&&streamId={$subject['stream_id']}>-></a></td>
						    </tr>";
				    }
			    ?>
			    </tbody>
		    </table>
		    </div>
		    </div>
		    </div>
		    </main>
    	
<?php
    }
?>
