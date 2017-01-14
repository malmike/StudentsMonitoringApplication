using System;
using System.Collections.Generic;
using System.Text;

namespace SMA.Model
{
    public class IndividualResults
    {
        public string id { get; set; }
        public string test_type { get; set; }
        public string term { get; set; }
        public string year { get; set; }
        public string marks { get; set; }
        public string grade { get; set; }
    }

    public class IndividualResultsRootObject
    {
        public List<IndividualResults> data { get; set; }
    }
}
