<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript">
        $(function () {
            $("#subbtn").click(function () {
                var data = '{"orders":[';
                var MyRows = $('table#htmlTable').find('tbody').find('tr');
                var customerDetails = $('#customerDetails').val();
                var responsibleStaffMember = $("#responsibleStaffMember").val();

                for (var i = 0; i < MyRows.length; i++) {
                    // spatulaId
                    var spatulaId = $(MyRows[i]).find('td:eq(0)').html();
                    // orderQuantity
                    var orderQuantity = $(MyRows[i]).find('td:eq(7)')
                    orderQuantity.find("input").each(function () {
                        inputName = $(this).val();
                        if (i == MyRows.length - 1) {
                            data += '{"spatulaId":' + spatulaId + ',"orderQuantity":' + inputName + ',"customerDetails":' + customerDetails + ',"responsibleStaffMember":' + responsibleStaffMember + '}';
                        } else {
                            data += '{"spatulaId":' + spatulaId + ',"orderQuantity":' + inputName + ',"customerDetails":' + customerDetails + ',"responsibleStaffMember":' + responsibleStaffMember + '},';
                        }

                    });
                }
                data += ']}';
                alert(data);
                var url = "submit.php";
                $.ajax({
                    type: "post",
                    url: url,
                    dataType: "json",
                    data: data,
                    success: function (msg) {
                        alert("Submitted");
                    },
                    error: function (jqXHR, exception) {
                        var msg = '';
                        if (jqXHR.status === 0) {
                            msg = 'Not connect.\n Verify Network.';
                        } else if (jqXHR.status == 404) {
                            msg = 'Requested page not found. [404]';
                        } else if (jqXHR.status == 500) {
                            msg = 'Internal Server Error [500].';
                        } else if (exception === 'parsererror') {
                            msg = 'Requested JSON parse failed.';
                        } else if (exception === 'timeout') {
                            msg = 'Time out error.';
                        } else if (exception === 'abort') {
                            msg = 'Ajax request aborted.';
                        } else {
                            msg = 'Uncaught Error.\n' + jqXHR.responseText;
                        }
                        alert(msg);
                    },
                });
            });

        });
    </script>
</head>

<body>
<div class="container">
    <div class="row">
        <h3>Orders</h3>
        <h4>Customer Details:</h4>
        <textarea rows="3" cols="20" id="customerDetails">
        </textarea>
        <h4>Responsible Staff Member:</h4>
        <input type="text" id="responsibleStaffMember"/>
    </div>
    <div class="row">
        <table class="table table-striped table-bordered" id="htmlTable">
            <thead>
            <tr>
                <th>Spatula ID</th>
                <th>Name</th>
                <th>Type</th>
                <th>Size</th>
                <th>Colour</th>
                <th>Price</th>
                <th>Quantity currently in stock</th>
                <th>Order Quantity</th>
            </tr>
            </thead>
            <tbody>
            <?php
            include 'database.php';
            $pdo = Database::connect();
            $sql = 'SELECT * FROM Spatula WHERE QuantityInStock > 0';
            foreach ($pdo->query($sql) as $row) {
                echo '<tr>';
                echo '<td>' . $row['idSpatula'] . '</td>';
                echo '<td>' . $row['ProductName'] . '</td>';
                echo '<td>' . $row['Type'] . '</td>';
                echo '<td>' . $row['Size'] . '</td>';
                echo '<td>' . $row['Colour'] . '</td>';
                echo '<td>' . $row['Price'] . '</td>';
                echo '<td>' . $row['QuantityInStock'] . '</td>';
                echo '<td><input type="number" value="0" min="0"/></td>';
                echo '</tr>';
            }
            Database::disconnect();
            ?>
            </tbody>
        </table>
        <input type="button" value="submit" id="subbtn"/>
    </div>
</div> <!-- /container -->
</body>
</html>