<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "hms") or die("Connection failed");

if(isset($_POST['check_viewbtn']))
{
    $ID = $_POST['App_id'];
    $sql1 = "SELECT * FROM applications WHERE application_id='$ID'";
    $runSql1 = mysqli_query($conn,$sql1);
    if(mysqli_num_rows($runSql1)>0){
        foreach($runSql1 as $rowSql1)
        {
            echo $return = '
                <img src="'.$rowSql1['applicant_picture'].' alt="image" style="width: 100px; height:100px;" "><br>
                <b> Name: </b>'.$rowSql1['applicant_name'].'<br>
                <b> Gender: </b>'.$rowSql1['applicant_gender'].'<br>
                <b> Contact: </b>'.$rowSql1['applicant_contact'].'<br>
                <b> Email: </b>'.$rowSql1['applicant_email'].'<br>
                <b> CNIC: </b>'.$rowSql1['applicant_CNIC'].'<br>
                <b> Address: </b>'.$rowSql1['applicant_address'].'<br>
                <b> Permanent Address: </b>'.$rowSql1['applicant_pAddress'].'<br>
                <b> Guargian Name: </b>'.$rowSql1['applicant_gardName'].'<br>
                <b> Guardian Relation: </b>'.$rowSql1['applicant_gardRelation'].'<br>
                <b> Guardian CNIC: </b>'.$rowSql1['applicant_gardCNIC'].'<br>
                <b> Guardian Contact: </b>'.$rowSql1['applicant_gardContact'].'<br>
                <b> Emergency Relation: </b>'.$rowSql1['applicant_emergencyRelation'].'<br>
                <b> Emergency Contact: </b>'.$rowSql1['applicant_emergencyContact'].'<br>
                <b> Category: </b>'.$rowSql1['applicant_category'].'<br>
            ';
            if($rowSql1['applicant_category'] == "University Student")
            {
                echo $return = '
                    <b> Redgistration Number: </b>'.$rowSql1['applicant_redgNo'].'<br>
                    <b> Department: </b>'.$rowSql1['applicant_department'].'<br>
                    <b> Semester: </b>'.$rowSql1['applicant_semester'].'<br>
                    <b> GPA: </b>'.$rowSql1['applicant_GPA'].'<br>
                    <b> CGPA: </b>'.$rowSql1['applicant_CGPA'].'<br>
                    <b> Batch: </b>'.$rowSql1['applicant_batch'].'<br>
                ';
            }
            if($rowSql1['application_status'] == 1)
            {
                echo $return = '
                    <b> Status: </b> Approved <br>
                ';
            }else {
                echo $return = '
                    <b> Status: </b> Pending <br>
                ';
            }
        }
    } 
}
?>