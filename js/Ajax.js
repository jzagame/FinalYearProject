<<<<<<< Updated upstream
<<<<<<< Updated upstream
=======
//Major Competecies
>>>>>>> Stashed changes
=======
//Major Competecies
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
<<<<<<< Updated upstream
=======
	
>>>>>>> Stashed changes
=======
	
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
<<<<<<< Updated upstream
				window.alert('Same Core Competencies Exist.');
=======
				window.alert('Same Major Competencies Exist.');
>>>>>>> Stashed changes
=======
				window.alert('Same Major Competencies Exist.');
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
<<<<<<< Updated upstream
=======
=======
>>>>>>> Stashed changes
			if(data =="nf")
			{
				window.alert('Not found');
				document.getElementById("smc").reset();
			}else
<<<<<<< Updated upstream
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
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

<<<<<<< Updated upstream
<<<<<<< Updated upstream
=======
=======
>>>>>>> Stashed changes
//Core Competecies
function showaddfcc(){
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

<<<<<<< Updated upstream
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
