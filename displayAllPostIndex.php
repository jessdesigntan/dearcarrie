<?php

include('controllers/templates.php');

$posts = displayAllPostIndex();
foreach ($posts as $post) {
	card($post["id"]);
}
?>
