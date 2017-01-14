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
    class IndividualResultsDataContext
    {
        public IndividualResults emp { get; private set; }
        public List<IndividualResults> empList { get; private set; }
        public List<int> checkValues { get; private set; }
        public string testData { get; private set; }
   
        public void storeMultipleElements(String json)
        {
            try
            {
                var multiRootObject = JsonConvert.DeserializeObject<IndividualResultsRootObject>(json);
                this.empList = multiRootObject.data;
                addListItems(empList);
            }

            catch (Exception)
            {
                return;
            }
        }

        public async void addItem(IndividualResults checkIn)
        {
            SQLiteAsyncConnection connection = new SQLiteAsyncConnection("IndividualResults.db");
            await connection.InsertAsync(checkIn);
        }


        public async void addListItems(List<IndividualResults> checkIn)
        {
            SQLiteAsyncConnection connection = new SQLiteAsyncConnection("IndividualResults.db");
            await connection.InsertAllAsync(checkIn);
        }

        public async Task<List<IndividualResults>> retrieveIndividualResults()
        {
            SQLiteAsyncConnection connection = new SQLiteAsyncConnection("sma_db");
            var checkIn = await connection.Table<IndividualResults>().ToListAsync();
            List<IndividualResults> checkInList = checkIn;
            return checkInList;
        }
    }
}
