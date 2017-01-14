using System;
using System.Collections.Generic;
using System.Text;

namespace SMA.Model
{
    public class Test
    {
        public int id { get; set; }
        public string test_type { get; set; }
        public string year { get; set; }
        public string term { get; set; }
    }

    public class TestRootObject
    {
        public List<Test> data { get; set; }
    }
}