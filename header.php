<?php
session_start();
if(isset($_SESSION["msg"]))
{
    if ($_SESSION["msg"] != '')
    {
        $msg = ($_SESSION["msg"]);
        echo "<div id='msg-box' style=' padding: 13px;width: 100%;'><center><b style='color:green;'>".$msg."</b></center></div><div id='log-mes'></div>";
        $_SESSION['msg'] = '';
        $_SESSION['height'] = '1';
        
    }
}
if(isset($_SESSION["error"])) {
	if (($_SESSION["error"]) != '') {
	$msg = ($_SESSION["error"]);
echo "<div id='msg-box' style='padding: 13px;width: 100%;'><center><b style='color:red;'>".$msg."</b></center></div><div id='log-mes' style='width:100%;height:1px;'></div>";
$_SESSION['error'] = '';
$_SESSION['height'] = '1';
} 
}?>
