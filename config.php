<?php
$url='localhost'; //ссылка на базу
$username='beerburger_blog'; //Имя пользователя
$password='c*7wRTxV'; //Пароль от базы
$select_db='beerburger_blog'; //Название базы
$conn = mysql_connect($url, $username, $password);
mysql_select_db($select_db,$conn);

if(isset($_COOKIE['id'] )){
if(isset($_COOKIE['pass'])) {
$sql = "SELECT * FROM users WHERE id='".$_COOKIE['id']."' and pass='".$_COOKIE['pass']."'";
$result = mysql_query($sql);
$rowCheck = mysql_num_rows($result);
if($rowCheck > 0) {
	while($user = mysql_fetch_array($result)) {
								$id=$user['id'];
                $name=$user['name'];
                $login=$user['login'];
			}

		}

	}
}
?>