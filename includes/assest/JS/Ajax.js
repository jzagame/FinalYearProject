//Core Competecies
function showaddf(){
	$.ajax({
		type: "POST",
		url: "Competencies_showform.php",
		data: {  action:"showaddcc"},
		success: function(data){
			document.getElementById("show_addcc").innerHTML = data;
		}
	});
}
function btnaddccf(){
		$.ajax({
			type:"POST",
			url:"Competencies_db_query.php",
			data: {action:"createcc",formdata:$('#acc').serializeArray()},
			success: function(data){
				if(data == "success"){
					window.alert('Created successfully.');
					document.getElementById("acc").reset();
				}else if(data == "fail"){
					window.alert('Create failure.');
				}else{
					window.alert('Same Core Competencies Exist.');
				}

			}
		});
}

function btneditccf(ccid2){
    $.ajax({
        type:"POST",
        url:"Competencies_db_query.php",
        data: {action:"editcc",formdata:$('#acc').serializeArray(),ccidd:ccid2},
        success: function(data){
            if(data == "updated"){
				window.alert('Updated successfully.');
				window.location ="competencies_searchcore.php";
			}else if(data == "fail"){
				window.alert('Update failure.');
			}else{
				window.alert('Same Core Competencies Exist.');
			}
			
        }
    });
}

$('#btnccsearch').click(function(e){
    e.preventDefault();
    $.ajax({
        type:"POST",
        url:"Competencies_db_query.php",
        data: {action:"searchcc",formdata:$('#scc').serializeArray()},
        success: function(data){
			if(data =="nf")
			{
				window.alert('Not found');
				document.getElementById("scc").reset();
			}else
			document.getElementById("show_searchcc").innerHTML = data;
			
        }
    });
});

function sendeditcc(ccid){
	$.ajax({
		type: "POST",
		url: "Competencies_showform.php",
		data: { action:"showaddcc", ccid1: ccid},
		success: function(data){
			document.getElementById("show_editcc").innerHTML = data;
		}
	});
}

//Competencies Dimension
function showaddfcd(){
	$.ajax({
		type: "POST",
		url: "Competencies_showform.php",
		data: {  action:"showaddcd"},
		success: function(data){
			document.getElementById("show_addcd").innerHTML = data;
		}
	});
}
function btnaddcdf(){
		$.ajax({
			type:"POST",
			url:"Competencies_db_query.php",
			data: {action:"createcd",formdata:$('#acd').serializeArray()},
			success: function(data){
				if(data == "success"){
					window.alert('Created successfully.');
					document.getElementById("acd").reset();
				}else if(data == "fail"){
					window.alert('Create failure.');
				}else{
					window.alert('Same Competencies Dimension Exist.');
				}

			}
		});
}
function btneditcdf(cdid2){
    $.ajax({
        type:"POST",
        url:"Competencies_db_query.php",
        data: {action:"editcd",formdata:$('#acd').serializeArray(),cdidd:cdid2},
        success: function(data){
            if(data == "updated"){
				window.alert('Updated successfully.');
				window.location ="competencies_searchcd.php";
			}else if(data == "fail"){
				window.alert('Update failure.');
			}else{
				window.alert('Same Competencies Dimension Exist.');
			}
			
        }
    });
}

$('#btncdsearch').click(function(e){
    e.preventDefault();
    $.ajax({
        type:"POST",
        url:"Competencies_db_query.php",
        data: {action:"searchcd",formdata:$('#scd').serializeArray()},
        success: function(data){
			if(data =="nf")
			{
				window.alert('Not found');
				document.getElementById("scd").reset();
			}else			
				document.getElementById("show_searchcd").innerHTML = data;
        }
    });
});

function sendeditcd(cdid){
	$.ajax({
		type: "POST",
		url: "Competencies_showform.php",
		data: { action:"showaddcd", cdid1: cdid},
		success: function(data){
			document.getElementById("show_editcd").innerHTML = data;
		}
	});
}

//Items
function showaddfitem(){
	$.ajax({
		type: "POST",
		url: "Competencies_showform.php",
		data: {  action:"showadditem"},
		success: function(data){
			document.getElementById("show_additem").innerHTML = data;
		}
	});
}
function changecd(selectObject){
  var value = selectObject.value;  
	$.ajax({
		type: "POST",
		url: "Competencies_showform.php",
		data: {  action:"showadditemcd", value1:value},
		success: function(data){
			document.getElementById("show_additemcd").innerHTML = data;
		}
	});
}

function btnadditemf(){
		$.ajax({
			type:"POST",
			url:"Competencies_db_query.php",
			data: {action:"createitem",formdata:$('#aitem').serializeArray()},
			success: function(data){
				if(data == "success"){
					window.alert('Created successfully.');
					document.getElementById("aitem").reset();
				}else if(data == "fail"){
					window.alert('Create failure.');
				}else {
					window.alert('Same Item Exist.');
				}

			}
		});
}

$('#btnitemsearch').click(function(e){
    e.preventDefault();
    $.ajax({
        type:"POST",
        url:"Competencies_db_query.php",
        data: {action:"searchitem",formdata:$('#sitem').serializeArray()},
        success: function(data){
			if(data =="nf")
			{
				window.alert('Not found');
				document.getElementById("sitem").reset();
			}else			
				document.getElementById("show_searchitem").innerHTML = data;
        }
    });
});

function sendedititem(itemid){
	$.ajax({
		type: "POST",
		url: "Competencies_showform.php",
		data: { action:"showadditem", itemid1: itemid},
		success: function(data){
			document.getElementById("show_edititem").innerHTML = data;
		}
	});
}

function btnedititemf(itemid2){
	console.log($('#aitem').serializeArray());
    $.ajax({
        type:"POST",
        url:"Competencies_db_query.php",
        data: {action:"edititem",formdata:$('#aitem').serializeArray(),itemidd:itemid2},
        success: function(data){
            if(data == "updated"){
				window.alert('Updated successfully.');
				window.location ="competencies_searchitems.php";
			}else if(data == "fail"){
				window.alert('Update failure.');
			}else{
				window.alert('Same item Exist.');
			}
			
        }
    });
}
//Employee
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