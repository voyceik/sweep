<!doctype html>
<?php include 'sweep_header.php';?>
<div class="hero-section">
 <div class="hero-section-text">
    <h1> <?php if ($login!="") print $name."'s SWeeP account"; else print "Sign-up in SWeeP";?></h1>
 </div>
</div>
<div class="grid-container">
    <div class="callout">
        <form enctype="multipart/form-data" name="sweep_signup" id="ff"  method="post" action="sweep_signup.php">
            <div id="submit_form"  style="height:auto;">
                <label>E-mail*:</label>
                <input type="email" placeholder="Your email" name="email" id="email" value="<?php print $email;?>" <?php if ($login!="") print "readonly";?> required="true"></input>
                <label>Name*:</label>
                <input type="text" placeholder="Please inform your name" name="name" id="name" value="<?php print $name;?>" required="true"></input>
                <label>Institution*:</label>
                <input type="text" data-dojo-type="dojox/mobile/TextBox" placeholder="Some information about from your organization or research center" name="institution" id="institution" value="<?php print $institution ?>" required="true"></input>
                <label><?php if ($login!="") { ?>Old Password:</label>
                <input type="password" data-dojo-type="dojox/mobile/TextBox" placeholder="Inform your actual password to allow to update your information" name="opassword" id="opassword" value=""></input><label>New <?php } ?>Password</label>
                <input type="password" data-dojo-type="dojox/mobile/TextBox" placeholder="Pass phrase to ensure privatity and grant access to submit taks. This password doesn´t be stored in our database" name="ppassword" id="ppassword" value=""></input>
                <label>Confirm password:</label>
                <input type="password" data-dojo-type="dojox/mobile/TextBox" placeholder="Confirm the password" name="cpassword" id="cpassword" value="<?php print $cpassword ?>"></input>
                <br/>
                <button class="button expanded" type="submit" name="Submit" value="Submit"><?php if ($login!="") print "Update my account"; else print "Sign-up";?></button><?php if ($login!="") { print "<br/>"?> 
                <button class="button expanded" type="submit" name="Submit" value="Remove">Remove my account</button><?php } else { print "<br/>"?>
                <input type="checkbox" id="agreeterms" name="agreeterms">
                <label for="agreeterms">I have read and agree to the Terms and Conditions and Privacy Policy</label>
                <?php } ?>
            </div>
        </form>
   </div>
</div>
<?php
    if ((isset($_POST["Submit"]) ? $_POST["Submit"] : '')=="Submit") {
	if(($agreeterms != 'on')&&($login=="")) {
		$message = $notagree_message;
	} else if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/', $ppassword)&&!empty($ppassword)) {
		$message = $invalid_password_message;
	} else if ($ppassword!=$cpassword) {
		$message = $password_notmached_message;
	} else {
		$sha1 = sha1($email.$ppassword);
                try {
                    $db = new PDO($dsn, $user, $password, $options);
                    $sql = "SELECT count(*) as total FROM task WHERE email in ('$email') AND type in ('user');";
                    $data = $db->query($sql);
		    $result = $data->fetch();
                    if ($result['total']==0) {
			if (!empty($ppassword)) {
                	   $sql = "INSERT INTO task (type, status, user_id, start_date, name, institution, email, description, sha1) VALUES ('user', 'registred', '$session_id', now(), '$name', '$institution', '$email', '$ipaddress', '$sha1');";
                           $execute = $db->exec($sql);
			   if ($execute) {
			    $_SESSION['login'] = $email;
			    $_SESSION['name'] = $name;
			    $_SESSION['institution'] = $institution;
			    $_SESSION['session_id'] = session_id();
                            $message=$registration_message;
			   } else $message=$error_message;
			} else $message=$password_empty_message;
                    } else if ($login!="") {
			if (!empty($opassword)) {
			    $sha1o = sha1($email.$opassword);
			    $sql = "SELECT count(*) as total FROM task WHERE email in ('$email') AND sha1 in ('$sha1o');";
			    $data = $db->query($sql);
			    $result = $data->fetch();
			    if ($result['total']>0) {
				if($ppassword!="") $sql = "UPDATE task set name = '$name', institution = '$institution', description = '$ipaddress', sha1 = '$sha1' WHERE email = '$email' and type in ('user');";
                		else $sql = "UPDATE task set name = '$name', institution = '$institution', description = '$ipaddress' WHERE email = '$email' and type in ('user');";
print_r($sql);
                        	$execute = $db->exec($sql);
				if ($execute) {
			    	    $_SESSION['name'] = $name;
			    	    $_SESSION['institution'] = $institution;
				    $_SESSION['session_id'] = session_id();
                        	    $message=$updated_message;
				} else $message=$error_message;
			    } else $message=$invalid_password_message;
			} else $message=$password_empty_message;
		    } else {
                        $message=$user_exists_message;
                    }
                    $db = null;
                }
                catch (PDOException $e) {
                    $message=$error_message;
                            //echo 'Erro: '.$e->getMessage();
                }
	}
    }
    elseif ((isset($_POST["Submit"]) ? $_POST["Submit"] : '')=="Remove") {
	$sha1o = sha1($email.$opassword);
        try {
            $db = new PDO($dsn, $user, $password, $options);
            $sql = "SELECT count(*) as total FROM task WHERE email in ('$email') AND sha1 in ('$sha1o');";
            $data = $db->query($sql);
	    $result = $data->fetch();
            if ($result['total']>0) {
                $sql = "DELETE FROM task WHERE email = ('$email') AND type in ('user');";
                $execute = $db->exec($sql);
	        if ($execute) {
		    $_SESSION['login'] = "";
		    $_SESSION['name'] = "";
		    $_SESSION['institution'] = "";
		    $_SESSION['session_id'] = session_id();
	            $message=$removed_message;
	        } else $message=$error_message;
            } else $message=$invalid_password_message;
	}
        catch (PDOException $e) {
            $message=$error_message;
        }
        $db = null;
    }
include 'sweep_footer.php';?>
