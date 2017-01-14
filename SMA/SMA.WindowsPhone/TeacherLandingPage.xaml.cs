using SMA.Model;
using SMA.Model.PhpRetrieval;
using SMA.Resources;
using System;
using System.Collections.Generic;
using System.Diagnostics;
using System.IO;
using System.Linq;
using System.Runtime.InteropServices.WindowsRuntime;
using Windows.Foundation;
using Windows.Foundation.Collections;
using Windows.UI.Xaml;
using Windows.UI.Xaml.Controls;
using Windows.UI.Xaml.Controls.Primitives;
using Windows.UI.Xaml.Data;
using Windows.UI.Xaml.Input;
using Windows.UI.Xaml.Media;
using Windows.UI.Xaml.Media.Imaging;
using Windows.UI.Xaml.Navigation;

// The Blank Page item template is documented at http://go.microsoft.com/fwlink/?LinkID=390556

namespace SMA
{
    /// <summary>
    /// An empty page that can be used on its own or navigated to within a Frame.
    /// </summary>
    public sealed partial class TeacherLandingPage : Page
    {
        SharedInformation sharedInformation = SharedInformation.getInstance();
        GetStudentsSubjects getStudentsSubjects = new GetStudentsSubjects();
        GetStreamAverage getStreamAverage = new GetStreamAverage();
        OnlineURI webURI = new OnlineURI();
        AppSettings appSettings = new AppSettings();


        public TeacherLandingPage()
        {
            this.InitializeComponent();
        }

        /// <summary>
        /// Invoked when this page is about to be displayed in a Frame.
        /// </summary>
        /// <param name="e">Event data that describes how this page was reached.
        /// This parameter is typically used to configure the page.</param>
        protected override void OnNavigatedTo(NavigationEventArgs e)
        {
            lvTeacher.ItemsSource = sharedInformation.teacherDetails;
            classList.ItemsSource = sharedInformation.teacherSubject;
            string imageURI = webURI.imageSource + "Teachers/" + sharedInformation.teacherData.imageURI;
            myImage.Source = new BitmapImage(new Uri(imageURI, UriKind.Absolute));
        }

        private async void selectTeacherSub(object sender, ItemClickEventArgs e)
        {
            TeacherSubject teacherSubject = e.ClickedItem as TeacherSubject;
            sharedInformation.saveTeacherSubject(teacherSubject);
            string jsn = await getStudentsSubjects.getDetails(webURI.functionCalls, teacherSubject.stream_id, teacherSubject.subject_id, "StudentsSubjects");
            appSettings.storeStudentsSubjects(jsn);
            sharedInformation.retrieveStudentsSubjects();

            jsn = await getStreamAverage.getDetails(webURI.functionCalls, teacherSubject.stream_id, teacherSubject.subject_id, "Average");
            appSettings.storeIndividualResults(jsn);
            sharedInformation.retrieveStreamAverageResults();

            this.Frame.Navigate(typeof(StreamList));
            //fill in the page to be navigated to here 
        }

        private void PivotSelection_Changed(object sender, SelectionChangedEventArgs e)
        {
            bool supProve = false;

            switch (((Pivot)sender).SelectedIndex)
            {
                case 0:
                    bottomCommandBar.Visibility = Visibility.Collapsed;
                    supProve = false;
                    break;

                case 1:
                    bottomCommandBar.Visibility = Visibility.Visible;
                    supProve = true;
                    break;
            }
        }

        private void GoChat(object sender, RoutedEventArgs e)
        {
            this.Frame.Navigate(typeof(ChatsList));
        }
    }
}
