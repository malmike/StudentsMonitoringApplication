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
    class StudentsSubjectsDataContext
    {
        public StudentsSubjects emp { get; private set; }
        public List<StudentsSubjects> empList { get; private set; }
        public List<int> checkValues { get; private set; }
        public string testData { get; private set; }

        public void storeMultipleElements(String json)
        {
            try
            {
                var multiRootObject = JsonConvert.DeserializeObject<StudentsSubjectsRootObject>(json);
                this.empList = multiRootObject.data;
                addListItems(empList);
            }

            catch (Exception)
            {
                return;
            }
        }

        public async void addItem(StudentsSubjects checkIn)
        {
            SQLiteAsyncConnection connection = new SQLiteAsyncConnection("StudentsSubjects.db");
            await connection.InsertAsync(checkIn);
        }


        public async void addListItems(List<StudentsSubjects> checkIn)
        {
            SQLiteAsyncConnection connection = new SQLiteAsyncConnection("StudentsSubjects.db");
            await connection.InsertAllAsync(checkIn);
        }

        public async Task<List<StudentsSubjects>> retrieveStudentsSubjects()
        {
            SQLiteAsyncConnection connection = new SQLiteAsyncConnection("sma_db");
            var checkIn = await connection.Table<StudentsSubjects>().ToListAsync();
            List<StudentsSubjects> checkInList = checkIn;
            return checkInList;
        }
    }
}
