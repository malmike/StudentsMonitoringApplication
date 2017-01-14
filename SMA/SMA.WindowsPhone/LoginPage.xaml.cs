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
using Windows.UI.Xaml.Navigation;

// The Blank Page item template is documented at http://go.microsoft.com/fwlink/?LinkID=390556

namespace SMA
{
    /// <summary>
    /// An empty page that can be used on its own or navigated to within a Frame.
    /// </summary>
    public sealed partial class LoginPage : Page
    {
        private Login login = new Login();
        OnlineURI webURI = new OnlineURI();
        private AppSettings appSettings = new AppSettings();
        SharedInformation sharedInformation = SharedInformation.getInstance();
        GetParentKids parentKids = new GetParentKids();
        GetTeacherSubject teacherSubject = new GetTeacherSubject();
        UpdatePushURI updatePushURI = new UpdatePushURI();

        public LoginPage()
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
            fail.Visibility = Visibility.Collapsed;
        }

        private async void loginUser(object sender, RoutedEventArgs e)
        {
            string user = ((ComboBoxItem)User.SelectedItem).Content.ToString();
            string email = Email.Text;
            string password = Password.Password.ToString();
            string response = await login.getDetails(webURI.functionCalls, user, email, password, "login");
            string error = "error";
            if (response.Trim().Equals(error))
            {
                fail.Visibility = Visibility.Visible;
            }
            else
            {
                fail.Visibility = Visibility.Collapsed;
                appSettings.storeUser(user);
                appSettings.storeUserSettings(response.Trim());
                switch (user)
                {
                    case "Parent":
                        sharedInformation.retrieveUserDetails();
                        string kids = await parentKids.getDetails(webURI.functionCalls, sharedInformation.parentData.id, "ParentKids");
                        appSettings.storeParentKids(kids);
                        sharedInformation.retrieveParentKids();
                        string pushData = await updatePushURI.ChangePushURI(webURI.functionCalls, sharedInformation.pushURI, "WP", sharedInformation.parentData.id, "Parent", "UpdatePushURI");
                        Debugger.Break();
                        this.Frame.Navigate(typeof(ParentLandingPage));

                        break;
                    case "Teacher":
                        sharedInformation.retrieveUserDetails();
                        string subjects = await teacherSubject.getDetails(webURI.functionCalls, sharedInformation.teacherData.id, "TeacherSubject");
                        appSettings.storeTeacherSubject(subjects);
                        sharedInformation.retreiveTeacherSubject();
                        string pushData2 = await updatePushURI.ChangePushURI(webURI.functionCalls, sharedInformation.pushURI, "WP", sharedInformation.teacherData.id, "Teacher", "UpdatePushURI");

                        this.Frame.Navigate(typeof(TeacherLandingPage));
                        break;
                }

            }
            //fail.Visibility = Visibility.Visible;
        }

        private void Registration(object sender, TappedRoutedEventArgs e)
        {
        
        }
    }
}
