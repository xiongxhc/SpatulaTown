<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;  charset=iso-8859-1">
    <title>Search Contacts</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<h3>Search</h3>
<form method="post" action="searchResult.php" id="searchform">
    Spatula name:<input type="text" name="name">
    <br> <br>
    <select name="taskOption">
        <option value="Default" selected="selected">--selected Type--</option>
        <option value="Drugs">Drugs</option>
	 <option value="Food">Food</option>
        <option value="Paints">Paints</option>
        <option value="Plaster">Plaster</option>
    </select>
    <br> <br>
    Size:<input type="text" name="Size">
    <br> <br>
    Colour:<input type="text" name="Colour">
    <br> <br>
    Price($AU):<input type="text" name="Price">
    <br> <br>
    <input type="submit" name="submit" value="Search">
</form>
</body>
</html>
