//Employee
//Access Right
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
			}
			else if(data == "AR Null")
			{
				window.alert('Please Insert Access Right Level');
			}
			else{
				window.alert('Access Right Level Exist.');
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
	// console.log($('#UpdateAccessRightForm').serializeArray());
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
				window.alert('Update Access Right Failure.');
			}
			else if(data == "AR Null")
			{
				window.alert('Please Insert Access Right Level');
			}
			else{
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

//Add Employee
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
			}
			else if(data == "Nothing")
			{
				window.alert('Please Select Employee or Category');
			}
			else{
				window.alert('Employee Added Failure.');
			}
		}
	});
}

//Remove Employee
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
			}
			else if(data == "Nothing")
			{
				window.alert('Please Select Employee');
			}
			else{
				window.alert('Employee Remove Failure.');
			}
		}
	});
}

//Assign Position
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
			}
			else if(data == "No Employee")
			{
				window.alert('Please Select Employee');
			}
			else if(data == "No AR")
			{
				window.alert('Please Select Access Right');
			}
			else if(data == "No RT")
			{
				window.alert('Please Select Reporting-To');
			}
			else if(data == "Same ID")
			{
				window.alert('Employee cannot report to himself');
			}
			else{
				window.alert('Employee Assign Failure.');
			}
			// alert(data);
		}
	});
}

//View/Edit Position
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
			}
			else if(data == "No Employee")
			{
				window.alert('Please Select Employee');
			}
			else if(data == "No AR")
			{
				window.alert('Please Select Access Right');
			}
			else if(data == "No RT")
			{
				window.alert('Please Select Reporting-To');
			}
			else if(data == "Same ID")
			{
				window.alert('Employee cannot report to himself');
			}
			else{
				window.alert('Access Right & Report-to Update Failure');
			}
			// alert(data);
		}
	});
}

