using Newtonsoft.Json;
using SQLite;
using System;
using System.Collections.Generic;
using System.Diagnostics;
using System.IO;
using System.Linq;
using System.Runtime.Serialization.Json;
using System.Text;
using System.Threading.Tasks;
using Windows.Storage;
using Windows.Storage.Streams;
namespace SMA.Model.DataContext
{
    class ParentKidsDataContext
    {
        public ParentKids emp { get; private set; }
        public List<ParentKids> empList { get; private set; }
        public List<int> checkValues { get; private set; }
        public string testData { get; private set; }

        public void storeMultipleElements(String json)
        {
            try
            {
                var multiRootObject = JsonConvert.DeserializeObject<ParentKidsRootObject>(json);
                this.empList = multiRootObject.data;
                addListItems(empList);
            }

            catch (Exception)
            {
                return;
            }
        }

        public async void addItem(ParentKids checkIn)
        {
            SQLiteAsyncConnection connection = new SQLiteAsyncConnection("ParentKids.db");
            await connection.InsertAsync(checkIn);
        }


        public async void addListItems(List<ParentKids> checkIn)
        {
            SQLiteAsyncConnection connection = new SQLiteAsyncConnection("ParentKids.db");
            await connection.InsertAllAsync(checkIn);
        }

        public async Task<List<ParentKids>> retrieveParentKids()
        {
            SQLiteAsyncConnection connection = new SQLiteAsyncConnection("sma_db");
            var checkIn = await connection.Table<ParentKids>().ToListAsync();
            List<ParentKids> checkInList = checkIn;
            return checkInList;
        }
    }
}
