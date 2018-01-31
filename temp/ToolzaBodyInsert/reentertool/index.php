<html>
<head>
<title>
</title>
</head>
<body>
<div style="background-color: red;">
    <p>amazing sait</p>
	<? echo md5("/toolza/index.php"); ?>
</div>
<?
if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])) {
    echo "привет юзер с id = " . $_GET['id'];
}
?>
</body>
</html>