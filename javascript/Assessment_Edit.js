$(document).ready(function(){
    showEmpDetail();
});

function showEmpDetail(){
    $.ajax({
        type:"POST",
        url:"Assessment_Amend_plug.php",
        data: {action:"show_emp_table"},
        success:function(data){
            document.getElementById("View_Employee_Item").innerHTML = data;
        }
    })
}

function EditAssessment(a){
    $.ajax({
        type:"POST",
        url:"Assessment_Amend_plug.php",
        data: {action:"Edit_Emp_Item",search:a},
        success:function(data){
            document.getElementById("Edit_Emp_Item").innerHTML = data;
        }
    });
}

$("#btn_edit_assess").click(function(e){
    e.preventDefault();
    console.log($("#Edit_Emp_Item").serializeArray());
    $.ajax({
        type:"POST",
        url: "Assessment_db_query.php",
        data: {action:"Edit_Emp_Item_Detail",formdata:$("#Edit_Emp_Item").serializeArray()},
        success:function(data){
            document.getElementById("Edit_Emp_Item").innerHTML = "Successfully updated";
            showEmpDetail();
        }
    });
});

$("#btn_tbl_emp_search").click(function(e){
    $.ajax({
        type:"POST",
        url:"Assessment_Amend_plug.php",
        data: {action:"show_emp_table",search:$("#emp_search_key").val()},
        success:function(data){
            document.getElementById("View_Employee_Item").innerHTML = data;
        }
    })
});