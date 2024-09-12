<?php
session_start(); // Start the session
include 'conn.php'; // Include the database connection

// Handle form submission
if (isset($_POST['add'])) {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $filename = $_FILES['photo']['name'];

  // If a photo is uploaded, move it to the 'images' directory
  if (!empty($filename)) {
    move_uploaded_file($_FILES['photo']['tmp_name'], 'images/' . $filename);
  }

  // Generate a unique voter ID
  $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $voter = substr(str_shuffle($set), 0, 15);

  // Insert data into the database
  $sql = "INSERT INTO voters (voters_id, password, firstname, lastname, photo) VALUES ('$voter', '$password', '$firstname', '$lastname', '$filename')";
  if ($conn->query($sql)) {
    $_SESSION['success'] = 'Voter added successfully';
  } else {
    $_SESSION['error'] = $conn->error;
  }
} else {
  $_SESSION['error'] = 'Fill up the add form first';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    
    html,
    body {
      height: 100%;
      margin: 0;
      padding: 0;
      font-family: sans-serif;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(to right, #fc5c7d, #6a82fb);
    }

    .background-picture {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      z-index: -1;
      opacity: 20%;
    }

    .wrapper {
      width: 400px;
      padding: 40px;
      background: rgba(0, 0, 0, .8);
      box-sizing: border-box;
      box-shadow: 0 15px 25px rgba(0, 0, 0, .6);
      border-radius: 10px;
    }

    .wrapper h2 {
      margin: 0 0 30px;
      padding: 0;
      color: #fff;
      text-align: center;
    }

    .login-box-msg {
      color: #cfcfcf;
    }

    .login-box .user-box {
      position: relative;
    }

    .login-box .user-box input {
      width: 100%;
      padding: 10px 0;
      font-size: 16px;
      color: #ffffff;
      margin-bottom: 30px;
      border: none;
      border-bottom: 1px solid #fff;
      outline: none;
      background: transparent;
    }

    .login-box .user-box label {
      position: absolute;
      top: 0;
      left: 0;
      padding: 10px 0;
      font-size: 16px;
      color: #fff;
      pointer-events: none;
      transition: .5s;
    }

    .login-box .user-box input:focus~label,
    .login-box .user-box input:valid~label {
      top: -20px;
      left: 0;
      color: #ff8080;
      font-size: 12px;
    }

    .button-container {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-box form button {
      position: relative;
      background: transparent;
      border: none;
      display: inline-block;
      padding: 10px 20px;
      color: #ff8080;
      font-size: 16px;
      text-transform: uppercase;
      letter-spacing: 4px;
      margin-top: 20px;
      overflow: hidden;
      transition: .5s;
      cursor: pointer;
      z-index: 1;
    }

    .login-box form button:hover {
      color: #fff;
      box-shadow: 0 0 5px #ff8080, 0 0 25px #ff8080, 0 0 50px #ff8080, 0 0 200px #ff8080;
    }

    .login-box form button span {
      position: absolute;
      display: block;
    }

    .login-box form button span:nth-child(1) {
      top: 0;
      left: -100%;
      width: 100%;
      height: 2px;
      background: linear-gradient(90deg, transparent, #ff8080);
      animation: btn-anim1 1s linear infinite;
    }

    @keyframes btn-anim1 {
      0% {
        left: -100%;
      }

      50%,
      100% {
        left: 100%;
      }
    }

    .login-box form button span:nth-child(2) {
      top: -100%;
      right: 0;
      width: 2px;
      height: 100%;
      background: linear-gradient(180deg, transparent, #ff8080);
      animation: btn-anim2 1s linear infinite;
      animation-delay: .25s;
    }

    @keyframes btn-anim2 {
      0% {
        top: -100%;
      }

      50%,
      100% {
        top: 100%;
      }
    }

    .login-box form button span:nth-child(3) {
      bottom: 0;
      right: -100%;
      width: 100%;
      height: 2px;
      background: linear-gradient(270deg, transparent, #ff8080);
      animation: btn-anim3 1s linear infinite;
      animation-delay: .5s;
    }

    @keyframes btn-anim3 {
      0% {
        right: -100%;
      }

      50%,
      100% {
        right: 100%;
      }
    }

    .login-box form button span:nth-child(4) {
      bottom: -100%;
      left: 0;
      width: 2px;
      height: 100%;
      background: linear-gradient(360deg, transparent, #ff8080);
      animation: btn-anim4 1s linear infinite;
      animation-delay: .75s;
    }

    @keyframes btn-anim4 {
      0% {
        bottom: -100%;
      }

      50%,
      100% {
        bottom: 100%;
      }
    }

    .admin-link {
      margin-top: 20px;
      text-align: center;
    }

    .notification {
    height:65px;
    padding: 5px 10px; 
    margin-bottom: 10px;
    border-radius: 5px;
    font-size: 14px; 
    font-weight: bold;
    text-align: center;
}

.alert-success {
    background-color: #dff0d8;
    color: #3c763d;
    border: 1px solid #d6e9c6;
}

.alert-danger {
    background-color: #f2dede;
    color: #a94442;
    border: 1px solid #ebccd1;
}

.notification.fade-out {
    opacity: 0;
    transition: opacity 1s ease-out;
}
  </style>
  <title>Register</title>
  
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <img class="background-picture" src="images/login-background.png">
  <div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="background: none; ">
      <!-- Content Header (Page header) -->
      <section class="content-header" style="color: white;">
        <h1><b>
            Registration
          </b> </h1>
      </section>
      <!-- Main content -->
      <section class="content">
        <?php
        if (isset($_SESSION['error'])) {
          echo "
              <div class='notification alert-danger'>
                  <h4><i class='icon fa fa-warning'></i> Error!</h4>
                  " . $_SESSION['error'] . "
              </div>
          ";
          unset($_SESSION['error']);
      }
      if (isset($_SESSION['success'])) {
          echo "
              <div class='notification alert-success'>
                  <h4><i class='icon fa fa-check'></i> Success!</h4>
                  " . $_SESSION['success'] . "
              </div>
          ";
          unset($_SESSION['success']);
      }
        ?>
        <!-- Add New Voter -->
        <div class="modal fade" data-backdrop="" id="addnew" style="background:none;border:none;">
          <div class="modal-dialog">
            <div class="modal-content" style="background:none; color:black ; font-size: 15px; font-family:Times ">
              <div class="modal-header">
                <span aria-hidden="true">&times;</span></button>
              </div>
              <div class="login-box">
                <form class="form-horizontal" method="POST" action="register.php" enctype="multipart/form-data">
                  <div class="user-box">
                    <input type="text" id="firstname" name="firstname" placeholder="Name" required>
                  </div>
        
                  <div class="user-box">
                    <input type="text" id="lastname" name="lastname" placeholder="Student ID" required>
                  </div>
                  
                  <div class="user-box">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                  </div>
                  
                  <div class="user-box">
                    <input type="file" id="photo" name="photo">
                  </div>
              </div>
              <div class="modal-footer">
                <button onclick="history.back()" type="button" class="btn btn-default btn-curve pull-left"
                  style='background-color:  #FFDEAD  ;color:black ; font-size: 12px; font-family:Times'
                  data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-primary btn-curve"
                  style='background-color:  #9CD095  ;color:black ; font-size: 12px; font-family:Times' name="add"><i
                    class="fa fa-save"></i> Save</button>
                </form>
              </div>
            </div>
          </div>
        </div>

      </section>
    </div>
  </div>

  <?php include 'scripts.php'; ?>
</body>
<script>
    // JavaScript to fade out the notifications after 5 seconds
    setTimeout(function() {
        var notification = document.querySelector('.notification');
        if (notification) {
            notification.classList.add('fade-out');
        }
    }, 5000);
</script>

</html>