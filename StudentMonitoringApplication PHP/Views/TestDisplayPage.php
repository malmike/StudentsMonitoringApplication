<?php
	function selectTests($i){
        if($_SESSION['SESS_TEST_ERROR'] != "" || $_SESSION['SESS_TEST_ERROR'] != NULL){
            unset($_SESSION['SESS_TEST_ERROR']);
        }
        $tests = callTests();
        if($i == 1){
             $send="selectTest";
        }else if($i == 2){
            $send="insertTest";
        }
        ?>
        <main class="mdl-layout__content">
        <div class="page-content"><!-- Your content goes here -->
        <div class="container">
        <div class="classInfo" style="background-color:#fff; border:1px Solid #eeeeee; padding:1%; width:65%; margin-left:10%">
        <?php
    echo '<form role="form" method="post" action="?action='.$send.'">';
?>
    <h3>SELECT TEST PAPER</h3> 	
	<div class="form-group">
		<label for="year">Select Year</label>
		<select class="form-control" name="year" id="year">
		<?php
			foreach($tests as $test){
				echo"<option value={$test['year']}>{$test['year']}</option>";
			}
		?>
		</select>
	</div>
	<div class="form-group">
		<label for="term">Select Term</label>
		<select class="form-control" name="term" id="term">
			<option value= 1>1</option>
            <option value= 2>2</option>
            <option value= 3>3</option>
		</select>
	</div>
	<div class="form-group">
		<label for="test">Select Test Type</label>
		<select class="form-control" name="test_type" id="test_type">
			<option value="BOT">BOT</option>
            <option value="Assign 1">Assign 1</option>
            <option value="Assign 2">Assign 2</option>
            <option value="Assign 3">Assign 3</option>
            <option value="MOT">MOT</option>
            <option value="Assign 4">Assign 4</option>
            <option value="Assign 5">Assign 5</option>
            <option value="EOT">EOT</option>
		</select>
	</div>	
	<button type="submit" class="btn btn-default">CONTINUE</button> 		
</form>
</div></div></div></main>
<?php
	}
?>