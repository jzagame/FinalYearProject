function showaddf(){
	$.ajax({
		type: "POST",
		url: "Competencies_showform.php",
		data: {  action:"showaddmc"},
		success: function(data){
			document.getElementById("show_addmc").innerHTML = data;
		}
	});
}
function btnaddmcf(){
		$.ajax({
			type:"POST",
			url:"Competencies_db_query.php",
			data: {action:"createmc",formdata:$('#amc').serializeArray()},
			success: function(data){
				if(data == "success"){
					window.alert('Created successfully.');
					document.getElementById("amc").reset();
				}else if(data == "fail"){
					window.alert('Create failure.');
				}else{
					window.alert('Same Core Competencies Exist.');
				}

			}
		});
}

function btneditmcf(mcid2){
	console.log($('#amc').serializeArray());
    $.ajax({
        type:"POST",
        url:"Competencies_db_query.php",
        data: {action:"editmc",formdata:$('#amc').serializeArray(),mcidd:mcid2},
        success: function(data){
            if(data == "updated"){
				window.alert('Updated successfully.');
				window.location ="competencies_searchmajor.php";
			}else if(data == "fail"){
				window.alert('Update failure.');
			}else{
				window.alert('Same Core Competencies Exist.');
			}
			
        }
    });
}

$('#btnmcsearch').click(function(e){
    e.preventDefault();
    $.ajax({
        type:"POST",
        url:"Competencies_db_query.php",
        data: {action:"searchmc",formdata:$('#smc').serializeArray()},
        success: function(data){
			document.getElementById("show_searchmc").innerHTML = data;
			
        }
    });
});

function sendeditmc(mcid){
	$.ajax({
		type: "POST",
		url: "Competencies_showform.php",
		data: { action:"showaddmc", mcid1: mcid},
		success: function(data){
			document.getElementById("show_editmc").innerHTML = data;
		}
	});
}

function AddPosition(){
	$.ajax({
		type: "POST",
		url: "Employee_Query.php",
		data: {action:"addPosition",formdata:$('#AddPositionForm').serializeArray()},
		success: function(data){
			if(data == "success"){
				window.alert('Position Category Create Successfully.');
				document.getElementById("AddPositionForm").reset();
			}else if(data == "fail"){
				window.alert('Position Category Create Failure.');
			}else{
				window.alert('Position Category Exist.');
			}
		}
	});
}

function AddDepartment(){
	$.ajax({
		type: "POST",
		url: "Employee_Query.php",
		data: {action:"addDepartment",formdata:$('#AddDepartmentForm').serializeArray()},
		success: function(data){
			if(data == "success"){
				window.alert('Add Department Successfully.');
				document.getElementById("AddDepartmentForm").reset();
			}else if(data == "fail"){
				window.alert('Create Department Failed.');
			}else{
				window.alert('Department is Existed.');
			}
		}
		});
	}

function SearchPosition(){
	$.ajax({
		type: "POST",
		url: "Employee_Query.php",
		data: {action:"searchPosition",formdata:$('#searchPositionForm').serializeArray()},
		success: function(data){
			if(data == "fail"){
				window.alert("Position Category Not Found");
			}
			else{
				document.getElementById("showSearchTable").innerHTML = data;
			}
		}
	});
}

function editPosition(pid){
	$.ajax({
		type: "POST",
		url: "Employee_Query.php",
		data: {action:"editPosition",position_ID:pid},
		success: function(data){
			document.getElementById("ShowEditForm").innerHTML = data;
		}
	});
}

function UpdatePosition(pid){
	console.log($('#UpdatePositionForm').serializeArray());
	$.ajax({
		type: "POST",
		url: "Employee_Query.php",
		data: {action:"updatePosition",formdata:$('#UpdatePositionForm').serializeArray(), position_ID:pid},
		success: function(data){
			if(data == "success"){
				window.alert('Update Position Successfully.');
				location="Employee_ViewEditPosition.php";
			}
			else if(data == "fail"){
				window.alert('Update Position Failure.');
			}
			else{
				window.alert('Position Category Exist.');
			}
		}
	});
}

function SearchEmployee(){
	$.ajax({
		type: "POST",
		url: "Employee_Query.php",
		data: {action:"searchEmployee",formdata:$('#searchEmployeeForm').serializeArray()},
		success: function(data){
			if(data == "fail"){
				window.alert("Employee Not Found");
			}
			else{
				document.getElementById("showSearchTable").innerHTML = data;
			}
		}
	});
}

function AddEmployee(pid){
	$.ajax({
		type: "POST",
		url: "Employee_Query.php",
		data: {action:"updatePosition",formdata:$('#UpdatePositionForm').serializeArray(), position_ID:pid},
		success: function(data){
			if(data == "success"){
				window.alert('Update Position Successfully.');
				location="Employee_ViewEditPosition.php";
			}
			else if(data == "fail"){
				window.alert('Update Position Failure.');
			}
			else{
				window.alert('Position Category Exist.');
			}
		}
	});
}

function SearchDepartment(){
	$.ajax({
		type: "POST",
		url: "Employee_Query.php",
		data: {action:"searchDepartment",formdata:$('#searchDepartmentForm').serializeArray()},
		success: function(data){
			if(data == "fail"){
				window.alert("Department Not Found");
			}
			else{
				document.getElementById("showDepartTable").innerHTML = data;
			}
		}
	});
}

function editDepartment(did){
	$.ajax({
		type: "POST",
		url: "Employee_Query.php",
		data: {action:"editDepartment",D_ID:did},
		success: function(data){
			document.getElementById("ShowEditForm").innerHTML = data;
		}
	});
}

function UpdateDepartment(did){
	$.ajax({
		type: "POST",
		url: "Employee_Query.php",
		data: {action:"updateDepartment",formdata:$('#UpdateDepartmentForm').serializeArray(), D_ID:did},
		success: function(data){
			if(data == "success"){
				window.alert('Update Department Successfully.');
				location="Employee_ViewEditDepartment.php";
			}
			else if(data == "fail"){
				window.alert('Update Department Failure.');
			}
			else{
				window.alert('Department Does Not Exist.');
			}
		}
	});
}