using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.Text;

namespace SMA.Model.DataContext
{
    class GetStudentTestResultsData
    {
        public ObservableCollection<StudentTestResults> studentTestResultsData { get; private set; }
        public ObservableCollection<StudentTestResults> DataElements(String json)
        {
            try
            {

                var rootObject = JsonConvert.DeserializeObject<StudentTestResultsRootObject>(json);
                studentTestResultsData = new ObservableCollection<StudentTestResults>(rootObject.data);
                return studentTestResultsData;

            }
            catch (Exception)
            {
                return null;
            }
        }
    }
}
