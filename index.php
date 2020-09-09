<?php
session_start();
include("config.php");
if($id!=""){
 echo "<meta http-equiv=\"refresh\" content=\" 0; URL='blog.php'\" />";
 exit();   
}



include("header.php");


?>
<meta charset="utf-8">
<center>
<div>
    <h1>МОЙ БЛОГ</h1>
    <?php
    if($_GET['new']=="1"){
         echo '
        <h2>Зарегистрироваться</h2>
    <form action="reg.php" method="POST">
    <input name="name" type="text" style="margin:10px;" placeholder="Имя"><br>
    <input name="login" type="text" style="margin:10px;" placeholder="Логин"><br>
    <input name="pass" type="password" style="margin:10px;" placeholder="Пароль"><br>
    <input name="pass2" type="password" style="margin:10px;" placeholder="Повтор пароля"><br>
    <button name="reg" type="sumbit" style="padding:10px;">Зарегистрироваться</button><br>
    <a style="margin-top:10px;" href="?new=0">Уже зарегистрирован</a>
    </form>';
    } else{
        echo '
        <h2>Войти</h2>
    <form action="login.php" method="POST">
   
    <input name="login" type="text" style="margin:10px;" placeholder="Логин"><br>
    <input name="pass" type="password" style="margin:10px;" placeholder="Пароль"><br>
   
    <button name="log" type="sumbit" style="padding:10px;">Войти</button><br>
    <a style="margin-top:10px;" href="?new=1">Ещё не зарегистрирован</a>
    </form>
    ';
        
    }
    
    ?>
    
    
    
    
    </div>
    
    </center>