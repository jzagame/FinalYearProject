$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "Assessment_plug.php",
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
            $("#btn_add").css("visibility", "visible");
            $("#btn_minus").css("visibility", "visible");
        } else if (progress == "66%") {
            $("#progress_Ass").css("width", "100%");
            $("#progress_Ass").text("100%");
            
        }
        $.ajax({
            type: "POST",
            url: "Assessment_plug.php",
            data: { next: progress, empid: x },
            success: function (data) {
                document.getElementById("Assessment_content").innerHTML = data;
                $.ajax({
                    type: "POST",
                    url: "Assessment_plug.php",
                    data: { next: "Comp_Card"},
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
        $("#btn_add").css("visibility", "hidden");
        $("#btn_minus").css("visibility", "hidden");
    }
    console.log(progress);
    $.ajax({
        type: "POST",
        url: "Assessment_plug.php",
        data: { previous: progress },
        success: function (data) {
            document.getElementById("Assessment_content").innerHTML = data;
            showEmpTable();
        }
    });
});


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

function filterCompetencies(a){
    $.ajax({
        type:"POST",
        url: "Assessment_plug.php",
        data: {action:"filterComp",search:$("#MajorCompetencies" + a).val()},
        success:function(data){
            document.getElementById("Compt" + a).innerHTML = data;
            // document.getElementById("MajorCompetencies").removeAttribute("onchange");
            filterItems(a);
        }
    });
}

function filterItems(a){
    $.ajax({
        type:"POST",
        url:"Assessment_plug.php",
        data: {action:"filteritems",search:$("#Compt" + a).val()},
        success:function(data){
            document.getElementById("Itm" + a).innerHTML = data;
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
    console.log($('#Form_Competencies').serializeArray());
    $.ajax({
        type:"POST",
        url:"Assessment_db_query.php",
        data: {action:"addcompetencies", formdata:$('#Form_Competencies').serializeArray(),EID:$("#emp_id").val()},
        success: function(data){
            alert(data);
        }
    });
});

$("#btn_add").click(function(){
    $.ajax({
        type: "POST",
        url: "Assessment_plug.php",
        data: { next: "Comp_Card"},
        success: function (data) {
            if(data == "no"){
                alert("Competencies Already Max");
            }else{
                document.getElementById("Competencies_Card").innerHTML += data;
            }
        }
    });
});

$("#btn_minus").click(function(){
    $.ajax({
        type: "POST",
        url: "Assessment_plug.php",
        data: { action: "remove_card"},
        success: function (data) {
            
            if(data == "no"){
                alert("Cannot remove");
            }else{
                $("#card_" + data).remove();
            }
        }
    });
});

function FillData(a){
    $.ajax({
        type: "POST",
        url: "Assessment_plug.php",
        data: { action: "Click_Add",search:a},
        success: function (data) {
            if(data == "no"){
                alert("Competencies Maximize Already");
            }else{
                document.getElementById("Competencies_Card").innerHTML += data;
            }
        }
    });
}

function checkCard(){
    $.ajax({
        type: "POST",
        url: "Assessment_plug.php",
        data: { action: "check_init_or_add"},
        success: function (data) {
            
        }
    });
}