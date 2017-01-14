using System;
using System.Collections.Generic;
using System.Text;

namespace SMA.Model
{
    public class Teacher
    {
        public string id { get; set; }
        public string teacher_id { get; set; }
        public string name { get; set; }
        public string phone_number { get; set; }
        public string email { get; set; }
        public string status { get; set; }
        public string password { get; set; }
        public string imageURI { get; set; }
    }

    public class TeacherRootObject
    {
        public List<Teacher> data { get; set; }
    }

}
