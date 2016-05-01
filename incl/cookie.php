<?php

class Cookie {
  
  public function __construct() {
    if(isset($_COOKIE['signedin'])) {
      print_r($_COOKIE['signedin']);
    }
  }
}

$cookie = new Cookie();
?>