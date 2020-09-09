<?php
include('config.php');

$path = 'img/';
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
   if(copy($_FILES['picture']['tmp_name'], $path . date("m-d-y").$_FILES['picture']['name'])){
       $img=$path.date("m-d-y").$_FILES['picture']['name'];
   }
    $sql = "INSERT INTO post (id_user, op, img)
            									 VALUES ('$id', '".$_POST['text']."', '$img')";
            	$query = mysql_query($sql) or die("Fatal error: ".mysql_error());
    
    
    	$_SESSION['msg'] = 'Пост опубликован';
    echo "<meta http-equiv=\"refresh\" content=\" 0; URL='blog.php'\" />";
                        	exit();
 
}
 
?>