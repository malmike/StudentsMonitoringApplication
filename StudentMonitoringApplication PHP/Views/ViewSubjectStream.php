<?php 
	function viewSubjectStream($streamId, $subjectId){
?>
<main class="mdl-layout__content">
        <div class="page-content"><!-- Your content goes here -->
        <div class="container">
        <div class="classInfo" style="background-color:#fff; border:1px Solid #eeeeee; padding:1%; width:65%; margin-left:10%">
		<table class="table">
			<thead>
				<tr>
					<th>List of Students<th>
				</tr>
			</thead>
			<tbody>
			<?php 
                $i = 0;
                foreach(callStudentSubject($streamId, $subjectId) as $student){
                    $i++;
				    echo"<tr>
                            <td>{$i} &nbsp
						    <a href=?action=viewResults&&streamId={$streamId}&&subjectId={$subjectId}&&sfname={$student['sfname']}&&slname={$student['slname']}&&studentid={$student['id']}>
                           {$student['sfname']} {$student['slname']}</a></td>
					    <tr>";
                }
            ?>
			</tbody>
		</table>
	</div></div></div></main>
<?php
	}
?>