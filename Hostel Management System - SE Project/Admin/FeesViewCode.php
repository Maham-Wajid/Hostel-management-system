<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "hms") or die("Connection failed");

if(isset($_POST['check_viewbtn']))
{
    $ID = $_POST['B_id'];
    $sql1 = "SELECT * FROM bills WHERE bill_id='$ID'";
    $runSql1 = mysqli_query($conn,$sql1);
    if(mysqli_num_rows($runSql1)>0){
        foreach($runSql1 as $rowSql1)
        {
            echo $return = '
                <img src="upload/'.$rowSql1['bill_img'].' alt="image" style="width: 100px; height:100px;" "><br>
                <b> Name: </b>'.$rowSql1['std_name'].'<br>
                <b> Bill Type: </b>'.$rowSql1['bill_type'].'<br>
                <b> Payment amount: </b>'.$rowSql1['bill_payment'].'<br>
            ';
            
            if($rowSql1['bill_status'] == 1)
            {
                echo $return = '
                    <b> Status: </b> Paid <br>
                ';
            }else {
                echo $return = '
                    <b> Status: </b> Not Paid <br>
                ';
            }
        }
    } 
}
?>