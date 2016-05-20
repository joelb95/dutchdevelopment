<?php

class TopBanner {
  
  public function showVideo() {
    echo "<a class='hvr-grow' href='#' data-toggle='modal' data-target='#modal-video'>
            Bekijk onze promo video <i class='fa fa-chevron-circle-right'></i>
          </a>";
  }
  
  public function showProjectName() {
    echo "<h1>Project NFC</h1> 
          <br>
          <p>Klik op de waaier onderin waneer u ingelogd bent.</p>";
  }
}

$topbanner = new TopBanner();
?>

<!-- banner -->
<div class="top_section" style="height: 100%;">
  <div class="col-xs-12 top_bg">
    <div class="top-icons">
      <i class="fa fa-bars open-nav btn-nav"></i>
    </div>
    <div class="section_container">
      <div class="banner">
        <img src="img/logo/dd_logo.png">
      </div>
      <div class="link">
      <?php
        if(empty($_GET['content'])) {
          $topbanner->showVideo();
        }
        else {
          switch($_GET['content']) {
            default:
              $topbanner->showVideo(); 
              break;
            case 'project':
              $topbanner->showProjectName();
              break;
          }
        }
      ?>
      </div>
    </div>
  </div>
</div>

<div id="modal-video" class="modal fade modal-video" id="myModal" role="dialog">
  <div class="modal-dialog modal-lg">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
      <video class="responsive-video" controls>
      <source src="vid/promo/promo.mp4" type="video/mp4">
      </video>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>