using SQLite;
using System;
using System.Collections.Generic;
using System.Text;

namespace SMA.Model
{

    public class Chat
    {
        public string UserName { get; set; }
        public string ChatId { get; set; }
        public string ImageURI { get; set; }
        public string Message { get; set; }
    }

    public class ChatRootObject
    {
        public List<Chat> data { get; set; }
    }
}
