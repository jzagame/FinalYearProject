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
        url:"Assessment_View_Employee_Plug.php",
        data: {action:"ShowEmpTable",search:num},
        success:function(data){
            document.getElementById("Search_Employee_table").innerHTML = data;
        }
    });
}

function EmployeeData(){
    $.ajax({
        type:"POST",
        url:"Assessment_View_Employee_Plug.php",
        data: {action:"SaveEmpTableData",search:$("#search_stf").val()},
        success:function(data){
            document.getElementById("Search_Employee_table").innerHTML = data;
        }
    });
}

function GeneratePageNumber(num){
    $.ajax({
        type:"POST",
        url:"Assessment_View_Employee_Plug.php",
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
    $.ajax({
        type:"POST",
        url:"Assessment_View_Employee_Plug.php",
        data : {action:"ViewEmpData",search:eid},
        success:function(data){
            document.getElementById("body1").innerHTML = data;
            CompetenciesList("",eid);
        }
    });
}

function CompetenciesList(year,eid){
    $.ajax({
        type:"POST",
        url:"Assessment_View_Employee_Plug.php",
        data:{action:"CompetenciesList",y:year,search:eid},
        success:function(data){
            document.getElementById("CompetenciesList").innerHTML = data;
        }
    });
}

function ViewAllCompetenciesEmp(EID,year,itmID,$i){
    $.ajax({
        type:"POST",
        url:"Assessment_View_Employee_Plug.php",
        data:{action:"ViewAllCompetenciesEmp",y:year,search:EID,ITMID:itmID},
        success:function(data){
            document.getElementById("ViewAllCompetenciesEmp_"+ $i).innerHTML= data;
        }
    });
}

function ChangeYear(eid){
    CompetenciesList($("#year_select").val(),eid);
}