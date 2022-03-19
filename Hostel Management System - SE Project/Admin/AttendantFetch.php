<?php

session_start();
$conn = mysqli_connect("localhost", "root", "", "hms") or die("Connection failed");

if (isset($_POST['check_editbtn'])) {
    print_r("page loaded");
}

$ID = $_POST['Attendant_id'];
    print_r($ID);
    $result_array = [];

    $fetchQuery = "SELECT * FROM attendant WHERE attendant_id = '$ID'";
    $fetchQueryRun = mysqli_query($conn, $fetchQuery);

    if (mysqli_num_rows($fetchQueryRun) > 0) 
    {
        foreach($fetchQueryRun as $fetchQueryRow)
        {
            array_push($result_array, $fetchQueryRow);
            
        }
        print_r($result_array);
        ob_clean();
        header('Content-type: application/json');
        echo json_encode($result_array);
    }
    else {
        echo $return = "<h4>No Record found!</h4>";
    }

?>