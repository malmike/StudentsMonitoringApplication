var chartData = [{ month: "Jan", value: 33 }, { month: "Feb", value: 31 }, { month: "Mar", value: 30 }, { month: "Apr", value: 28 },
                        { month: "May", value: 29 }, { month: "Jun", value: 30 }, { month: "Jul", value: 33 }, { month: "Aug", value: 32 },
                        { month: "Sep", value: 34 }, { month: "Oct", value: 32 }, { month: "Nov", value: 32 }, { month: "Dec", value: 31}];

var chartsData = [{ month: "Jan", value: 28 }, { month: "Feb", value: 28.3 }, { month: "Mar", value: 28.7 }, { month: "Apr", value: 29 },
                        { month: "May", value: 29.5 }, { month: "Jun", value: 29 }, { month: "Jul", value: 28.9 }, { month: "Aug", value: 28.4 },
                        { month: "Sep", value: 28.6 }, { month: "Oct", value: 28 }, { month: "Nov", value: 28.2 }, { month: "Dec", value: 28 }];

 $(function () 
	{
        $("#container").ejChart(
        {

			
			//Initializing Primary X Axis
			primaryXAxis:
            {
                title: { text: "Month" }
            },
			
			//Initializing Primary Y Axis
            primaryYAxis:
            {
                range: { min: 0, max: 100, interval: 10 },
                labelFormat: '{value}%',
                title: { text: "Value" }
            },
			//
			//Initializing Common Properties for all the series  
			commonSeriesOptions :
			{
				enableAnimation :true
			},
			
			//Initializing Series
            series: 
			[
                {
                    dataSource: chartData,
                    xName:'month',
                    yName:'value',
					name: 'India', 
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
                }
                ,
                {
					dataSource: chartsData,
                    xName:'month',
                    yName:'value',
                    name: 'Canada', 
					type: 'line', 
					yAxisName: 'yAxis', 
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
            title :{text: 'Weather Report'},            
            legend: { visible: true }
        });

   });	
function getGradesChart(studentId, subjectId)
{
    var myarray = "";
	var httpxml = proveAjaxCompatible();

	var url="../../ajaxSource/ajaxFunctionCalls.php?Action=IndividualResults&studentId="+studentId+"&subjectId="+subjectId;
	url=url+"&sid="+Math.random();

    httpxml.onreadystatechange = function () {
        if (httpxml.readyState == 4) {
            myarray = JSON.parse(httpxml.responseText);
           	

        }
    };


	httpxml.open("GET",url,true);
	httpxml.send();
	
 }