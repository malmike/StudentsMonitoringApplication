using System;
using System.Collections.Generic;
using System.Text;

namespace SMA.Model
{
    public class TeacherSubject
    {
        public string stream_id { get; set; }
        public string stream { get; set; }
        public string teacher_id { get; set; }
        public string subject_id { get; set; }
        public string name { get; set; }
    }

    public class TeacherSubjectRootObject
    {
        public List<TeacherSubject> data { get; set; }
    }

}
