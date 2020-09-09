<?php
session_start();
include("config.php");
if(isset($_POST['reg'])){
    $error="";
	$name = htmlspecialchars(stripslashes($_POST['name']));
    $login = htmlspecialchars(stripslashes($_POST['login']));
    $pass = htmlspecialchars(stripslashes($_POST['pass']));
    $pass2 = htmlspecialchars(stripslashes($_POST['pass2']));
    if($pass!=$pass2){
        $error = $error. 'Пароли не совпадают<br>';
    }
    $sql = "SELECT * FROM users WHERE login='$login'";
	$result = mysql_query($sql);
	$rowCheck = mysql_num_rows($result);
	if($rowCheck > 0) {
	    $error = $error. 'Пользователь с таким логином уже существует.<br>';
	}
	
        	if($error == '') {
            	$sql = "INSERT INTO users (login, name, pass)
            									 VALUES ('$login', '$name', MD5('$pass'))";
            	$query = mysql_query($sql) or die("Fatal error: ".mysql_error());
            if (mysql_error() == '') {
            	$sql = "SELECT * FROM users WHERE login='$login'";
            	$result = mysql_query($sql);
            	$rowCheck = mysql_num_rows($result);
                	if($rowCheck > 0) {
                    	while($row = mysql_fetch_array($result)) {
                    	$password = MD5($password);
                    	$sql = "SELECT * FROM users WHERE login='$login' and pass=MD5('$pass')";
                    	$result = mysql_query($sql);
                    	$rowCheck = mysql_num_rows($result);
                        	if($rowCheck > 0) {
                        	while($user = mysql_fetch_array($result)) {
                        	setcookie('id',$user['id'],time() + 60 *60 * 24 *30,"/");
                           setcookie('pass', $user['pass'],time() + 60 *60 * 24 *30,"/");
                           $_SESSION['msg'] =  $user['name'].', вы успешно зарегистрированы.';
                        	echo "<meta http-equiv=\"refresh\" content=\" 0; URL='index.php'\" />";
                        	exit();
                        	  }
                        	  } else {
                        	$_SESSION['error'] = 'Неизвестная ошибка. * ';
                        	echo "<meta http-equiv=\"refresh\" content=\" 0; URL='index.php?new=1'\" />";
                        	exit();
                        	}
                    	  }
                	  } else {
                	$_SESSION['error'] = 'Неизвестная ошибка. @';
                	echo "<meta http-equiv=\"refresh\" content=\" 0; URL='index.php?new=1'\" />";
                	exit();
                	}
            	}
            } else {
            	$_SESSION['error'] = $error;
            	echo "<meta http-equiv=\"refresh\" content=\" 0; URL='index.php?new=1'\" />";
            	exit();
            }
	
}
?>


