<?php

class Modal {
  public $name = "";
  
  public function __construct() {
    if(isset($_POST['name'])) {
      $this->name = $_POST['name'];
    }
  }
  
  public function memberImg() {
    echo "<img class='img-responsive img-center profilepic' src='img/team/".$this->name."_photo.png' alt=''>";
  }
  
  public function listPdf() {
    chdir("../../../");
    
    foreach (glob("pdf/team/".$this->name."_pdf/*.{[pP][dD][fF]}", GLOB_BRACE) as $this->pdf_file) {
      echo "<i class='fa fa-file-pdf-o modal-text'></i> <a href='".$this->pdf_file."' target='_blank'>".basename($this->pdf_file)."</a><br/>";
    }
  }
}

$modal = New Modal();
?>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Documenten van <?php echo ucfirst($modal->name); ?></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-xs-3">
            <?php $modal->memberImg(); ?>
          </div>
          <div class="col-xs-9">
            <?php $modal->listPdf(); ?>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>