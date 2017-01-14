using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.Text;

namespace SMA.Model.DataContext
{
    class GetParentDetails
    {
        public Parent parent { get; private set; }
        public ObservableCollection<Parent> parentData { get; private set; }
        public ObservableCollection<Parent> DataElements(String json)
        {
            try
            {

                var rootObject = JsonConvert.DeserializeObject<ParentRootObject>(json);
                foreach (Parent f in rootObject.data)
                {
                    this.parent = f;
                }

                parentData = new ObservableCollection<Parent>(rootObject.data);
                return parentData;

            }
            catch (Exception)
            {
                return null;
            }
        }
    }
}
