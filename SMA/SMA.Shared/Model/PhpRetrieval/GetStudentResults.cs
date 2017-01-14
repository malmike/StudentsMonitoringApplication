using System;
using System.Collections.Generic;
using System.Net.Http;
using System.Text;
using System.Threading.Tasks;

namespace SMA.Model.PhpRetrieval
{
    class GetStudentResults
    {
        private HttpClient httpClient;
        private HttpResponseMessage response;

        public GetStudentResults()
        {
            httpClient = new HttpClient();

            // Add a user-agent header
            var headers = httpClient.DefaultRequestHeaders;

            // HttpProductInfoHeaderValueCollection is a collection of 
            // HttpProductInfoHeaderValue items used for the user-agent header

            headers.UserAgent.ParseAdd("ie");
            headers.UserAgent.ParseAdd("Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; WOW64; Trident/6.0)");
        }

        public async Task<string> getDetails(string address, string testId, string subjectId, string streamId, string action)
        {
            response = new HttpResponseMessage();

            Uri resourceUri;
            if (!Uri.TryCreate(address.Trim(), UriKind.Absolute, out resourceUri))
            {
                return "Invalid URI, please re-enter a valid URI";

            }
            if (resourceUri.Scheme != "http" && resourceUri.Scheme != "https")
            {
                return "Only 'http' and 'https' schemes supported. Please re-enter URI";
            }
            // ---------- end of test---------------------------------------------------------------------

            string responseText;

            try
            {
                MultipartFormDataContent content = new MultipartFormDataContent();
                content.Add((new StringContent(testId, System.Text.Encoding.UTF8, "text/plain")), "testId");
                content.Add((new StringContent(subjectId, System.Text.Encoding.UTF8, "text/plain")), "subjectId");
                content.Add((new StringContent(action, System.Text.Encoding.UTF8, "text/plain")), "Action");
                content.Add((new StringContent(streamId, System.Text.Encoding.UTF8, "text/plain")), "streamId");
                response = await httpClient.PostAsync(resourceUri, content);
                response.EnsureSuccessStatusCode();
                responseText = await response.Content.ReadAsStringAsync();

                return responseText;

            }
            catch (Exception ex)
            {
                // Need to convert int HResult to hex string
                responseText = "Error = " + ex.HResult.ToString("X") +
                    "  Message: " + ex.Message;

                return responseText;
            }

        }
    }
}
