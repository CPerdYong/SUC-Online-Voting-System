<style>
  /* Sidebar */
  .main-sidebar {
    background: linear-gradient(#fc5c7d, #6a82fb);
    /* Adjust width as needed */
  }

  .sidebar {
    background-color: rgba(240,240,240,0.2);
  }

  .user-panel {
    height: 60px;
  }

  .user-panel .info {
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
  }

  .user-panel p {
    color: white;
    font-size: 15px;
    font-family: Times, serif;
    margin-bottom: 0;
  }

  .user-panel a {
    color: white;
    font-size: 15px;
    font-family: Times, serif;
  }

  .user-panel a i {
    margin-right: 5px;
  }

  .sidebar-menu {
    background-color: #786974;
    color: white;
    font-size: 15px;
    font-family: Times, serif;
    margin-top: 20px;
    /* Adjust margin as needed */
    list-style: none;
    padding-left: 0;
  }

  .sidebar-menu>li.header {
    background-color: #28272D;
    color: white;
    font-size: 12px;
    font-family: Times, serif;
    padding: 5px 10px;
    margin-bottom: 0;
  }

  .sidebar-menu>li {
    position: relative;
  }

  .sidebar-menu>li>a {
    display: block;
    padding: 10px 15px;
    color: white;
    text-decoration: none;
  }

  .sidebar-menu>li>a:hover {
    background-color: #605A59;
    /* Adjust hover color */
  }

  /* Optional: Active menu item style */
  .sidebar-menu>li.active>a {
    background-color: #605A59;
    /* Adjust active color */
  }

  /* Modal */
  .modal {
    display: none;
    /* Ensure modal is hidden initially */
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    padding: 20px;
    border: 1px solid #ccc;
    z-index: 1000;
  }

  .modal-header {
    background-color: #28272D;
    color: white;
    padding: 10px;
  }

  .modal-body {
    padding: 10px;
  }

  .modal-footer {
    background-color: #f9f9f9;
    padding: 10px;
    text-align: right;
  }

  .modal-footer button {
    margin-left: 10px;
  }
</style>

<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel" style="height: 60px">
      <div class="pull-left image ">
        <img src="<?php echo (!empty($user['photo'])) ? '../images/' . $user['photo'] : '../images/profile.jpg'; ?>"
          class="img-square" alt="User Image">
      </div>
      <div class="pull-left info ">
        <p style="color:white ; font-size: 15px; font-family:Times">
          <?php echo $user['firstname'] . ' ' . $user['lastname']; ?></p>
        <a><i class="fa fa-circle text-success "></i> <b style=" color:white ; font-size: 15px; font-family:Times">
            Online </b></a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree"
      style="background-color: #786974 ; color:white ; font-size: 15px; font-family:Times  ">
      
      <li class="header" style="background-color: #28272D ;color:white ; font-size: 12px; font-family:Times  ">
        MAIN
      </li>
      <li class="">
        <a href="home.php">
          <i class="glyphicon glyphicon-briefcase">
          </i> 
          <span>Dashboard</span>
        </a>
      </li>
      <li class="">
        <a href="votes.php">
          <span class="glyphicon glyphicon-th-list">
          </span> 
          <span>Voters Who Voted</span>
        </a>
      </li>
      
      <li class="header" style="background-color: #28272D ;color:white ; font-size: 12px; font-family:Times ">
        MANAGE
      </li>
      <li class="">
        <a href="voters.php">
          <i class="fa fa-user"></i> 
          <span>Voters</span>
        </a>
      </li>
      <li class="">
        <a href="positions.php">
          <i class="fa fa-tasks"></i> 
          <span>Positions</span>
        </a>
      </li>
      <li class="">
        <a href="candidates.php">
          <i class="fa fa-briefcase"></i> 
          <span>Candidates</span>
        </a>
      </li>
      
      <li class="header" style="background-color:#28272D ;color:white ; font-size: 12px; font-family:Times">
        SETTINGS
      </li>
      <li class="">
        <a href="ballot.php">
          <i class="fa fa-file-text"></i> 
          <span>Ballot Position</span>
        </a>
      </li>
      <li class="">
        <a href="#config" data-toggle="modal">
          <i class="fa fa-cogs"></i> 
          <span>Election Title</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
<?php include 'config_modal.php'; ?>