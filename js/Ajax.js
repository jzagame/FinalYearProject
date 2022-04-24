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