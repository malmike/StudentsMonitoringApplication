using SMA.Model;
using SMA.Resources;
using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
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
    public sealed partial class ChatsList : Page
    {
        public Chat chat = new Chat();
        ObservableCollection<Chat> chatData = new ObservableCollection<Chat>();
        SharedInformation sharedInformation = SharedInformation.getInstance();
        OnlineURI webURI = new OnlineURI();
        public ChatsList()
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
            sharedInformation.getChatsList();
            if (sharedInformation.chatList != null)
            {
                
                foreach (Chat chat in sharedInformation.chatList)
                {
                    Chat singleChat = new Chat();
                    singleChat.ImageURI = webURI.imageSource + "Parents/" + chat.ImageURI;
                    singleChat.UserName = chat.UserName;
                    singleChat.Message = chat.Message;
                    singleChat.ChatId = chat.ChatId;
                    chatData.Add(singleChat);

                }

                lvChatsList.ItemsSource = chatData;

            }
            
        }

        private void SelectParent(object sender, ItemClickEventArgs e)
        {

        }

        void HardwareButtons_BackPressed(object sender, BackPressedEventArgs e)
        {
            e.Handled = true;
            this.Frame.Navigate(typeof(TeacherLandingPage));
        }
    }
}
