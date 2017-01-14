using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.Text;

namespace SMA.Model.DataContext
{
    class GetIndividualResultsData
    {
        public ObservableCollection<IndividualResults> individualResultsData { get; private set; }
        public ObservableCollection<IndividualResults> DataElements(String json)
        {
            try
            {

                var rootObject = JsonConvert.DeserializeObject<IndividualResultsRootObject>(json);
                individualResultsData = new ObservableCollection<IndividualResults>(rootObject.data);
                return individualResultsData;

            }
            catch (Exception)
            {
                return null;
            }
        }
    }
}
