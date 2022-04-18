$(document).ready(function(){
    $.ajax({
        type:"POST",
        url:"test.php",
        data : {next:"25%"},
        success:function(data){
            document.getElementById("Assessment_content").innerHTML = data;
        }
    });
});

$('#AssignAssessment').submit(function(e){
    e.preventDefault();
    var progress = document.getElementById("progress_Ass").innerHTML;
});

$('#btn_next').click(function(e){
    e.preventDefault();
    var progress = document.getElementById("progress_Ass").innerHTML;
    if(progress == "25%"){
        progress = "50%";
        $("#btn_previous").css("visibility","visible");
        $("#progress_Ass").css("width","50%");
        $("#progress_Ass").text("50%");
    }else if(progress == "50%"){
        $("#progress_Ass").css("width","75%");
        $("#progress_Ass").text("75%");
    }
    $.ajax({
        type:"POST",
        url: "test.php",
        data: {next:progress},
        success: function(data){
            document.getElementById("Assessment_content").innerHTML = data;
            $.ajax({
                type: "POST",
                url: "Assessment_Competencies_card.php",
                data: {next:progress,num:"1"},
                success:function(data){
                    document.getElementById("Competencies_Card").innerHTML = data;
                }
            });
        }
    });
});

$('#btn_previous').click(function(e){
    e.preventDefault();
    var progress = document.getElementById("progress_Ass").innerHTML;
    if(progress == "50%"){
        progress = "25%";
        $("#btn_previous").css("visibility","hidden");
        $("#progress_Ass").css("width","25%");
        $("#progress_Ass").text("25%");
    }else if(progress == "75%"){
        progress = "50%";
        $("#progress_Ass").css("width","50%");
        $("#progress_Ass").text("50%");
    }
    $.ajax({
        type:"POST",
        url: "test.php",
        data: {previous:progress},
        success: function(data){
            document.getElementById("Assessment_content").innerHTML = data;
        }
    });
});

