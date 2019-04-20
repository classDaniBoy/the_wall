<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>The Wall Log in</title>

	<!-- Bootstrap core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom fonts for this template -->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

	<!-- Plugin CSS -->
	<link rel="stylesheet" href="device-mockups/device-mockups.min.css">

	<!-- Custom styles for this template -->
	<link href="css/new-age.min.css" rel="stylesheet">

</head>
<body id="page-top">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">The Wall</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#download">Download</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
</nav>

  <header class="masthead">
    <div class="container h-100">
      <div class="row h-100">
        <div class="col-lg-7 my-auto">
          <div class="header-content mx-auto">
            <h1 class="mb-5">The Wall is a social network kinda like twitter but better, because we say it's better</h1>
            <a class="btn btn-outline btn-xl js-scroll-trigger">Log in now</a>
          </div>
        </div>
        <div class="col-lg-5 my-auto">
          <div class="device-container">

	                <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
	                <div class="uk-width-1-3@m uk-width-1-2@s">
			            <div class="uk-card uk-card-default uk-card-body">  
			              <form enctype="multipart/form-data" action="index.php" method="POST">
                            <input type="text" name="reg_fname" placeholder="First Name">
                            <br>         
                            <input type="text" name="reg_lname" placeholder="Last Name">         
                            <br>         
                            <input type="email" name="reg_email" placeholder="Email">         
                            <br>         
                            <input type="email" name="reg_email2" placeholder="Confirm your email">         
                            <br>         
                            <input type="password" name="reg_password" placeholder="Enter you password">         
                            <br>         
                            <input type="password" name="reg_password2" placeholder="Confirm your password">         
                            <br>     
                            <p> Upload your profile picture</p>
                            <input type="file" name="profile_pic">
                            <br>     
                            <input type="submit" name="register_button" value="Register">
                          </form>
			            </div>
			        </div>

                  <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>




  <footer>
    <div class="container">
      <p>&copy; The Wall 2019. All Rights Reserved.</p>
      <ul class="list-inline">
        <li class="list-inline-item">
          <a href="#">Privacy</a>
        </li>
        <li class="list-inline-item">
          <a href="#">Terms</a>
        </li>
        <li class="list-inline-item">
          <a href="#">FAQ</a>
        </li>
      </ul>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/new-age.min.js"></script>
  <script type="text/javascript">

    $('#btn-send').click(function() 
    {
        

        var username = $('#username').val();
        var password = $('#password').val();
        var recaptcha = $('#g-recaptcha-response').val();

        if (username.length == 0 || password.length == 0)
        {
            $("div.uk-alert-danger p").text("Usuario y/o contraseña no pueden estar vacíos.");
            $("div.uk-alert-danger").removeClass("uk-hidden");
            return;
        }
        
        //grecaptcha.execute();        

        button_state('btn-send');
        $.ajax({
            url: '/form/login',
            type: 'POST',
            dataType: 'json',
            data: {username: username, password: password, recaptcha: recaptcha},
        })
        .done(function(rs) 
        {
            button_state('btn-send');
            if(rs['status']== 'ok')
            {                
                window.location.href=rs['redirect_uri'];   
            }
            else 
            {
                $("div.uk-alert-danger p").text(rs['message']);
                $("div.uk-alert-danger").removeClass("uk-hidden");
            }
            
            grecaptcha.reset();
        })
        .fail(function() 
        {   
            grecaptcha.reset();
           button_state('btn-send');
        });

    });

</script>
</body>
</html>
