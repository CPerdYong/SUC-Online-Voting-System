<style>
  header {
    color : #FFFFFF
    }

  .main-header {
    background: linear-gradient(to right, #fc5c7d, #6a82fb);
  }  

  .logo {
    background:none !important;
  }

  .logo-mini {
    background-color: none !important;
  }

  .school-logo{
    width: auto;
    height: 40px !important;
  }

  .logo-lg {
    background: none !important;
    color: white;
    font-size: 22px;
    font-family: Arial, Helvetica, sans-serif;
  }

  .navbar {
    background: none !important;
  }

  .navbar-custom-menu {
    background: none !important;
    font-size: 17px;
    font-family: Arial, Helvetica, sans-serif;
  }

  .nav {
    background-color: none !important;
    color: white !important;
    font-size: 17px;
    font-family: Arial, Helvetica, sans-serif;
  }

  .dropdown.user.user-menu {
    color: white !important;
  }

  .dropdown-toggle {
    background-color: none !important;
    color: white !important;
    font-size: 17px;
    font-family: Arial, Helvetica, sans-serif;
  }

  .dropdown-menu {
    background-color: none !important;
    color: black !important;
    font-size: 17px;
    font-family: Arial, Helvetica, sans-serif;
  }

  .user-header {
    background-color: #8080c0 !important;
    font-size: 17px !important;
    font-family: Arial, Helvetica, sans-serif;
  }

  .user-footer {
    background-color: #8080c0 !important;
    font-size: 17px;
    font-family: Arial, Helvetica, sans-serif;
  }

  .pull-left {
    background-color: #90979e !important;
    color: white !important;
    font-size: 17px;
    font-family: Arial, Helvetica, sans-serif;
  }

  .btn-default {
    background-color: #d2d5d8 !important;
  }

  .pull-right {
    background-color: #90979e !important;
    color: black !important;
    font-size: 17px;
    font-family: Arial, Helvetica, sans-serif;
  }
</style>
<header class="main-header">
  <!-- Logo -->
  <a href="#" class="logo ">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini">
      <img class="school-logo" src="images\school-logo.png">
    </span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg ">
      <marquee behavior="scroll" direction="left">Online Voting System</marquee>
    </span>


  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top ">


    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only ">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo (!empty($user['photo'])) ? '../images/' . $user['photo'] : '../images/profile.jpg'; ?>"
              class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo $user['username'] . ' ' . $user['lastname']; ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img
                src="<?php echo (!empty($user['photo'])) ? '../images/' . $user['photo'] : '../images/profile.jpg'; ?>"
                class="img-circle" alt="User Image">

              <p>
                <?php echo $user['firstname'] . ' ' . $user['lastname']; ?>
                <small>Member since <?php echo date('M. Y', strtotime($user['created_on'])); ?></small>
              </p>
            </li>

            <li class="user-footer">
              <div class="pull-left ">
                <a href="#profile" data-toggle="modal" class="btn btn-default btn-curve" id="admin_profile">Edit</a>
              </div>

              <div class="pull-right">
                <a href="logout.php" class="btn btn-default btn-curve""> Sign out</a>
              </div>
            </li>
            
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
<?php include 'includes/profile_modal.php'; ?>