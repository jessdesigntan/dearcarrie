<?php error_reporting(0);
 
$con = mysql_connect('localhost', 'root','root');
$db = mysql_select_db('dearcarrie');
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