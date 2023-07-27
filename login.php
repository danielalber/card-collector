<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script>
	
	$(document).on('click','#btn_login',function(e){
		console.log("hello");
		e.preventDefault();
			
		var username = $('#txt_username').val();
		var password = $('#txt_password').val();
			
		if(username == ''){ // check username not empty
			alert('please enter username !!'); 
		}
		else if(!/^[a-z A-Z]+$/.test(username)){ // check username allowed capital and small letters 
			alert('username only capital and small letters are allowed !!'); 
		}
		else if(password == ''){ //check password not empty
			alert('please enter password !!'); 
		}
		else{			
			$.ajax({
				url: 'processlogin.php',
				type: 'post',
				data: 
					{newusername:username,  
					 newpassword:password
					},
				success: function(response){
					$('#message').html(response);
				}
			});
				
			$('#registraion_form')[0].reset();
		}
	});


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
  <!-- NAVBAR-->
  <link rel="stylesheet" href="style.css">
  <nav class="navbar navbar-expand-lg py-3 navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="#" class="navbar-brand">
        <!-- Logo Image -->
        <img src="image/logo.PNG" width="45" alt="" class="d-inline-block align-middle mr-2">
        <!-- Logo Text -->
        <span class="text-uppercase font-weight-bold">Card-Collector</span>
      </a>

      <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>

      <div id="navbarSupportedContent" class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="actualites.html" class="nav-link">Actualités </a></li>
          <li class="nav-item"><a href="collection.html" class="nav-link">Collection</a></li>
          <li class="nav-item active"><a href="register.php" class="nav-link">Connexion <span class="sr-only">(current)</span></a></li>
        </ul>
      </div>
    </div>
  </nav>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill this form to Login.</p>
        <form method="post" id="login_form">
            <div class="form-group">
                <label>Username</label>
                <input type="text" id="txt_username" name="username" required class="form-control" placeholder="Nom d'utilisateur">
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" id="txt_password" name="password" required class="form-control" placeholder="Mot de passe"/>
            </div>
            <div class="form-group">
                <input type="submit" id="btn_login" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>Don't have an account <a href="register.php">Register here</a>.</p>
        </form>
    </div>    
</body>
</html>