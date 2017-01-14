using System;
using System.Collections.Generic;
using System.Diagnostics;
using System.Text;
using Windows.Storage;

namespace SMA.Resources
{
    class AppSettings
    {
        SharedInformation sharedInformation = SharedInformation.getInstance();
        public void storeDeviceSettings(string device)
        {
            ApplicationDataContainer localSettings = ApplicationData.Current.LocalSettings;
            localSettings.Values["Device"] = device;
        }

        public string retrieveDeviceSettings()
        {
            ApplicationDataContainer localSettings = ApplicationData.Current.LocalSettings;
            if (localSettings.Values.ContainsKey("Device"))
            {
                return localSettings.Values["Device"].ToString();
            }

            else
            {
                return null;
            }

        }

        public void storeUserSettings(string json)
        {

            ApplicationDataContainer localSettings = ApplicationData.Current.LocalSettings;
            localSettings.Values["userDetails"] = json;
        }

        public string retrieveUserSettings()
        {
            ApplicationDataContainer localSettings = ApplicationData.Current.LocalSettings;
            if (localSettings.Values.ContainsKey("userDetails"))
            {
                return localSettings.Values["userDetails"].ToString();
            }

            else
            {
                return null;
            }

        }

        public bool verifyRegistrationSettings()
        {
            ApplicationDataContainer localSettings = ApplicationData.Current.LocalSettings;
            try
            {
                if (localSettings.Values.ContainsKey("userDetails"))
                {
                    return true;
                }
                else
                {
                    return false;
                }

            }
            catch
            {
                return false;
            }

        }

        public void storeUser(string user)
        {

            ApplicationDataContainer localSettings = ApplicationData.Current.LocalSettings;
            localSettings.Values["user"] = user;
        }

        public string retrieveUser()
        {
            ApplicationDataContainer localSettings = ApplicationData.Current.LocalSettings;
            if (localSettings.Values.ContainsKey("user"))
            {
                return localSettings.Values["user"].ToString();
            }

            else
            {
                return null;
            }

        }

        public void storeIndividualResults(string json)
        {

            ApplicationDataContainer localSettings = ApplicationData.Current.LocalSettings;
            localSettings.Values["individualResults"] = json;
        }

        public string retrieveIndividualResults()
        {
            ApplicationDataContainer localSettings = ApplicationData.Current.LocalSettings;
            if (localSettings.Values.ContainsKey("individualResults"))
            {
                return localSettings.Values["individualResults"].ToString();
            }

            else
            {
                return null;
            }

        }

        public void storeParentKids(string json)
        {

            ApplicationDataContainer localSettings = ApplicationData.Current.LocalSettings;
            localSettings.Values["parentKids"] = json;
        }

        public string retrieveParentKids()
        {
            ApplicationDataContainer localSettings = ApplicationData.Current.LocalSettings;
            if (localSettings.Values.ContainsKey("parentKids"))
            {
                return localSettings.Values["parentKids"].ToString();
            }

            else
            {
                return null;
            }

        }

        public void storePushURISettings(string pushURI)
        {
            ApplicationDataContainer localSettings = ApplicationData.Current.LocalSettings;
            localSettings.Values["PushURI"] = pushURI;
        }

        public string retrievePushURISettings()
        {
            ApplicationDataContainer localSettings = ApplicationData.Current.LocalSettings;
            if (localSettings.Values.ContainsKey("PushURI"))
            {
                return localSettings.Values["PushURI"].ToString();
            }

            else
            {
                return null;
            }

        }

        public void storeStudentResults(string json)
        {

            ApplicationDataContainer localSettings = ApplicationData.Current.LocalSettings;
            localSettings.Values["studentResults"] = json;
        }

        public string retrieveStudentResults()
        {
            ApplicationDataContainer localSettings = ApplicationData.Current.LocalSettings;
            if (localSettings.Values.ContainsKey("studentResults"))
            {
                return localSettings.Values["studentResults"].ToString();
            }

            else
            {
                return null;
            }

        }

        public void storeStudentsSubjects(string json)
        {

            ApplicationDataContainer localSettings = ApplicationData.Current.LocalSettings;
            localSettings.Values["studentsSubjects"] = json;
        }

