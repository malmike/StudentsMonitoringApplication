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
    class TeacherDataContext
    {
        public Teacher emp { get; private set; }
        public List<Teacher> empList { get; private set; }
        public List<int> checkValues { get; private set; }
        public string testData { get; private set; }

        public void storeMultipleElements(String json)
        {
            try
            {
                var multiRootObject = JsonConvert.DeserializeObject<TeacherRootObject>(json);
                this.empList = multiRootObject.data;
                addListItems(empList);
            }

            catch (Exception)
            {
                return;
            }
        }

        public async void addItem(Teacher checkIn)
        {
            SQLiteAsyncConnection connection = new SQLiteAsyncConnection("Teacher.db");
            await connection.InsertAsync(checkIn);
        }


        public async void addListItems(List<Teacher> checkIn)
        {
            SQLiteAsyncConnection connection = new SQLiteAsyncConnection("Teacher.db");
            await connection.InsertAllAsync(checkIn);
        }

        public async Task<List<Teacher>> retrieveTeacherData()
        {
            SQLiteAsyncConnection connection = new SQLiteAsyncConnection("sma_db");
            var checkIn = await connection.Table<Teacher>().ToListAsync();
            List<Teacher> checkInList = checkIn;
            return checkInList;
        }
    }
}
