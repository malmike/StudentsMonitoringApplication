using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using Windows.Networking.PushNotifications;
using Windows.Foundation;
using Windows.UI.Notifications;
using System.Diagnostics;

namespace PushLibrary
{
    public class PushSample
    {
        private PushNotificationChannel channel;

        public async void Initilialize()
        {
            channel = await PushNotificationChannelManager.CreatePushNotificationChannelForApplicationAsync();

            channel.PushNotificationReceived += channel_PushNotificationReceived;
            Debug.WriteLine(channel.Uri.ToString());
            Debugger.Break();
        }

        private void channel_PushNotificationReceived(PushNotificationChannel sender, PushNotificationReceivedEventArgs args)
        {
            switch (args.NotificationType)
            {
                case PushNotificationType.Raw:
                    deliverRawNotification(sender, args.RawNotification);
                    break;
                case PushNotificationType.Badge:
                    deliverBadgeNotification(sender, args.BadgeNotification);
                    break;
                case PushNotificationType.Tile:
                    deliverTileNotification(sender, args.TileNotification);
                    break;
                case PushNotificationType.Toast:
                    deliverToastNotification(sender, args);
                    break;
            }
        }

        public event TypedEventHandler<PushNotificationChannel, PushNotificationReceivedEventArgs> deliverToastNotification;
        public event TypedEventHandler<PushNotificationChannel, TileNotification> deliverTileNotification;
        public event TypedEventHandler<PushNotificationChannel, RawNotification> deliverRawNotification;
        public event TypedEventHandler<PushNotificationChannel, BadgeNotification> deliverBadgeNotification;
    }
}
