$(document).ready(function(){
    CompetenciesList("",$("#emp_id").text());
});

function CompetenciesList(year,eid){
    $.ajax({
        type:"POST",
        url:"Assessment_View_Employee_Plug.php",
        data:{action:"CompetenciesList",y:year,search:eid},
        success:function(data){
            document.getElementById("CompetenciesList").innerHTML = data;
            QuarterReport(year);
        }
    });
}

function ViewAllCompetenciesEmp(EID,year,itmID,$i){
    $.ajax({
        type:"POST",
        url:"Assessment_View_Employee_Plug.php",
        data:{action:"ViewAllCompetenciesEmp",y:year,search:EID,ITMID:itmID},
        success:function(data){
            var x = "btnExpandHide_"+$i;
            if($("#"+x).text() === "Expand"){
                document.getElementById(x).text = "Hide";
            }else{
                document.getElementById(x).text = "Expand";
            }
            document.getElementById("ViewAllCompetenciesEmp_"+ $i).innerHTML= data;
        }
    });
}

function ChangeYear(eid){
    CompetenciesList($("#year_select").val(),eid);
    QuarterReport($("#year_select").val());
}

function PrintPdf(empid){
    // window.location.href = "testpdf.php?id="+empid;
    window.open("testpdf.php?id="+empid+"&quarter="+$("#report_quarter").val()+"&year="+$("#year_select").val());
}

function QuarterReport(year){
    $.ajax({
        type:"POST",
        url:"Assessment_View_Employee_Plug.php",
        data:{action:"ReportQuarterSelect",year_select:year},
        success:function(data){
            document.getElementById("report_quarter").innerHTML = data;
        }
    });
}

function KeyInQuarterReport(empid){
    window.location.href = "Assessment_Quarter_Report.php?id="+empid+"&quarter="+$("#report_quarter").val();
}