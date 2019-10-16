<?php
/*$dsn = 'mysql:host=localhost; dbname=db_sweep; port=3306';*/
$dsn = 'pgsql:dbname=db_sweep';
$user = 'sweep';
$password = 'bioinfo2019';
$options = array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL, PDO::ATTR_PERSISTENT => true, PDO::ATTR_CASE => PDO::CASE_LOWER);
$email=$_POST["username"];
$sha1=sha1($email.$_POST["password"]);
$sql = "SELECT email, name, institution FROM task WHERE email = ('$email') AND sha1 = ('$sha1') AND type = ('user');";
$db = new PDO($dsn, $user, $password, $options);
$check = $db->query($sql);
if ($check->rowCount()>0)   
{
   session_start();
   $line = $check->fetchALL(PDO::FETCH_ASSOC);
   foreach($line as $row) {
           $_SESSION['login'] = $row['email'];  
           $_SESSION['name'] = $row['name'];  
           $_SESSION['institution'] = $row['institution'];  
           $_SESSION['session_id'] = session_id();  
   }
   echo "Welcome back ".$_SESSION['name'].". Enjoy SWeeP Application Tools.";
} else echo "The email or the password doesn't match in our server. If yu forgot your password user Sigin menu to Resset your passord.";
$db = null;  
?> 
