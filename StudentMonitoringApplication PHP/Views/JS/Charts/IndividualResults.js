function AjaxFunction()
{
	var httpxml = proveAjaxCompatible();
	
	function stateck() 
    {

		if(httpxml.readyState==4)
		{
			var myarray = JSON.parse(httpxml.responseText);		
            return	myarray;
		}
    }

    var url="EntryForms/dd.php";
	var itemType=document.getElementById('itemType').value;
	
	url=url+"?itemType="+itemType;
	url=url+"&sid="+Math.random();
	
	//alert(url);
	
	httpxml.onreadystatechange=stateck;
	
	//alert(url);
	httpxml.open("GET",url,true);
	httpxml.send(null);
}

function IndividualResults() 
	{
        $("#container").ejChart(
        {

			
			//Initializing Primary X Axis
			primaryXAxis:
            {
                title: { text: "" }
            },
			
			//Initializing Primary Y Axis
            primaryYAxis:
            {
                range: { min: 0, max: 100, interval: 5 },
                labelFormat: '{value}F',
                title: { text: "Marks Attained" }
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
                    points: chartData,
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
					points: chartsData,
                    name: 'Class Average', 
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
            title :{text: 'Individual Results'},            
            legend: { visible: true }
        });

   });		
