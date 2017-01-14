 

        <input type="hidden" id="studentId" value="<?php echo $_REQUEST['studentId']?>"/>
        <input type="hidden" id="subjectId" value="<?php echo $_REQUEST['subjectId']?>"/>
        <input type="hidden" id="streamId" value="<?php echo $_REQUEST['streamId']?>"/>

            
        <script src="js/ProveAjaxCompatible.js" type="text/javascript"></script>
        <script src="js/GetIndividualResults.js" type="text/javascript"></script>
        <script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>

        <script src="js/ej.widget.all.min.js" type="text/javascript"></script>
        <script type="text/javascript" language="javascript">
            var studentId = document.getElementById('studentId').value;
            var subjectId = document.getElementById('subjectId').value;
            var streamId = document.getElementById('streamId').value;

            var individualMarks = JSON.parse(getIndividualMarksData(studentId, subjectId));
            var averageMarks = JSON.parse(getAverageMarksData(streamId, subjectId));

        </script> 
        <script src="js/IndividualResultsGraph.js" type="text/javascript"></script>
        <div id="container" style="width: 820px; height: 550px;"></div>

          
	    
