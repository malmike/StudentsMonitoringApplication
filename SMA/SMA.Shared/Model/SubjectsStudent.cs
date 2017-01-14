using System;
using System.Collections.Generic;
using System.Text;

namespace SMA.Model
{
    public class SubjectsStudent
    {
        public string id { get; set; }
        public string code { get; set; }
        public string name { get; set; }
    }

    public class SubjectsStudentRootObject
    {
        public List<SubjectsStudent> data { get; set; }
    }
}
