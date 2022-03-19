<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "hms") or die("Connection failed");

if(isset($_POST['check_viewbtn']))
{
    $ID = $_POST['Att_id'];
    $sql1 = "SELECT * FROM attendant WHERE attendant_id='$ID'";
    $runSql1 = mysqli_query($conn,$sql1);
    if(mysqli_num_rows($runSql1)>0){
        foreach($runSql1 as $rowSql1)
        {
            echo $return = '
                <img src="'.$rowSql1['attendant_picture'].' " alt="image" height="100px" width="100px"><br>
                <b> Name: </b>'.$rowSql1['attendant_name'].'<br>
                <b> Gender: </b>'.$rowSql1['attendant_gender'].'<br>
                <b> Contact: </b>'.$rowSql1['attendant_contact'].'<br>
                <b> Date of Birth: </b>'.$rowSql1['attendant_DOB'].'<br>
                <b> CNIC: </b>'.$rowSql1['attendant_CNIC'].'<br>
                <b> Email: </b>'.$rowSql1['attendant_email'].'<br>
                <b> Address: </b>'.$rowSql1['attendant_address'].'<br>
                <b> Permanent Address: </b>'.$rowSql1['attendant_pAddress'].'<br>
            ';
        }
    } 
}
else {
    return 'Data not displayed';
    
}
?>