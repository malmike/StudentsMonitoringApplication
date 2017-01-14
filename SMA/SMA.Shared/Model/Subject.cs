using System;
using System.Collections.Generic;
using System.Text;

namespace SMA.Model
{
    public class Subject
    {
        public string id { get; set; }
        public string code { get; set; }
        public string name { get; set; }
        public string number_of_papers { get; set; }
    }

    public class SubjectRootObject
    {
        public List<Subject> data { get; set; }
    }
}
