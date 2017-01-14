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
    class StudentResultsDataContext
    {
        public StudentResults emp { get; private set; }
        public List<StudentResults> empList { get; private set; }
        public List<int> checkValues { get; private set; }
        public string testData { get; private set; }

        public void storeMultipleElements(String json)
        {
            try
            {
                var multiRootObject = JsonConvert.DeserializeObject<StudentResultsRootObject>(json);
                this.empList = multiRootObject.data;
                addListItems(empList);
            }

            catch (Exception)
            {
                return;
            }
        }

        public async void addItem(StudentResults checkIn)
        {
            SQLiteAsyncConnection connection = new SQLiteAsyncConnection("StudentResults.db");
            await connection.InsertAsync(checkIn);
        }


        public async void addListItems(List<StudentResults> checkIn)
        {
            SQLiteAsyncConnection connection = new SQLiteAsyncConnection("StudentResults.db");
            await connection.InsertAllAsync(checkIn);
        }

        public async Task<List<StudentResults>> retrieveStudentResults()
        {
            SQLiteAsyncConnection connection = new SQLiteAsyncConnection("sma_db");
            var checkIn = await connection.Table<StudentResults>().ToListAsync();
            List<StudentResults> checkInList = checkIn;
            return checkInList;
        }
    }
}
