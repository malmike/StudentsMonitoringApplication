using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.Text;

namespace SMA.Model.DataContext
{
    class GetChat
    {
        public Chat chat { get; private set; }
        public ObservableCollection<Chat> chatOb { get; private set; }
        public Chat DataElements(String json)
        {
            try
            {

                var rootObject = JsonConvert.DeserializeObject<ChatRootObject>(json);
                foreach (Chat f in rootObject.data)
                {
                    this.chat = f;
                }

                chatOb = new ObservableCollection<Chat>(rootObject.data);
                return chat;

            }
            catch (Exception)
            {
                return null;
            }
        }
    }
}
