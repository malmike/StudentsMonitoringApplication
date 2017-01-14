using SQLite;
using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.ComponentModel;
using System.Text;
using System.Threading.Tasks;
using Windows.Storage;

namespace SMA.Model.DataContext
{
    class ChatDataContext
    {
        public Chat chat { get; private set; }
        public List<Chat> chatList { get; private set; }
        public GetChat chatData = new GetChat();

        /// <summary>
        /// Retrieve values from JSON file containing employee check in/ out information
        /// </summary>
        /// <param name="json"></param>
        public void storeElements(String json)
        {
            chat = chatData.DataElements(json);

            addItem(chat);
        }



        /// <summary>
        /// Using SQLite Database
        /// </summary>
        /// <param name="SQLite"></param>
        /// <returns></returns>


        public async Task<bool> DoesDbExist(string DatabaseName)
        {
            bool dbexist;
            try
            {
                StorageFile storageFile = await ApplicationData.Current.LocalFolder.GetFileAsync(DatabaseName);
                dbexist = true;
            }
            catch
            {
                dbexist = false;
            }

            return dbexist;
        }


        public async void CreateDatabase()
        {
            bool dbExist = await DoesDbExist("Chat.db");

            if (!dbExist)
            {
                SQLiteAsyncConnection connection = new SQLiteAsyncConnection("Chat.db");
                await connection.CreateTableAsync<Chat>();
            }
        }



        public async void DropDatabase()
        {
            SQLiteAsyncConnection connection = new SQLiteAsyncConnection("Chat.db");
            await connection.DropTableAsync<Chat>();
        }


        public async void addItem(Chat chat)
        {
            SQLiteAsyncConnection connection = new SQLiteAsyncConnection("Chat.db");
            await connection.InsertAsync(chat);
        }


        public async void addListItems(List<Chat> chats)
        {
            SQLiteAsyncConnection connection = new SQLiteAsyncConnection("Chat.db");
            await connection.InsertAllAsync(chats);
        }

        //public async Task<List<Chat>> retrieveChat()
        //{
        //    SQLiteAsyncConnection connection = new SQLiteAsyncConnection("Chat.db");
        //    var chatL = await connection.Table<Chat>().ToListAsync();
        //    List<Chat> chatList = chatL;
        //    return chatList;
        //}

        public async Task<ObservableCollection<Chat>> retrieveChat()
        {
            try
            {
                SQLiteAsyncConnection connection = new SQLiteAsyncConnection("Chat.db");
                List<Chat> chat = await connection.Table<Chat>().ToListAsync();
                return new ObservableCollection<Chat>(chat);
            }
            catch (Exception)
            {
                return null;
            }

        }

        public event PropertyChangedEventHandler PropertyChanged;
        private void NotifyPropertyChanged(String propertyName)
        {
            PropertyChangedEventHandler handler = PropertyChanged;
            if (null != handler)
            {
                handler(this, new PropertyChangedEventArgs(propertyName));
            }
        }

    }
}
