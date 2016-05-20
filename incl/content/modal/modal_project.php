<?php

class ModalProject {
  public $name = "";
  public $fname = "";
  
  public function __construct() {
    if(isset($_POST['name'])) {
      $this->name = $_POST['name'];
      $this->folderName();
    }
  }
  
  public function folderName() {
    $this->fname = str_replace(' ', '_', $this->name);
    $this->fname = strtolower($this->fname);
  }
  
  public function listPdf() {
    chdir("../../../");
    
    foreach (glob("doc/".$this->fname."/pdf/*.{[pP][dD][fF]}", GLOB_BRACE) as $this->pdf_file) {
      echo "<i class='fa fa-file-pdf-o modal-text'></i> <a href='".$this->pdf_file."' target='_blank'>".basename($this->pdf_file)."</a><br/>";
    }
  }
}

$modalproject = New ModalProject();
?>

<div id="myProject" class="modal fade" role="dialog"> 
  <!-- Modal -->
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Documenten van <?php echo $modalproject->name; ?></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-xs-9">
            <h4 class="file-title"><i class="fa fa-file-pdf-o"></i> .PDF bestanden</h4>
            <?php $modalproject->listPdf(); ?>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>