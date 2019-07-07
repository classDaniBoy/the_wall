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
