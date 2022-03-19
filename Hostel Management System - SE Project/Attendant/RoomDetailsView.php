<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "hms") or die("Connection failed");

if(isset($_POST['viewbtn']))
{
    $ID = $_POST['r_Id'];
    $sql1 = "SELECT * FROM applications WHERE room_no='$ID'";
    $runSql1 = mysqli_query($conn,$sql1);
    if(mysqli_num_rows($runSql1)>0){
        foreach($runSql1 as $rowSql1)
        {
            echo $return = '
                <b> Name: </b>'.$rowSql1['applicant_name'].'<br>
                <b> Gender: </b>'.$rowSql1['applicant_gender'].'<br>
                <b> Contact: </b>'.$rowSql1['applicant_contact'].'<br>
                <b> CNIC: </b>'.$rowSql1['applicant_CNIC'].'<br>
                <b> Email: </b>'.$rowSql1['applicant_email'].'<br>
                <b> Address: </b>'.$rowSql1['applicant_address'].'<br>
                <b> Permanent Address: </b>'.$rowSql1['applicant_pAddress'].'<br>
                <b> Alloted Room no : </b>'.$rowSql1['room_no'].'<br>
                <br><br>
            ';
        }
    } 
}
else {
    return 'Data not displayed';
    
}
?>