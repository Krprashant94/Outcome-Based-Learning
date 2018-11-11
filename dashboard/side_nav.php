<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
  <div class="logo">
    <a href="#" class="simple-text logo-normal">
      $Name
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item  <?php if($page == 'index') echo 'active'; ?>">
        <a class="nav-link" href="./index.php">
          <i class="material-icons">dashboard</i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="nav-item <?php if($page == 'user') echo 'active'; ?>">
        <a class="nav-link" href="./user.php">
          <i class="material-icons">person</i>
          <p>User Profile</p>
        </a>
      </li>
      <li class="nav-item <?php if($page == 'table') echo 'active'; ?> ">
        <a class="nav-link" href="./tables.php">
          <i class="material-icons">content_paste</i>
          <p>Cources</p>
        </a>
      </li>
      <li class="nav-item <?php if($page == 'notifications') echo 'active'; ?>">
        <a class="nav-link" href="./notifications.php">
          <i class="material-icons">notifications</i>
          <p>Notifications</p>
        </a>
      </li>
      <!-- <li class="nav-item active-pro ">
            <a class="nav-link" href="./upgrade.php">
                <i class="material-icons">unarchive</i>
                <p>Upgrade to PRO</p>
            </a>
        </li> -->
    </ul>
  </div>

</div>