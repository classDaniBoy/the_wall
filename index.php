<html>
<head>
  <title>Bienvenidos a The Wall!</title>

  <link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="assets/js/register.js"></script>
  <link rel="stylesheet" type="text/css" href="assets/css/footer_style.css">
</head>
<body>

  <div class="wrapper">

    <div class="login_box">

      <div class="login_header">
        <h1>The Wall!</h1>
        Ingresá o registrate!
      </div>
      <br>
      <div id="first">

        <form name="logForm" action="feed.php" method="POST" onsubmit = "return log_validate();">
          <input type="email" name="log_email" placeholder="Email" value="" required>
          <br>

          <input type="password" name="log_password" placeholder="Contraseña">
          <br>

          <input type="submit" name="login_button" value="Ingresar">
          <br>
          <a href="#" id="signup" class="signup">No tenés una cuenta? Registrate!</a>

        </form>

      </div>

      <div id="second">

        <form enctype="multipart/form-data" name="regForm" action="feed.php" onsubmit = "return reg_validate();" method="POST">
          <input type="text" name="reg_fname" placeholder="Nombre" value="" required>
          <br>
          <input type="text" name="reg_lname" placeholder="Apellido" value="" required>
          <br>
          <input type="email" name="reg_email" placeholder="Email" value="" required>
          <br>
          <input type="email" name="reg_email2" placeholder="Confirm Email" value="" required>
          <br>
          <input type="password" name="reg_password" placeholder="Password" required>
          <br>
          <input type="password" name="reg_password2" placeholder="Confirm Password" required>
          <br>
          <p>Seleccionar imagen de perfil</p>
          <input type="file" name="profile_pic" >
          <br>
          <input type="submit" name="register_button" value="Registrarse">
          <br>
          <a href="#" id="signin" class="signin">Ya tenés una cuenta? Ingresá acá!</a>
        </form>
      </div>

    </div>
  </div>

  <script type = "text/javascript">
      function log_validate() {
      var email = document.logForm.log_email.value;
      var email_re = /(\w+\@\w+\.\w+$)$/;
        var email_val = email_re.test(email);      
      
      var pass = document.logForm.log_password.value;
      var pass_re = /(\w+)$/;
        var pass_val = pass_re.test(pass);      
          
          if(email_val === false) {
              alert( "Please provide a valid email adress" );
              document.logForm.log_email.focus() ;
              return false;
           }
           console.log(pass);
           console.log(pass_re);
           console.log(pass_val);
          if( pass_val === false) {
              alert( "Please provide a valid password!" );
              document.logForm.log_password.focus() ;
              return false;
          }
          return true;
        }

        function reg_validate() {
      var email = document.regForm.reg_email.value;
      var email_re = /(\w+\@\w+\.\w+$)$/;
        var email_val = email_re.test(email);   

        var email2 = document.regForm.reg_email2.value;
      var email_re2 = /(\w+\@\w+\.\w+$)$/;
        var email_val2 = email_re2.test(email2);      
      
      var fname = document.regForm.reg_fname.value;
      var fname_re = /(\w+)$/;
        var fname_val = fname_re.test(fname);

        var lname = document.regForm.reg_lname.value;
      var lname_re = /(\w+)$/;
        var lname_val = lname_re.test(lname);      

      var pass = document.regForm.reg_password.value;
      var pass_re = /(\w+)$/;
        var pass_val = pass_re.test(pass); 

        var pass2 = document.regForm.reg_password2.value;
      var pass_re2 = /(\w+)$/;
        var pass_val2 = pass_re2.test(pass2);      
          
          if (pass2 !== pass) {
            alert( "Passwords don't match" );
              document.regForm.reg_password.focus() ;
              return false;
          }
          if (email !== email2) {
            alert( "Email adresses don't match" );
              document.regForm.reg_email.focus() ;
              return false;
          }
          if(email_val === false) {
              alert( "Please provide a valid email adress" );
              document.regForm.reg_email.focus() ;
              return false;
           }
           if(email_val2 === false) {
              alert( "Please provide a valid email adress" );
              document.regForm.reg_email2.focus() ;
              return false;
           }
           if(fname_val === false) {
              alert( "Name is a mandatory field" );
              document.regForm.reg_fname.focus() ;
              return false;
           }
           if(lname_val === false) {
              alert( "Last Name is a mandatory field" );
              document.regForm.reg_lname.focus() ;
              return false;
           }
           if(pass_val === false) {
              alert( "Password is a mandatory field" );
              document.regForm.reg_password.focus() ;
              return false;
           }
           if(pass_val2 === false) {
              alert( "Password is a mandatory field" );
              document.regForm.reg_password2.focus() ;
              return false;
           }
           console.log(pass);
           console.log(pass_re);
           console.log(pass_val);
          if( pass_val === false) {
              alert( "Please provide a valid password!" );
              document.regForm.reg_password.focus() ;
              return false;
          }
          return true;
        }

</script>
<?php 
    include("includes/footer.php");
 ?>
(\w+\@\w+\.\w+$)