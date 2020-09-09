<?php
session_start();
include("config.php");

if(isset($_POST['log'])){
 $error="";
    $login = htmlspecialchars(stripslashes($_POST['login']));
    $pass = htmlspecialchars(stripslashes($_POST['pass']));
 
    $sql = "SELECT * FROM users WHERE login='$login' and pass=MD5('$pass')";
                    	$result = mysql_query($sql);
                    	$rowCheck = mysql_num_rows($result);
                        	if($rowCheck > 0) {
                        	while($user = mysql_fetch_array($result)) {
                        	setcookie('id',$user['id'],time() + 60 *60 * 24 *30,"/");
                           setcookie('pass', $user['pass'],time() + 60 *60 * 24 *30,"/");
                           $_SESSION['msg'] =  $user['name'].', вы успешно авторизованы.';
                        	echo "<meta http-equiv=\"refresh\" content=\" 0; URL='index.php'\" />";
                        	exit();
                        	  }
                        	  } else {
                        	$_SESSION['error'] = 'Неверный логин или пароль<br>';
                        	echo "<meta http-equiv=\"refresh\" content=\" 0; URL='index.php'\" />";
                        	exit();
                        	}
}
?>