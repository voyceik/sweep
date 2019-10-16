<!doctype html>
<?php include 'sweep_header.php'; ?>
<div class="hero-section">
 <div class="hero-section-text">
    <h1>SWeeP Tasks Results</h1>
</div>
</div>
<div class="grid-container">
  <div class="callout">
    <form enctype="multipart/form-data" name="sweep" id="ff"  method="post" action="sweep_result.php">
        <div id="submit_form" style="height:auto;">
            <button class="button expanded" type="submit" name="Submit" value="result">View SWeeP Tasks Results</button>
        </div>
    </form>
    <?php
    if ($_POST["Submit"]=="result") {
        if ($email!="") { 
            $x= 0;
            try {
                $db = new PDO($dsn, $user, $password, $options);
                $userid = $session_id;
            //verifica os arquivos correspondentes ao usuario
                $sql = "SELECT * FROM task WHERE type = 'sweep' and email= ('$email');";
                $check = $db->query($sql);
                $line = $check->fetchALL(PDO::FETCH_ASSOC);
                foreach($line as $row) {
                    $matrixin[$x]["id"]= $row['id'];
                    $matrixin[$x]["filein"]= $row['filein'];
                    $matrixin[$x]["status"]= $row['status'];
                    $matrixin[$x]["user_id"]= $row['user_id'];
                    $matrixin[$x]["description"]= $row['description'];
                    $matrixin[$x]["institution"]= $row['institution'];
                    $matrixin[$x]["fileout"]= $row['fileout'];
                    $matrixin[$x]["filetxt"]= $row['filetxt'];
                    $x++;
                }
                $db = null;
            }
            catch (PDOException $e) {
                $message=$error_message;
            }
            if ($x>0) {
                $y=0;
                while($x>$y) { $y++; }; 
                while($y>0) {
                    $y--;
                    echo '<div data-dojo-type="dojox.mobile.ScrollableView" id="detailsView'.$y.'" keepScrollPos="true" scrollBar="false" style="height:auto">
                    <h1 label="NTRC - '.$matrixin[$y]["filein"].'" data-dojo-type="dojox/mobile/Heading" back="Back" moveTo="listView" fixed="top"></h1>
                    <div data-dojo-type="dojox.mobile.RoundRect" data-dojo-props="shadow:true">
                        <b>File: '.$matrixin[$y]["filein"].'</b><br>
                        Job#: '.$matrixin[$y]["id"].'<br>
                        From: '.$matrixin[$y]["institution"].'<br>
                        Status: '.$matrixin[$y]["status"].'<br>
                        Result Message: '.$matrixin[$y]["description"].'<br>';
                        if ($matrixin[$y]["fileout"]!='') {
                            echo 'Completed Date: '.date("d/m/Y H:i:s",filemtime("./finished/".$matrixin[$y]["user_id"].'_'.$matrixin[$y]["fileout"])).'<br>
                            Result File: <a href="download.php?file=finished/'.$matrixin[$y]["user_id"].'_'.$matrixin[$y]["fileout"].'" target="_blank">'.$matrixin[$y]["fileout"].'</a><br>';
                        }
                        if ($matrixin[$y]["filetxt"]!='') {
                            echo 'Text File: <a href="./finished/'.$matrixin[$y]["user_id"].'_'.$matrixin[$y]["filetxt"].'" target="_blank">'.$matrixin[$y]["filetxt"].'</a><br>';
                        }
                        echo '  </div>
                    </div>';
                }
            } else { $message=$empty_tasks; } 
        } else { $message=$not_logged_message; }
   }
include 'sweep_footer.php';?>
