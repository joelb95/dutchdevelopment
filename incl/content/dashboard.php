<?php

class Dashboard extends Database {
  
  public function __construct() {
    
  }
  
  
}

$dashboard = New Dashboard();
?>
  
<div class="col-md-10 col-md-offset-1">
  
  <div class="panel panel-default panel-table">
    <div class="panel-heading">
      <div class="row">
        <div class="col col-xs-6">
          <h3 class="panel-title"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</h3>
        </div>
        <div class="col col-xs-6 text-right">
          <button type="button" class="btn btn-sm btn-primary btn-create">Create New</button>
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
          <tr>
            <td align="center">
              <a class="btn btn-default"><em class="fa fa-pencil"></em></a>
              <a class="btn btn-danger"><em class="fa fa-trash"></em></a>
            </td>
            <td>Project NFC</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

</div>
  
