<?php
include 'database.php';

$pdo = Database::connect();

// Begin a transaction
$pdo->beginTransaction();

$json = json_decode($_POST);
$idOrder = 0;

foreach ($json->orders as $orders) {
    $date = date('Y-m-d H:i:s');
    $spatulaId = $orders->spatulaId;
    $orderQuantity = $orders->orderQuantity;
    $customerDetails = $orders->customerDetails;
    $responsibleStaffMember = $orders->responsibleStaffMember;

    
    // insert order table
   	$sql = "INSERT INTO Order (idOrder,RequestedTime,ResponsibleStaffMember,CutomerDetails) values(?, ?, ?,?)";
    $q = $pdo->prepare($sql);
	$q->execute(array($idOrder, $date, $responsibleStaffMember, $customerDetails));

    //insert orderLineItem table
    $sql = "INSERT INTO OrderLineItem (idSpatula,idOrder,Quantity) values(?, ?, ?)";
    $q = $pdo->prepare($sql);
    $q->execute(array($spatulaId, $idOrder, $orderQuantity));
    $idOrder += 1;

	//update Spatula table
	$inStock = "SELECT QuantityInStock FROM Spatula WHERE idSpatula = ?";
	$q = $pdo->prepare($inStock);
	$q->execute(array($spatulaId));
	$row = $q->fetch(PDO::FETCH_ASSOC);

	$leftStock = $row['QuantityInStock'];
	$update = "UPDATE `Spatula` SET `QuantityInStock` = ? WHERE `idSpatula` = ?";
	$q = $pdo->prepare($updata);
	$q->execute(array($leftStock - $orderQuantity, $spatulaId));
}
//Recognize mistake and roll back changes
$pdo->rollBack();
Database::disconnect();

echo json_encode($_POST);
?>
