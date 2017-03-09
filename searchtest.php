<?php

  $keyword = "bipolar happy";
  $keys = explode(" ", $keyword);

  $sql = "SELECT * FROM posts WHERE title";
  $i = 0;
	foreach ($keys as $key) {
		$sql .= " LIKE '%$key%'";
		if ($i != count($keys)-1) {
			$sql .= " OR title";
		}
    $i++;
	}
  echo $sql;

?>
