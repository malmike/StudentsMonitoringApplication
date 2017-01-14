<?php	
    session_start();
    function adminHome(){
?>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <header class="mdl-layout__header">
      <div class="mdl-layout__header-row">
      <!-- Title -->
        <span class="mdl-layout-title">Administrator</span>
      <!-- Add spacer, to align navigation to the right -->
        <div class="mdl-layout-spacer"></div>
        <!-- Navigation. We hide it in small screens. -->
          <nav class="mdl-navigation mdl-layout--large-screen-only">
            <button id="demo-menu-lower-right"
              class="mdl-button mdl-js-button mdl-button--icon">
              <i class="material-icons">more_vert</i>
            </button>
            <a class="mdl-navigation__link" href="?view=viewStream">View Stream</a>
            <a class="mdl-navigation__link" href="?view=insStream">Insert Stream</a>
            <a class="mdl-navigation__link" href="?insert=viewSubject">View Subject</a>
            <a class="mdl-navigation__link" href="?insert=insSubject">Insert subject</a>
            <a class="mdl-navigation__link" href="?view=viewStudent">View Student</a>
            <a class="mdl-navigation__link" href="?insert=insStudent">Insert Student</a>
            <a class="mdl-navigation__link" href="?action=logout"><span class="glyphicon glyphicon-log-out"></span> LOGOUT</a>
          </nav>
      </div>
  </header>
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title">Administrator</span>
    <nav class="mdl-navigation">
        <a class="mdl-navigation__link" href="?view=viewParents">Parents</a>
        <a class="mdl-navigation__link" href="?view=viewTeachers">Teachers</a>
        <a class="mdl-navigation__link" href="?view=viewStream">View Stream</a>
        <a class="mdl-navigation__link" href="?view=insStream">Insert Stream</a>
        <a class="mdl-navigation__link" href="?insert=viewSubject">View Subject</a>
        <a class="mdl-navigation__link" href="?insert=insSubject">Insert subject</a>
        <a class="mdl-navigation__link" href="?view=viewStudent">View Student</a>
        <a class="mdl-navigation__link" href="?insert=insStudent">Insert Student</a>
        <a class="mdl-navigation__link" href="?action=logout"><span class="glyphicon glyphicon-log-out"></span> LOGOUT</a>
    </nav>
  </div>

  <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
    for="demo-menu-lower-right">
  <li class="mdl-menu__item"><a class="mdl-navigation__link" href="?view=viewParents">Parents</a></li>
  <li class="mdl-menu__item"><a class="mdl-navigation__link" href="?view=viewTeachers">Teachers</a></li>
</ul>

</div>
<?php
    }
?>
