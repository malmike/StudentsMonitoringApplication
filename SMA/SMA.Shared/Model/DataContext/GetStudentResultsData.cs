using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.Text;

namespace SMA.Model.DataContext
{
    class GetStudentResultsData
    {
        public ObservableCollection<StudentResults> studentResultsData { get; private set; }
        public ObservableCollection<StudentResults> DataElements(String json)
        {
            try
            {

                var rootObject = JsonConvert.DeserializeObject<StudentResultsRootObject>(json);
                studentResultsData = new ObservableCollection<StudentResults>(rootObject.data);
                return studentResultsData;

            }
            catch (Exception)
            {
                return null;
            }
        }
    }
}
