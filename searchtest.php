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
  $sql .= " OR id IN(";

	$j = 0;
	$sqlInner = "SELECT postid FROM topics INNER JOIN curation WHERE topicid = id AND published = 1 AND title";
	foreach ($keys as $key) {
		$sqlInner .= " LIKE '%$key%'";
		if ($j != count($keys)-1) {
			$sqlInner .= " OR title";
		}
		$j++;
	}
	$sqlInner .= ")";
	$sql .= $sqlInner;
  echo $sql;

?>
