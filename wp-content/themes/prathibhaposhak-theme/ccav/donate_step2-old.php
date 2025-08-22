<html>

<head>
	<meta charset="utf-8">
	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="Pratibha Poshak" />
	<meta name="author" content="Pratibha Poshak" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Pratibha Poshak | About Pratibha Poshak Project | Pratibha Poshak Donations | Donate to Pratibha Poshak !
		Make a Donation - Step 2</title>
	<link rel="shortcut icon" href="../../images/favicon.ico" />
	<!-- Google Font -->
	<link
		href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200&display=swap"
		rel="stylesheet">

	<!-- CSS Global Compulsory (Do not remove)-->
	<link rel="stylesheet" href="../../css/font-awesome/all.min.css" />
	<link rel="stylesheet" href="../../css/flaticon/flaticon.css" />
	<link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css" />

	<!-- Page CSS Implementing Plugins (Remove the plugin CSS here if site does not use that feature)-->
	<link rel="stylesheet" href="../../css/owl-carousel/owl.carousel.min.css" />

	<!-- Template Style -->
	<link rel="stylesheet" href="../../css/style.css" />
	<script>
		window.onload = function () {
			var d = new Date().getTime();
			document.getElementById("tid").value = d;
		};
	</script>
	<!-- <script src='https://www.google.com/recaptcha/api.js' async defer></script> -->
</head>

<?php
function get_amount($don_cause, $don_category)
{
	if ($don_cause == 'sponsor-student') {
		if ($don_category == 'Indian')
			return "68000";
		else
			return "830";
	}
	if ($don_cause == 'sponsor-device') {
		if ($don_category == 'Indian')
			return "19000";
		else
			return "230";
	}
	if ($don_cause == 'sponsor-teaching') {
		if ($don_category == 'Indian')
			return "24000";
		else
			return "300";
	}
	if ($don_cause == 'sponsor-data') {
		if ($don_category == 'Indian')
			return "7500";
		else
			return "90";
	}
	if ($don_cause == 'sponsor-other') {
		return "";
	}
}

function get_cause($don_cause)
{
	if ($don_cause == 'sponsor-student') {
		return 'Sponsor a Student';
	}
	if ($don_cause == 'sponsor-device') {
		return 'Sponsor a Device (Tablet PC)';
	}
	if ($don_cause == 'sponsor-teaching') {
		return 'Sponsor Teaching';
	}
	if ($don_cause == 'sponsor-data') {
		return 'Sponsor Internet Data';
	} else {
		return "";
	}
}
?>

