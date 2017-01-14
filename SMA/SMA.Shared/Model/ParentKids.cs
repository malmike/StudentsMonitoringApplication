using System;
using System.Collections.Generic;
using System.Text;

namespace SMA.Model
{
    public class ParentKids
    {
        public string sfname { get; set; }
        public string slname { get; set; }
        public string id { get; set; }
        public string student_id { get; set; }
        public string imageURI { get; set; }
        public string stream_id { get; set; }
        public string stream { get; set; }
    }
    public class ParentKidsRootObject
    {
        public List<ParentKids> data { get; set; }
    }
}
