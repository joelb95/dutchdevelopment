<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="content-language" content="nl" />
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>DutchDevelopment</title>
		<?php 
		require 'partials/lessc.inc.php';
		$less = new lessc;
		$less->checkedCompile('less/style.less', 'css/style.css')
		?>
		<link href="css/style.css" rel="stylesheet" />
		<link href="css/bootstrap.min.css" rel="stylesheet" />
		<link href="css/font-awesome.min.css" rel="stylesheet" />
		<link href="css/animate.min.css" rel="stylesheet" />
		<link href="css/hover.css" rel="stylesheet" />

		<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
	    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	    <script src="//cdn.datatables.net/t/bs/dt-1.10.11,r-2.0.2/datatables.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	    <script src="js/modernizr-2.6.2.min.js"></script>
	    <script src="js/custom.js"></script>
		<script src="http://maps.googleapis.com/maps/api/js"></script>
	</head>
	<body>
		<!-- Nav -->
	  	<div class="nav nav-main" style="position: fixed;">
            <div class="top-icon">
	      		<i class="fa fa-times btn-close-nav close-nav"></i>
			</div>
			<div class="nav-wrapper">
				<ul>
					<li><a href="#">Project 1</a></li>
					<li><a href="#">Project 2</a></li>
				</ul>
			</div>
			<div class="login-wrapper">
				<input type="text" placeholder="Gebruikersnaam">
				<input type="password" placeholder="Wachtwoord">
  				<input type="submit" name="signin" value="Inloggen">
			</div>
		</div>

		<!-- banner -->
		<div class="top_section">
			<div class="col-xs-12 top_bg">
				<div class="top-icons">
					<i class="fa fa-bars open-nav btn-nav"></i>
				</div>
				<div class="section_container">
					<div class="banner">
						<img src="img/dd_logo.png">
					</div>
					<div class="link">
						<a class="hvr-grow" href="#">
			          		Bekijk onze promo video<i class="fa fa-chevron-circle-right"></i>
				        </a>
					</div>
				</div>
			</div>
		</div>
		<!-- team -->
		<div class="container team">
			<div class="col-xs-12">
				<h1>Ons team</h1>
				<hr>
				<div class="row">
		            <div class="col-md-3 col-xs-6 text-center person" data-toggle="modal" data-target="#modal-mo">
		                <img class="img-responsive img-center" src="img/Mo.png">
		                <h3>Mohammed Amakran</h3>
		                <p>Mijn naam is Mohammed Amakran en ik woon in Maassluis doe de opleiding applicatie ontwikkelaar.</p>
		            </div>
		            <div class="col-md-3 col-xs-6 text-center person" data-toggle="modal" data-target="#modal-ri">
		                <img class="img-responsive img-center" src="img/Ritchie.png">
		                <h3>Richard Bos</h3>
		                <p>Mijn naam is Richard Bos en ik woon in Rotterdam doe de opleiding applicatie ontwikkelaar.</p>
		            </div>
		            <div class="col-md-3 col-xs-6 text-center person" data-toggle="modal" data-target="#modal-jo">
		                <img class="img-responsive img-center" src="img/Joel.png">
		                <h3>Joël Besems</h3>
		                <p>Mijn naam is Joël Besems en ik woon in Giessenburg doe de opleiding applicatie ontwikkelaar.</p>
		            </div>
		            <div class="col-md-3 col-xs-6 text-center person" data-toggle="modal" data-target="#modal-ro">
		                <img class="img-responsive img-center" src="img/Robert.png">
		                <h3>Robert den Blaauwen</h3>
		                <p>Mijn naam is Robert den Blaauwen en ik woon in Vlaardingen doe de opleiding applicatie ontwikkelaar.</p>
		            </div>
		        </div>
			</div>
		</div>

		<div class="middle_banner">
			<img src="img/rdam_small.jpg">
		</div>

		<!-- Contact -->
		<div class="footer">
			<div class="container">
				<h1>Contact</h1>
				<hr>
				<div class="col-xs-6">
					<h2>Contactformulier</h2>
					<form class="contact-form" method="post" action="handler.php">
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
					  	<button type="submit" class="btn btn-default">Verzenden</button>
					</form>
				</div>
				<div class="col-xs-6">
					<h2>Contactgegevens</h2>
					<p>Albeda Stolwijkstraat<br/>
					Stolwijkstraat 8<br/>
					3079 DN Rotterdam<br/>
					010 292 90 29<br/>
					</p>
				</div>
			</div>
			<div id="googleMap" class="gmap"></div>
		</div>

	</body>
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
	</script>
	<script>
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