<!-- team -->
<div class="container team">
  <div class="col-xs-12 team-content">
    <h1>Ons team</h1>
    <?php
    if(empty($_SESSION['signedin'])) {
      echo "<h4><i class='fa fa-lock' aria-hidden='true'></i> Log a.u.b. in om documenten te bekijken.</h4>";
    }
    else {
      echo "<h4><i class='fa fa-unlock-alt' aria-hidden='true'></i></i> U bent ingelogd. Klik op een persoon om documenten te bekijken.</h4>";
    }
    ?>
    
    <hr>
    <div class="row">
      <div class="col-md-3 col-xs-6 text-center person" data-name="mohammed">
        <img class="img-responsive img-center" src="img/team/mohammed_photo.png">
        <h3>Mohammed Amakran</h3>
        <p>Mijn naam is Mohammed Amakran en ik woon in Maassluis doe de opleiding applicatie ontwikkelaar.</p>
      </div>
      <div class="col-md-3 col-xs-6 text-center person" data-name="ritchie">
        <img class="img-responsive img-center" src="img/team/ritchie_photo.png">
        <h3>Richard Bos</h3>
        <p>Mijn naam is Richard Bos en ik woon in Rotterdam doe de opleiding applicatie ontwikkelaar.</p>
      </div>
      <div class="col-md-3 col-xs-6 text-center person" data-name="joel">
        <img class="img-responsive img-center" src="img/team/joel_photo.png">
        <h3>Joël Besems</h3>
        <p>Mijn naam is Joël Besems en ik woon in Giessenburg doe de opleiding applicatie ontwikkelaar.</p>
      </div>
      <div class="col-md-3 col-xs-6 text-center person" data-name="robert">
        <img class="img-responsive img-center" src="img/team/robert_photo.png">
        <h3>Robert den Blaauwen</h3>
        <p>Mijn naam is Robert den Blaauwen en ik woon in Vlaardingen doe de opleiding applicatie ontwikkelaar.</p>
      </div>
    </div>
  </div>
</div>