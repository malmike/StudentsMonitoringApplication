<?php
    function viewStreams(){
?>
    <table class="table table-hover">
	<caption> List of Subjects</caption>
	<thead>
	<tr>
		<th>CLASS</th>
        <th>STREAM</th>
		<th>YEAR</th>
	</tr>
	</thead>
	<tbody>
	<?php    
        foreach(callAllStreams() as $stream){
			echo"<tr>
					<td>{$stream['class']}</td>
                    <td>{$stream['stream']}</td>
					<td>{$stream['year']}</td>
				<tr>";
		}
	?>
	</tbody>
</table>

<?php
    }
?>
