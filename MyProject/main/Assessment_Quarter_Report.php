<?php
error_reporting(0);
session_start();
include "../../includes/conn.php";
?>

<html>

<head>
    <title>Quarter Report</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php
            include "../includes/MenuBar.php";
            ?>
        </div>
        <div class="container-fluid justify-content-center">
            <div class="row">
                <div class="col-12">
                    <ul class="list-group mt-4 mb-2">
                        <li class="list-group-item active">
                            <?php 
                                $result = $conn -> query("select * from t_memc_kpcc_quarter where Q_ID = '".$_GET['quarter']."'");
                                $q_data = $result -> fetch_assoc();

                                $result = $conn -> query("select * from t_memc_kpcc_quarter_report where QR_Q_ID = ".$_GET['quarter']."");
                               
                                $qr_data = $result -> fetch_assoc();
                            ?>
                            <h5 class="m-0"><?php echo $q_data['Q_Name']; ?> Report In <?php echo $q_data['Q_Year']; ?></h5>
                        </li>
                    </ul>
                </div>
                <div class="col-12">
                    <form id="quarter_report">
                        <table class="table table-bordered">
                            <tr>
                                <td><b>本季度个人培养发展小节<br />Personal Development summary of this quarter : </b><br />
                                    <br /><textarea name="pd_summary" id="pd_summary" cols="30" rows="10" class="form-control"><?php echo $qr_data['QR_PD_Summary']; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td><b>导师辅导评价及建议<br />Mentors evaluation and suggestion</b><br />
                                    <br /><textarea name="mentor_eas" id="mentor_eas" cols="30" rows="10" class="form-control"><?php echo $qr_data['QR_Mentor_Evaluation']; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td><b>本季度综合评价<br />Overall appraisal of this Quarter</b><br /><br />
                                    <?php 
                                        $marks = array("5","4","3","2","1");
                                        $marks_info = array("5分-优秀 Excellent","4分-良好 Good","3分-合格 Qualified","2分-需改进 Need To Improved","0分-不合格 Fail");
                                        for($i=0;$i<count($marks);$i++){
                                    ?>
                                            <input type="checkbox" name="quarter_marks" value="<?php echo $marks[$i]; ?>" 
                                                <?php 
                                                    if($qr_data['QR_Marks'] == $marks[$i]){
                                                        echo "checked";
                                                    }
                                                ?>
                                            ><?php echo $marks_info[$i]; ?><br/>
                                    <?php
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr style="text-align: center;">
                                <td>
                                    <button type="button" class="btn btn-primary" style="width: 100px;" 
                                        onclick="QuarterReport('<?php echo $_GET['id']; ?>','<?php echo $_GET['quarter']; ?>')">
                                    <?php 
                                        if($qr_data['QR_Marks'] == null){
                                            echo "Submit";
                                        }else{
                                            echo "Update";
                                        }
                                    ?>
                                    </button>
                                    <input type="reset" class="btn btn-primary" style="width: 100px;" value="Clear">
                                    <button type="button" class="btn btn-primary" style="width: 100px;" onclick="Back('<?php echo $_GET['id'] ?>')">Back</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        var last;
        document.addEventListener('input', (e) => {
            if (e.target.getAttribute('name') == "quarter_marks") {
                if (last)
                    last.checked = false;
            }
            e.target.checked = true;
            last = e.target;
        })

        function QuarterReport(id,quar){
            $.ajax({
                type:"POST",
                url:"Assessment_db_query.php",
                data:{action:"quarterreport",formdata:$('#quarter_report').serialize(),eid:id,quarter:quar},
                success:function(data){
                    window.location.href = "Assessment_View_Employee1.php?id="+id;
                }
            });
        }

        function Back(id){
            window.location.href = "Assessment_View_Employee1.php?id="+id;
        }
    </script>
    <br /><br /><br /><br /><br /><br />
</body>

</html>