<?php

class Dashboard extends Database {
  
  public function __construct() {
    $this->connDatabase();
    $this->dbError();
  }
  
  public function showProjects() {
    $this->sql = "
      SELECT p.project_id, p.project_name
      FROM projects AS p
    ";
    
    $this->query = mysqli_query($this->db, $this->sql);

    while($this->rows = mysqli_fetch_assoc($this->query)) {
      echo "<tr>
              <td align='center'><a class='btn btn-danger btn-del' data-id='".$this->rows['project_id']."'><em class='fa fa-trash'></em></a></td>
              <td>".$this->rows['project_name']."</td>
            </tr>
      ";
    }
  }
}

$dashboard = New Dashboard();
?>

<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      
      <h3 class="panel-title"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</h3>
      
      <div class="panel panel-default panel-table">
        <div class="panel-heading">
          <div class="row">
            <div class="col col-xs-12 text-right">
              <button type="button" class="btn btn-sm btn-primary btn-create" data-toggle="modal" data-target="#myForm">Nieuw project</button>
            </div>
          </div>
        </div>
        
        <div class="panel-body">
          <table class="table table-striped table-bordered table-list">
            <thead>
              <tr>
                <th><em class="fa fa-cog"></em></th>
                <th>Projectnaam</th>
              </tr> 
            </thead>
            <tbody>
              <?php $dashboard->showProjects(); ?>
            </tbody>
          </table>
        </div>
        
      </div>
    </div>
  </div>
</div>
  
