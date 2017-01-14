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

// The Basic Page item template is documented at http://go.microsoft.com/fwlink/?LinkID=390556

namespace SMA
{
    /// <summary>
    /// An empty page that can be used on its own or navigated to within a Frame.
    /// </summary>
    public sealed partial class StreamList : Page
    {
        SharedInformation sharedInformation = SharedInformation.getInstance();
        GetIndividualResults individualResults = new GetIndividualResults();
        AppSettings appSettings = new AppSettings();
        OnlineURI webURI = new OnlineURI();
        GetTestYears testYears = new GetTestYears();
        ObservableCollection<TestYears> years = new ObservableCollection<TestYears>();
        GetTestYearsData testYearData = new GetTestYearsData();
        GetTest testData = new GetTest();
        GetStudentResults testResults = new GetStudentResults();
        ObservableCollection<StudentsSubjects> studlist = new ObservableCollection<StudentsSubjects>();

        public StreamList()
        {
            this.InitializeComponent();
            HardwareButtons.BackPressed += HardwareButtons_BackPressed;
        }

        protected async override void OnNavigatedTo(NavigationEventArgs e)
        {
            

            foreach (StudentsSubjects student in sharedInformation.studentsS)
            {
                StudentsSubjects kid = new StudentsSubjects();
                kid.imageURI = webURI.imageSource + "Students/" + student.imageURI;
                kid.sfname = student.sfname;
                kid.slname = student.slname;
                kid.id = student.id;
                studlist.Add(kid);

            }
            lvStudents.ItemsSource = studlist;

            string jsn = await testYears.getDetails(webURI.functionCalls, "TestYears");
            years = testYearData.DataElements(jsn);
            TestYears year = new TestYears();
            year.year = "2013";
            years.Add(year);
            CYears.ItemsSource = years;
            CYears.SelectedIndex = 0;
        }

        private async void SelectStudent(object sender, ItemClickEventArgs e)
        {
            StudentsSubjects student = e.ClickedItem as StudentsSubjects;
            sharedInformation.saveStudentsSubject(student);
            string jsn = await individualResults.getDetails(webURI.functionCalls, sharedInformation.studentsSubject.id, sharedInformation.tSubject.stream_id, "IndividualResults");
            appSettings.storeIndividualResults(jsn);
            sharedInformation.retrieveIndividualResults();
            this.Frame.Navigate(typeof(ShowIndividualResults));
            //enter page to be navigated to 
        }

        void HardwareButtons_BackPressed(object sender, BackPressedEventArgs e)
        {
            e.Handled = true;
            this.Frame.Navigate(typeof(TeacherLandingPage));
        }

        private async void selectTest(object sender, RoutedEventArgs e)
        {
            string type = ((ComboBoxItem)CTestType.SelectedItem).Content.ToString();
            string term = ((ComboBoxItem)CTerm.SelectedItem).Content.ToString();
            int value = CYears.SelectedIndex;
            TestYears year = years.ElementAt<TestYears>(value);
            string jsn = await testData.getDetails(webURI.functionCalls, type, term, year.year, "Test");
            appSettings.storeTest(jsn);
            sharedInformation.retrieveTest();
            string resultJsn = await testResults.getDetails(webURI.functionCalls, sharedInformation.test.id.ToString(), sharedInformation.tSubject.subject_id, sharedInformation.tSubject.stream_id, "StudentResults");
            appSettings.storeStudentResults(resultJsn);
            sharedInformation.retrieveStudentResults();
            this.Frame.Navigate(typeof(ShowStudentTestResult));
        }
    }   
}
