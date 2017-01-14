using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.Text;

namespace SMA.Model.DataContext
{
    class GetSubjectData
    {
        public ObservableCollection<Subject> subjectData { get; private set; }
        public ObservableCollection<Subject> DataElements(String json)
        {
            try
            {

                var rootObject = JsonConvert.DeserializeObject<SubjectRootObject>(json);
                subjectData = new ObservableCollection<Subject>(rootObject.data);
                return subjectData;

            }
            catch (Exception)
            {
                return null;
            }
        }
    }
}
