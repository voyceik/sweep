<?php
if (!isset($_SESSION)) { session_start(); }
$session_id=session_id();
if ($_SESSION['session_id']!=$session_id) { session_destroy();  session_start(); }
$_SESSION['login']="";
$_SESSION['name'] = "";
$_SESSION['institution'] = "";
$_SESSION['session_id'] = session_id();
header('Location: ' . 'http://sweep.appsbio.info');
?> 
