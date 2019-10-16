<?php
/**
 * Created by PhpStorm.
 * User: voyceik
 * Date: 20/05/2015
 * Time: 15:36
 */
echo '<html class="no-js" lang="en"><head>';
$sweepini=parse_ini_file("sweep.ini");
/*$dsn = 'mysql:host=localhost; dbname=db_sweep; port=3306';*/
$dsn = $sweepini['dsn'];
$user = $sweepini['db_user'];
$password = $sweepini['password'];
$uploadpath = $sweepini['uploadpath'];
$options = array(PDO::ATTR_PERSISTENT => true, PDO::ATTR_CASE => PDO::CASE_LOWER);
$message = "";
$notagree_message = "<script>alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy.')</script>";
$error_message = "<script>alert('Sorry, there was a problem to upload your file. An email was send to support staff to check it and We will follow up this occurence as soon as possible.')</script>";
$invalid_filename_message = "<script>alert('Invalid file name! You mustn\'t use file name with "."')</script>";
$invalid_extension_message = "<script>alert('Invalid file extension! You must use .fasta, .fas or .gbff (gbk) file extension.')</script>";
$empty_data_message = "<script>alert('You must upload a FASTA/GBK file format or put a FASTA Sequence!')</script>";
$file_exists_message = "<script>alert('This file is already in the queue. Please wait for the finish of processing')</script>";
$file_uploaded_message = "<script>alert('The file was successful submitted. An email will be send when this task has been finished or use View Jobs to check status of all jobs submitted.')</script>";
$invalid_email_message = "<script>alert('The email addresses you entered is not valid or your server is rejecting SMTP authentication. Please try another email account like GMail.')</script>";
$password_notmached_message = "<script>alert('The passwords does not match.')</script>";
$password_empty_message = "<script>alert('The password is required.')</script>";
$invalid_password_message = "<script>alert('The password is wrong. The password must contain at least 8 characters, one number, one lowercase letter, one capital letter and any symbol character')</script>";
$registration_message = "<script>alert('Your registration was been done successful. Check your mail box to complete registration.')</script>";
$user_exists_message = "<script>alert('The email informed is already in use. Try to login in SWeeP and check if you forgot your password there is a option to receive instruction to recovery your access.')</script>";
$updated_message = "<script>alert('The information update was been done successful.')</script>";
$recovery_message = "<script>alert('An email will sent with instruction to recovery your access.')</script>";
$logout_message = "<script>alert('Thanks for using SWeeP and we hope to see you soon again.')</script>";
$not_logged_message = "<script>alert('You must be logged in to view and download the task results.')</script>";
$removed_message = "<script>alert('Thanks for using SWeeP. Any personal information has been stored in our database.')</script>";

if (!isset($_SESSION)) { session_start(); }
$session_id=session_id();
$login = "";
if (isset($_SESSION['session_id'])) if ($_SESSION['session_id']!=$session_id) { session_destroy();  session_start(); } else if (isset($_SESSION['login'])) if ($_SESSION['login']!="") {
       $login = $_SESSION['login'];
       $name  = $_SESSION['name'];
       $institution  = $_SESSION['institution'];
       $email=$login;
}

$name = isset($_POST["name"]) ? $_POST["name"] : (isset($name) ? $name : '');
$institution = isset($_POST["institution"]) ? $_POST["institution"] : (isset($institution) ? $institution : '');
$email = isset($_POST["email"]) ? $_POST["email"] : (isset($email) ? $email : '');
$description = isset($_POST["description"]) ? $_POST["description"] : '';
$sequence = isset($_POST["sequence"]) ? $_POST["sequence"] : '';
$ppassword = isset($_POST['ppassword']) ? $_POST["ppassword"] : '';
$cpassword = isset($_POST['cpassword']) ? $_POST["cpassword"] : '';
$opassword = isset($_POST['opassword']) ? $_POST["opassword"] : '';
$recovery = isset($_POST['recovery']) ? $_POST["recovery"] : '';
$agreeterms = isset($_POST['agreeterms']) ? $_POST["agreeterms"] : '';
$filetxt = isset($_POST['filetxt']) ? $_POST["filetxt"] : '';
$ipaddress = 'UNKNOWN';
$total = '';

$empty_tasks="<script>alert('None file submited for $email')</script>";

if (isset($_SERVER['HTTP_CLIENT_IP']))
    $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
    $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
else if (isset($_SERVER['HTTP_X_FORWARDED']))
    $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
    $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
else if (isset($_SERVER['HTTP_FORWARDED']))
    $ipaddress = $_SERVER['HTTP_FORWARDED'];
else if (isset($_SERVER['REMOTE_ADDR']))
    $ipaddress = $_SERVER['REMOTE_ADDR'];
$http_referer = isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : null;
?>
<meta name="Content-type" content="text/html"; charset= utf-8 />
<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
<meta name="author" content="Amanda Wilczek & Ricardo Voyceik"/>
<meta name="description" content="NTRC Application Finder"/>
<meta name="keywords" content="bioinformatics, bioinformatica, sweep, ufpr, bioinfo, gene marking tool, gene, biology, orf, sweep, computational biology, gbff, gbk, fasta, sweep ufpr bioinfo, raitzz, voyceik"/>
<meta name="robot" content="Index, Follow" />
<meta name="HandheldFriendly" content="true">
<link rel="apple-touch-icon" sizes="180x180" href="etc/apple-touch-icon.png">
<link r	el="icon" type="image/png" sizes="32x32" href="etc/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="etc/favicon-16x16.png">
<link rel="manifest" href="etc/site.webmanifest">
<link rel="mask-icon" href="etc/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#000000">
<meta name="theme-color" content="#ffffff"> 
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SWeeP Application Tools</title>
<link rel="stylesheet" href="css/foundation.css">
<link rel="stylesheet" href="css/sweep.css">  
<link rel="stylesheet" href="css/bootstrap.css"/>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/sweep.js"></script>
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-34743812-1']);
    _gaq.push(['_trackPageview']);
    _gaq.push(['_trackPageLoadTime']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script>
</head><body>
<nav class="top-bar topbar-responsive">
  <div class="top-bar-title">
      <a class="topbar-responsive-logo" href="sweep.php"><img src="etc/logo.png" width="40%" /></a>
  </div>
  <div id="topbar-responsive" class="topbar-responsive-links">
      <div class="top-bar-right">
        <ul class="menu simple vertical medium-horizontal" data-dropdown-menu>
          <ul class="dropdown menu" data-dropdown-menu>
            <li><a href="sweep.php">SWeeP</a></li>
            <li><a href="sweep_browse.php">SWeeP Databases</a></li>
            <li><a href="sweep_upload.php">Submit SWeeP Tasks</a></li>
            <li><a href="sweep_result.php">SWeeP Tasks Results</a></li>
            <?php if ($login!="") {
            	echo '<li><a href="sweep_signup.php">'.$name.'</a></li>
		      <li><a href="sweep_logout.php">Logout</a></li>';
		} else {
            	echo '<li><a href="sweep_signup.php">Sign-up</a></li>
                      <li><a href="#sweep_login" data-toggle="modal" data-target="#sweep_login">Login</a></li>';
		};?>
          </ul>
        </ul>
      </div>
  </div>
</nav>
