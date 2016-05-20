<?php

class Project extends Database {
  public $dname = "";
  
  public function __construct() {
    $this->connDatabase();
    $this->dbError();
    if(isset($_GET['id'])) {
      $this->showProject();
    }
  }
  
  public function showProject() {
    $this->sql = "
      SELECT p.project_id, p.project_name
      FROM projects AS p
      WHERE p.project_id = '".$_GET['id']."' 
    ";
    
    $this->query = mysqli_query($this->db, $this->sql);
    
    $this->rows = mysqli_fetch_assoc($this->query);
    
    $this->dname = $this->rows['project_name'];
  }
}

$project = new Project();
?>

<div class="component cnmenu">
  <!-- Start Nav Structure -->
  <button class="cn-button cnmenu" id="cn-button" <?php echo (isset($_SESSION['signedin']['account_rights']) ? ($_SESSION['signedin']['account_rights'] !== 'admin' ? "disabled" : "") : ""); ?>>+</button>
  <div class="cn-wrapper cnmenu" id="cn-wrapper">
    <ul class="cnmenu">
      <li class="cnmenu"><a href="home"><i class="fa fa-home" aria-hidden="true"></i></a></li>
      <li class="cnmenu"><a href="#" class="test" data-name="<?php echo $project->dname; ?>"><i class="fa fa-book" aria-hidden="true"></i></a></li>
      <li class="cnmenu"><a href="#"><i class="fa fa-video-camera" aria-hidden="true"></i></a></li>
      <li class="cnmenu"><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></li>
      <li class="cnmenu"><a href="#"><i class="fa fa-cog" aria-hidden="true"></i></a></li>
    </ul>
  </div>
  <div id="cn-overlay" class="cn-overlay cnmenu"></div>
  <!-- End Nav Structure -->
</div>