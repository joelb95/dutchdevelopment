<?php

class Cookie extends Database {
  private $cookies;
  private $row;
  private $key;
  
  public function __construct() {
    if(isset($_COOKIE['signedin']) and empty($_SESSION['signedin'])) {
      $this->connDatabase();
      $this->dbError();
      $this->escString();
      $this->checkKey();
      if($this->row == 1) {
        $this->initSession();
        $this->destCookie();
        $this->generateKey();
        $this->changeKey();
        $this->initCookie();
      }
    }
  }
  
  public function escString() {
    $this->key = $_COOKIE['signedin'];
    
    $this->key = mysqli_real_escape_string($this->db, $this->key);
  }
  
  public function checkKey() {
    $this->sql = "
      SELECT a.account_id, a.account_username, a.account_rights
			FROM cookies AS c, accounts AS a
			WHERE c.cookie_key = '".$this->key."'
        AND c.cookie_id = a.account_id
    ";
    
    $this->query = mysqli_query($this->db, $this->sql);
    
    while($this->rows = mysqli_fetch_assoc($this->query)) {
      $this->cookies = $this->rows;
    }
    
    $this->row = mysqli_num_rows($this->query);
  }
  
  public function initSession() {
    $_SESSION['signedin'] = $this->cookies;
  }
  
  public function destCookie() {
    setcookie("signedin", "", time() - 3600, "/");
  }
  
  public function generateKey() {
    $this->key = md5(microtime().rand());
  }
  
  public function changeKey() {
    $this->sql = "
      UPDATE cookies 
      SET cookie_key = '".$this->key."' 
      WHERE cookie_id = '".$_SESSION['signedin']['account_id']."'
    ";
    
    $this->query = mysqli_query($this->db, $this->sql);
  }
  
  public function initCookie() {
    setcookie("signedin", $this->key, time() + (3600 * 24 * 365), "/");
  }
}

$cookie = new Cookie();
?>