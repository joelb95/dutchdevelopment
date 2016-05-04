<?php

class ModalProfile {
  public $name = "";
  public $fname = "";
  
  public function __construct() {
    if(isset($_POST['name'])) {
      $this->name = $_POST['name'];
      $this->fname = ucfirst($_POST['name']);
    }
  }
  
  public function profileImg() {
    echo "<img class='img-responsive img-center profilepic' src='img/team/".$this->name."_photo.png' alt=''>";
  }
  
  public function listPdf() {
    chdir("../../../");
    
    foreach (glob("doc/team/".$this->name."_works/pdf/*.{[pP][dD][fF]}", GLOB_BRACE) as $this->pdf_file) {
      echo "<i class='fa fa-file-pdf-o modal-text'></i> <a href='".$this->pdf_file."' target='_blank'>".basename($this->pdf_file)."</a><br/>";
    }
  }
}

$modalprofile = New ModalProfile();
?>

<div id="myProfile" class="modal fade" role="dialog"> 
  <!-- Modal -->
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Documenten van <?php echo $modalprofile->fname; ?></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-xs-3">
            <?php $modalprofile->profileImg(); ?>
          </div>
          <div class="col-xs-9">
            <h4 class="file-title"><i class="fa fa-file-pdf-o"></i> .PDF bestanden</h4>
            <?php $modalprofile->listPdf(); ?>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>