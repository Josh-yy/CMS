<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SIGNUP PAGE</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script type="text/javascript" src="jquery.min.js"></script>
  <link rel="stylesheet" href="css/modal.css">
</head>
<body class="container mt-3 d-flex justify-content-center" > 
  <div class="card mx-0 shadow-lg" style="width: 25rem;"> 
    <div class="card-header">
      <h1>Sign Up</h1>
    </div>
    <div class="card-body">
      <p class="card-text">Please fill up the needed information to signup</p>
      <?php
        if (isset($_SESSION['signup'])) {
          $succ = $_SESSION['signup'];
          echo "<div class='alert alert-success' role='alert'>$succ</div>";
          unset($_SESSION['signup']);
        }
      ?>

      <form id="signUpForm" class="row g-3">
        <div class="mb-3">
          <label for="first_name" class="form-label">First Name:</label>
          <input type="text" id="first_name" name="first_name" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="last_name" class="form-label">Last Name:</label>
          <input type="text" id="last_name" name="last_name" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email:</label>
          <input type="text" id="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password:</label>
          <input type="password" id="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="confirmPassword" class="form-label">Confirm Password:</label>
          <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
        </div>
        <?php 
              if (isset($_SESSION['signup_error'])) {
                $error = $_SESSION['signup_error'];
                echo "<div class='alert alert-danger' role='alert'>$error</div>";
                unset($_SESSION['signup_error']);
              } ?>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Sign Up</button>
        </div>
      </form>
      <div class="col-12 text-center mt-3">
        <p>Have an account?</p>
        <a href="/login" class="btn btn-link">Login</a>
      </div>
    </div>
  </div>
  <dialog success-modal id="successModal" >
    <div>
        <img class="successIcon" src="imgs/check.png" alt="successIcon">
    </div>
    <div>
        <h1>Success</h1>
    </div>
    <div>
        <p id="successResponse"></p>
    </div>
    <button closeSuccessModal class="btn btn-success btn-ig btn-block">Confirm</button>
  </dialog>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
<script type="text/javascript">
  $(document).ready(function(){

    $(document).on("click", "[closeSuccessModal]", function() {
      const modal = document.querySelector("#successModal");
      modal.close();
      location.reload();
    });

    $('#signUpForm').on("submit", function(e){
            e.preventDefault();
            var datas = $(this).serializeArray();
            var data_array = {};
            $.map(datas, function(data){
                data_array[data['name']]=data['value'];
            });
            // console.log(datas);
            // console.log(data_array);
            $.ajax({
                url: "controllers/signup.contr.php",
                method: "POST",
                data:{
                  'signup': true,
                  ...data_array,
                },
                success:function(respond){
                  popUpSuccessModal(respond);
                },
                error:function(error){
                    alert("Something went wrong");
                }
            })
        })
  })

  function popUpSuccessModal(respond){
    const modal = document.getElementById("successModal");
    const response = document.querySelector('#successResponse')
    
    response.innerHTML = respond;
    modal.showModal();
  }

</script>
</html>
