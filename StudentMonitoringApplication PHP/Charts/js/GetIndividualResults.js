function getIndividualMarksData(studentId, subjectId) {
    var returned_data = "";

    $.ajax({
        type: "POST",
        url: "../ajaxSource/ajaxFunctionCalls.php",
        async: false,
        data: { Action: "IndividualResults", studentId: studentId, subjectId: subjectId },
        success: function (result) {
            returned_data = result;
            //console.log('result: ' + returned_data);
        }
    });

    alert(returned_data);
    return returned_data;
}

function getAverageMarksData(streamId, subjectId){
    var returned_data = "";

    $.ajax({
        type: "POST",
        url: "../ajaxSource/ajaxFunctionCalls.php",
        async: false,
        data: { Action: "Average", streamId: streamId, subjectId: subjectId },
        success: function (result) {
            returned_data = result;
            //console.log('result: ' + returned_data);
        }
    });

    alert(returned_data);
    return returned_data;
}