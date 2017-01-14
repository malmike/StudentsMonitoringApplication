using Newtonsoft.Json;
using SQLite;
using System;
using System.Collections.Generic;
using System.Text;
using System.Threading.Tasks;

namespace SMA.Model.DataContext
{
    class SubjectDataContext
    {
        public Subject subject { get; private set; }
        public List<Subject> subjectList { get; private set; }
        //public List<int> checkValues { get; private set; }
        //public string testData { get; private set; }


        /// <summary>
        /// Retrieve values from JSON file containing employee check in/ out information
        /// </summary>
        /// <param name="json"></param>

        public void storeMultipleElements(String json)
        {
            try
            {
                var multiRootObject = JsonConvert.DeserializeObject<SubjectRootObject>(json);
                this.subjectList = multiRootObject.data;
                addListItems(subjectList);
            }

            catch (Exception)
            {
                return;
            }
        }

        public async void addListItems(List<Subject> subject)
        {
            SQLiteAsyncConnection connection = new SQLiteAsyncConnection("sma.db");
            await connection.InsertAllAsync(subject);
        }

        public async Task<List<Subject>> retrieveSubjects()
        {
            SQLiteAsyncConnection connection = new SQLiteAsyncConnection("sma.db");
            var subjects = await connection.Table<Subject>().ToListAsync();
            List<Subject> subjectsList = subjects;
            return subjectsList;
        }

    }
}
