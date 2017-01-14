using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.Text;

namespace SMA.Model.DataContext
{
    class GetParentKidsData
    {
        public ObservableCollection<ParentKids> parentKidsData { get; private set; }
        public ObservableCollection<ParentKids> DataElements(String json)
        {
            try
            {

                var rootObject = JsonConvert.DeserializeObject<ParentKidsRootObject>(json);
                parentKidsData = new ObservableCollection<ParentKids>(rootObject.data);
                return parentKidsData;

            }
            catch (Exception)
            {
                return null;
            }
        }
    }
}
