using System;
using System.Collections.Generic;
using System.Text;

namespace SMA.Model
{
    public class StudentsSubjects
    {
        public string id { get; set; }
        public string sfname { get; set; }
        public string slname { get; set; }
        public string name { get; set; }
        public string imageURI { get; set; }
    }

    public class StudentsSubjectsRootObject
    {
        public List<StudentsSubjects> data { get; set; }
    }
}
