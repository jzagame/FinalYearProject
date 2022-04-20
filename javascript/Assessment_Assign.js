$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "test.php",
        data: { next: "33%" },
        success: function (data) {
            document.getElementById("Assessment_content").innerHTML = data;
        }
    });
    showEmpTable();
});

$('#btn_next').click(function (e) {
    e.preventDefault();
    var progress = document.getElementById("progress_Ass").innerHTML;
    var x = $("input[name='Emp_IC']:checked").val();
    if (x != null) {
        if (progress == "33%") {
            progress = "66%";
            $("#btn_previous").css("visibility", "visible");
            $("#progress_Ass").css("width", "66%");
            $("#progress_Ass").text("66%");
            $("#btn_submit").css("visibility", "visible");
            $("#btn_next").css("visibility", "hidden");
        } else if (progress == "66%") {
            $("#progress_Ass").css("width", "100%");
            $("#progress_Ass").text("100%");
        }
        $.ajax({
            type: "POST",
            url: "test.php",
            data: { next: progress, empid: x },
            success: function (data) {
                document.getElementById("Assessment_content").innerHTML = data;
                $.ajax({
                    type: "POST",
                    url: "Assessment_plug.php",
                    data: { next: progress, num: "1" },
                    success: function (data) {
                        document.getElementById("Competencies_Card").innerHTML = data;
                    }
                });
            }
        });
    }
    else {
        window.alert("Please select an employee")
    }

});

$('#btn_previous').click(function (e) {
    e.preventDefault();
    var progress = document.getElementById("progress_Ass").innerHTML;
    if (progress == "66%") {
        progress = "33%";
        $("#btn_previous").css("visibility", "hidden");
        $("#btn_next").css("visibility", "visible");
        $("#progress_Ass").css("width", "33%");
        $("#progress_Ass").text("33%");
    }
    $.ajax({
        type: "POST",
        url: "test.php",
        data: { previous: progress },
        success: function (data) {
            document.getElementById("Assessment_content").innerHTML = data;
        }
    });
    showEmpTable()
});

function filterItems(){
    $.ajax({
        type:"POST",
        url:"Assessment_plug.php",
        data: {action:"filteritems",search:$("#Compt").val()},
        success:function(data){
            document.getElementById("Itm").innerHTML = data;
        }
    });
}

function showEmpTable() {
    $.ajax({
        type: "POST",
        url: "Assessment_plug.php",
        data: { action: "search_emp" },
        success: function (data) {
            document.getElementById("show_emp_detail").innerHTML = data;
        }
    });
}

function Search() {
    $.ajax({
        type: "POST",
        url: "Assessment_plug.php",
        data: { action: "search_emp", PID: $("#Position").val(), EID: $("#employee_id").val() },
        success: function (data) {
            document.getElementById("show_emp_detail").innerHTML = data;
        }
    });
}

$('#btn_submit').click(function(e){
    e.preventDefault();
    console.log($('#Competencies_Card').serializeArray());
    $.ajax({
        type:"POST",
        url:"Assessment_db_query.php",
        data: {action:"addcompetencies", formdata:$('#Competencies_Card').serializeArray(),EID:$("#emp_id").val()},
        success: function(data){
            
        }
    });
});
