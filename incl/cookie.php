<?php

class Cookie extends Database {
  private $cookies;
  private $row;
  private $key;
  
  public function __construct() {
    $this->connDatabase();
    $this->dbError();
    
    if(isset($_COOKIE['signedin']) and empty($_SESSION['signedin'])) {
      $this->escString();
      $this->checkKey();
      if($this->row == 1) {
        $this->initSession();
        $this->destCookie();
        $this->generateKey();
        $this->changeKey();
        $this->initCookie();
        $this->returnPage();
      }
    }
  }
  
  public function chgLastVisit($lastvisit) {
    $this->sql = "
      UPDATE cookies
      SET cookie_lastvisit = '".$lastvisit."' 
      WHERE cookie_key = '".$_COOKIE['signedin']."'
        AND cookie_id = '".$_SESSION['signedin']['account_id']."'
    ";
    
    $this->query = mysqli_query($this->db, $this->sql);
  }
  
  public function escString() {
    $this->key = $_COOKIE['signedin'];
    
    $this->key = mysqli_real_escape_string($this->db, $this->key);
  }
  
  public function checkKey() {
    $this->sql = "
      SELECT a.account_id, a.account_username, a.account_rights, 
             c.cookie_lastvisit
			FROM accounts AS a, cookies AS c
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
  
  public function returnPage() {
    header("Location: ".$_SERVER['REQUEST_URI']);
  }
}

$cookie = new Cookie();
?>