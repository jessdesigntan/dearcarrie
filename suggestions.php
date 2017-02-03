<?php
     include("controllers/templates.php");
     $conn =  connectToDataBase();

?>

<?php

    if(isset($_POST['search_keyword']))
    {
        $search_keyword  = $_POST['search_keyword'];
        $sql= "SELECT title, 'Title: ' as source FROM posts WHERE (title LIKE '%$search_keyword%') AND published = 1
                        UNION ALL SELECT title, 'Topic: ' as source FROM topics WHERE (title LIKE '%$search_keyword%') AND published = 1 limit 10";
        $query=$conn->query($sql);

        if($query === false) {
            trigger_error('Error: ' . $conn->error, E_USER_ERROR);
        }else{
            $rows_returned = $query->num_rows;
        }

        $bold_search_keyword = '<strong>'.$search_keyword.'</strong>';
        if($rows_returned > 0){
            while($rowRecord = $query->fetch_assoc())
            {
                echo '<div class="show" align="left"><span class="posts_details">'.str_ireplace($search_keyword,$bold_search_keyword,$rowRecord['source'].
                    $rowRecord['title']).'</span></div>';

            }  
        } 
    }
?>