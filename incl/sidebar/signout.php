<?php

class Signout extends Database {
  private $key;
  
  public function __construct() {
    if(isset($_POST['signout'])) {
      $this->connDatabase();
      $this->dbError();
      $this->escString();
      $this->eraseKey();
      $this->destCookie();
      $this->destSession();
      $this->returnHome();
    }
  }
  
  public function escString() {
    $this->key = $_COOKIE['signedin'];
    
    $this->key = mysqli_real_escape_string($this->db, $this->key);
  }
  
  public function eraseKey() {
    $this->sqlOne = "
      DELETE FROM cookies 
      WHERE cookie_key = '".$this->key."'
        AND cookie_id = '".$_SESSION['signedin']['account_id']."'
    "; 
   
    $this->query = mysqli_query($this->db, $this->sqlOne);
  }
  
  public function destCookie() {
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

