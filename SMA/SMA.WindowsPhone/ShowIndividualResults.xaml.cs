using SMA.Resources;
using System;
using System.Collections.Generic;
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
using Windows.UI.Core;

// The Blank Page item template is documented at http://go.microsoft.com/fwlink/?LinkID=390556

namespace SMA
{
    /// <summary>
    /// An empty page that can be used on its own or navigated to within a Frame.
    /// </summary>
    public sealed partial class ShowIndividualResults : Page
    {

        SharedInformation sharedInformation = SharedInformation.getInstance();
        

        public ShowIndividualResults()
        {
            this.InitializeComponent();
            HardwareButtons.BackPressed += HardwareButtons_BackPressed;
            //Window.Current.SizeChanged += Current_SizeChanged;
        }

        //private void Current_SizeChanged(object sender, WindowSizeChangedEventArgs e)
        //{
        //    var orient = Window.Current.Bounds;
        //    if(orient.Width > orient.Height)
        //    {
        //        graph.Height = 240;
        //        graph.Width = 500;
        //    }else
        //    {
        //        graph.Height = 400;
        //        graph.Width = 330;
        //    }
        //}

        /// <summary>
        /// Invoked when this page is about to be displayed in a Frame.
        /// </summary>
        /// <param name="e">Event data that describes how this page was reached.
        /// This parameter is typically used to configure the page.</param>
        protected override void OnNavigatedTo(NavigationEventArgs e)
        {
            lvIndividualResults.ItemsSource = sharedInformation.individualResults;
        }


        void HardwareButtons_BackPressed(object sender, BackPressedEventArgs e)
        {
            e.Handled = true;
            if(sharedInformation.parentData != null)
            {
                this.Frame.Navigate(typeof(KidsSubjects));
            }
            else
            {
                this.Frame.Navigate(typeof(StreamList));
            }
            
        }

        private void Graph_data(object sender, RoutedEventArgs e)
        {
            this.Frame.Navigate(typeof(IndividualResultsGraph));
        }
    }
}
