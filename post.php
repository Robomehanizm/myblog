<?php


function who($id){
    $sql = "SELECT * FROM users WHERE id=".$id;
    $result = mysql_query($sql);
            	$rowCheck = mysql_num_rows($result);
                	if($rowCheck > 0) {
                    	while($row = mysql_fetch_array($result)) {
                    	return $row['name'];
                    	}
                	}
}
function podpisper($id){
    $po="";
    $sql = "SELECT * FROM users WHERE id=".$id;
    $result = mysql_query($sql);
            	$rowCheck = mysql_num_rows($result);
                	if($rowCheck > 0) {
                    	while($row = mysql_fetch_array($result)) {
                    	$po= $row['podpis'];
                    	}
                	}
                	$que="";
    $pie = explode("_", $po);
    for($i=0;$i<count($pie);$i++){
        if($pie!=""){
            $que=$que."id_user = '".$pie[$i]."' or ";
        }
    }
    $que=$que."id_user = '$id'";
    return $que;
}
function ifpod($id,$id_us){
    $po="";
    $sql = "SELECT * FROM users WHERE id=".$id;
    $result = mysql_query($sql);
            	$rowCheck = mysql_num_rows($result);
                	if($rowCheck > 0) {
                    	while($row = mysql_fetch_array($result)) {
                    	$po= $row['podpis'];
                    	}
                	}
    if(strlen(str_replace("_".$id_us."_", "" , $po))==strlen($po)){
        return false;}
        else{
        return true;
    }
}
function post($par,$id)
{
    switch ($par) {
    case 0:
        $sql = "SELECT * FROM post WHERE id_user='$id' ORDER BY `post`.`id` DESC ";
        break;
    case 1:
        
        
        
        
        $sql = "SELECT * FROM post WHERE ".podpisper($id)." ORDER BY `post`.`id` DESC";
        break;
    case 2:
        echo
        "
        <form action='' method='GET'>
        <input name='search' type='text' style='margin:10px;' placeholder='Поиск...' value='".$_GET['search']."'><br>
        <button type='sumbit' style='padding:10px;'>Найти</button><br>
        </form>
        
        ";
        $sql = "SELECT * FROM users WHERE name LIKE '%".$_GET['search']."%' ";
        break;
        
    }
            	$result = mysql_query($sql);
            	$rowCheck = mysql_num_rows($result);
                	if($rowCheck > 0) {
                	  
                    	while($row = mysql_fetch_array($result)) {
                    
                    	echo '
                    	<div style="border:1px solid;margin-top:10px;">
                    	<h2>'.who($row['id_user']).$row['name'];
                    	
                    	if($par!=2){
                    	 echo "<snap style='color: #b9b9b9;'> ".$row['time']."</snap>";
                    	    
                    	} 
                    	if($par==0){
                    	 echo "<a style='margin:10px;color: red;' href='?del=".$row['id']."'>Удалить</a>";
                    	} 
                    	if(($id!=$row['id'])and($par==2)){
                    	    if(ifpod($id,$row['id'])==false){
                    	        
                    	        echo " <a href='?p=2&pod=".$row['id']."'>[Подписаться]</a>";
                    	    } else{
                    	        echo " <a href='?p=2&ot=".$row['id']."'>[Отписаться]</a>";
                    	    }
                    	    
                    	} 
                    	
                    	echo '</h2>
                    	<p>'.$row['op'].'</p>
                    	';
                    	if($row['img']!=""){
                    	    echo '<img style="height: 50%;" src="'.$row['img'].'">';
                    	}
                    	echo "</div>";
                    	}
                    	  
                    	 
                	} else {
                	    echo "<h3>Записи не найдены</h3>";
                	}
                
   
}



if(($_GET['p']=="") or ($_GET['p']=="0")){
    echo "<h2>Мои посты</h2>";
    echo "<div style='border: 1px solid;'>
    <h3>Опубликовать новый пост</h3>
    <form enctype='multipart/form-data' method='post' action='pub.php'> 
    <p><textarea name='text'></textarea></p>
    
    <b>Загрузить изображение</b>
<input name='picture' type='file' accept='image/*,image/jpeg'/><br><br>
<input type='submit' style='padding: 10px;' value='Публикация' />
</form>
    ";
    
    echo post(0,$id);
}
if($_GET['p']=="1"){
     echo "<h2>Новости</h2>";
     echo post(1,$id);
     
     
     
     
}
if($_GET['p']=="2"){
    echo "<h2>Поиск</h2>";
    echo post(2,$id);
}
?>