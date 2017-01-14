<?php 
	function chooseStream(){
?>
<main class="mdl-layout__content">
        <div class="page-content"><!-- Your content goes here -->
        <div class="container">
        <div class="classInfo" style="background-color:#fff; border:1px Solid #eeeeee; padding:1%; width:65%; margin-left:10%">
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
                            <td><a href= ?action=students>-></a></td>
						</tr>";
				}
			?>
			</tbody>
		</table>
		</div></div></div></main>
<?php 
	}
?>