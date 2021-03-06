
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

//Plan Type
function showaddfpt(){
	$.ajax({
		type: "POST",
		url: "Competencies_showform.php",
		data: {  action:"showaddpt"},
		success: function(data){
			document.getElementById("show_addpt").innerHTML = data;
		}
	});
}

function btnaddptf(){
		$.ajax({
			type:"POST",
			url:"Competencies_db_query.php",
			data: {action:"creatept",formdata:$('#apt').serializeArray()},
			success: function(data){
				if(data == "success"){
					window.alert('Created successfully.');
					document.getElementById("apt").reset();
				}else if(data == "fail"){
					window.alert('Create failure.');
				}else{
					window.alert('Same Plan Type Exist.');
				}

			}
		});
}

function btneditptf(ptid2){
    $.ajax({
        type:"POST",
        url:"Competencies_db_query.php",
        data: {action:"editpt",formdata:$('#apt').serializeArray(),ptidd:ptid2},
        success: function(data){
            if(data == "updated"){
				window.alert('Updated successfully.');
				window.location ="competencies_searchpt.php";
			}else if(data == "fail"){
				window.alert('Update failure.');
			}else{
				window.alert('Same Plan Type Exist.');
			}
			
        }
    });
}

$('#btnptsearch').click(function(e){
    e.preventDefault();
    $.ajax({
        type:"POST",
        url:"Competencies_db_query.php",
        data: {action:"searchpt",formdata:$('#spt').serializeArray()},
        success: function(data){
			if(data =="nf")
			{
				window.alert('Not found');
				document.getElementById("spt").reset();
			}else
			document.getElementById("show_searchpt").innerHTML = data;
			
        }
    });
});

function sendeditpt(ptid){
	$.ajax({
		type: "POST",
		url: "Competencies_showform.php",
		data: { action:"showaddpt", ptid1: ptid},
		success: function(data){
			document.getElementById("show_editpt").innerHTML = data;
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

//Quarter
function showaddfquarter(){
	$.ajax({
		type: "POST",
		url: "Competencies_showform.php",
		data: {  action:"showaddquarter"},
		success: function(data){
			document.getElementById("show_addquarter").innerHTML = data;
		}
	});
}

function btnaddquarterf(){
		$.ajax({
			type:"POST",
			url:"Competencies_db_query.php",
			data: {action:"createquarter",formdata:$('#aquarter').serializeArray()},
			success: function(data){
				if(data == "success"){
					window.alert('Created successfully.');
					document.getElementById("aquarter").reset();
				}else if(data == "fail"){
					window.alert('Create failure.');
				}else{
					window.alert('Same Plan Type Exist.');
				}

			}
		});
}

function btneditquarterf(quarterid2){
    $.ajax({
        type:"POST",
        url:"Competencies_db_query.php",
        data: {action:"editquarter",formdata:$('#aquarter').serializeArray(),quarteridd:quarterid2},
        success: function(data){
            if(data == "updated"){
				window.alert('Updated successfully.');
				window.location ="competencies_searchquarter.php";
			}else if(data == "fail"){
				window.alert('Update failure.');
			}else{
				window.alert('Same quarter Exist.');
			}
			
        }
    });
}

$('#btnquartersearch').click(function(e){
    e.preventDefault();
    $.ajax({
        type:"POST",
        url:"Competencies_db_query.php",
        data: {action:"searchquarter",formdata:$('#squarter').serializeArray()},
        success: function(data){
			if(data =="nf")
			{
				window.alert('Not found');
				document.getElementById("squarter").reset();
			}else
			document.getElementById("show_searchquarter").innerHTML = data;
			
        }
    });
});

function sendeditquarter(quarterid){
	$.ajax({
		type: "POST",
		url: "Competencies_showform.php",
		data: { action:"showaddquarter", quarterid1: quarterid},
		success: function(data){
			document.getElementById("show_editquarter").innerHTML = data;
		}
	});
}
