using SMA.Model;
using SMA.Model.DataContext;
using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.Diagnostics;
using System.Text;

namespace SMA.Resources
{
    class SharedInformation
    {
        public int number { get; set; }
        private static SharedInformation instance = new SharedInformation();
        private AppSettings appSettings = new AppSettings();
        public Teacher teacherData { get; private set; }
        public Parent parentData { get; private set; }
        public GetParentDetails getParentDetails = new GetParentDetails();
        public GetTeacherDetails getTeacherDetails = new GetTeacherDetails();
        public ObservableCollection<Teacher> teacherDetails { get; private set; }
        public ObservableCollection<Parent> parentDetails { get; private set; }

        public GetParentKidsData getParentKids = new GetParentKidsData();
        public ObservableCollection<ParentKids> parentKids { get; private set; }
        public ParentKids kid { get; private set; }

        public GetSubjectsStudentData getSubjectsStudent = new GetSubjectsStudentData();
        public ObservableCollection<SubjectsStudent> subjectsS { get; private set; }
        public SubjectsStudent subjectsStudent { get; private set; }

        public GetTeacherSubjectData getTeacherSubject = new GetTeacherSubjectData();
        public ObservableCollection<TeacherSubject> teacherSubject { get; private set; }
        public TeacherSubject tSubject { get; private set; }

        public GetStudentsSubjectsData getStudentsSubjects = new GetStudentsSubjectsData();
        public ObservableCollection<StudentsSubjects> studentsS { get; private set; }
        public StudentsSubjects studentsSubject { get; private set; }
       
        public GetIndividualResultsData getIndividualResults = new GetIndividualResultsData();
        public ObservableCollection<IndividualResults> individualResults { get; private set; }

        public GetIndividualResultsData getStreamAverageResults = new GetIndividualResultsData();
        public ObservableCollection<IndividualResults> streamAverageResults { get; private set; }

        public GetTestData testData = new GetTestData();
        public ObservableCollection<Test> testDetails { get; private set; }
        public Test test { get; private set; }

        public GetStudentTestResultsData studentTestResultData = new GetStudentTestResultsData();
        public ObservableCollection<StudentTestResults> studentTestResults { get; private set; }

        public GetStudentResultsData studentResultData = new GetStudentResultsData();
        public ObservableCollection<StudentResults> studentResults { get; private set; }

        public ObservableCollection<Chat> chatList { get; set; }
        public GetChat getChat = new GetChat();

        public string chat { get; set; }

        public string pushURI { get; set; }

        private SharedInformation() { }

        public static SharedInformation getInstance()
        {
            return instance;
        }


        public void storePushURI(string pushURI)
        {
            appSettings = new AppSettings();
            appSettings.storePushURISettings(pushURI);
        }

        public void retrieveUserDetails()
        {
            if (appSettings.retrieveUser().Equals("Parent"))
            {
                this.parentDetails = getParentDetails.DataElements(appSettings.retrieveUserSettings());
                parentData = getParentDetails.parent;
            }
            else if (appSettings.retrieveUser().Equals("Teacher"))
            {
                this.teacherDetails = getTeacherDetails.DataElements(appSettings.retrieveUserSettings());
                teacherData = getTeacherDetails.teacher;
            }
                
        }

        public void retrieveParentKids()
        {
            this.parentKids = getParentKids.DataElements(appSettings.retrieveParentKids());
        }

        public void saveKid(ParentKids kid)
        {
            this.kid = kid;
        }

        public void retrieveSubjectsStudent()
        {
            this.subjectsS = getSubjectsStudent.DataElements(appSettings.retrieveSubjectStudent());
        }

        public void saveSubjectsStudent(SubjectsStudent subject)
        {
            this.subjectsStudent = subject;
        }

        public void retrieveIndividualResults()
        {
            this.individualResults = getIndividualResults.DataElements(appSettings.retrieveIndividualResults());
        }

        public void retrieveStreamAverageResults()
        {
            this.streamAverageResults = getStreamAverageResults.DataElements(appSettings.retrieveIndividualResults());
        }

        public void retrieveTest()
        {
            this.testDetails = testData.DataElements(appSettings.retrieveTest());
            this.test = testData.test;
        }

        public void retrieveStudentTestResults()
        {
            this.studentTestResults = studentTestResultData.DataElements(appSettings.retrieveStudentTestResults());
        }

        public void retrieveStudentResults()
        {
            this.studentResults = studentResultData.DataElements(appSettings.retrieveStudentResults());
        }

        public void retreiveTeacherSubject()
        {
            this.teacherSubject = getTeacherSubject.DataElements(appSettings.retrieveTeacherSubject());
        }

        public void saveTeacherSubject(TeacherSubject teacherSubject)
        {
            this.tSubject = teacherSubject;
        }

        public void saveStudentsSubject(StudentsSubjects student)
        {
            this.studentsSubject = student;
        }
        public void retrieveStudentsSubjects()
        {
            this.studentsS = getStudentsSubjects.DataElements(appSettings.retrieveStudentsSubjects());
        }

        public ObservableCollection<Chat> getChatsList()
        {
            ObservableCollection<Chat> chating = new ObservableCollection<Chat>(); 
            for (int i = 0; i < number; i++)
            {
                Chat chatSample = new Chat();
                int r = 1;
                String json = appSettings.retrieveChat("Chat" + r);
                chatSample = getChat.DataElements(json);
                if(chatSample != null)
                {
                    chating.Add(chatSample);
                }
                r++;
                
            }
            this.chatList = chating;
            return chating;
        }
    }
}
