<?php 
	function viewIndividualResults($subjectId, $sfname, $slname, $studentid){
        $stream = getStream($studentid);
        $streamId = "";
        foreach($stream as $value){
            $streamId = $value['stream_id'];
        }

?>
 <main class="mdl-layout__content">
        <div class="page-content"><!-- Your content goes here -->
        <div class="container" style="margin-top:8%">
        <!-- Square card -->
        <?php echo "<label>Results Of {$sfname} {$slname}</label>"; ?><hr>
  <div style="margin-left:5%; width:90%">
		<table class="table">
			<thead>
				<tr>
					<th width=80px>Term</th>
                    <th>Test Type</th>
                    <th>Year</th>
                    <th>Marks</th>
				</tr>
			</thead>
			<tbody>
			<?php 
                foreach(callIndividualResults($studentid, $subjectId) as $results){
				    echo"<tr>
                            <td>{$results['term']}</td>
                            <td>{$results['test_type']}</td>
                            <td>{$results['year']}</td>
                            <td>{$results['marks']}</td>
					    <tr>";
                }
            ?>
			</tbody>
		</table>
		</div>
            <?php echo "<a href='Charts/IndividualResultsGraph.php?studentId={$studentid}&streamId={$streamId}&subjectId={$subjectId}'> Chart </a>";?>
		</div>
		</div>
		</main>
<?php
                
	}
?>