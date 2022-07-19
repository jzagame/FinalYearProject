$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "Assessment_plug.php",
        data: { next: "ShowEmployeeTable" },
        success: function (data) {
            document.getElementById("Assessment_content").innerHTML = data;
        }
    });
    formEmpTableData();
    paginationEmp(1);
});

function paginationEmp(num) {
    $.ajax({
        type: "POST",
        url: "Assessment_plug.php",
        data: { action: "genEmpPageBar", search: num },
        success: function (data) {
            document.getElementById("pagination_emp").innerHTML = data;
        }
    });
}

function EditEmployee(x){
    window.location.href = "Assessment_Assign.php?id=" +x;
};

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

function showEmpTable(num) {
    $.ajax({
        type: "POST",
        url: "Assessment_plug.php",
        data: { action: "generateEmpTbl", search: num },
        success: function (data) {
            document.getElementById("show_emp_detail").innerHTML = data;
        }
    });

}

function EmpNextPage(num) {
    paginationEmp(num);
    showEmpTable(num);
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
