<!doctype html>
<?php include 'sweep_header.php';?>
    <div class="hero-section">
      <div class="hero-section-text">
        <h1>SWeeP Databases</h1>
      </div>
    </div>
    <div class="grid-container">
      <div class="callout">
        <table>
          <thead>
            <td>Organism</td>
            <td>Accession</td>
            <td>TFBS Found</td>
            <td>View</td>
            <td>Download</td>
          </tr>
        </thead>
        <tbody>
<tr><td>Acidithiobacillus ferrivorans SS3, complete genome</td><td>NC_015942.1</td><td>137</td><td class='view'><a href = 'search.php?id=NC_015942.1'><img src = 'etc/details.png' alt = 'details' height='20px' width='18px'></td></td><td class='download'><a href = 'download.php?file=files/csv/tab_NC_015942.1.csv'><img src = 'etc/download.png' alt = 'details' height='20px' width='18px'></td></tr>
        </tbody>
      </table>
    </div>
  </div>
<?php
if ($_POST["Submit"]=="Submit") {
    if (isset($_FILES['uploaded']['name'])&&($_FILES['uploaded']['name']!='')) {
            #require_once('SMTP_validateEmail.php');
            #$sender = 'bioinfocoord@gmail.com';
            #$SMTP_Validator = new SMTP_validateEmail();
            #$SMTP_Validator->debug = false;
            #$results = $SMTP_Validator->validate(array($email), $sender);
            #if ($results[$email]) {
        $target = "../uploads/".$session_id.'_';
        $filename = basename( $_FILES['uploaded']['name']);
        $target = $target.$filename;
        $ok=1;
        foreach (count_chars($data, 1) as $i => $val) {
            if (($i=='46')&&($val>1)) {
                $ok=0;
            }
        }
        if (!$ok) {
         print $invalid_filename;
     } elseif (eregi(".fasta$", $_FILES['uploaded']['name']) or eregi(".fas$", $_FILES['uploaded']['name']) or eregi(".gbk$", $_FILES['uploaded']['name']) or eregi(".gbff$", $_FILES['uploaded']['name'])) {

        if (move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) {
            try {
                $db = new PDO($dsn, $user, $password, $options);
                $sql = "SELECT * FROM task WHERE type = 'sweep' and filein = ('$filename') AND status in ('submitted', 'executing');";
                $check = $db->query($sql);
                if ($check->rowCount()==0) {
                    $sql = "INSERT INTO db_sweep.task (type, filein, status, user_id, start_date, name, description, email, institution) VALUES ('sweep', '$filename', 'submitted', '$session_id', now(), '$name', '$institution', '$email', '$ipaddress')";
                    $execute = $db->exec($sql);
                    print $file_uploaded_message;
                } else {
                    print $file_exists_message;
                }
                $db = null;
            }
            catch (PDOException $e) {
                print $error_message;
            }
        }
        else {
            print $error_message;
        }
    }
    else {
        print $invalid_extension_message;
    }
            #} else {
            #    print $invalid_email_message;
            #    $email = '';
            #}
  } else {
    print $empty_data_message;
  }
}
include 'sweep_footer.php';?>
