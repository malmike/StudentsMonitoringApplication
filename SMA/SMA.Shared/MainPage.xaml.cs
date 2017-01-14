using System;
using System.Collections.Generic;
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
using Windows.UI.Core;
using System.Diagnostics;
using Windows.Networking.PushNotifications;
using Windows.UI.Popups;
using System.Threading.Tasks;
using System.Net.NetworkInformation;
using RawPushBGTask;
using SMA.Resources;
using SMA.Model.PhpRetrieval;
using SMA.Model.DataContext;


// The Blank Page item template is documented at http://go.microsoft.com/fwlink/?LinkId=234238

namespace SMA
{
    /// <summary>
    /// An empty page that can be used on its own or navigated to within a Frame.
    /// </summary>
    public sealed partial class MainPage : Page
    {
        OnlineURI webURI = new OnlineURI();
        SharedInformation sharedInformation = SharedInformation.getInstance();
        AppSettings appSettings = new AppSettings();
        private PushNotifications SharedPushComponent = new PushNotifications();
        GetParentKids parentKids = new GetParentKids();
        GetTeacherSubject teacherSubject = new GetTeacherSubject();
        private ChatDataContext context = new ChatDataContext();
      

        MessageDialog msgbox;

        public MainPage()
        {
            this.InitializeComponent();

            this.NavigationCacheMode = NavigationCacheMode.Required;
        }

        /// <summary>
        /// Invoked when this page is about to be displayed in a Frame.
        /// </summary>
        /// <param name="e">Event data that describes how this page was reached.
        /// This parameter is typically used to configure the page.</param>
        async protected override void OnNavigatedTo(NavigationEventArgs e)
        {
            //context.CreateDatabase();
            sharedInformation.number = appSettings.retrieveChatNumber();
            appSettings.storeChatNumber(sharedInformation.number);

            // TODO: Prepare page for display here.

            // TODO: If your application contains multiple pages, ensure that you are
            // handling the hardware Back button by registering for the
            // Windows.Phone.UI.Input.HardwareButtons.BackPressed event.
            // If you are using the NavigationHelper provided by some templates,
            // this event is handled for you.

            bool isNetwork = NetworkInterface.GetIsNetworkAvailable();
            if (isNetwork)
            {
                await Dispatcher.RunAsync(CoreDispatcherPriority.Normal, () =>
                {
                    #region RAW
                    SharedPushComponent.deliverRawNotification += SharedPushComponent_deliverRawNotification;
                    #endregion
                    #region TOAST
                    SharedPushComponent.deliverToastNotification += SharedPushComponent_deliverToastNotification;
                    #endregion
                    SharedPushComponent.Initilialize();


                });

                if (appSettings.verifyRegistrationSettings())
                {
                    sharedInformation.retrieveUserDetails();

                    //pushURITask.Wait();

                    //sharedInformation.pushURI = SharedPushComponent.pushURI;
                    //if (sharedInformation.pushURI != pushNotificationURI)
                    //{
                    //    appSettings.storePushURISettings(sharedInformation.pushURI);
                    //    await userDetails.getDetails(webURI.updatePushURI, sharedInformation.empData.Serial.ToString(), sharedInformation.pushURI);
                    //}]
                    if (appSettings.retrieveUser().Equals("Parent"))
                    {                   
                        string kids = await parentKids.getDetails(webURI.functionCalls, sharedInformation.parentData.id, "ParentKids");
                        appSettings.storeParentKids(kids);
                        sharedInformation.retrieveParentKids();
                        this.Frame.Navigate(typeof(ParentLandingPage));
                    }
                    else if (appSettings.retrieveUser().Equals("Teacher"))
                    {
                        string subjects = await teacherSubject.getDetails(webURI.functionCalls, sharedInformation.teacherData.id, "TeacherSubject");
                        appSettings.storeTeacherSubject(subjects);
                        sharedInformation.retreiveTeacherSubject();
                        this.Frame.Navigate(typeof(TeacherLandingPage));
                    }
                }
                
                else
                {
                    this.Frame.Navigate(typeof(LoginPage));
                }
            }
        }

        private void changePage(object sender, RoutedEventArgs e)
        {
            this.Frame.Navigate(typeof(LoginPage));
        }


        void SharedPushComponent_deliverToastNotification(Windows.Networking.PushNotifications.PushNotificationChannel sender, PushNotificationReceivedEventArgs args)
        {
        }


        async private void SharedPushComponent_deliverRawNotification(PushNotificationChannel sender, RawNotification args)
        {


            await Dispatcher.RunAsync(CoreDispatcherPriority.Normal, () =>
            {
                #region RAW_IN_APP
                if (!PushBGTask.IsTaskRegistered())
                {
                    sharedInformation.number = sharedInformation.number + 1;
                    appSettings.storeChatNumber(sharedInformation.number);
                    appSettings.storeChat(args.Content.ToString());
                    //context.storeElements(args.Content.ToString());
                    Debugger.Break();
                }
                #endregion
            });
        }


        #region ManageBGTask
        private void EnableBGTask_Click(object sender, RoutedEventArgs e)
        {
            //Register the applications backgroundtask
            PushBGTask.Register();
        }

        private void DisableBGTask_Click(object sender, RoutedEventArgs e)
        {
            PushBGTask.DisableTask();
        }
        #endregion

    }
}
