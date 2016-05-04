<?php
if(isset($_POST['id'])) {
  require_once "../../globals.php";
  require_once $globals->database_php;
}

class ModalAlert extends Database {
  public $id = "";
  public $projectname = "...";
  
  public function __construct() {
    $this->connDatabase();
    $this->dbError();
    
    if(isset($_POST['id'])) {
      $this->id = $_POST['id'];
      
      $this->escString($this->id);
      $this->seeProject();
    }
    if(isset($_GET['id'])) {
      $this->id = $_GET['id'];
      
      $this->escString($this->id);
      $this->delProject();
      $this->returnPage();
    }
  }
  
  public function escString($id) {
    $this->id = $id;
    
    $this->id = mysqli_real_escape_string($this->db, $this->id);
  }
  
  public function seeProject() {
    $this->sql = "
      SELECT p.project_id, p.project_name
      FROM projects AS p
      WHERE p.project_id = '".$this->id."'
    ";
    
    $this->query = mysqli_query($this->db, $this->sql);
    
    $this->rows = mysqli_fetch_assoc($this->query);
    
    $this->projectname = $this->rows['project_name'];
  }
  
  public function delProject() {
    $this->sql = "
      DELETE FROM projects 
      WHERE project_id = '".$this->id."'
    ";
    
    $this->query = mysqli_query($this->db, $this->sql);
  }
  
  public function returnPage() {
    header("Location: http://".$_SERVER['SERVER_NAME'].$this->project.$this->home_dashboard);
  }
}

$modalalert = new ModalAlert();
?>

<div id="myAlert" class="modal fade" role="dialog">
  <!-- Modal -->
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        Wilt u <b><?php echo $modalalert->projectname; ?></b> verwijderen?
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Nee</button>
        <a href="?id=<?php echo $modalalert->id; ?>" class="btn btn-danger">Verwijder</a>
      </div>
    </div>

  </div>
</div>