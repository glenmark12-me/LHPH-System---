<?php
require_once('connection.php');

// Get the ID from the query string
$id = $_GET["id"];

// Retrieve data for lot_information table
$sql = "SELECT Lot_ID, Block, Lot, Street, Status, Area, Price, Remarks from lot_information where Lot_ID = '$id'";


$result = $con->query($sql);
$lot_info = $result->fetch_assoc();

// Retrieve data for association_dues table
$sql1 = "SELECT Lot_ID, Monthly_Dues, Yearly_Dues, Dues_Status, DueRemarks, date_assigned from association_dues where Lot_ID = '$id'";
$sresult = $con->query($sql1);
$dues_info = $sresult->fetch_assoc();

//check if the dues_info array has values
if(!empty($dues_info)){
    $data = array_merge($lot_info, $dues_info);
    echo json_encode($data);
}
else {
    echo json_encode($lot_info);
}

$con->close();
?>