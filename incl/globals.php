<?php

class Globals {
  protected $project = "/dutch_development";
  protected $home = "/home";
  protected $home_dashboard = "/dashboard";
  
  public $lesscinc_php = "/lessc.inc.php";
  public $database_php = "/database.php";
  public $session_php = "/session.php";
  public $cookie_php = "/cookie.php";
  public $nav_php = "/nav.php";
  public $signin_php = "/signin.php";
  public $signout_php = "/signout.php";
  public $topbanner_php = "/top_banner.php";
  public $team_php = "/team.php";
  public $modalprofile_php = "/modal_profile.php";
  public $midbanner_php = "/mid_banner.php";
  public $contact_php = "/contact.php";
  public $dashboard_php = "/dashboard.php";
  public $error_php = "/error.php";
  public $modalform_php = "/modal_form.php";
  public $modalalert_php = "/modal_alert.php";
  public $map_php = "/map.php";
  
  private $root;
  private $partials = "/partials";
  private $incl = "/incl";
  private $sidebar = "/sidebar";
  private $header = "/header";
  private $content = "/content";
  private $modal = "/modal";
  private $footer = "/footer";
  
  public function __construct() {
    $this->root = $_SERVER['DOCUMENT_ROOT'].$this->project;
    $this->dirPaths();
    $this->locPaths();
    $this->inclScripts();
    $this->locScripts();
  }
  
  public function dirPaths() {
    $this->partials = $this->root.$this->partials;
    $this->incl = $this->root.$this->incl;
    
    $this->sidebar = $this->incl.$this->sidebar;
    $this->header = $this->incl.$this->header;
    $this->content = $this->incl.$this->content;
    $this->footer = $this->incl.$this->footer;
    
    $this->modal = $this->content.$this->modal;
  }
  
  public function locPaths() {
    
  }
  
  public function inclScripts() {
    $this->lesscinc_php = $this->partials.$this->lesscinc_php;
    $this->database_php = $this->incl.$this->database_php;
    $this->session_php = $this->incl.$this->session_php;
    $this->cookie_php = $this->incl.$this->cookie_php;
    
    $this->nav_php = $this->sidebar.$this->nav_php;
    $this->signin_php = $this->sidebar.$this->signin_php;
    $this->signout_php = $this->sidebar.$this->signout_php;
    
    $this->topbanner_php = $this->header.$this->topbanner_php;
    
    $this->team_php = $this->content.$this->team_php;
    $this->midbanner_php = $this->content.$this->midbanner_php;
    $this->contact_php = $this->content.$this->contact_php;
    $this->dashboard_php = $this->content.$this->dashboard_php;
    $this->error_php = $this->content.$this->error_php;
    
    $this->map_php = $this->footer.$this->map_php;
    $this->modalprofile_php = $this->modal.$this->modalprofile_php;
    $this->modalform_php = $this->modal.$this->modalform_php;
    $this->modalalert_php = $this->modal.$this->modalalert_php;
  }
  
  public function locScripts() {
    
  }
}

$globals = new Globals();
?>