<body>

	<?php
	$donation = $_POST['donation'];
	$donor_category = $_POST['donorcategory'];
	?>
	<header class="header header-sticky">
		<div class="header-main">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="d-lg-flex align-items-center">
							<!-- logo -->
							<a class="navbar-brand logo" href="../../index.html">
								<img src="../../images/pratibha-poshak-logo.svg" alt="Logo">
							</a>
							<nav class="navbar navbar-expand-lg">

								<!-- Navbar toggler START-->
								<button class="navbar-toggler" type="button" data-toggle="collapse"
									data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
									aria-expanded="false" aria-label="Toggle navigation">
									<span class="navbar-toggler-icon"></span>
								</button>
								<!-- Navbar toggler END-->

								<!-- Navbar START -->
								<div class="collapse navbar-collapse justify-content-center"
									id="navbarSupportedContent">
									<ul class="navbar-nav">
										<li class="nav-item">
											<a class="nav-link dropdown-toggle" href="../../index.html">
												Home </i></a>
										</li>
										<li class="nav-item dropdown">
											<a href="#" class="nav-link dropdown-toggle">
												About the Project
											</a>
											<!-- Dropdown Menu -->
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="../../about-us.html">About Pratibha
														Poshak</a></li>
												<li><a class="dropdown-item" href="../../people.html">People</a></li>
												<li><a class="dropdown-item"
														href="../../partners-and-donors.html">Partners
														and Donors</a></li>
											</ul>
										</li>
										<li class="nav-item">
											<a href="../../GetInvolved.html" class="nav-link dropdown-toggle">
												Get Involved
											</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="../../Resources.html">
												Resources
											</a>
										</li>
										<li class="nav-item">
											<a href="../../Gallery.html" class="nav-link dropdown-toggle">
												Gallery
											</a>
										</li>
										<li class="nav-item dropdown">
											<a class="nav-link dropdown-toggle" href="">Reports
											</a>
											<!-- Dropdown Menu -->
											<ul class="dropdown-menu">
												<li><a class="dropdown-item"
														href="../../ProjectImplementation-2022-23.html">Project
														Implementation 2023</a></li>
												<li><a class="dropdown-item"
														href="../../pratibha-sammelana.html">Pratibha
														Sammelans</a></li>
											</ul>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="../../contact-us.html">Contact Us</a>
										</li>
									</ul>
								</div>
								<!-- Navbar END-->
								<div class="search-icon mr-5 mr-lg-0 d-lg-flex d-none align-items-center">
									<!-- Button START-->
									<div class="header-search nav-item">
										<div class="search">
											<a href="https://www.rajalakshmifoundation.in/" target="_blank">
												<img src="../../images/rcf-logo.png" style="width: 70%;" />
											</a>
										</div>
									</div>
									<!-- Button END-->
								</div>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<section class="inner-banner bg-overlay-black-70 bg-holder"
		style="background-image: url('../../images/bg/govt-schools.jpg');">
		<div class="container">
			<div class="row d-flex justify-content-center">
			</div>
		</div>
	</section>

	<section class="space-ptb bg">
	<form id="donationForm1" action="donate_step3.php" name="donate_step1" method="post">
		<div class="container">		
			<div class="row">
				<div class="col-md-12">
					<h3>Donate to Pratibha Poshak</h3>
					<p>We need some information about you. </p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
				<table width="60%" height="100" border='1' align="center" class="table">
					<tr>
						<td><label>	Donor Name (*) </label></td>
						<td><input type="text" id="billing_name" name="billing_name" value="" class="form-control-donate" />
						<br>
						<span id="billing_nameError" style="color: red;"></span></td>
					</tr>
				</table>
				</div>
				<div class="col-md-12">
				
						<!-- Name Field -->
						<legend><b>Donate towards</b></legend>
					<div class="col-sm-12">
						<input type="hidden" name="tid" id="tid" readonly />
						<input type="hidden" name="language" value="EN" />
						<input type="hidden" name="donor_category" value="<?php echo $donor_category; ?>" />
					</div>

					<div class="col-md-12">
						
						
					</div>

					<div class="col-md-12">
						<label>Phone (*)</label>
						<input type="text" id="billing_tel" name="billing_tel" value="" class="form-control-donate" />
						<br>
						<span id="billing_telError" style="color: red;"></span>
					</div>

					<div class="col-md-12">
					<label>Email (*)</label>
					<input type="text" id="billing_email" name="billing_email" value="" class="form-control-donate" />
					<br>
					<span id="billing_emailError" style="color: red;"></span>
					</div>

					<div class="col-md-12">
					<label><b>Amount (*)</b></label>
								<input type="text" id="amount" name="amount"
										value="<?php echo get_amount($donation, $donor_category); ?>" 
										class="form-control-donate" />
					</div>
					<div class="col-md-12">
					<label><b>Currency (*)</label>
								<input type="text" id="currency" name="currency"
										value="<?php echo ($donor_category == 'Indian' ? 'INR' : 'USD'); ?>" readonly
										class="form-control-donate" />
					</div>
					<div class="col-md-12">
					<label>Donation for (*)</lable>
								<input type="text" name="merchant_param2"
										value="<?php echo get_cause($donation); ?>" class="form-control-donate" />
					</div>					
					<?php
							if ($donor_category == 'Indian') {
								echo ' <div class="col-md-12">
		        			<label>Your PAN (*)</label>
							<input type="text" id="merchant_param1" name="merchant_param1" value="" class="form-control-donate" />
		        		</div>
							';
							}
					?>
					<div class="col-md-12">
					<label>Address</label>
								<input type="text" name="billing_address" value="" class="form-control-donate" />
								
					</div>
					<div class="col-md-12">
					<label>City</label>
								<input type="text" name="billing_city" value="" class="form-control-donate" />
					</div>
					<div class="col-md-12">
					<label>State<label>
								<input type="text" name="billing_state" value="" class="form-control-donate" />
					</div>
					<div class="col-md-12">
					<label>PIN Code</label>
						<input type="text" name="billing_zip" value="" class="form-control-donate" />
					</div>
					<div class="col-md-12">
					<label>Country</label>
								<input type="text" name="billing_country" value="India"
										class="form-control-donate" />
					</div>

					<?php
					if ($donor_category == 'Indian') {
						echo '<div class="row">
    					<legend><b>Mode of Payment</b></legend>
    					<div class="col-sm-12">
							<input type="radio" id="mode1" name="paymode" value="upiqr" />
      						<label for="model1">UPI QR Code</label>

      						<input type="radio" id="mode2" name="paymode" value="online" />
      						<label for="model2">Payment Gateway (Net Banking/Cards/Wallets)</label>

							<input type="radio" id="mode3" name="paymode" value="offline" />
							<label for="model3">Cheque/Bank Transfer (NEFT/RTGS/Cheque)</label>
						</div>
  						</div>';
					}
					?>

						<!-- Submit Button -->
						<div class="g-recaptcha" data-sitekey="6LfTdbgnAAAAAP-q_Wj00EvxWQLPTH1gTPS40BhR"></div>
						<input class="btn btn-sm rcfBtn btn-white" type="submit" value="Next">
					
				</div>
			</div>
			
		</div>
	</form>
		<script>
				// Add an event listener for form submission
				document.getElementById('donationForm1').addEventListener('submit', function (event) {
					// Reset error messages
					document.getElementById('billing_nameError').textContent = '';
					document.getElementById('billing_telError').textContent = '';
					document.getElementById('billing_emailError').textContent = '';

					if (document.getElementById('billing_name').value.trim() === '') {
					document.getElementById('billing_nameError').textContent = 'Please enter Billing Name.';
					event.preventDefault(); // Prevent form submission
					}

					if (document.getElementById('billing_tel').value.trim() === '') {
					document.getElementById('billing_telError').textContent = 'Please enter Phone Number';
					event.preventDefault(); // Prevent form submission
					}

					if (document.getElementById('billing_email').value.trim() === '') {
					document.getElementById('billing_emailError').textContent = 'Please enter a valid email address.';
					event.preventDefault(); // Prevent form submission
					}

					var emailValue = document.getElementById('billing_email').value.trim();
					var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
					if (!emailPattern.test(emailValue)) {
						document.getElementById('billing_emailError').textContent = 'Please enter a valid email address.';
						event.preventDefault(); // Prevent form submission
					}					
				});
			</script>

	</section>

	<!--=================================
	Footer-->
	<footer class="space-pt bg-overlay-black-90 bg-holder footer mt-n5"
		style="background-color: #ededed !important; padding-top: 20px;">
		<div class="container pt-5">
			<div class="row pb-5 pb-lg-6 mb-lg-3">
				<div class="col-sm-6 col-lg-2 mb-4 mb-lg-0">
					<h5 class="text-white mb-2 mb-sm-4">Get Involved Links</h5>
					<div class="footer-link">
						<ul class="list-unstyled mb-0">
							<li><a class="text-white" href="../../mentorship.html">Be a Mentor</a></li>
							<li><a class="text-white" href="../../teacher.html">Be a Teacher</a></li>
							<li><a class="text-white" href="../../sponsor.html">Sponsor a Student</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6 col-lg-2 mb-4 mb-sm-0">
					<h5 class="text-white mb-2 mb-sm-4">Useful Links</h5>
					<div class="footer-link">
						<ul class="list-unstyled mb-0">
							<li><a class="text-white" href="../../index.html">Home</a></li>
							<li><a class="text-white" href="../../about-us.html">About</a></li>
							<li><a class="text-white" href="../../Gallery.html">Gallery</a></li>
							<li><a class="text-white" href="../../Resources.html">Resources</a></li>
							<li><a class="text-white" href="../../Reports.html">Reports</a></li>
							<li><a class="text-white" href="../../privacy-policy.html">Privacy Policy</a></li>
							<li><a class="text-white" href="../../contact-us.html">Contact us</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6 col-lg-4">
					<h5 class="text-white mb-2 mb-sm-4">Contact Us</h5>
					<p class="text-white">
						Rajalakshmi Children Foundation<br>
						Plot No. 3, SPOORTI, Double Road<br>
						Hanuman Nagar, Belagavi – 590001<br>
						Karnataka, India<br>
						Ph: +91-9480188790<br>
						Email : rcfbgm@gmail.com</p>
					<div class="footer-contact-info">
						<div class="contact-address mt-4">
							<p class="text-white">
								Project Pratibha Poshak<br>
								RCF Sadhana Mandir<br>
								Sector No. 12, Anjaneya Nagar (near Datta Mandir)<br>
								Belagavi – 590016<br>
								Karnataka, India
							</p>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-lg-4 mb-4 mb-lg-0 pr-lg-5">
					<a href="../../index.html"><img class="img-fluid mb-3 footer-logo"
							src="../../images/pratibha-poshak-logo.svg" alt=""></a>

					<h5 class="text-white mb-2 mb-sm-4">Follow Us</h5>
					<div class="social-icon social-icon-style-02">
						<ul>
							<li><a href="https://www.facebook.com/RCFKarnataka/" target="_blank"><i
										class="fab fa-facebook-f"></i></a></li>
							<li><a href="#"><i class="fab fa-twitter"></i></a></li>
							<li><a href="https://www.linkedin.com/company/rajalakshmi-children-foundation"
									target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
							<li><a href="#"><i class="fab fa-instagram"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-bottom bg-dark py-4">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-12 text-center">
						<p class="mb-0 text-white">©Copyright 2023 - 24 <a class="text-white"
								href="../../index.html">Pratibha Poshak</a>
							All Rights Reserved</p>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!--=================================
	Footer-->

	<!--=================================
	Back To Top-->
	<div id="back-to-top" class="back-to-top">up</div>
	<!--=================================
	Back To Top-->

	<script src="../../js/jquery-3.5.1.min.js"></script>
	<script src="../../js/popper/popper.min.js"></script>
	<script src="../../js/bootstrap/bootstrap.min.js"></script>

	<!-- Page JS Implementing Plugins (Remove the plugin script here if site does not use that feature)-->
	<script src="../../js/jquery.appear.js"></script>
	<script src="../../js/counter/jquery.countTo.js"></script>
	<script src="../../js/owl-carousel/owl.carousel.min.js"></script>

	<!-- Template Scripts (Do not remove)-->
	<script src="../../js/custom.js"></script>

</body>

</html>