<?php

class Signout extends Database {
  
  public function __construct() {
    if(isset($_POST['signout'])) {
      $this->connDatabase();
      $this->dbError();
      $this->destCookie();
      $this->destSession();
      $this->returnHome();
    }
  }
  
  public function destCookie() {
   $this->sql = "
    DELETE FROM cookies 
    WHERE cookie_key = '".$_COOKIE['signedin']."'
   "; 
   
   $this->query = mysqli_query($this->db, $this->sql);
    
   setcookie("signedin", "", time() - 3600, "/");
  }
  
  public function destSession() {
    unset($_SESSION['signedin']);
  }
  
  public function returnHome() {
    header("Location: http://".$_SERVER['SERVER_NAME'].$this->project.$this->home);
  }
}

$signout = new Signout();
?>

<input type="submit"  class="btn btn-default btn-sm" name="signout" value="Uitloggen">

