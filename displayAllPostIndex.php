<?php

include('controllers/templates.php');

$posts = displayAllPost();
foreach ($posts as $post) {
	card($post["id"]);
}
?>