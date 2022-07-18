<?php

require('../../includes/assest/PDF/TCPDFmain/examples/tcpdf_include.php');
include "../../includes/conn.php";
$empid = $_GET['id'];
$quarter = $_GET['quarter'];
$year = $_GET['year'];

class EmpData{
    public $id;
    public $year;
    public $quarter;
    public $conn;
    public $name,$unit,$gender,$department,$position,$personalgrade,$mentor;
    public $keycareerexp,$workingexp,$strength,$weakness;
    public $actionplan = array();
    public $ap_type = array("Project","Coaching","Courses","Exposure");
    public $checkboxQuarter = array();
    public $PDS_quarter,$MEAS_quarter,$marks_quarter;

    function __construct($id,$year,$quarter,$conn)
    {   
        $this->year = $year;
        $this->id = $id;
        $this->quarter = $quarter;
        $this->conn = $conn;
    }

    function emp_info(){ // employee basic information
        $sql = "select * from t_memc_kpcc_employee_profile,t_memc_staff,t_memc_department,t_memc_kpcc_employee_detail,t_memc_position where EMP_D_ID = dpt_id and 
        ep_number = stf_employee_number and pos_id = stf_position_id and Emp_ID = stf_employee_number and Emp_ID = '".$this->id."'";
        $result = $this->conn -> query($sql);
        $emp_data = $result -> fetch_assoc();
        $this->position = $emp_data['pos_name'];
        $this->name = $emp_data['stf_name'];
        $this->department = $emp_data['dpt_name'];
        $this->unit = $emp_data['ep_unit'];
        if($emp_data['stf_gender'] == "M"){
            $this->gender = "Male";
        }else{
            $this->gender = "Female";
        }
        $this->personalgrade = $emp_data['stf_grade'];
        $mentor_result = $this->conn ->query("Select * from t_memc_kpcc_report_to,t_memc_staff where 
                                                Report_To_Emp_ID = stf_employee_number and RT_Emp_ID = '".$this->id."'");
        $mentor_data = $mentor_result -> fetch_assoc();
        $this->mentor = $mentor_data['stf_name'];
    }

    function emp_IDP(){ // employee key career, working exp, strength, weakness
        $sql = "select * from t_memc_kpcc_employee_profile where ep_number = '".$this->id."'";
        $result = $this->conn -> query($sql);
        $data = $result -> fetch_assoc();
        $this->workingexp = $data['ep_workexperience'];
        $this->strength = $data['ep_strength'];
        $this->weakness = $data['ep_weakness'];
    }

    function emp_IDP_Quarter(){
        $result = $this -> conn -> query("select * from t_memc_kpcc_quarter_report where QR_Q_ID = ".$this->quarter." and QR_E_ID = '".$this->id."'");
        $q_data = $result -> fetch_assoc();

        $this -> PDS_quarter = $q_data['QR_Mentor_Evaluation'];
        $this -> MEAS_quarter = $q_data['QR_PD_Summary'];
        $this -> marks_quarter = $q_data['QR_Marks'];
    }

    function actionPlan(){ // if got new action plan type added, this this part for pdf 
        for($i=0;$i<count($this->ap_type);$i++){
            $sql = "select * from t_memc_kpcc_actionplan,t_memc_kpcc_plantype,t_memc_kpcc_employee_item,t_memc_kpcc_quarter where AP_Pt_ID = Pt_ID and AP_Ei_ID = Ei_ID 
            and Ei_Quarter_ID = Q_ID and Ei_Quarter_ID = ".$this->quarter." and  Ei_EMP_ID = '".$this ->id."' and Pt_Name = '".$this->ap_type[$i]."'";
            $result = $this-> conn -> query($sql);
            $x=0;
            $this -> actionplan[$i][$x] = "--";
            while($ap_data = $result -> fetch_assoc()){
               if($x == 0){
                    $this->actionplan[$i][$x] = $ap_data;
               }else{
                    $this->actionplan[$i][$x] = $ap_data;
               }
               $x++;
            }
        }
    }

    function CheckBoxQuarter(){
        $result = $this -> conn -> query("select * from t_memc_kpcc_quarter where Q_Year = '".$this -> year."' order by Q_Name ASC");
        while($temp = $result -> fetch_assoc()){
            $this->checkboxQuarter[] = $temp;
        }
    }

}

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF
{

    //Page header
    // public function Header()
    // {
    //     // Logo
    //     $image_file = K_PATH_IMAGES . 'Longi.png';
    //     // image file, left margin, top margin, right margin
    //     $this->Image($image_file, 180, 10, 15, '', 'PNG', '', 'T', false, 1000, '', false, false, 0, false, false, false);
    //     // Set font
    //     $this->SetFont('helvetica', 'B', 20);
    //     // Title
    //     // $this->Cell(0, -15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    // }

    // Page footer
    public function Footer()
    {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$info = new EmpData($empid,$year,$quarter,$conn);
$info -> emp_info();
$info -> emp_IDP();
$info -> actionPlan();
$info -> CheckBoxQuarter();
$info -> emp_IDP_Quarter();
$day = date('d');
$month = date('M');
$y = date('Y');

//============================================================+
//Start OF basic setting
//============================================================+
$chineseform = 'stsongstdlight';
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetPrintHeader(false);
// $pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('个人培养发展计划(IDP)');
// $pdf->SetSubject('TCPDF Tutorial');
// $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
// $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

//============================================================+
//End of basic setting
//============================================================+
//Start OF Cover page
//============================================================+
$pdf->SetFont($chineseform, 'B', 26);
$pdf->AddPage();
$Logo = '<table border="0">
                <tr style="text-align:right;">
                    <td><img src="../../includes/assest/PDF/TCPDFmain/LongiLogo/Longi.png" border="0" height="35" width="100" align="bottom"/></td>
                </tr>
            </table>';
$pdf->writeHTML($Logo, true, false, true, false, '');
$pdf->Write(30, '', '', 0, 'C', true, 0, false, false, 0);
$pdf->Write(0, '个人培养发展计划(IPD)', '', 0, 'C', true, 0, false, false, 0); // line spacing -- background darkness -- font spacing <-- each number meaning

$pdf->SetFont($chineseform, '', 14);
$pdf->Write(0, 'Individual Development Plan', '', 0, 'C', true, 0, false, false, 0);

$pdf->Write(40, '', '', 0, 'C', true, 0, false, false, 0);

$pdf->SetFont($chineseform, 'B', 12);
$pdf->SetFillColor(255, 255, 255);
$pdf->MultiCell(50, 10, '', 0, 'L', 1, 0, '', '', true);
$pdf->MultiCell(100, 10, '员工工号 (Staff ID) : ' . $info->id, 0, 'L', 1, 0, '', '', true);
$pdf->Ln(10);
$pdf->MultiCell(50, 10, '', 0, 'L', 1, 0, '', '', true);
$pdf->MultiCell(100, 10, '员工姓名 (Name) : ' . $info->name, 0, 'L', 1, 0, '', '', true);
$pdf->Ln(10);
$pdf->MultiCell(50, 10, '', 0, 'L', 1, 0, '', '', true);
$pdf->MultiCell(100, 10, '业务单位 (Buisness Unit) : ' .$info->unit, 0, 'L', 1, 0, '', '', true);

$pdf->SetFont($chineseform, '', 14);
$pdf->Write(25, '', '', 0, 'C', true, 0, false, false, 0);
$pdf->Write(0, '集团人力资源管理中心 (Human Resource Management Center)', '', 0, 'C', true, 0, false, false, 0);
$pdf->Write(0, '2022年 3月制 (March of 2022)', '', 0, 'C', true, 0, false, false, 0);

$pdf->Write(30, '', '', 0, 'C', true, 0, false, false, 0);

$pdf->SetFont($chineseform, '', 10.5);
$pdf->SetFillColor(217, 226, 243);
$txt = '备注
1. 本表适用于校招生、优秀青年人才、后备人才制定个人培养发展计划（IDP）。 
2. 各单元如无IDP工具表则可以直接使用此表，各单元也可以使用各自现有的IDP工具表。 
3. 如您不会制定IDP，可参考本文档最后一页IDP制定指引。';
$pdf->MultiCell(180, 10, $txt, 1, 'L', 1, 0, '', '', true);
$pdf->Ln(2);

$pdf->Write(20, '', '', 0, 'C', true, 0, false, false, 0);

$pdf->SetFont($chineseform, '', 10.5);
$pdf->SetFillColor(217, 226, 243);
$txt = 'Tips
1. This form is used to marking individual Development Plan for Fresh Graduates, Outstanding Youth and Successors.
2. Each buisness unit can use this form flexbly according to the existing IDP situation.
3. The Applicable IDP generation can be guided by the IDP specification at the end of the document.';
$pdf->MultiCell(180, 10, $txt, 1, 'L', 1, 0, '', '', true);
$pdf->Ln(2);

//============================================================+
//End of Cover Page
//============================================================+
//Start OF Training information
//============================================================+
$chineseform = 'stsongstdlight';
// add a page
$pdf->AddPage();
$pdf->setFormDefaultProp(array('lineWidth' => 1, 'borderStyle' => 'solid', 'fillColor' => array(255, 255, 200), 'strokeColor' => array(255, 128, 128)));

$pdf->SetFont($chineseform, 'B', 30);
// print a block of text using Write()
$pdf->Cell(0, 5, 'Individual Development Plans', 0, 1, 'C');

$pdf->Ln(1);

$pdf->SetFont('stsongstdlight', '', 12);
$TalentType = '<table border="0">
                <tr>
                    <td colspan="6"><b>人才类型 ： </b>
                        <input type="checkbox" name="wow" value="1" readonly="true" >校招生  
                        <input type="checkbox" name="wow" value="1" readonly="true" checked="checked">优青
                        <input type="checkbox" name="wow" value="1" readonly="true" >后备 
                        </td>
                    <td colspan="2"><b>制定日期 : </b> '.$day.' '.$month.' , '.$y.'</td>
                </tr>
            </table>
            <table border="0">
                <tr>
                    <td colspan="6"><b>Group of Talents ： </b>
                        <input type="checkbox" name="wow" value="1" readonly="true" >Fresh Graduates  
                        <input type="checkbox" name="wow" value="1" readonly="true" checked="checked">Outstanding Youth
                        <input type="checkbox" name="wow" value="1" readonly="true" >Successors
                        </td>
                    <td colspan="2"><b>Dates : </b> '.$day.' '.$month.' , '.$y.'</td>
            ';
$EmployeeDetail_start = '<table border="1" cellpadding="7">
                            <tr>
                                <td>姓名 : <br/>Name : '. $info->name . '</td>
                                <td>性别 : <br/>Gender : '.$info->gender.'</td>
                                <td>工号 : <br/>Staff ID ： '.$info->id.'</td>
                                <td>单元 ：<br/>Unit : '.$info->unit.'</td>
                            </tr>
                            <tr>
                                <td>部门 : <br/>Department : '.$info->department.'</td>
                                <td>职位 : <br/>Position : '.$info->position.'</td>
                                <td>个人职级 : <br/>Personal Grade : '.$info->personalgrade.'</td>
                                <td>导师 : <br/>Mentor : '.$info->mentor.'</td>
                            </tr>';

$key_Career_Exp =   '<tr style="line-height:100%;">
                            <td colspan="4"><b>职业生涯关键经历 (选填) ：</b><br/>
                            <b>Key Career Experiences (optional) : </b><br/><br/><br/><br/><br/>
                            </td>
                        </tr>';

$training_Direction =   '<tr>
                                <td colspan="4"><b>未来1-3年培养发展方向 (必填) : </b><br/>
                                <b>Training Direction in the next 1-3 years (compulsory) : </b><br/><br/>'.nl2br($info->workingexp).'<br/><br/><br/>
                                </td>            
                            </tr>';

$strength = '<tr>
                    <td colspan="2"><b>个人优势 : </b><br/>
                        <b>Strength : </b> <br/><br/>'.nl2br($info->strength).'<br/><br/><br/><br/><br/>
                    </td>
                ';

$weakness = '   <td colspan="2"><b>待发展项 : </b><br/>
                        <b>Weakness : </b> <br/><br/> '.nl2br($info->weakness).'<br/><br/><br/><br/><br/><br/>
                    </td>
                </tr>';

$employeeDetail_end = "</table>";

$Training_Information = TrainingInformation($info);

$all_emp_Detail = $EmployeeDetail_start . $key_Career_Exp . $training_Direction . $strength . $weakness . $employeeDetail_end;
// $html = '<input type="checkbox" name="wow" value="1" readonly="true" checked="checked">asdasdsad';
$pdf->writeHTML($TalentType, true, false, true, false, '');
$pdf->writeHTML($all_emp_Detail, true, false, true, false, '');

$pdf->AddPage();
$pdf->writeHTML($Training_Information, true, false, true, false, '');


// $pdf->RoundedRect(50, 255, 3, 3, 3.50, '0000', 'DF'); // left padding, top padding, width, height, border-round,
//============================================================+
//End of Training information
//============================================================+
//Start OF Quarter IDP
//============================================================+
$chineseform = 'stsongstdlight';

$pdf->AddPage();

$pdf->SetFont($chineseform, 'B', 25);
$pdf->Write(0, '个人培养发展定期回顾与反馈表', '', 0, 'C', true, 0, false, false, 0);

$pdf->SetFont('Times', '', 15);
$pdf->Write(0, 'Individual Development Plan', '', 0, 'C', true, 0, false, false, 0);
$pdf->Write(0, 'Regular review and feedback form', '', 0, 'C', true, 0, false, false, 0);

$pdf->SetFont($chineseform, '', 12);

$quarterCN = array(
    '1季度',
    '2季度',
    '3季度',
    '4季度'
);

$quarterEN = array(
    'Quarter 1',
    'Quarter 2',
    'Quarter 3',
    'Quarter 4'
);

$temp = '<table border="0">
                <tr>
                    <td colspan="5"><b>回顾周期：</b>';
for ($i = 0; $i < count($quarterCN); $i++) {
    $check = "";
    if($info->checkboxQuarter[$i]['Q_ID'] == $info->quarter){
        $check = 'checked="checked"';
    }
    $temp .=  '<input type="checkbox" name="wow" value="1" '.$check.' readonly="true">'.$quarterCN[$i] . " ";
}

$temp .= '</td>
                    <td colspan="2"><b>填写日期: </b>'.$day.' '.$month.' , '.$y.'</td>
                </tr>
                <tr>
                    <td colspan="5"><b>Review Period: </b> ';

for ($i = 0; $i < count($quarterCN); $i++) {
    $check = "";
    if($info->checkboxQuarter[$i]['Q_ID'] == $info->quarter){
        $check = 'checked="checked"';
    }
    $temp .= '<input type="checkbox" name="wow" value="1" '.$check.' readonly="true">'.$quarterEN[$i] . " ";
}

$temp .= '</td>
                    <td colspan="2"><b>Date: </b> '.$day.' '.$month.' , '.$y.'</td>
                </tr>
            </table>';

$pdf->writeHTML($temp, true, false, true, false, '');
$pdf->writeHTML(QuarterReport($info), true, false, true, false, '');

//============================================================+
//END OF Quarter IDP
//============================================================+
$pdf->Output('example_003.pdf', 'I');
//============================================================+
// END OF FILE
//============================================================+

function QuarterReport($info)
{
    $grading = array(
        '0分-不合格 Fail<br/>',
        '2分-需改进 Need to improved <br/>',
        '3分-合格 Qualified<br/>',
        '4分-良好 Good<br/>',
        '5分-优秀 Excellent<br/>'
    );
    $temp = '<table border="1" cellpadding="7">
                <tr>
                    <td colspan="6"><b>本季度个人培养发展小结：</b><br/><b>Personal Development summary for this quarter: </b>
                    <br/><br/>'.$info->PDS_quarter.'<br/><br/><br/><br/>
                    </td>
                </tr>
                <tr>
                    <td colspan="4"><b>导师辅导评价及建议</b><br/><b>Mentors evaluation and suggestions</b><br/><br/>
                        '.$info->MEAS_quarter.'
                    </td>
                    <td colspan="2"><b>本季度综合评价</b><br/><b>Overall appraisal of this Quarter</b><br/>';

    for ($i = count($grading); $i >= 1; $i--) {
        $check = "";
        if($info->marks_quarter == $i){
            $check = 'checked="checked"';
        }
        $temp .=  '<input type="checkbox" name="wow" value="1" '.$check.' readonly="true">'.$grading[$i-1];
    }

    $temp .= '<br/><br/><br/></td>
                </tr>
                <tr>
                    <td colspan="3"><b>员工签字：</b><br/><b>Signature of the staff:</b><br/><br/></td>
                    <td colspan="3"><b>导师签字：</b><br/><b>SIgnature of the mentor:</b><br/><br/></td>
                </tr>
            </table>';

    return $temp;
}

function TrainingInformation($info)
{
    $temp = '<table border="1" cellpadding="7">';
    $temp .=    '<tr>
                    <td colspan="3"><b>培养类型<br/>Training Type</b></td>
                    <td colspan="6"><b>关键培养计划<br/>Training Plan</b></td>
                    <td colspan="2"><b>起止时间<br/>Period</b></td>
                    <td colspan="2"><b>结果验证<br/>Result</b></td>
                </tr>';

    $TrainingType = array(
        "实践历练（必填）<br/>Pratice Project(Compulsory):", "导师辅导（必填）<br/>Tutor guidance(Compulsory):",
        "学习项目（选填）<br/> Study Program (optional):", "曙光计划（必填）<br/>Exposure Plan(Compulsory):"
    );
    for ($i = 1; $i <= count($TrainingType); $i++) {
        if($info->actionplan[$i-1][0] == "--"){
            $temp .= '  <tr >
                            <td colspan="3" rowspan="'.count($info->actionplan[$i-1]).'"><b>' . $TrainingType[$i - 1] . '</b></td>
                            <td colspan="6"><br/><br/>--<br/></td>
                            <td colspan="2"><br/><br/>--<br/></td>
                            <td colspan="2"><br/><br/>--<br/></td>
                        </tr>';
        }else{
            
            $temp .= '  <tr >
                            <td colspan="3" rowspan="'.count($info->actionplan[$i-1]).'"><b>' . $TrainingType[$i - 1] . '</b></td>
                            <td colspan="6"><br/><br/>'.$info->actionplan[$i-1][0]['AP_Description'].'<br/></td>
                            <td colspan="2"><br/><br/>'.$info->actionplan[$i-1][0]['AP_Date'].'<br/></td>
                            <td colspan="2"><br/><br/>'.actionplan_stats($info->actionplan[$i-1][0]['AP_Status']).'</td>
                        </tr>';
        }
        
        for ($j = 1; $j <= count($info->actionplan[$i-1])-1; $j++) {
            $temp .=    '<tr>
                            <td colspan="6"><br/><br/>'.$info->actionplan[$i-1][$j]['AP_Description'].'<br/></td>
                            <td colspan="2"><br/><br/>'.$info->actionplan[$i-1][$j]['AP_Date'].'<br/></td>
                            <td colspan="2"><br/><br/>'.actionplan_stats($info->actionplan[$i-1][0]['AP_Status']).'<br/></td>
                        </tr>';
        }
    }

    $temp .= '</table>';

    return $temp;
}

function actionplan_stats($ap_status){
    if($ap_status == "0"){
        $ap_status = "Close";
    }else if($ap_status == "1"){
        $ap_status = "Open";
    }else{
        $ap_status = "Cancel";
    }
    return $ap_status;
}
