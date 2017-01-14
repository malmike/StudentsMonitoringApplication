using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.Text;

namespace SMA.Model.DataContext
{
    class GetTeacherSubjectData
    {
        public ObservableCollection<TeacherSubject> teacherSubjectData { get; private set; }
        public ObservableCollection<TeacherSubject> DataElements(String json)
        {
            try
            {

                var rootObject = JsonConvert.DeserializeObject<TeacherSubjectRootObject>(json);
                teacherSubjectData = new ObservableCollection<TeacherSubject>(rootObject.data);
                return teacherSubjectData;

            }
            catch (Exception)
            {
                return null;
            }
        }
    }
}
