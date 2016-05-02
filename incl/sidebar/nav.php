<?php

class Nav extends Database {
  
  public function __construct() {
    $this->connDatabase();
    $this->dbError();
  }
  
  public function showDashboard() {
    echo "<li><a href='dashboard'>Dashboard</a></li>";
  }
  
  public function showProjects() {
    $this->sql = "
      SELECT p.project_id, p.project_name
      FROM projects AS p
    ";
    
    $this->query = mysqli_query($this->db, $this->sql);

    while($this->rows = mysqli_fetch_assoc($this->query)) {
      echo "<li><a href='project?id=".$this->rows['project_id']."'>".$this->rows['project_name']."</a></li>";
    }
  }
  
  public function showUser() {
    echo "<label>Ingelogd als: ".$_SESSION['signedin']['account_username']." (".$_SESSION['signedin']['account_rights'].")</label>";
  }
}

$nav = new Nav();
?>

<!-- Nav -->
<div class="nav nav-main" style="position: fixed;">
  <div class="top-icon">
    <i class="fa fa-times btn-close-nav close-nav"></i>
  </div>
  <div class="nav-wrapper">
    <ul>
      <li><a href="home">Home</a></li>
      <?php
        if(isset($_SESSION['signedin'])) {
          switch($_SESSION['signedin']['account_rights']) {
            case 'admin':
              $nav->showDashboard();
              break;
          }
        }
        $nav->showProjects();
      ?>
    </ul>
  </div>
  <form method="post" class="login-wrapper">
  <?php
    if(empty($_SESSION['signedin'])) {
      require_once $globals->signin_php;
    }
    else {
      $nav->showUser();
      require_once $globals->signout_php;
    }
  ?>
  </form>
</div>