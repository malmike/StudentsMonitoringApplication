<?php	
	function userRegistration()
	{
?>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <header class="mdl-layout__header">
      <div class="mdl-layout__header-row">
      <!-- Title -->
        <span class="mdl-layout-title">SMRA Registration</span>
      <!-- Add spacer, to align navigation to the right -->
        <div class="mdl-layout-spacer"></div>
        <!-- Navigation. We hide it in small screens. -->
          <nav class="mdl-navigation mdl-layout--large-screen-only">
            <a class="mdl-navigation__link" href="?action=registerParent">Parent Registration</a>
            <a class="mdl-navigation__link" href="?action=registerTeacher">Teacher Registration</a>
            <a class="mdl-navigation__link" href="?action=login"><span class="glyphicon glyphicon-log-in"></span> login</a>
          </nav>
      </div>
  </header>
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title">Registration</span>
    <nav class="mdl-navigation">
      <a class="mdl-navigation__link" href="?action=registerParent">Parent Registration</a>
      <a class="mdl-navigation__link" href="?action=registerTeacher">Teacher Registration</a>
      <a class="mdl-navigation__link" href="?action=login"><span class="glyphicon glyphicon-log-in"></span> login</a>
    </nav>
  </div>
</div>
<?php
	}
?>