﻿using SMA.Model;
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
    public sealed partial class ParentLandingPage : Page
    {

        SharedInformation sharedInformation = SharedInformation.getInstance();
        GetSubjectsStudent getSubjectsStudent = new GetSubjectsStudent();
        OnlineURI webURI = new OnlineURI();
        AppSettings appSettings = new AppSettings();

        public ParentLandingPage()
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
            lvParent.ItemsSource = sharedInformation.parentDetails;
            kidsList.ItemsSource = sharedInformation.parentKids;
        }

        private void Pivot_SelectionChanged(object sender, SelectionChangedEventArgs e)
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

        private void Refresh_Data(object sender, RoutedEventArgs e)
        {

        }

        private async void SelectKid(object sender, ItemClickEventArgs e)
        {
            ParentKids kid = e.ClickedItem as ParentKids;
            sharedInformation.saveKid(kid);
            string jsn = await getSubjectsStudent.getDetails(webURI.functionCalls, kid.id, "SubjectsStudent");
            appSettings.storeSubjectsStudent(jsn);
            sharedInformation.retrieveSubjectsStudent();
            this.Frame.Navigate(typeof(KidsSubjects));
        }
    }
}
