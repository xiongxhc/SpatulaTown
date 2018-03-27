<?php
$name = "";
$type = "";
$size = "";
$colour = "";
$price = "";
if (!empty($_POST)) {
// keep track post values
    $name = $_POST['name'];
    $type = $_POST['taskOption'];
    $size = $_POST['Size'];
    $colour = $_POST['Colour'];
    $price = $_POST['Price'];
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
    <div class="row">
        <h3>Search Result</h3>
    </div>
    <div class="row">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th hidden="hidden">Spatula ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            include 'database.php';
            $pdo = Database::connect();
            $sql = "SELECT * FROM Spatula ";
            if($name != ""){
                $sql.= "where ProductName = '$name' ";
            }
            if($type != "Default"){
                $sql.= "where Type = '$type' ";
            }
            if($size != ""){
                $sql.= "where Size = '$size' ";
            }
            if($colour != ""){
                $sql.= "where Colour = '$colour' ";
            }
            if($price != ""){
                $sql.= "where Price = $price";
            }
            //var_dump($sql);
            foreach ($pdo->query($sql) as $row) {
                echo '<tr>';
                echo '<td hidden="hidden"> ' . $row['idSpatula'] . '</td>';
                echo '<td>' . $row['ProductName'] . '</td>';
                echo '<td><a class="btn" href="read.php?id=' . $row['idSpatula'] . '">Read</a></td>';
                echo '</tr>';
            }
            Database::disconnect();
            ?>
            </tbody>
        </table>
    </div>
</div> <!-- /container -->
</body>
</html>