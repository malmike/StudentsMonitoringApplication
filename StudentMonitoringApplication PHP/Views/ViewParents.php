<?php
    function viewParents(){
?>
    <table class="table table-hover">
		    <caption> List of Parents</caption>
		    <thead>
		    <tr>
                <th></th>
			    <th>NAME</th>
			    <th>PHONE NUMBER</th>
			    <th>EMAIL</th>
		    </tr>
		    </thead>
		    <tbody>
		    <?php
			    
                foreach(callAllParents() as $parent){
				    echo"<tr>
                            <td>{$parent['imageURI']}</td>
						    <td>{$parent['name']}</td>
						    <td>{$parent['phone_number']}</td>
						    <td>{$parent['email']}</td>
					    <tr>";
			    }
		    ?>
		    </tbody>
	    </table>
<?php
    }
?>


