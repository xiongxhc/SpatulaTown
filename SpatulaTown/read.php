<?php
require 'database.php';
$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("Location: searchResult.php");
} else {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM Spatula where idSpatula = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    Database::disconnect();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Read a Spatula</h3>
        </div>

        <div class="form-horizontal">
            <div class="control-group">
                <label class="control-label">Spatula ID</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $data['idSpatula']; ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Name</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $data['ProductName']; ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Type</label>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $data['Type']; ?>
                    </label>
                </div>
            </div>
            <label class="control-label">Size</label>
            <div class="controls">
                <label class="checkbox">
                    <?php echo $data['Size']; ?>
                </label>
            </div>
            <label class="control-label">Colour</label>
            <div class="controls">
                <label class="checkbox">
                    <?php echo $data['Colour']; ?>
                </label>
            </div>
            <label class="control-label">Price</label>
            <div class="controls">
                <label class="checkbox">
                    <?php echo $data['Price']; ?>
                </label>
            </div>
            <label class="control-label">QuantityInStock</label>
            <div class="controls">
                <label class="checkbox">
                    <?php echo $data['QuantityInStock']; ?>
                </label>
            </div>
        </div>
        <div class="form-actions">
            <a class="btn" href="search.php">Back</a>
        </div>
    </div>
</div>
</body>
</html>