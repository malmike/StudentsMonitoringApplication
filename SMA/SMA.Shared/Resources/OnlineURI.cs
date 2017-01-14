using System;
using System.Collections.Generic;
using System.Text;

namespace SMA.Resources
{
    class OnlineURI
    {

        //private const string serverURI = "http://malmike21.freevar.com/UCCFieldProjectPHP/Mobile/";
        private const string serverURI = "http://localhost:14825/Mobile/";
        private const string imageURI = "http://localhost:14825/Images/";

        public string functionCalls { get; private set; }
        public string imageSource { get; private set; }

        public OnlineURI()
        {
            this.functionCalls = serverURI + "mobileFunctionCalls.php";
            this.imageSource = imageURI;
            
        }
    }
}
