$(document).ready(function () {
    DashPieQuarterSelectBox($("#dash_year").val(),$("#dash_category").val()); //show quarter in initial by the year
    PieChartData("All", $("#dash_year").val(),$("#dash_category").val()); // get piechart data in initial (all quarter in years)
    ShowPieChartDataInTableForm("All",$("#dash_year").val(),"All",$("#dash_category").val()); // set piechart right site table initial data
});

function PieChartData(type, q,category) {
    $.ajax({
        type: "POST",
        url: "dashboard_plug.php",
        data: { action: "PieChart_Data", type: type, key: q,category:category },
        success: function (data) {
            var x = JSON.parse(data);
            var label = [];
            var dataset = [];
            var i = 0;
            for (var key in x) {
                label[i] = key;
                dataset[i] = x[key];
                i++;
            }
            
            KPIChart(label, dataset); // show KPI chart in initia;
            // console.log(data);
            
        }
    });
}

function DashChangeYear() {
    document.getElementById("KPI_Chart").remove(); //canvas
    div = document.querySelector("#KPI_Chart_Container"); //canvas parent element
    div.insertAdjacentHTML("afterbegin", "<canvas id='KPI_Chart'></canvas>");
    DashPieQuarterSelectBox($("#dash_year").val(),$("#dash_category").val());
    PieChartData('All', $("#dash_year").val(),$("#dash_category").val());
}

function DashChangeCategory(){
    document.getElementById("KPI_Chart").remove(); //canvas
    div = document.querySelector("#KPI_Chart_Container"); //canvas parent element
    div.insertAdjacentHTML("afterbegin", "<canvas id='KPI_Chart'></canvas>");
    DashPieQuarterSelectBox($("#dash_year").val(),$("#dash_category").val());
    PieChartData('All', $("#dash_year").val(),$("#dash_category").val());
}

function DashPieQuarterSelectBox(year,category) {
    $.ajax({
        type: "POST",
        url: "dashboard_plug.php",
        data: { action: "dash_quarter_select_box", dash_year: year,category:category },
        success: function (data) {
            document.getElementById("dash_quarter").innerHTML = data;
        }
    });
}

function DashKPIChangeQuarter() {
    document.getElementById("KPI_Chart").remove(); //canvas
    div = document.querySelector("#KPI_Chart_Container"); //canvas parent element
    div.insertAdjacentHTML("afterbegin", "<canvas id='KPI_Chart'></canvas>");
    if($("#dash_quarter").val() == "All"){
        PieChartData("All", $("#dash_year").val(),$("#dash_category").val());
        ShowPieChartDataInTableForm("All",$("#dash_year").val(),"All",$("#dash_category").val());
    }else{
        PieChartData("qid", $("#dash_quarter").val(),$("#dash_category").val());
        ShowPieChartDataInTableForm("quarter",$("#dash_quarter").val(),"All",$("#dash_category").val());
    }
    
}

function KPIChart(labels, dataset) { // create pie chart of KPI
    const color = ["rgb(0,102,204)", "rgb(0,128,255)", "rgb(51,153,255)", "rgb(102,178,255)", "rgb(153,204,255)", "rgb(204,229,255)"];

    const data = {
        labels: labels,
        datasets: [{
            data: dataset,
            backgroundColor: color,
        }],

    };
    const options = {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
            display: false
        },
        plugins: {
            labels: [
                {
                    render: 'label',
                    fontColor: 'black',
                    fontSize: 18,
                },
                {
                    render: 'percentage',
                    fontColor: 'black',
                    fontSize: 18,
                    position: "border"
                }
            ]
        },
        onClick: function (e, items) {
            var firstPoint = this.getElementAtEvent(e)[0];
            var label = firstPoint._model.label;
            if($('#dash_quarter').val() == "All"){
                ShowPieChartDataInTableForm("All",$("#dash_year").val(),label,$("#dash_category").val());
            }else{
                ShowPieChartDataInTableForm("quarter",$("#dash_quarter").val(),label,$("#dash_category").val());
            }
            
        }
    }

    var myChart = new Chart(
        document.getElementById('KPI_Chart').getContext('2d'), {
        type: 'pie',
        data: data,
        options: options,
    });

    myChart.canvas.parentNode.style.height = '400px';
    myChart.canvas.parentNode.style.width = '400px';
}

function ShowPieChartDataInTableForm(type,key,totalcore,category){
    $.ajax({
        type:"POST",
        url:"dashboard_plug.php",
        data:{action:"ShowPieChartDataInTableForm",totalcore:totalcore,type:type,key:key,category:category},
        success:function(data){
            // console.log(data);
            document.getElementById("KPI_Table").innerHTML = data;
        }
    });
}
