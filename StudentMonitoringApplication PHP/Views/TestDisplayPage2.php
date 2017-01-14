<?php
	function displayTestMarks($tests){
        foreach($tests as $test){
            $test_id =  $test['id'];
        }

?>
<main class="mdl-layout__content">
        <div class="page-content"><!-- Your content goes here -->
        <div class="container">
        <div class="classInfo" style="background-color:#fff; border:1px Solid #eeeeee; padding:1%; width:65%; margin-left:10%">
<table class="table">
	<thead>
		<tr>
			<th>STUDENT</th>
			<th>MARKS ATTAINED</th>
		</tr>
	</thead>
	<tbody>
		<?php
				foreach(callStudentResults($test_id, $_SESSION['SESS_SUBJECT_ID'], $_SESSION['SESS_STREAM_ID']) as $results){
					echo"<tr>
							<td>{$results['sfname']} {$results['slname']}</td>
							<td>{$results['marks']}</td>
						</tr>";
				}
			?>
	</tbody>
</table>
</div></div></div></main>
<?php
	}
?>