using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.Diagnostics;
using System.IO;
using System.Linq;
using System.Runtime.InteropServices.WindowsRuntime;
using Windows.Foundation;
using Windows.Foundation.Collections;
using Windows.Phone.UI.Input;
using Windows.UI.Xaml;
using Windows.UI.Xaml.Controls;
using Windows.UI.Xaml.Controls.Primitives;
using Windows.UI.Xaml.Data;
using Windows.UI.Xaml.Input;
using Windows.UI.Xaml.Media;
using Windows.UI.Xaml.Navigation;
using Syncfusion.UI.Xaml.Charts;
using SMA.Resources;

// The Blank Page item template is documented at http://go.microsoft.com/fwlink/?LinkID=390556

namespace SMA
{
    /// <summary>
    /// An empty page that can be used on its own or navigated to within a Frame.
    /// </summary>
    public sealed partial class IndividualResultsGraph : Page
    {
        SharedInformation sharedInformation = SharedInformation.getInstance();

        public IndividualResultsGraph()
        {
            this.InitializeComponent();
            HardwareButtons.BackPressed += HardwareButtons_BackPressed;

            
        }

        /// <summary>
        /// Invoked when this page is about to be displayed in a Frame.
        /// </summary>
        /// <param name="e">Event data that describes how this page was reached.
        /// This parameter is typically used to configure the page.</param>
        protected override void OnNavigatedTo(NavigationEventArgs e)
        {
            chartCreation();
        }

        void HardwareButtons_BackPressed(object sender, BackPressedEventArgs e)
        {
            e.Handled = true;
            this.Frame.Navigate(typeof(ShowIndividualResults));
        }

        void chartCreation()
        {
            chart.Header = "Student Results";
            chart.FontSize = 16;



            //Adding horizontal axis to the chart

            CategoryAxis primaryCategoryAxis = new CategoryAxis();

            primaryCategoryAxis.Header = "Test";

            chart.PrimaryAxis = primaryCategoryAxis;

            //Adding vertical axis to the chart 

            NumericalAxis secondaryNumericalAxis = new NumericalAxis();

            secondaryNumericalAxis.Header = "Marks(%)";

            chart.SecondaryAxis = secondaryNumericalAxis;

            ChartAdornmentInfo adorn = new ChartAdornmentInfo();
            adorn.ShowMarker = true;
            adorn.SymbolInterior = new SolidColorBrush(Windows.UI.Colors.DarkGray);
            adorn.SymbolStroke = new SolidColorBrush(Windows.UI.Colors.Black);
            adorn.Symbol = ChartSymbol.Ellipse;
            adorn.SymbolHeight = 5;
            adorn.SymbolWidth = 5;

            ChartAdornmentInfo adorn2 = new ChartAdornmentInfo();
            adorn2.ShowMarker = true;
            adorn2.SymbolInterior = new SolidColorBrush(Windows.UI.Colors.DarkGray);
            adorn2.SymbolStroke = new SolidColorBrush(Windows.UI.Colors.Black);
            adorn2.Symbol = ChartSymbol.Ellipse;
            adorn2.SymbolHeight = 5;
            adorn2.SymbolWidth = 5;



            //Initialize the two series for SfChart
            LineSeries series1 = new LineSeries();

            series1.ItemsSource = sharedInformation.individualResults;

            series1.XBindingPath = "id";

            series1.YBindingPath = "marks";

            series1.Label = "Student Results";

            series1.AdornmentsInfo = adorn;

            series1.ShowTooltip = true;



            LineSeries series2 = new LineSeries();

            series2.ItemsSource = sharedInformation.streamAverageResults;

            series2.XBindingPath = "id";

            series2.YBindingPath = "marks";

            series2.Label = "Stream Average";

            series2.AdornmentsInfo = adorn2;

            series2.ShowTooltip = true;


            //Adding Series to the Chart Series Collection
            chart.Series.Add(series1);

            chart.Series.Add(series2);

            //Adding Legends for the chart
            ChartLegend legend = new ChartLegend();
            legend.CheckBoxVisibility = Visibility.Visible;
            chart.Legend = legend;        


        }
    }

}
