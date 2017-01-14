using System;
using System.Collections.Generic;
using System.Text;

namespace SMA.Model
{
    public class StudentResults
    {
        public string sfname { get; set; }
        public string slname { get; set; }
        public string subject_id { get; set; }
        public string marks { get; set; }
    }

    public class StudentResultsRootObject
    {
        public List<StudentResults> data { get; set; }
    }
}
