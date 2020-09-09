<?php
session_start();
include('config.php');

if($id==""){
 echo "<meta http-equiv=\"refresh\" content=\" 0; URL='index.php'\" />";
 exit();   
}
if($_GET['search']!=""){
    $_GET['p']="2";
}
if($_GET['del']!=""){
    $sql = "DELETE FROM `post` WHERE id=".$_GET['del'];
            	$query = mysql_query($sql) or die("Fatal error: ".mysql_error());
            	$_SESSION['msg']="Пост удалён";
                	 echo "<meta http-equiv=\"refresh\" content=\" 0; URL='blog.php'\" />";
 exit();   
}
if($_GET['pod']!=""){
    $pod="";
    $sql = "SELECT * FROM users WHERE id=".$id;
    $result = mysql_query($sql);
            	$rowCheck = mysql_num_rows($result);
                	if($rowCheck > 0) {
                    	while($row = mysql_fetch_array($result)) {
                    	$pod=$row['podpis'];
                    	}
                	}
                	$pod=$pod."_".$_GET['pod']."_";
                	$sql = "UPDATE users SET podpis='$pod' WHERE id=".$id;
            	$query = mysql_query($sql) or die("Fatal error: ".mysql_error());
            	$_SESSION['msg']="Вы подписались на пользователя";
                	 echo "<meta http-equiv=\"refresh\" content=\" 0; URL='blog.php?p=2'\" />";
 exit();   
}
if($_GET['ot']!=""){
    $pod="";
    $sql = "SELECT * FROM users WHERE id=".$id;
    $result = mysql_query($sql);
            	$rowCheck = mysql_num_rows($result);
                	if($rowCheck > 0) {
                    	while($row = mysql_fetch_array($result)) {
                    	$pod=$row['podpis'];
                    	}
                	}
                	$pod=str_replace("_".$_GET['ot']."_", "", $pod);;
                	$sql = "UPDATE users SET podpis='$pod' WHERE id=".$id;
            	$query = mysql_query($sql) or die("Fatal error: ".mysql_error());
            	$_SESSION['msg']="Вы отписались от пользователя";
                	 echo "<meta http-equiv=\"refresh\" content=\" 0; URL='blog.php?p=2'\" />";
 exit();   
}
include('header.php');
?>
<meta charset="utf-8">
<center>
    <?php
    include('menu.php');
    
    include('post.php');
    ?>
    
    
    
    
</center>