        public string retrieveStudentsSubjects()
        {
            ApplicationDataContainer localSettings = ApplicationData.Current.LocalSettings;
            if (localSettings.Values.ContainsKey("studentsSubjects"))
            {
                return localSettings.Values["studentsSubjects"].ToString();
            }

            else
            {
                return null;
            }

        }

        public void storeStudentTestResults(string json)
        {

            ApplicationDataContainer localSettings = ApplicationData.Current.LocalSettings;
            localSettings.Values["studentTestResults"] = json;
        }

        public string retrieveStudentTestResults()
        {
            ApplicationDataContainer localSettings = ApplicationData.Current.LocalSettings;
            if (localSettings.Values.ContainsKey("studentTestResults"))
            {
                return localSettings.Values["studentTestResults"].ToString();
            }

            else
            {
                return null;
            }

        }

        public void storeSubject(string json)
        {

            ApplicationDataContainer localSettings = ApplicationData.Current.LocalSettings;
            localSettings.Values["subject"] = json;
        }

        public string retrieveSubject()
        {
            ApplicationDataContainer localSettings = ApplicationData.Current.LocalSettings;
            if (localSettings.Values.ContainsKey("subject"))
            {
                return localSettings.Values["subject"].ToString();
            }

            else
            {
                return null;
            }

        }

        public void storeSubjectsStudent(string json)
        {

            ApplicationDataContainer localSettings = ApplicationData.Current.LocalSettings;
            localSettings.Values["subjectsStudent"] = json;
        }

        public string retrieveSubjectStudent()
        {
            ApplicationDataContainer localSettings = ApplicationData.Current.LocalSettings;
            if (localSettings.Values.ContainsKey("subjectsStudent"))
            {
                return localSettings.Values["subjectsStudent"].ToString();
            }

            else
            {
                return null;
            }

        }

        public void storeTeacherSubject(string json)
        {

            ApplicationDataContainer localSettings = ApplicationData.Current.LocalSettings;
            localSettings.Values["teacherSubject"] = json;
        }

        public string retrieveTeacherSubject()
        {
            ApplicationDataContainer localSettings = ApplicationData.Current.LocalSettings;
            if (localSettings.Values.ContainsKey("teacherSubject"))
            {
                return localSettings.Values["teacherSubject"].ToString();
            }

            else
            {
                return null;
            }

        }

        public void storeTestYears(string json)
        {

            ApplicationDataContainer localSettings = ApplicationData.Current.LocalSettings;
            localSettings.Values["testYears"] = json;
        }

        public string retrieveTestYears()
        {
            ApplicationDataContainer localSettings = ApplicationData.Current.LocalSettings;
            if (localSettings.Values.ContainsKey("testYears"))
            {
                return localSettings.Values["testYears"].ToString();
            }

            else
            {
                return null;
            }

        }

        public void storeTest(string json)
        {

            ApplicationDataContainer localSettings = ApplicationData.Current.LocalSettings;
            localSettings.Values["test"] = json;
        }

        public string retrieveTest()
        {
            ApplicationDataContainer localSettings = ApplicationData.Current.LocalSettings;
            if (localSettings.Values.ContainsKey("test"))
            {
                return localSettings.Values["test"].ToString();
            }

            else
            {
                return null;
            }

        }

        public void storeChatNumber(int number)
        {

            ApplicationDataContainer localSettings = ApplicationData.Current.LocalSettings;
            localSettings.Values["chatNumber"] = number;
        }
        public int retrieveChatNumber()
        {
            ApplicationDataContainer localSettings = ApplicationData.Current.LocalSettings;
            if (localSettings.Values.ContainsKey("chatNumber"))
            {
                return Int32.Parse(localSettings.Values["chatNumber"].ToString());
            }

            else
            {
                return 0;
            }

        }

        public void storeChat(string json)
        {
            String chat = "Chat" + sharedInformation.number;
            ApplicationDataContainer localSettings = ApplicationData.Current.LocalSettings;
            localSettings.Values[chat] = json;
        }
        public string retrieveChat(string chat)
        {
            ApplicationDataContainer localSettings = ApplicationData.Current.LocalSettings;
            if (localSettings.Values.ContainsKey(chat))
            {
                return localSettings.Values[chat].ToString();
            }

            else
            {
                return null;
            }

        }
    }
}
