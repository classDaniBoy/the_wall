<html>
<head>
  <title>Bienvenidos a The Wall!</title>

  <link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="assets/js/register.js"></script>
  <link rel="stylesheet" type="text/css" href="assets/css/footer_style.css">
</head>
<body>
  <?php
    include 'BD.php';
    //include("includes/controlador/login_handler.php");
    //include("includes/controlador/register_handler.php");

    if(isset($_POST['register_button'])) {
        echo '
        <script>

        $(document).ready(function() {
            $("#first").hide();
            $("#second").show();
        });

        </script>

        ';
    }
   ?>
  <div class="wrapper">

    <div class="login_box">

      <div class="login_header">
        <h1>The Wall!</h1>
        Ingresá o registrate!
      </div>
      <br>
      <div id="first">

        <form name="logForm" action="includes/controlador/login_handler.php" method="POST" onsubmit = "return log_validate();">
          <input type="text" name="log_email" placeholder="Email" value="<?php 
                    if(isset($_SESSION['log_email'])) {
                        echo $_SESSION['log_email'];
                    } 
                    ?>" required>
          <br>

          <input type="password" name="log_password" placeholder="Contraseña">
          <br>
        <?php if (isset($_SESSION['error_array'])) {
            if(in_array("Email or password was incorrect<br>", $_SESSION['error_array'])) echo  "Email or password was incorrect<br>"; 
        }
        ?>

          <input type="submit" name="login_button" value="Ingresar">
          <br>
          <a href="#" id="signup" class="signup">No tenés una cuenta? Registrate!</a>

        </form>

      </div>

      <div id="second">

        <form enctype="multipart/form-data" name="regForm" action="includes/controlador/register_handler.php" onsubmit = "return reg_validate();" method="POST">
          <input type="text" name="reg_fname" placeholder="Nombre" value="<?php if(isset($_SESSION['reg_fname'])) {
                        echo $_SESSION['reg_fname'];
                    }?>">
          <br>
          <?php
            if (isset($_SESSION['error_array'])) {
            if(in_array("Your first name must be between 2 and 25 characters<br>", $_SESSION['error_array'])) echo "Your first name must be between 2 and 25 characters<br>"; 
            }
           ?>
          <input type="text" name="reg_lname" placeholder="Apellido" value="<?php 
                    if(isset($_SESSION['reg_lname'])) {
                        echo $_SESSION['reg_lname'];
                    }?>">
          <br>
          <?php
            if (isset($_SESSION['error_array'])) {
            if(in_array("Your first name must be between 2 and 25 characters<br>", $_SESSION['error_array'])) echo "Your first name must be between 2 and 25 characters<br>"; 
            }
           ?>
          <input type="text" name="reg_uname" placeholder="Nombre de usuario" value="<?php 
                    if(isset($_SESSION['reg_uname'])) {
                        echo $_SESSION['reg_uname'];
                    }
                ?>">
          <br>
          <?php
            if (isset($_SESSION['error_array'])) {
            if(in_array("Username already in use<br>", $_SESSION['error_array'])) echo "Username already in use<br>"; 
            }
           ?>
          <input type="email" name="reg_email" placeholder="Email" value="<?php 
                    if(isset($_SESSION['reg_email'])) {
                        echo $_SESSION['reg_email'];
                    } 
                    ?>">
          <br>
          <input type="email" name="reg_email2" placeholder="Confirm Email" value="<?php 
                    if(isset($_SESSION['reg_email2'])) {
                        echo $_SESSION['reg_email2'];
                    } 
                    ?>">
          <br>
          <?php 
            if (isset($_SESSION['error_array'])) {
                if(in_array("Email already in use<br>", $_SESSION['error_array'])) echo "Email already in use<br>"; 
                    else if(in_array("Invalid email format<br>", $_SESSION['error_array'])) echo "Invalid email format<br>";
                    else if(in_array("Emails don't match<br>", $_SESSION['error_array'])) echo "Emails don't match<br>"; 
            }
            ?>
          <input type="password" name="reg_password" placeholder="Password">
          <br>
          <input type="password" name="reg_password2" placeholder="Confirm Password">
          <br>
          <?php 
            if (isset($_SESSION['error_array'])) {
            if(in_array("Your passwords do not match<br>", $_SESSION['error_array'])) echo "Your passwords do not match<br>"; 
                    else if(in_array("Your password can only contain english characters or numbers<br>", $_SESSION['error_array'])) echo "Your password can only contain english characters or numbers<br>";
                    else if(in_array("Your password must be betwen 5 and 30 characters<br>", $_SESSION['error_array'])) echo "Your password must be betwen 5 and 30 characters<br>"; 
                }
            ?>
          <p>Seleccionar imagen de perfil</p>
          <input type="file" name="profile_pic" >
          <br>
          <input type="submit" name="register_button" value="Registrarse">
          <br>
          <?php 
            if (isset($_SESSION['error_array'])) {
            if(in_array("<span style='color: #14C800;'>TU CUENTA HA SIDO CREADA POR FAVOR INICIA SESION CON TUS CREDENCIALES HACIENDO CLICKA ABAJO!</span><br>", $_SESSION['error_array'])) echo "<span style='color: #14C800;'>TU CUENTA HA SIDO CREADA POR FAVOR INICIA SESION CON TUS CREDENCIALES HACIENDO CLICKA ABAJO!</span><br>"; 
            }
          ?>
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

        var uname = document.regForm.reg_uname.value;
      var uname_re = /(\w+)$/;
        var uname_val = uname_re.test(uname);      

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
           if(uname_val === false) {
              alert( "User name is a mandatory field" );
              document.regForm.reg_uname.focus() ;
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