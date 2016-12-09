<?php error_reporting(0);
include("controllers/templates.php");
$con = connectToDataBase();
//where 'term' is the default keyword in jquery autocomplete api
$query = $_REQUEST['term'];
$sql = "SELECT * FROM posts WHERE (title LIKE '%$query%' OR description LIKE '%$query%' OR timestamp LIKE '%$query%') AND published = 1";
$query = mysql_query($sql);

while($row = mysql_fetch_assoc($query)){
$val[] = $row['title'];
}
//here we convert the result into JSON
echo json_encode($val);

?>
