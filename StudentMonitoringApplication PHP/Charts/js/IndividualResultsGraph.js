$(function () 
	{
        $("#container").ejChart(
        {

			
			//Initializing Primary X Axis
			primaryXAxis:
            {
                title: { text: "Test" }
            },
			
			//Initializing Primary Y Axis
            primaryYAxis:
            {
                labelFormat: '{value}%',
                title: { text: "Marks(Percentages)" }
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
                    dataSource: individualMarks,
					name: 'Individual Marks',
                    xName: 'id',
                    yName: 'marks',
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
					dataSource: averageMarks,
                    name: 'Average Marks',
                    xName: 'id',
                    yName: 'marks', 
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
            title :{text: 'Individual Marks Against Class Average'},            
            legend: { visible: true }
        });

    });		

