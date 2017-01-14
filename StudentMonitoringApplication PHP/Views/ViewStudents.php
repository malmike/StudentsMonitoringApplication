<?php
    function viewStudents(){
?>
<table class="table table-hover">
	<caption> List of Students</caption>
	<thead>
	<tr>
        <th></th>
		<th>NAME</th>
        <th>PARENT NAME</th>
		<th>PARENT EMAIL</th>
        <th>PARENT PHONE NUMBER</th>
	</tr>
	</thead>
	<tbody>
	<?php    
        foreach(callStudents() as $student){
			echo"<tr>
                    <td>{$student['imageURI']}</td>
                    <td>{$student['student_first_name']} {$student['student_last_name']}</td>
					<td>{$student['parent_name']}</td>
                    <td>{$student['parent_email']}</td>
					<td>{$student['parent_phone_number']}</td>
				<tr>";
		}
	?>
	</tbody>
</table>
<?php
    }
?>