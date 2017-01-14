<?php
    function viewSubjects(){
?>
<main class="mdl-layout__content">
        <div class="page-content"><!-- Your content goes here -->
        <div class="container">
        <div class="classInfo" style="background-color:#fff; border:1px Solid #eeeeee; padding:1%; width:65%; margin-left:10%">
<table class="table table-hover">
	<caption> List of Teachers</caption>
	<thead>
	<tr>
		<th>CODE</th>
        <th>NAME</th>
		<th>NUMBER OF PAPERS</th>
	</tr>
	</thead>
	<tbody>
	<?php    
        foreach(callAllSubjects() as $subject){
			echo"<tr>
					<td>{$subject['code']}</td>
                    <td>{$subject['name']}</td>
					<td>{$subject['pnumber']}</td>
				<tr>";
		}
	?>
	</tbody>
</table>
</div></div></div></main>
<?php
    }
?>