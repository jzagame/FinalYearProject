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
//Excel
$("form#aie").submit(function(e) {
    e.preventDefault();    
    var formData = new FormData(this);
	if( document.getElementById("customFile").files.length == 0 ){
    window.alert('Please update the excel file in .csv.');
}
    $.ajax({
        url: "Competencies_db_query.php",
        type: 'POST',
        data: formData,
        success: function (data) {
			var subupdate = data.substring(0,7);
			var subupdatedone = data.substring(7);
			var splitsuccess = subupdatedone.split(",");
			if(data == "fail"){
				window.alert('Import failure, Please check the format.');
			}else if(subupdate=="updated"){
				window.alert('Import successfully, There have '+ splitsuccess[0] + ' data has been updated and ' + splitsuccess[1] + ' has been insert.');
			}else if(subupdate=="success"){
				window.alert('Import successfully, There have '+ subupdatedone + ' data has been insert.');
				window.location ="competencies_importexcel.php";
				$('#customFile').next('label').html('Choose file');
			}
        },
        cache: false,
        contentType: false,
        processData: false
    });
});

$('#btnexcelclear').click(function(){
    $('#customFile').next('label').html('Choose file');

});



//Employee
function AddAccessRight(){
	$.ajax({
		type: "POST",
		url: "Employee_Query.php",
		data: {action:"addAccessRight",formdata:$('#AddAccessRightForm').serializeArray()},
		success: function(data){
			if(data == "success"){
				window.alert('Access Right Create Successfully.');
				document.getElementById("AddAccessRightForm").reset();
			}else if(data == "fail"){
				window.alert('Access Right Create Failure.');
			}else{
				window.alert('Access Right Exist.');
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
			}else if(data == "fill"){
				window.alert('Fill in all the Blank');
			}else{
				window.alert('Department link is Existed.');
			}
		}
		});
	}

function SearchAccessRight(){
	$.ajax({
		type: "POST",
		url: "Employee_Query.php",
		data: {action:"searchAccessRight",formdata:$('#searchAccessRightForm').serializeArray()},
		success: function(data){
			if(data == "fail"){
				window.alert("Access Right Not Found");
			}
			else{
				document.getElementById("showSearchTable").innerHTML = data;
			}
		}
	});
}

function editAccessRight(arid){
	$.ajax({
		type: "POST",
		url: "Employee_Query.php",
		data: {action:"editAccessRight",accessright_ID:arid},
		success: function(data){
			document.getElementById("ShowEditForm").innerHTML = data;
		}
	});
}

function UpdateAccessRight(arid){
	console.log($('#UpdateAccessRightForm').serializeArray());
	$.ajax({
		type: "POST",
		url: "Employee_Query.php",
		data: {action:"updateAccessRight",formdata:$('#UpdateAccessRightForm').serializeArray(), accessright_ID:arid},
		success: function(data){
			if(data == "success"){
				window.alert('Update Access Right Successfully.');
				location="Employee_ViewEditPosition.php";
			}
			else if(data == "fail"){
				window.alert('Update Position Failure.');
			}
			else{
				window.alert('Access Right Exist.');
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

function AddEmployee(){
	$.ajax({
		type: "POST",
		url: "Employee_Query.php",
		data: {action:"addEmployee",formdata:$('#searchEmployeeForm').serialize()},
		success: function(data){
			if(data == "success"){
				window.alert('Employee Added Successfully.');
				location="Employee_AddEmployee.php";
			}else{
				window.alert('Employee Added Failure.');
			}
		}
	});
}

function SearchRemoveEmployee(){
	$.ajax({
		type: "POST",
		url: "Employee_Query.php",
		data: {action:"searchRemoveEmployee",formdata:$('#searchRemoveEmployeeForm').serializeArray()},
		success: function(data){
			if(data == "fail"){
				window.alert("Employee Not Found");
			}
			else{
				document.getElementById("showSearchRemoveTable").innerHTML = data;
			}
		}
	});
}

function RemoveEmployee(){
	$.ajax({
		type: "POST",
		url: "Employee_Query.php",
		data: {action:"removeEmployee",formdata:$('#searchRemoveEmployeeForm').serialize()},
		success: function(data){
			if(data == "success"){
				window.alert('Employee Remove Successfully.');
				location="Employee_RemoveEmployee.php";
			}else{
				window.alert('Employee Remove Failure.');
			}
		}
	});
}

function SearchAPEmployee(){
	$.ajax({
		type: "POST",
		url: "Employee_Query.php",
		data: {action:"searchAPEmployee",formdata:$('#SearchAPForm').serializeArray()},
		success: function(data){
			if(data == "fail"){
				window.alert("Employee Not Found");
			}
			else{
				document.getElementById("showSearchAPTable").innerHTML = data;
			}
		}
	});
}

function AssignPosition(){
	$.ajax({
		type: "POST",
		url: "Employee_Query.php",
		data: {action:"assignPosition",formdata:$('#SearchAPForm').serialize()},
		success: function(data){
			if(data == "success"){
				window.alert('Employee Assign Successfully.');
				location="Employee_AssignPosition.php";
			}else{
				window.alert('Employee Assign Failure.');
			}
			// alert(data);
		}
	});
}

function SearchVEPEmployee(){
	$.ajax({
		type: "POST",
		url: "Employee_Query.php",
		data: {action:"searchVEPEmployee",formdata:$('#SearchVEPForm').serializeArray()},
		success: function(data){
			if(data == "fail"){
				window.alert("Employee Not Found");
			}
			else{
				document.getElementById("showSearchVEPTable").innerHTML = data;
			}
		}
	});
}

function UpdatePosition(){
	$.ajax({
		type: "POST",
		url: "Employee_Query.php",
		data: {action:"updatePosition",formdata:$('#SearchVEPForm').serialize()},
		success: function(data){
			if(data == "success"){
				window.alert('Access Right & Report-to Update Successfully');
				location="Employee_ViewEditAssign.php";
			}else{
				window.alert('Access Right & Report-to Update Failure');
			}
			// alert(data);
		}
	});
}