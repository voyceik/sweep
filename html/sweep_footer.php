</div></div>
<hr>
<div class="small-12 medium-12 small-4 cell">
  <center>
    <small>Bioinformatics IPPG/UFMG - Federal University of Minas Gerais, Institute of Biological Sciences (ICB), Belo Horizonte, Minas Gerais, Brazil and Bioinformatics PPG/UFPR - Federal University of Paraná, Curitiba, Paraná, Brazil</small>
    <img src="etc/logoUfmg.png" height="10%" width="10%" />
    <img src="etc/logoBioinformatica.png" height="50%" width="50%" />
    <img src="etc/pp.jpg" height="10%" width="10%" /><br/>
    <img src="etc/bg_ufpr_logo0222.png" height="10%" width="10%" /><br/>
</center>
</div>
<script src="js/vendor/jquery.js"></script>
<script src="js/vendor/what-input.js"></script>
<script src="js/vendor/foundation.js"></script>
<script src="js/app.js"></script>
<script>
    $(document).foundation();
</script>
</body>
</html>
 <div id="sweep_login" class="modal fade" role="dialog">  
      <div class="modal-dialog">  
   <!-- Modal content-->  
           <div class="modal-content">  
                <div class="modal-header">  
                     <h4 class="modal-title">SWeep Login</h4>  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                </div>  
                <div class="modal-body">  
                     <label>E-mail*:</label>  
                     <input type="text" placeholder="Your email" name="username" id="username" class="form-control" required="true"/>  
                     <br/>  
                     <label>Password*:</label>  
                     <input type="password" placeholder="Your password" name="password" id="password" class="form-control" required="true"/>  
                     <input type="checkbox" id="recovery" name="recovery">
                     <label for="recovery">I forgot my password</label>
                      <br />  
                     <button type="button" name="login_button" id="login_button" class="button expanded">Login in SWeeP Application Tools</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <script>  
 $(document).ready(function(){  
      $('#login_button').click(function(){  
           var username = $('#username').val();  
           var password = $('#password').val();  
           if(username != '' && password != '')  
           {  
                $.ajax({  
                     url:"sweep_login.php",  
                     method:"POST",  
                     data: {username:username, password:password},  
                     success:function(data)  
                     {  
			  alert(data);
                          $('#loginModal').hide();  
                          location.reload();  
                     }  
                });  
           }  
           else alert("Please inform your email and password used to signup in SWeeP.");  
      });  
 });  
 </script>  
<?php
if (($message==$updated_message)||($message==$registration_message)||($message==$removed_message)) { print $message.'<script> location.replace("/"); </script>';} else print $message; 
?>
