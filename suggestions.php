<?php
    define('_HOST_NAME', 'localhost');
    define('_DATABASE_USER_NAME', 'root');
    define('_DATABASE_PASSWORD', 'root');
    define('_DATABASE_NAME', 'dearcarrie');
    
    $dbConnection = new mysqli(_HOST_NAME, _DATABASE_USER_NAME, _DATABASE_PASSWORD, _DATABASE_NAME);
    if ($dbConnection->connect_error) {
        trigger_error('Connection Failed: '  . $dbConnection->connect_error, E_USER_ERROR);
    }
?>


<?php

    if(isset($_POST['search_keyword']))
    {
        $search_keyword = $dbConnection->real_escape_string($_POST['search_keyword']);
        $sql= "SELECT title, 'Title: ' as source FROM posts WHERE (title LIKE '%$search_keyword%') AND published = 1 
                        UNION ALL SELECT title, 'Topic: ' as source FROM topics WHERE (title LIKE '%$search_keyword%') AND published = 1";
        $query=$dbConnection->query($sql);
 
        if($query === false) {
            trigger_error('Error: ' . $dbConnection->error, E_USER_ERROR);
        }else{
            $rows_returned = $query->num_rows;
        }
 
    	$bold_search_keyword = '<strong>'.$search_keyword.'</strong>';
    	if($rows_returned > 0){
            while($rowRecord = $query->fetch_assoc()) 
            {		
                echo '<div class="show" align="left"><span class="posts_details">'.str_ireplace($search_keyword,$bold_search_keyword,$rowRecord['source'].$rowRecord['title']).'</span></div>'; 	
            }
        }else{
            echo '<div class="show" align="left">No matching records.</div>'; 	
        }
    } else {
        echo '<div class="show">Search Data is Required</div>'
    }
?>