//Profile
function SearchAddProfile(){
	$.ajax({
		type: "POST",
		url: "Employee_Query.php",
		data: {action:"searchAddProfile",formdata:$('#searchAddProfileForm').serializeArray()},
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

function addProfile(apid){
	$.ajax({
		type: "POST",
		url: "Employee_Query.php",
		data: {action:"addProfile", apid:apid},
		success: function(data){
			document.getElementById("ShowAddProfileForm").innerHTML = data;
		}
	});
}

function InsertProfile(){
	$.ajax({
		type: "POST",
		url: "Employee_Query.php",
		data: {action:"insertProfile",formdata:$('#InsertProfileForm').serializeArray()},
		success: function(data){
			if(data == "U Null")
			{
				window.alert('Please Insert Unit.');
			}
			else if(data == "WE Null")
			{
				window.alert('Please Insert Working Experience.');
			}
			else if(data == "S Null")
			{
				window.alert('Please Insert Strengths.');
			}
			else if(data == "W Null")
			{
				window.alert('Please Insert Weakness.');
			}
			else if(data == "success"){
				window.alert('Add Profile Successfully.');
				location="Employee_AddProfile.php";
			}
			else{
				window.alert("Add Profile Failure");
			}
		}
	});
}

function SearchEditProfile(){
	$.ajax({
		type: "POST",
		url: "Employee_Query.php",
		data: {action:"searchEditProfile",formdata:$('#searchEditProfileForm').serializeArray()},
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

function editProfile(epid){
	$.ajax({
		type: "POST",
		url: "Employee_Query.php",
		data: {action:"editProfile", epid:epid},
		success: function(data){
			document.getElementById("ShowEditProfileForm").innerHTML = data;
		}
	});
}

function UpdateProfile(){
	$.ajax({
		type: "POST",
		url: "Employee_Query.php",
		data: {action:"updateProfile",formdata:$('#EditProfileForm').serializeArray()},
		success: function(data){
			if(data == "U Null")
			{
				window.alert('Please Insert Unit.');
			}
			else if(data == "WE Null")
			{
				window.alert('Please Insert Working Experience.');
			}
			else if(data == "S Null")
			{
				window.alert('Please Insert Strengths.');
			}
			else if(data == "W Null")
			{
				window.alert('Please Insert Weakness.');
			}
			else if(data == "success"){
				window.alert('Add Profile Successfully.');
				location="Employee_ViewEditProfile.php";
			}
			else{
				window.alert('Add Profile Failure.');
			}
		}
	});
}

//Employee Category
function AddCategory(){
	$.ajax({
		type: "POST",
		url: "Employee_Query.php",
		data: {action:"addCategory",formdata:$('#AddCategoryForm').serializeArray()},
		success: function(data){
			if(data == "success"){
				window.alert('Category Create Successfully.');
				document.getElementById("AddCategoryForm").reset();
			}else if(data == "fail"){
				window.alert('Category Create Failure.');
			}
			else if(data == "C Null")
			{
				window.alert('Please Insert Category Type');
			}
			else{
				window.alert('Category Exist.');
			}
		}
	});
}

function SearchCategory(){
	$.ajax({
		type: "POST",
		url: "Employee_Query.php",
		data: {action:"searchCategory",formdata:$('#searchCategoryForm').serializeArray()},
		success: function(data){
			if(data == "fail"){
				window.alert("Category Not Found");
			}
			else{
				document.getElementById("showSearchTable").innerHTML = data;
			}
		}
	});
}

function editCategory(cid){
	$.ajax({
		type: "POST",
		url: "Employee_Query.php",
		data: {action:"editCategory",category_ID:cid},
		success: function(data){
			document.getElementById("ShowEditForm").innerHTML = data;
		}
	});
}

function UpdateCategory(cid){
	$.ajax({
		type: "POST",
		url: "Employee_Query.php",
		data: {action:"updateCategory",formdata:$('#UpdateCategoryForm').serializeArray(), category_ID:cid},
		success: function(data){
			if(data == "success"){
				window.alert('Update Catgeory Successfully.');
				location="Employee_ViewEditCategory.php";
			}
			else if(data == "fail"){
				window.alert('Update Category Failure.');
			}
			else if(data == "C Null")
			{
				window.alert('Please Insert Category');
			}
			else{
				window.alert('Category Exist.');
			}
		}
	});
}

function SearchCEmployee(){
	$.ajax({
		type: "POST",
		url: "Employee_Query.php",
		data: {action:"searchCEmployee",formdata:$('#searchCEmployeeForm').serializeArray()},
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

function UpdateCEmployee(){
	$.ajax({
		type: "POST",
		url: "Employee_Query.php",
		data: {action:"updateCEmployee",formdata:$('#searchCEmployeeForm').serialize()},
		success: function(data){
			if(data == "success"){
				window.alert('Category Update Successfully');
				location="Employee_EditCategory.php";
			}
			else if(data == "No Employee")
			{
				window.alert('Please Select Employee');
			}
			else if(data == "No C")
			{
				window.alert('Please Select Category');
			}
			else{
				window.alert('Category Update Failure');
			}
			// alert(data);
		}
	});
}

//Add Category Tab
$("#btnAddCategoryTab").click(function(e){
    e.preventDefault();
    $.ajax({
        type:"POST",
        url: "Employee_Query.php",
        data : {action:"AddCategoryTab"},
        success:function(data){
			$.ajax({
				type:"POST",
				url: "Employee_Qeury.php",
				data : {action:"AddButton_1"},
				success:function(data){
					AddCard("",data);
				}
			});
        }
    })
});

function ChangeY(){
	//alert("HAHA");
		$.ajax({
			type:"POST",
			url:"Employee_Query.php",
			data: {action:"changeyear",formdata:$('#piepie').serializeArray()},
			success: function(data){
				if(data != "success"){
					//alert(data.substring(2,3));
					//alert(data.substring(4,5));
					//alert(data.substring((data.indexOf("Fail:")+6),data.indexOf("|")));
					document.getElementById("piechart").innerHTML = data.substring(data.indexOf("&")+1);
					
					var options = {
					  series: [parseInt(data.substring((data.indexOf("Zero:")+5),data.indexOf("&"))),parseInt(data.substring((data.indexOf("One:")+4),data.indexOf(","))),parseInt(data.substring((data.indexOf(",Two:")+5),data.indexOf("|"))), parseInt(data.substring((data.indexOf("|Three:")+7),data.indexOf("-"))), parseInt(data.substring((data.indexOf("-Four:")+6),data.indexOf("_"))), parseInt(data.substring((data.indexOf("_Five:")+6),data.indexOf("^")))],
					  chart: {
					  width: 500,
					  type: 'pie',
					},
					labels: ['Zero Mark', 'One Mark', 'Two Marks', 'Three Marks', 'Four Marks', 'Five Marks'],
							colors: ['#F44336', '#E91E63', '#9C27B0', '#808000', '#FFA500', '#FFC0CB'],
					responsive: [{
					  breakpoint: 480,
					  options: {
						chart: {
						  width: 350
						},
						legend: {
						  position: 'bottom'
						},
					  }
					}]
					};
					
					//alert(data.substring((data.indexOf("Pass2:")+7),data.indexOf(",")));
//					var optionss = {
//					  series: [parseInt(data.substring((data.indexOf("Pass2:")+6),data.indexOf("A"))),parseInt(data.substring((data.indexOf("Fail2:")+6),data.indexOf("B")))],
//					  chart: {
//					  width: 380,
//					  type: 'pie',
//					},
//					labels: ['Completed', 'Incompleted'],
//					responsive: [{
//					  breakpoint: 480,
//					  options: {
//						chart: {
//						  width: 200
//						},
//						legend: {
//						  position: 'bottom'
//						}
//					  }
//					}]
//					};
				var chart = new ApexCharts(document.querySelector("#chart"), options);
//				var chartt = new ApexCharts(document.querySelector("#chartt"), optionss);

				chart.render();
//				chartt.render();
				}

			}
		});
}

//Staff Excel
$("form#staffexcelform").submit(function(e) {
    e.preventDefault();    
    var formData = new FormData(this);
	if( document.getElementById("staffexcelid").files.length == 0 ){
    window.alert('Please update the excel file in .csv.');
}
    $.ajax({
        url: "Employee_Query.php",
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
				window.location ="ImportStaff.php";
				$('#staffexcelid').next('label').html('Choose file');
			}
        },
        cache: false,
        contentType: false,
        processData: false
    });
});

//Department Excel
$("form#departmentexcelform").submit(function(e) {
    e.preventDefault();    
    var formData = new FormData(this);
	if( document.getElementById("departmentexcelid").files.length == 0 ){
    window.alert('Please update the excel file in .csv.');
}
    $.ajax({
        url: "Employee_Query.php",
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
				window.location ="ImportDepartment.php";
				$('#departmentexcelid').next('label').html('Choose file');
			}
        },
        cache: false,
        contentType: false,
        processData: false
    });
});

//Position Excel
$("form#positionexcelform").submit(function(e) {
    e.preventDefault();    
    var formData = new FormData(this);
	if( document.getElementById("positionexcelid").files.length == 0 ){
    window.alert('Please update the excel file in .csv.');
}
    $.ajax({
        url: "Employee_Query.php",
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
				window.location ="Importposition.php";
				$('#positionexcelid').next('label').html('Choose file');
			}
        },
        cache: false,
        contentType: false,
        processData: false
    });
});
