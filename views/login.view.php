<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LOGIN PAGE</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/index.css">
  <link
      rel="stylesheet"
      href="https://unpkg.com/animate.css@4.1.1/animate.css" /><link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
      data-tag="font" /><link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
      data-tag="font" /><link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
      data-tag="font" /><link
      rel="stylesheet"
      href="https://unpkg.com/@teleporthq/teleport-custom-scripts/dist/style.css" />
</head>
<body style="background-color: #A3C6A5;">
  <div style="max-height: 90vh; background-color: #F9F9F5; padding: 10% 4em;" class="container mt-5 shadow ">
  <!-- <?= $_SESSION["loggedIn"] ?> -->
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div style="height: 100%; " class="index-first-section d-flex justify-content-center">
          <div class="index-frame16">
            <span class="index-text13"><span>Our Blog</span></span>
          </div>
          <div class="index-frame17">
            <span class="index-text15">
              <span class="index-text16">Discover Engaging Content on </span>
              <span style="color: #1C693D;">(CMS) Blog Site</span>
            </span>
          </div>
          <div class="index-frame18">
            <span class="index-text18">
              <span>Whether you're seeking expert advice, inspiration, or entertainment, you'll find it all here.</span>
            </span>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card mx-auto" style="width: 25rem;">
          <div class="card-header">
            <h1>LOGIN</h1>
          </div>
          <div class="card-body">
            <p class="card-text">Please enter your credentials to login</p>
            <form action="controllers/login.contr.php" method="POST">
              <div class="mb-3">
                <label for="username" class="form-label">Email</label>
                <input type="text" name="email" id="email" class="form-control" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
                <?php 
                  if(isset($_SESSION["login_error"])){
                      $errorMessage = $_SESSION["login_error"];
                      unset($_SESSION["login_error"]);
                  ?>
                  <div class="mt-2 alert alert-danger" role="alert">
                      <?php echo $errorMessage; ?>
                  </div>

                  <?php } ?>
              </div>
              <div class="mb-3">
                <button type="submit" class="btn btn-primary w-100 py-2">LOGIN</button>
              </div>
              <div class="mb-3 w-100 d-flex justify-content-center">
                <span>or</span>
              </div>
              <?php require 'vendor/facebook-login.php' ?>
              <?php require 'vendor/google-login.php' ?>
            </form>
            <div class="col-12 text-center mt-3">
              <p>Don't have an account?</p>
              <a href="/signup" class="btn btn-link">Sign Up</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="js/bootstrap.bundle.min.js"></script>
  
  <script>
    window.fbAsyncInit = function() {
      FB.init({
        appId      : '{your-app-id}',
        cookie     : true,
        xfbml      : true,
        version    : '{api-version}'
      });
        
      FB.AppEvents.logPageView();   
        
    };

    (function(d, s, id){
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) {return;}
      js = d.createElement(s); js.id = id;
      js.src = "https://connect.facebook.net/en_US/sdk.js";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  </script>
</body>

</html>

