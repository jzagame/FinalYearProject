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
            // var new_selection = $("#MajorCompetencies" + a).find('option:selected');
            // $('#MajorCompetencies' +a+ ' option').not(new_selection).removeAttr('selected');
            // $("#MajorCompetencies" + a + " option[value='"+$("#MajorCompetencies"+ a).val() +"']").attr("selected","selected");
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
            ItemSelected(a);
            // var new_selection = $("#MajorCompetencies" + a).find('option:selected');
            // $('#MajorCompetencies' +a+ ' option').not(new_selection).removeAttr('selected');
            // $("#MajorCompetencies" + a + " option[value='"+$("#MajorCompetencies"+ a).val() +"']").attr("selected","selected");
        }
    });
}

function ItemSelected(a){
    $.ajax({
        type:"POST",
        url:"Assessment_plug.php",
        data: {action:"targetItemDescForTarget",search:$("#Itm" + a).val()},
        success:function(data){
            document.getElementById("target" + a).innerHTML = data;
            filterTarget(a);
        }
    });
    $.ajax({
        type:"POST",
        url:"Assessment_plug.php",
        data: {action:"targetItemDescForScore",search:$("#Itm" + a).val()},
        success:function(data){
            document.getElementById("score" + a).innerHTML = data;
            filterTarget(a);
        }
    });
}

function filterTarget(a){
    
    var new_selection = $("#target" + a).find('option:selected');
    $('#target' +a+ ' option').not(new_selection).removeAttr('selected');
    $("#target" + a + " option[value='"+$("#target"+ a).val() +"']").attr("selected","selected");
}

function Search() {
    $.ajax({
        type: "POST",
        url: "Assessment_plug.php",
        data: { action: "search_emp", EID: $("#employee_id").val() },
        success: function (data) {
            showEmpTable(1);
            paginationEmp(1);
            
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
            // console.log($("#emp_id").val());
            // SearchEmp($("#emp_id").val());
            window.location.href = "Assessment_View_Employee1.php?id=" + $("#emp_id").val();
            // console.log(data);
        }
    });
});

$("#btn_add").click(function(e){
    e.preventDefault();
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
    // console.log($("#Cat" + num).val());
    $.ajax({
        type:"POST",
        url:"Assessment_plug.php",
        data: {action:"removeCard",search:$("#Cat" + num).val(),Num:num},
        success:function(data){
            if(data == "remove"){
                $("#card_" + num).remove();
            }else{
                window.alert("cannot remove");
            }
        }
    });
}

function FillData(EiID,category){
    $.ajax({
        type:"POST",
        url:"Assessment_plug.php",
        data:{action:"addHistory",cat:category},
        success:function(data){
            AddCard(EiID,data);
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
                document.getElementById("Competencies_Card").insertAdjacentHTML("beforeend",data);
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
    checkExist(a);
}

function checkExist(num){
    $.ajax({
        type:"POST",
        url:"Assessment_plug.php",
        data : {action:"checkExist",catgy:$("#Cat" + num).val(),qutr:$("#quarter"+num).val(),itms:$("#Itm" + num).val(),search:$("#emp_id").val()},
        success:function(data){

        }
    });
}

function AddNewActionPlan(num){
    $.ajax({
        type:"POST",
        url:"Assessment_plug.php",
        data : {action:"AddCardActionPlan",cardnum : num},
        success:function(data){
            document.getElementById("cardAP_" + num).insertAdjacentHTML("beforeend",data);
        }
    });
}

function removeCardAP(num,num_start){
    $.ajax({
        type:"POST",
        url:"Assessment_plug.php",
        data: {action:"removeCardAP",Num:num,n_start:num_start},
        success:function(){
            $("#cardAP_IN"+num).remove();
        }
    });
}

function SearchPassingData(){
    $.ajax({
        type:"POST",
        url:"Assessment_plug.php",
        data:{action:"InEdit_Search_Emp",selected_year:$("#edit_year").val(),selected_quarter:$("#edit_quarter").val(),empid:$("#emp_id").val()},
        success:function(data){
            document.getElementById("Quarter_Core").innerHTML = data;
        }
    });
}