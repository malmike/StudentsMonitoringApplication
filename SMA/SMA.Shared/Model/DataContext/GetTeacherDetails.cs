using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.Text;

namespace SMA.Model.DataContext
{
    class GetTeacherDetails
    {
        public Teacher teacher { get; private set; }
        public ObservableCollection<Teacher> teacherData { get; private set; }
        public ObservableCollection<Teacher> DataElements(String json)
        {
            try
            {

                var rootObject = JsonConvert.DeserializeObject<TeacherRootObject>(json);
                foreach (Teacher f in rootObject.data)
                {
                    this.teacher = f;
                }

                teacherData = new ObservableCollection<Teacher>(rootObject.data);
                return teacherData;

            }
            catch (Exception)
            {
                return null;
            }
        }
    }
}
