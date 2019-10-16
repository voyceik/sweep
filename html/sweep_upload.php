<!doctype html>
<?php include 'sweep_header.php';?>
<div class="hero-section">
 <div class="hero-section-text">
    <h1>Submit SWeeP Tasks</h1>
 </div>
</div>
<div class="grid-container">
    <div class="callout">
        <form enctype="multipart/form-data" name="sweep_upload" id="ff"  method="post" action="sweep_upload.php">
            <div id="submit_form"  style="height:auto;">
                <label>E-mail:</label>
                <input type="email" placeholder="Your email" name="email" id="email" value="<?php print $email;?>" <?php if ($login!="") print "readonly";?> required="true"></input>
                <label>Name:</label>
                <input type="text" placeholder="Please inform your name" name="name" id="name" value="<?php print $name;?>" <?php if ($login!="") print "readonly";?> required="true"></input>
                <label>Description:</label>
                <input type="text" data-dojo-type="dojox/mobile/TextBox" placeholder="A subject about this submission" name="description" id="description" value="<?php print $description ?>"></input>
                <br/>
                <span>Select one of avaliable SWeeP Database to query:</span>
                <select name="filetxt">
<?php
                try {
                    $db = new PDO($dsn, $user, $password, $options);
                    $sql = "SELECT filetxt, description FROM task WHERE email in ('$email', 'appsbio.info@gmail.com') AND type in ('sweep') AND status in ('archived');";
                    $data = $db->query($sql);
                    $result = $data->fetchALL(PDO::FETCH_ASSOC);
		    #$x=0;
                    foreach($result as $row) {
			#$x++;
			#$filetxt[$x]= $row['filetxt']; 
			?><option value="<?php print $row['filetxt'];?>"><?php print $row['filetxt'].' - '.$row['description'];?></option><?php 
		    }
                }
                catch (PDOException $e) {
                    $message=$error_message;
                            //echo 'Erro: '.$e->getMessage();
                }
                $db = null;
?>
                </select>
                <label>Select a amino-acids sequence fasta file format to query:</label>
                <input type="file" name="uploaded" id="uploaded" /></input>
                <label><span>Or type (or paste) here:</span></label>
                <textarea  placeholder="You can paste amino-acids sequence fasta sequence query here" name="sequence" id="sequence" value="<?php print $sequence?>" cols="80" rows="5" style="width:100%"></textarea>
                <br/>
                <button class="button expanded" type="submit" name="Submit" value="Submit">Submit File to SWeeP</button>
            </div>
        </form>
   </div>
</div>
<?php
    if ((isset($_POST["Submit"]) ? $_POST["Submit"] : '')=="Submit") {
        if ((isset($_FILES['uploaded']['name']) ? $_FILES['uploaded']['name'] : '')!='') {
            #require_once('SMTP_validateEmail.php');
            #$sender = 'biodados@gmail.com';
            #$SMTP_Validator = new SMTP_validateEmail();
            #$SMTP_Validator->debug = false;
            #$results = $SMTP_Validator->validate(array($email), $sender);
            #if ($results[$email]) {
                $filename = basename( $_FILES['uploaded']['name']);
                $target = $uploadpath.$session_id.'_'.$filename;
                if (eregi(".fasta$", $filename) or eregi(".fas$", $filename) or eregi(".faa$", $filename)) {
                    if (move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) {
		        $sha1 = sha1_file($target);
                        try {
                            $db = new PDO($dsn, $user, $password, $options);
                            $sql = "SELECT count(*) as total FROM task WHERE sha1 = ('$sha1') AND status not in ('completed', 'error', 'canceled');";
                    	    $data = $db->query($sql);
                    	    $result = $data->fetch();
                    	    if ($result['total']==0) {
                                $sql = "DELETE FROM task WHERE sha1 = ('$sha1') AND status in ('uploaded', 'error', 'canceled');";
                                $execute = $db->exec($sql);
                    		$sql = "INSERT INTO task (type, filein, status, user_id, start_date, name, description, email, institution, filetxt, sha1) VALUES ('sweep', '$filename', 'submitted', '$session_id', now(), '$name', '$description', '$email', '$ipaddress', '$filetxt', '$sha1')";
                                $execute = $db->exec($sql);
				if ($execute)  $message=$file_uploaded_message;
				else $message=$error_message;
                            } else $message=$file_exists_message;
                        }
                        catch (PDOException $e) {
                            $message=$error_message;
                            //echo 'Erro: '.$e->getMessage();
                        }
                        $db = null;
                    } else $message=$error_message;
                } else $message=$invalid_extension_message;
            #} else {
            #    $message=$invalid_email_message;
            #    $email = '';
            #}
        } elseif ($sequence!='') {
           $string = '0';
           try {
               $db = new PDO($dsn, $user, $password, $options);
               $sql = "SELECT max(id) as id FROM task;";
               $check = $db->query($sql);
               if ($check!="") {
                  $string = $check->fetchColumn(0);
               }
               $db = null;
               $string++;
           }
           catch (PDOException $e) {
               $string = '';
           }
	   $filename = 'Sequence'.$string.'.fas';	
           $target = $uploadpath.$session_id.'_'.$filename;
	   if($sequence[0]!='>') $sequence= ">".$filename.' - '.$description."\n".$sequence; 
	   $fid= fopen($target, "w"); fwrite($fid, $sequence); fclose($fid);
           if (file_exists($target)) {
		$sha1 = sha1_file($target);
                try {
                            $db = new PDO($dsn, $user, $password, $options);
                            $sql = "SELECT count(*) as total FROM task WHERE sha1 = ('$sha1') AND status not in ('completed', 'error', 'canceled');";
                    	    $data = $db->query($sql);
                    	    $result = $data->fetch();
                    	    if ($result['total']==0) {
                                $sql = "DELETE FROM task WHERE sha1 = ('$sha1') AND status in ('uploaded', 'error', 'canceled');";
                                $execute = $db->exec($sql);
                    		$sql = "INSERT INTO task (type, filein, status, user_id, start_date, name, description, email, institution, filetxt, sha1) VALUES ('sweep', '$filename', 'submitted', '$session_id', now(), '$name', '$description', '$email', '$ipaddress', '$filetxt', '$sha1')";
                                $execute = $db->exec($sql);
				if ($execute)  $message=$file_uploaded_message;
				else $message=$error_message;
                            } else $message=$file_exists_message;
                        }
                catch (PDOException $e) {
                            $message=$error_message;
                            //echo 'Erro: '.$e->getMessage();
                }
                $db = null;
           } else $message=$error_message;
        } else $message=$empty_data_message;
    }
    elseif ((isset($_POST["Submit"]) ? $_POST["Submit"] : '')=="Clean Errors") {
        try {
            $db = new PDO($dsn, $user, $password, $options);
            $sql = "DELETE FROM task WHERE email = ('$email') AND status in ('error', 'canceled');";
            $execute = $db->exec($sql);
            $db = null;
        }
        catch (PDOException $e) {
            $message=$error_message;
        }
    }
include 'sweep_footer.php';?>
