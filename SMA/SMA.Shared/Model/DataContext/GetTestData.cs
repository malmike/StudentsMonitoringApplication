using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.Text;

namespace SMA.Model.DataContext
{
    class GetTestData
    {
        public Test test { get; private set; }
        public ObservableCollection<Test> testData { get; private set; }
        public ObservableCollection<Test> DataElements(String json)
        {
            try
            {

                var rootObject = JsonConvert.DeserializeObject<TestRootObject>(json);
                foreach (Test f in rootObject.data)
                {
                    this.test = f;
                }
                testData = new ObservableCollection<Test>(rootObject.data);
                return testData;

            }
            catch (Exception)
            {
                return null;
            }
        }
    }
}
