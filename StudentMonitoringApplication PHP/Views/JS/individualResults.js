var chartData = [{ testType: "BOT", Mark: 56}, { testType: "Assign1", Mark: 66}, { testType: "Assign2", Mark: 46}, { testType: "Assign3", Mark: 76},
                             { testType: "MOT", Mark: 86}, { testType: "Assign4", Mark: 85}, { testType: "Assign5", Mark: 72}, { testType: "EOT", Mark: 88}];
var chartsData = [{ testType: "BOT", Mark: 75}, { testType: "Assign1", Mark: 56}, { testType: "Assign2", Mark: 78}, { testType: "Assign3", Mark: 87},
                             { testType: "MOT", Mark: 57}, { testType: "Assign4", Mark: 78}, { testType: "Assign5", Mark: 73}, { testType: "EOT", Mark: 90}];

                             var x = document.getElementById('xrs').value;
                             var y = document.getElementById('yrs').value;

//getIndividualResults();


$(function () 
{
    $("#individualResults").ejChart(
    {

			
		//Initializing Primary X Axis
		primaryXAxis:
        {
            title: { text: "Test" }
        },
			
		//Initializing Primary Y Axis
        primaryYAxis:
        {
            range: { min: 0, max: 100, interval: 10 },
            labelFormat: '{value}%',
            title: { text: "Marks(%)" }
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
                dataSource: chartData,
                xName:'testType',
                yName:'Mark',
				name: 'Mine', 
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
                xName:'testType',
                yName:'Mark',
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

//var chartData = [{ x: "Jan", y: 33 }, { x: "Feb", y: 31 }, { x: "Mar", y: 30 }, { x: "Apr", y: 28 },
//                             { x: "May", y: 29 }, { x: "Jun", y: 30 }, { x: "Jul", y: 33 }, { x: "Aug", y: 32 },
//                             { x: "Sep", y: 34 }, { x: "Oct", y: 32 }, { x: "Nov", y: 32 }, { x: "Dec", y: 31}];

//        var chartsData = [{ x: "Jan", y: 28 }, { x: "Feb", y: 28.3 }, { x: "Mar", y: 28.7 }, { x: "Apr", y: 29 },
//                             { x: "May", y: 29.5 }, { x: "Jun", y: 29 }, { x: "Jul", y: 28.9 }, { x: "Aug", y: 28.4 },
//                             { x: "Sep", y: 28.6 }, { x: "Oct", y: 28 }, { x: "Nov", y: 28.2 }, { x: "Dec", y: 28 }];
//        
//        var chartsDatas = [{ x: "Jan", y: 34 }, { x: "Feb", y: 33 }, { x: "Mar", y: 28.7 }, { x: "Apr", y: 29 },
//                             { x: "May", y: 29.5 }, { x: "Jun", y: 33 }, { x: "Jul", y: 28.9 }, { x: "Aug", y: 28.4 },
//                             { x: "Sep", y: 26 }, { x: "Oct", y: 28 }, { x: "Nov", y: 25 }, { x: "Dec", y: 28 }];
//                             
//$(function () 
//    {
//        $("#individualResults").ejChart(
//        {

//			
//		    //Initializing Primary X Axis
//		    primaryXAxis:
//            {
//                title: { text: "Month" }
//            },
//			
//		    //Initializing Primary Y Axis
//            primaryYAxis:
//            {
//                range: { min: 24, max: 36, interval: 2 },
//                labelFormat: '{value}F',
//                title: { text: "Temperature(Fahrenheit)" }
//            },
//			
//		    //Initializing Common Properties for all the series  
//		    commonSeriesOptions :
//		    {
//			    enableAnimation :true
//		    },
//			
//		    //Initializing Series
//            series: 
//		    [
//                {
//                    points: chartData,
//				    name: 'India', 
//				    type: 'line', 
//				    tooltip :
//				    {	visible :true, 
//					    format: " #series.name#  <br/> #point.x# : #point.y#"
//				    },
//                    marker:
//                    {
//                        shape: 'circle',
//                        size:
//                        {
//                            height: 6, width: 6
//                        },
//                        visible: true
//                    },
//                    border :{width: 2} 
//                },
//                {
//				    points: chartsData,
//                    name: 'Canada', 
//				    type: 'line', 
//				    enableAnimation: true, 
//				    tooltip :
//				    {
//					    visible:true, 
//					    format: " #series.name#  <br/> #point.x# : #point.y#   "
//				    },
//				    marker:
//                    {
//                        shape: 'circle',
//                        size:
//                        {
//                                height: 6, width: 6
//                        },
//                        visible: true
//                    },
//                    border :{width: 2} 

//                },
//                    {
//				    points: chartsDatas,
//                    name: 'Egypt', 
//				    type: 'line', 
//				    enableAnimation: true, 
//				    tooltip :
//				    {
//					    visible:true, 
//					    format: " #series.name#  <br/> #point.x# : #point.y#   "
//				    },
//				    marker:
//                    {
//                        shape: 'circle',
//                        size:
//                        {
//                                height: 6, width: 6
//                        },
//                        visible: true
//                    },
//                    border :{width: 2} 

//                }
//            ],			
//		    isResponsive: true,
//            title :{text: 'Weather Report'},            
//            legend: { visible: true }
//        });

//    });	