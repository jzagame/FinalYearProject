$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "Assessment_plug.php",
        data: { next: "33%" },
        success: function (data) {
            document.getElementById("Assessment_content").innerHTML = data;
        }
    });
    formEmpTableData();
    paginationEmp(1);
});

function paginationEmp(num){
    $.ajax({
        type:"POST",
        url:"Assessment_plug.php",
        data: {action:"genEmpPageBar",search:num},
        success:function(data){
            document.getElementById("pagination_emp").innerHTML = data;
        }
    });
}


$('#btn_next').click(function (e) {
    e.preventDefault();
    var progress = document.getElementById("progress_Ass").innerHTML;
    var x = $("input[name='Emp_IC']:checked").val();
    if (x != null) {
        if (progress == "33%") {
            progress = "66%";
            $("#btn_previous").css("display", "initial");
            $("#progress_Ass").css("width", "66%");
            $("#progress_Ass").text("66%");
            $("#btn_submit").css("display", "initial");
            $("#btn_next").css("display", "none");
            $("#btn_add").css("display", "initial");
            $("#btn_minus").css("display", "initial");
            $('#btn_add_container').css("display", "initial");
            $('#pagination_emp_container').css("display", "none");
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
        $("#btn_previous").css("display", "none");
        $("#btn_next").css("display", "initial");
        $("#progress_Ass").css("width", "33%");
        $("#progress_Ass").text("33%");
        $("#btn_add").css("display", "none");
        $("#btn_submit").css("display", "none");
        $('#btn_add_container').css("display", "none");
        $('#pagination_emp_container').css("display", "flex");
    }
    $.ajax({
        type: "POST",
        url: "Assessment_plug.php",
        data: { previous: progress },
        success: function (data) {
            document.getElementById("Assessment_content").innerHTML = data;
        }
    });
    paginationEmp(1);
    showEmpTable(1);
});


function formEmpTableData() {
    $.ajax({
        type: "POST",
        url: "Assessment_plug.php",
        data: { action: "search_emp" },
        success: function (data) {
            showEmpTable(1);
        }
    });
}

function showEmpTable(num){
    $.ajax({
        type: "POST",
        url: "Assessment_plug.php",
        data: { action: "generateEmpTbl",search:num },
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
            var new_selection = $("#MajorCompetencies" + a).find('option:selected');
            $('#MajorCompetencies' +a+ ' option').not(new_selection).removeAttr('selected');
            $("#MajorCompetencies" + a + " option[value='"+$("#MajorCompetencies"+ a).val() +"']").attr("selected","selected");
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
            var new_selection = $("#MajorCompetencies" + a).find('option:selected');
            $('#MajorCompetencies' +a+ ' option').not(new_selection).removeAttr('selected');
            $("#MajorCompetencies" + a + " option[value='"+$("#MajorCompetencies"+ a).val() +"']").attr("selected","selected");
        }
    });
}

function filterTarget(a){

}

function catSelected(num){
    console.log(num);
    var new_selection = $("#Cat" + num).find('option:selected');
    $('#Cat' +num+ ' option').not(new_selection).removeAttr('selected');
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
            paginationEmp(1);
            showEmpTable(1);
        }
    });
}

$('#btn_submit').click(function(e){
    e.preventDefault();
    $.ajax({
        type:"POST",
        url:"Assessment_db_query.php",
        data: {action:"addcompetencies", formdata:$('#Form_Competencies').serialize(),EID:$("#emp_id").val()},
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

function EmpNextPage(num){
    paginationEmp(num);
    showEmpTable(num);
}

function SelectQuarter(a){
    var new_selection = $("#Quarter" + a).find('option:selected');
    $('#Quarter' +a+ ' option').not(new_selection).removeAttr('selected');
    $("#Quarter" + a + " option[value='"+$("#Quarter"+ a).val() +"']").attr("selected","selected");
}
