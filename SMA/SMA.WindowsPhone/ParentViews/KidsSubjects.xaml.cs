using SMA.Model;
using SMA.Model.DataContext;
using SMA.Model.PhpRetrieval;
using SMA.Resources;
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

// The Blank Page item template is documented at http://go.microsoft.com/fwlink/?LinkID=390556

namespace SMA
{
    /// <summary>
    /// An empty page that can be used on its own or navigated to within a Frame.
    /// </summary>
    public sealed partial class KidsSubjects : Page
    {

        SharedInformation sharedInformation = SharedInformation.getInstance();
        GetIndividualResults individualResults = new GetIndividualResults();
        AppSettings appSettings = new AppSettings();
        OnlineURI webURI = new OnlineURI();
        GetTestYears testYears = new GetTestYears();
        ObservableCollection<TestYears> years = new ObservableCollection<TestYears>();
        GetTestYearsData testYearData = new GetTestYearsData();
        GetTest test = new GetTest();
        GetStudentTestResults testResults = new GetStudentTestResults();

        public KidsSubjects()
        {
            this.InitializeComponent();
            HardwareButtons.BackPressed += HardwareButtons_BackPressed;
        }

        /// <summary>
        /// Invoked when this page is about to be displayed in a Frame.
        /// </summary>
        /// <param name="e">Event data that describes how this page was reached.
        /// This parameter is typically used to configure the page.</param>
        protected async override void OnNavigatedTo(NavigationEventArgs e)
        {
            lvSubjects.ItemsSource = sharedInformation.subjectsS;
            string jsn = await testYears.getDetails(webURI.functionCalls, "TestYears");
            years = testYearData.DataElements(jsn);
            TestYears year = new TestYears();
            year.year = "2013";
            years.Add(year);
            CYears.ItemsSource = years;
            CYears.SelectedIndex = 0;
        }

        private async void SelectSubject(object sender, ItemClickEventArgs e)
        {
            SubjectsStudent subject = e.ClickedItem as SubjectsStudent;
            sharedInformation.saveSubjectsStudent(subject);
            string jsn = await individualResults.getDetails(webURI.functionCalls, sharedInformation.kid.id, sharedInformation.subjectsStudent.id, "IndividualResults");
            appSettings.storeIndividualResults(jsn);
            sharedInformation.retrieveIndividualResults();
            this.Frame.Navigate(typeof(ShowIndividualResults));
        }

        void HardwareButtons_BackPressed(object sender, BackPressedEventArgs e)
        {
            e.Handled = true;
            this.Frame.Navigate(typeof(ParentLandingPage));
        }

        private async void selectTest(object sender, RoutedEventArgs e)
        {
            string type = ((ComboBoxItem)CTestType.SelectedItem).Content.ToString();
            string term = ((ComboBoxItem)CTerm.SelectedItem).Content.ToString();
            int value = CYears.SelectedIndex;
            TestYears year = years.ElementAt<TestYears>(value);
            string jsn = await test.getDetails(webURI.functionCalls, type, term, year.year, "Test");
            appSettings.storeTest(jsn);
            sharedInformation.retrieveTest();
            string resultJsn = await testResults.getDetails(webURI.functionCalls, sharedInformation.test.id.ToString(), sharedInformation.kid.id, "StudentTestResults");
            appSettings.storeStudentTestResults(resultJsn);
            sharedInformation.retrieveStudentTestResults();
            this.Frame.Navigate(typeof(ShowStudentTestResult));
        }
    }
}
