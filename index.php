<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="content-language" content="nl" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Dutch Development</title>
	
	<?php 
	require_once "incl/globals.php";
	require_once $globals->lesscinc_php;
	
	$less = new lessc;
	$less->checkedCompile('less/style.less', 'css/style.css')
	
	?>
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<link href="css/font-awesome.min.css" rel="stylesheet" />
	<link href="css/animate.min.css" rel="stylesheet" />
	<link href="css/hover.css" rel="stylesheet" />
	<link href="css/dashboard.css" rel="stylesheet" />
	<link href="css/style.css" rel="stylesheet" />
	
</head>

<body>
<?php
require_once $globals->database_php;
require_once $globals->session_php;
require_once $globals->cookie_php;

// Sidebar
require_once $globals->nav_php;

// Header
require_once $globals->topbanner_php;

// Content
if(empty($_GET['content'])) {
	// Default
	require_once $globals->team_php;
	require_once $globals->midbanner_php;
	require_once $globals->contact_php;
	if(isset($_SESSION['signedin'])) {
		switch($_SESSION['signedin']['account_rights']) {
			case 'admin':
			case 'albeda':
				require_once $globals->modalprofile_php;
				break;
		}
	}
}
else {
	switch($_GET['content']) {
		case 'home':
			require_once $globals->team_php;
			require_once $globals->midbanner_php;
			require_once $globals->contact_php;
			if(isset($_SESSION['signedin'])) {
				switch($_SESSION['signedin']['account_rights']) {
					case 'admin':
					case 'albeda':
						require_once $globals->modalprofile_php;
						break;
				}
			}
			break;
		case 'dashboard':
			if(isset($_SESSION['signedin'])) {
				switch($_SESSION['signedin']['account_rights']) {
					case 'admin':
						require_once $globals->dashboard_php;
						require_once $globals->modalform_php;
						require_once $globals->modalalert_php;
						break;
				}
			}
			break;
		case 'project':
			// NOTE: Empty Projectpage
			require_once $globals->midbanner_php;
			break;
	}	
}

// Footer
require_once $globals->map_php;

?>
</body>

	<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script src="//cdn.datatables.net/t/bs/dt-1.10.11,r-2.0.2/datatables.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/modernizr-2.6.2.min.js"></script>
	<script src="js/custom.js"></script>
	<script src="http://maps.googleapis.com/maps/api/js"></script>
	<script>
		$(".open-nav").click(function() {
			$(".nav").animate({
				"left": "0px"
			}, 500);
		});
		
		$(".close-nav").click(function(){
			$(".nav").animate({
				"left": "-350px"
			}, 500);
		});
		
		function initialize() {
			var mapProp = {
				center:new google.maps.LatLng(51.8759325,4.538051),
				zoom:15,
				mapTypeId:google.maps.MapTypeId.ROADMAP
			};
			var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
		}
		google.maps.event.addDomListener(window, 'load', initialize);
	</script>
</html>