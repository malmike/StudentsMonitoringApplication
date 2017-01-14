using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.Text;

namespace SMA.Model.DataContext
{
    class GetTestYearsData
    {
        public ObservableCollection<TestYears> testYearData { get; private set; }
        public ObservableCollection<TestYears> DataElements(String json)
        {
            try
            {

                var rootObject = JsonConvert.DeserializeObject<YearRootObject>(json);
                testYearData = new ObservableCollection<TestYears>(rootObject.data);
                return testYearData;

            }
            catch (Exception)
            {
                return null;
            }
        }
    }
}
