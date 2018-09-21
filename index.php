<!doctype html>
<html>

<?
date_default_timezone_set("America/Chicago");
$user = "bob";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

include '../conn.php';
//$sql = "SELECT * FROM tasks";

?>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style media="screen">
.row {
    margin-right: -15px;
    margin-left: -15px;
    display: grid;
    grid: none / auto auto auto auto auto auto auto auto auto auto auto auto;
}
.l1 {
	display: none;
	font-weight: bold;
}
</style>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<header class="header h1">El Lio</header>
<nav class="nav">Content for  class "nav" Goes Here<div><iframe src="http://cerberus.firelighttechnologies.com/"></iframe></div></nav>
<?
	if(isset($_REQUEST['submit']) && ($_REQUEST['submit'] == "Add") ){
//		echo $_REQUEST['new_date'] . "<br />";
//		echo $_REQUEST['new_task'] . "<br />";
//		echo $_REQUEST['new_category'] . "<br />";
//		echo $_REQUEST['new_user'] . "<br />";

//		$sql = "CALL `task_new`('due, task, category, userid, perm')";
		$sql = "CALL `task_new`('" . date ("Y-m-d H:i:s", $_REQUEST['new_date']) . "', '". $_REQUEST['new_task'] . "', '". $_REQUEST['new_category'] . "', '". $_REQUEST['new_user'] . "', " . 7 . ")";
//echo $sql;
	try {
			$result = mysqli_query($conn, $sql);
}
catch(exception $e) {
  echo "ex: ".$e;
}



	}else{
		$sql = "CALL `tasks_get_by_user`('" . $user . "')";
//		$result = mysqli_query($conn, $sql);
		?>

<main class="main container">
  <div class="row">
    <div class="date">Date
    </div>
    <div class="time">Time</div>
    <div class="task">task</div>
    <div class="category">Category</div>
    <div class="Status">Status</div>
  </div>
	<div>
<?
//	if(mysqli_num_rows($result) > 0) {
	// output data of each row
//	while($row = mysqli_fetch_assoc($result)) {
//			echo "<div class='l1'> task_id:</div> " . $row["task_id"]. " <div class='l1'> - created: </div>" . $row["created"]. " <div class='l1'>Category</div> - ". $row["category"]. " <div class='l1'>task</div> " . $row["task"]. " <div class='l1'>due</div> ". $row["due"]. " <div class='l1'>status:</div> " . $row["status"]. "<br>";
//	}
//} else {
//	echo "0 results";
//}
mysqli_close($conn);
?>
	</div>
</main>
<?
}
?>
	<aside class="new">
		<form>
		  <div class="row h3">New Task</div>
          <div class="row">
            <label for="new_date">Date:<input name="new_date" type="datetime-local" id="new_date"></label><label for="new_task">Task<input name="new_task" type="text" id="new_task"></label><label for="new_category">Category</label><input name="new_category" type="text" id="new_category"><label for="new_status">Status:</label><input name="new_status" type="checkbox" id="new_status">
          </div>
          <div class="row">
						<input type="hidden" name="new_user" value="<? echo $user ?>" />
            <input type="submit" name="submit" value="Add">
          </div>
	  </form>
	</aside>
<footer class="footer">Content for  class "footer" Goes Here</footer>
</body>
</html>
