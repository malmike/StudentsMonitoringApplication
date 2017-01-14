using System;
using System.Collections.Generic;
using System.Text;

namespace SMA.Model
{
    public class TestYears
    {
        public string year { get; set; }
    }

    public class YearRootObject
    {
        public List<TestYears> data { get; set; }
    }
}