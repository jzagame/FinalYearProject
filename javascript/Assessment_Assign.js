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
        $("#btn_submit").css("visibility", "hidden");
    }
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

function catSelected(num){
    console.log(num);
    var new_selection = $("#Cat" + num).find('option:selected');
    $('#Cat ' +num+ ' option').not(new_selection).removeAttr('selected');
    $("#Cat" + num + " option[value='"+$("#Cat"+ num).val() +"']").attr("selected","selected");
    $.ajax({
        type: "POST",
        url: "Assessment_plug.php",
        data: { action: "categorySelected",search: $("#Cat"+ num).val()},
        success: function (data) {
            
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
        type:"POST",
        url: "Assessment_plug.php",
        data : {action:"AddButton"},
        success:function(data){
            AddCard("",data);
        }
    })
});


function removeCard(num){
    console.log($("#Cat" + num).val());
    $.ajax({
        type:"POST",
        url:"Assessment_plug.php",
        data: {action:"removeCard",search:$("#Cat" + num).val()},
        success:function(data){
            if(data == "remove"){
                $("#card_" + num).remove();
            }else{
                window.alert("cannot remove");
            }
        }
    });
}

function FillData(EiID){
    $.ajax({
        type:"POST",
        url:"Assessment_plug.php",
        data:{action:"addHistory"},
        success:function(data){
            if(data == "full"){
                alert("Core Competencies is full, please delete 1 core competencies");
            }else if(data == "replace"){
                AddCard(EiID,data);
            }else{
                AddCard(EiID,data);
            }
        }
    });
}

function AddCard(EiID,want){
    $.ajax({
        type:"POST",
        url:"Assessment_plug.php",
        data:{next:"Comp_Card",search:EiID,for:want},
        success:function(data){
            if(want == "replace"){
                document.getElementById("Competencies_Card").innerHTML = data;
            }else{
                document.getElementById("Competencies_Card").innerHTML += data;
            }
        }
    });
}

