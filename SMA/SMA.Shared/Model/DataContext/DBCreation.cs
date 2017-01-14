using SQLite;
using System;
using System.Collections.Generic;
using System.Text;
using System.Threading.Tasks;
using Windows.Storage;

namespace SMA.Model.DataContext
{
    class DBCreation
    {
        /// <summary>
        /// Using SQLite Database
        /// </summary>
        /// <param name="SQLite"></param>
        /// <returns></returns>


        public async Task<bool> DoesDbExist(string DatabaseName)
        {
            bool dbexist;
            try
            {
                StorageFile storageFile = await ApplicationData.Current.LocalFolder.GetFileAsync(DatabaseName);
                dbexist = true;
            }
            catch
            {
                dbexist = false;
            }

            return dbexist;
        }


        public async void CreateDatabase()
        {
            bool dbExist = await DoesDbExist("sma.db");

            if (!dbExist)
            {
                SQLiteAsyncConnection connection = new SQLiteAsyncConnection("sma.db");
                await connection.CreateTableAsync<Subject>();
                await connection.CreateTableAsync<SubjectsStudent>();
                await connection.CreateTableAsync<Teacher>();
                await connection.CreateTableAsync<TestYears>();
                await connection.CreateTableAsync<TeacherSubject>();
                await connection.CreateTableAsync<StudentTestResults>();
                await connection.CreateTableAsync<Parent>();
                await connection.CreateTableAsync<ParentKids>();
                await connection.CreateTableAsync<IndividualResults>();
                await connection.CreateTableAsync<StudentResults>();
                await connection.CreateTableAsync<StudentsSubjects>();

            }
        }

        public async void DropDatabase()
        {
            SQLiteAsyncConnection connection = new SQLiteAsyncConnection("sma.db");
            await connection.DropTableAsync<Subject>();
            await connection.DropTableAsync<SubjectsStudent>();
            await connection.DropTableAsync<Teacher>();
            await connection.DropTableAsync<TestYears>();
            await connection.DropTableAsync<TeacherSubject>();
            await connection.DropTableAsync<StudentTestResults>();
            await connection.DropTableAsync<Parent>();
            await connection.DropTableAsync<ParentKids>();
            await connection.DropTableAsync<IndividualResults>();
            await connection.DropTableAsync<StudentResults>();
            await connection.DropTableAsync<StudentsSubjects>();
        }


    }
}
