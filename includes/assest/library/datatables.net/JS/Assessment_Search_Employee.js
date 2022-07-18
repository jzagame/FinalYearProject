$(document).ready(function(){
    EmployeeData();
    EmployeeTable(1);
    GeneratePageNumber(1);
});

$("#btn_search_emp").click(function(){
    EmployeeData();
    EmployeeTable(1);
    GeneratePageNumber(1);
});

function EmployeeTable(num){
    $.ajax({
        type:"POST",
        url:"Assessment_Search_Employee_Plug.php",
        data: {action:"ShowEmpTable",search:num},
        success:function(data){
            document.getElementById("Search_Employee_table").innerHTML = data;
        }
    });
}

function EmployeeData(){
    $.ajax({
        type:"POST",
        url:"Assessment_Search_Employee_Plug.php",
        data: {action:"SaveEmpTableData",search:$("#search_stf").val()},
        success:function(data){
            document.getElementById("Search_Employee_table").innerHTML = data;
        }
    });
}

function GeneratePageNumber(num){
    $.ajax({
        type:"POST",
        url:"Assessment_Search_Employee_Plug.php",
        data : {action:"generatePageNum",search:num},
        success:function(data){
            if(data != "no"){
                document.getElementById("pageNum").innerHTML = data;
            }
        }
    });
}

function ChangePage(num){
    EmployeeTable(num);
}

function NextPage(num){
    GeneratePageNumber(parseInt(num) + 1);
}

function PreviousPage(num){
    if(num != "1"){
        GeneratePageNumber(parseInt(num) - 1);
    }
}

function SearchEmp(eid){
    window.location.href = "../../MyProject/main/Assessment_View_Employee1.php?id="+eid;
}

function PrintPdf(){
    $.ajax({
        type:"POST",
        url:"Assessment_View_Employee_Plug.php",
        data:{action:"testpdf",text:$('#iwantprint').html()},
        success:function(data){
            window.location = "testpdf.php";
        }
    });
}