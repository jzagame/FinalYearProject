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