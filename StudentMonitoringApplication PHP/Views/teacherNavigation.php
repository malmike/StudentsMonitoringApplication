<?php	
    function teacherNavigation(){
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
            
            <a class="mdl-navigation__link" href="?action=home">Home</a>
            <a class="mdl-navigation__link" href="?view=viewMarks">View Marks</a>
            <a class="mdl-navigation__link" href="?action=insMarks">Insert Marks</a>
            <a class="mdl-navigation__link" href="?view=studentList">Student List</a>
            <a class="mdl-navigation__link" href="?action=logout"><span class="glyphicon glyphicon-log-out"></span> LOGOUT</a>
          </nav>
      </div>
  </header>
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title">Teacher</span>
    <nav class="mdl-navigation">
      <a class="mdl-navigation__link" href="?action=home">Home</a>
        <a class="mdl-navigation__link" href="?view=viewMarks">View Marks</a>
        <a class="mdl-navigation__link" href="?action=insMarks">Insert Marks</a>
        <a class="mdl-navigation__link" href="?view=studentList">Student List</a>
        <a class="mdl-navigation__link" href="?action=logout"><span class="glyphicon glyphicon-log-out"></span> LOGOUT</a>
    </nav>
  </div>


</div>
  	
<?php
    }
?>
