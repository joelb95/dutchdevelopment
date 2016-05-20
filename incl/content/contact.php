<!-- Contact -->
<div class="footer">
  <div class="container contact">
    <h1>Contact</h1>
    <hr>
    <div class="col-xs-6">
      <h2>Contactformulier</h2>
      <form class="contact-form" method="post">
        <div class="form-group">
          <label for="InputName">Naam</label>
          <input type="text" name="naam" id="naam" required="required" class="form-control">
        </div>
        <div class="form-group">
          <label for="InputEmail">E-mail</label>
          <input type="text" class="form-control" pattern="[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}" name="email" id="email" required="required">
        </div>
        <div class="form-group">
          <label for="InputPhone">Telefoon</label>
          <input type="text" class="form-control" name="telefoon" id="telefoon">
        </div>
        <div class="form-group">
          <label for="InputMessage">Bericht</label>
          <textarea class="form-control" rows="4" name="bericht" id="bericht" required="required"></textarea>
        </div>
        <button type="submit" name="contact" class="btn btn-default">Verzenden</button>
      </form>
      <?php
        if(isset($_POST['contact']))
        {
            $to = $globals->beheersmail;
            $subject = 'DD klantbericht:'.$_POST['naam'];
            $message = $_POST['bericht'].'\r\n\r\n'.
                        $_POST['naam'].'\r\n'.
                        $_POST['telefoon'].'\r\n';
            $headers = 'From:'.$_POST['email']. "\r\n" .
                        'Reply-To:'.$_POST['email']. "\r\n" .
                        'X-Mailer: PHP/' . phpversion();
                        
            mail($to, $subject, $message, $headers);
        }
      ?>
    </div>
    <div class="col-xs-6">
      <h2>Contactgegevens</h2>
      <div class="contactbox">
        <p>
          Albeda Stolwijkstraat<br/>
          Stolwijkstraat 8<br/>
          3079 DN Rotterdam<br/>
          010 292 90 29<br/>
        </p>
      </div>
    </div>
  </div>
</div>