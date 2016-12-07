<?php
 mysql_connect("localhost","root","root");
 mysql_select_db("dearcarrie");
 
 $term=$_GET["term"];
 
 $query=mysql_query("SELECT * FROM posts WHERE (title LIKE '%$term%' OR description LIKE '%$term%' OR timestamp LIKE '%$term%') AND published = 1");
 $json=array();
 
    while($result=mysql_fetch_array($query)){
         $json[]=array(
                    'value'=> $result["title"],
                    'label'=>$result["title"]     //.'- '.$result['description']
                        );
    }
 
 echo json_encode($json);
 
?>