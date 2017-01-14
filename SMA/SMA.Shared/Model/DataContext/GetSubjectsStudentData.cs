using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.Text;

namespace SMA.Model.DataContext
{
    class GetSubjectsStudentData
    {
        public ObservableCollection<SubjectsStudent> subjectsStudentData { get; private set; }
        public ObservableCollection<SubjectsStudent> DataElements(String json)
        {
            try
            {

                var rootObject = JsonConvert.DeserializeObject<SubjectsStudentRootObject>(json);
                subjectsStudentData = new ObservableCollection<SubjectsStudent>(rootObject.data);
                return subjectsStudentData;

            }
            catch (Exception)
            {
                return null;
            }
        }
    }
}
