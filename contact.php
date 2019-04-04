<?php
session_start();
?>

<!DOCTYPE HTML>
<!--
Phantom by HTML5 UP
html5up.net | @ajlkn
Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
Heroes Betterment Incorporated Website built by Dante Foulke
-->
<html>
	<head>
		<title>Heroes Betterment Inc.</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->

		<script>
            $(document).ready(function() {

				var request;

              	$("#contactForm").submit(function(event){
	                event.preventDefault();

					// Abort any pending request
				    if (request) {
				        request.abort();
				    }

					// setup some local variables
    				var $form = $(this);

					// Let's select and cache all the fields
    				var $inputs = $form.find("input, select, button, textarea");

					// Serialize the data in the form
					var serializedData = $form.serialize();

					// Let's disable the inputs for the duration of the Ajax request.
					// Note: we disable elements AFTER the form data has been serialized.
					// Disabled form elements will not be serialized.
					// $inputs.prop("disabled", true);

	                request = $.ajax({
        				url: "/contactformscript.php",
	                  	type: "post",
	                  	data: serializedData
	                });

					// Callback handler that will be called on success
				    request.done(function (response, textStatus, jqXHR){

					    if (response.status == 0) {
					        // Success! Do something successful, like show success modal
                            jQuery.noConflict();
					        $('#successEmail').modal('show');
					    } else {
					        // Oh no, failure - notify the user
                            jQuery.noConflict();
                            $('#failEmail').modal('show');
					    }

                        $( "#failBtn" ).click(function() {
                            jQuery.noConflict();
                            $('#failEmail').modal('hide');
                        });

                        $( "#passBtn" ).click(function() {
                            window.location.reload();
                        });

				    });

				    // Callback handler that will be called on failure
				    request.fail(function (jqXHR, textStatus, errorThrown){
						// Say you have a <div class="message"></div> somewhere, maybe under your form
    					//$('.message').html('Error: ' + textStatus + ', ' + errorThrown)
				    });

					// Callback handler that will be called regardless
				    // if the request failed or succeeded
				    request.always(function () {
				        // Reenable the inputs
				        $inputs.prop("disabled", false);
				    });
              	});
        	});
      	</script>
	</head>
	<body>
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="inner">

							<!-- Logo -->
								<a href="home.html" class="logo" >
									<span class="symbol"><img src="images/HB logo.png" alt="Heroes Betterment Inc." /></span>
								</a>

          					<!-- Menu -->
							<nav>
								<ul>
									<li class="home_button"><a href="/">Home</a></li>
									<li class="menu_button"><a href="/get-involved.php">Get Involved</a></li>
									<li class="menu_button"><a href="/signup.php">Deployed Sign-Up</a></li>
									<li class="menu_button"><a href="/contact.php" class="current">Contact Us</a></li>
									<li class="icons"><a href="https://www.facebook.com/hbsforcarepackages/" class="icon style1 fa-facebook" target="_blank"><span class="label">Facebook</span></a></li>
									<li class="icons"><a href="https://www.instagram.com/hbcarepackages/" class="icon style1 fa-instagram" target="_blank"><span class="label">Instagram</span></a></li>
								</ul>
							</nav>
						</div>
					</header>


				<!-- Main -->
					<div id="main" class="contact_page">
						<div class="inner">
							<h1>Contact Us</h1>
							<span class="image main"><img src="images/Pic05.jpg" alt="" /></span>
							<p>Phone Number:<br>
								(661) 317-3132</p>
							<p>Mailing Address:<br>
								Heroes Betterment Inc.<br>
								43824 20th St. West #1643<br>
								Lancaster, CA 93539-1643</p>
							<p>Find us on:<br>
							<a href="https://www.facebook.com/hbsforcarepackages/" target="_blank"><span class="label"><b>Facebook</b></span></a> |
							<a href="https://www.instagram.com/hbcarepackages/" target="_blank"><span class="label"><b>Instagram</b></span></a><br></p>



							<section>
								<h2>Send Us A Message</h2>
								<form id="contactForm" method="post">
									<div class="row uniform">
										<div class="8u$ -2u 12u$(small)">
											<input type="text" name="name" id="Contact-name" value="" placeholder="Name">
										</div>
										<div class="8u$ -2u 12u$(small)">
											<input type="email" name="email" id="Contact-email" value="" placeholder="Email">
										</div>
										<div class="8u$ -2u 12u$(small)">
											<input type="text" name="subject" id="Contact-subject" value="" placeholder="Subject">
										</div>
										<div class="8u$ -2u 12u$(small)">
											<div class="textarea-wrapper"><textarea name="message" id="Contact-message" placeholder="Message" rows="12" style="overflow: hidden; resize: none; height: 69px;"></textarea></div>
										</div>
										<div class="4u -2u 12u$(small)">
												<input type="checkbox" id="Contact-copy" name="copy" checked>
												<label for="Contact-email-copy">Email me a copy</label>
										</div>
										<div class="4u$ 12u$(small)">
											<img id="captcha" src="/securimage/securimage_show.php" alt="CAPTCHA Image" />
											<br/>
											<input type="text" name="captcha_code" size="10" maxlength="6" />
											<br/>
											<a href="#" id="secureText" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' + Math.random(); return false">
												<small>Refresh Image</small>
											</a>
										</div>
										<!-- <div class="4u$ 12u$(small)">
											<input type="checkbox" id="Contact-Iamhuman" name="Contact-Iamhuman">
											<label for="K9-Iamhuman">I am not a robot</label>
										</div> -->
										<div class="12u$">
											<ul class="actions">
												<li>
													<button type="submit" class="special" id="btnSubmit">
                                                        <span>Submit</span>
                                                    </button>
													<!-- <input type="submit" value="Submit" class="special"> -->

												</li>
											</ul>
										</div>
									</div>
								</form>
							</section>
							<br><br>

				<!-- Footer -->
					<footer id="footer">
						<div class="inner">
								<ul class="copyright">
								<li>&copy; Heroes Betterment Incorporated. All rights reserved</li><li>Design: <a href="http://html5up.net" target="_blank">HTML5 UP</a></li><li>Built: <a href="https://github.com/flkdnt" target="_blank">Dante Foulke</a></li>
							</ul>
						</div>
					</footer>

		  	</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>
