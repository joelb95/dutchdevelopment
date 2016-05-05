<?php

class Session extends Globals {
  private $lastvisit = "/";
  
  public function __construct() {
    session_start();
    
    if(empty($_SESSION['signedin']['cookie_lastvisit'])) {
      $this->initSession();
    }
    else {
      $this->putLastVisit();
      $this->destSession();
      $this->returnToPage();
    }
  }
  
  public function initSession() {
    $_SESSION['lastvisit'] = $this->lastvisit;
  }
  
  public function putLastVisit() {
    $this->lastvisit = $this->lastvisit.$_SESSION['signedin']['cookie_lastvisit'];
  }
  
  public function destSession() {
    unset($_SESSION['signedin']['cookie_lastvisit']);
  }
  
  public function returnToPage() {
    header("Location: http://".$_SERVER['SERVER_NAME'].$this->project.$this->lastvisit);
  }
}

$session = new Session();
?>