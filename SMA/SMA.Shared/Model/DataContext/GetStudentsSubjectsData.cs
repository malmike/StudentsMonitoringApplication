using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.Text;

namespace SMA.Model.DataContext
{
    class GetStudentsSubjectsData
    {
        public ObservableCollection<StudentsSubjects> studentsSubjectsData { get; private set; }
        public ObservableCollection<StudentsSubjects> DataElements(String json)
        {
            try
            {

                var rootObject = JsonConvert.DeserializeObject<StudentsSubjectsRootObject>(json);
                studentsSubjectsData = new ObservableCollection<StudentsSubjects>(rootObject.data);
                return studentsSubjectsData;

            }
            catch (Exception)
            {
                return null;
            }
        }
    }
}
