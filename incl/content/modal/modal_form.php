<?php

class ModalForm extends Database {
  private $name;
  
  public function __construct() {
    if(isset($_POST['add'])) {
      $this->connDatabase();
      $this->dbError();
      $this->escString();
      $this->addProject();
      //$this->addFolder();
      $this->returnPage();
    }
  }
  
  public function escString() {
    $this->name = $_POST['name'];
    
    $this->name = mysqli_real_escape_string($this->db, $this->name);
  }
  
  public function addProject() {
    $this->sql = "
      INSERT INTO projects (project_id, project_name)
      VALUES (NULL, '".$this->name."');
    ";
    
    $this->query = mysqli_query($this->db, $this->sql);
  }
  
  public function addFolder() {
    $this->name = str_replace(' ', '_', $this->name);
    $this->name = strtolower($this->name);
    
    mkdir("doc/".$this->name);
  }
  
  public function returnPage() {
    header("Location: ".$_SERVER['REQUEST_URI']);
  }
}

$modalform = new ModalForm();
?>

<div id="myForm" class="modal fade" role="dialog">
  <!-- Modal -->
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Voeg project toe</h4>
      </div>
      <div class="modal-body">
        <form role="form" method="post">
          <div class="form-group">
            <label for="name">Projectnaam</label>
            <input type="text" name="name" class="form-control" id="name">
          </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" name="add" class="btn btn-success">Toevoegen</button>
        </form>
      </div>
    </div>

  </div>
</div>