var chartData = [{ id: "1", marks: 56}, { id: "2", marks: 66}, { id: "3", marks: 46}, { id: "4", marks: 76},
                             { id: "5", marks: 86}, { id: "6", marks: 85}, { id: "7", marks: 72}, { id: "8", marks: 88}];
var chartsData = [{ id: "1", marks: 75}, { id: "2", marks: 56}, { id: "3", marks: 78}, { id: "4", marks: 87},
                             { id: "5", marks: 57}, { id: "6", marks: 78}, { id: "7", marks: 73}, { id: "8", marks: 90}];


function getIndividualResults(studentId, subjectId)
{
    var myarray = "";
	var httpxml = proveAjaxCompatible();

	var url="../../ajaxSource/ajaxFunctionCalls.php?Action=IndividualResults&studentId="+studentId+"&subjectId="+subjectId;
	url=url+"&sid="+Math.random();

    httpxml.onreadystatechange = function () {
        if (httpxml.readyState == 4) {
            myarray = JSON.parse(httpxml.responseText);

            $(function () 
            {
                $("#container").ejChart(
                {

			
		            //Initializing Primary X Axis
		            primaryXAxis:
                    {
                        title: { text: "Test ID" }
                    },
			
		            //Initializing Primary Y Axis
                    primaryYAxis:
                    {
                        range: { min: 0, max: 100, interval: 10 },
                        labelFormat: '{value}',
                        title: { text: "Marks" }
                    },
			
		            //Initializing Common Properties for all the series  
		            commonSeriesOptions :
		            {
			            enableAnimation :true
		            },
			
		            //Initializing Series
                    series: 
		            [
                        {
                            dataSource: myarray,
                            xName:'id',
                            yName:'marks',
				            name: 'Student', 
				            type: 'line', 
				            tooltip :
				            {	visible :true, 
					            format: " #series.name#  <br/> #point.x# : #point.y#"
				            },
                            marker:
                            {
                                shape: 'circle',
                                size:
                                {
                                    height: 6, width: 6
                                },
                                visible: true
                            },
                            border :{width: 2} 
                        },
                        {
				            dataSource: chartsData,
                            xName:'id',
                            yName:'marks',
                            name: 'Class Average', 
				            type: 'line', 
				            enableAnimation: true, 
				            tooltip :
				            {
					            visible:true, 
					            format: " #series.name#  <br/> #point.x# : #point.y#   "
				            },
				            marker:
                            {
                                shape: 'circle',
                                size:
                                {
                                        height: 6, width: 6
                                },
                                visible: true
                            },
                            border :{width: 2} 

                        }
                    ],			
		            isResponsive: true,
                    title :{text: 'Individual Marks'},            
                    legend: { visible: true }
                });

            });	




        }
    };


	httpxml.open("GET",url,true);
	httpxml.send();
	
 }
  
 
  
  