<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "hms") or die("Connection failed");

if(isset($_POST['check_viewbtn']))
{
    $ID = $_POST['B_id'];
    $sql1 = "SELECT * FROM complaints WHERE com_id='$ID'";
    $runSql1 = mysqli_query($conn,$sql1);
    if(mysqli_num_rows($runSql1)>0){
        foreach($runSql1 as $rowSql1)
        {
            echo $return = '
                <b> Name: </b>'.$rowSql1['res_Uname'].'<br>
                <b> Room No: </b>'.$rowSql1['room_no'].'<br>
                <b> Complaint: </b>'.$rowSql1['com_message'].'<br>
            ';
            
            if($rowSql1['status'] == 1)
            {
                echo $return = '
                    <b> Status: </b> Reviewed <br>
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