using System;
using System.Collections.Generic;
using System.Text;

namespace SMA.Model
{
    public class StudentTestResults
    {
        public string name { get; set; }
        public string marks { get; set; }
        public string id { get; set; }
    }

    public class StudentTestResultsRootObject
    {
        public List<StudentTestResults> data { get; set; }
    }
}
