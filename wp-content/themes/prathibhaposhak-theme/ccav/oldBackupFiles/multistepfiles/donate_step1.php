<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="Pratibha Poshak" />
	<meta name="author" content="Pratibha Poshak" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Pratibha Poshak | About Pratibha Poshak Project | Pratibha Poshak Donations | Donate to Pratibha Poshak !
		Make a Donation - Step 1</title>
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
	<style>
		.error {
			color: red;
		}
	</style>
	<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
	<script>
		window.onload = function () {
			var d = new Date().getTime();
			document.getElementById("tid").value = d;
		};
	</script>
	<script src='https://www.google.com/recaptcha/api.js' async defer></script>
</head>

<body>
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
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h3>Choose to make a difference today.</h3>
				</div>
				<div class="col-sm-12">
					<h3>Donate to Pratibha Poshak.</h3>
				</div>
				<div class="col-sm-12">
					<p>
						We are committed to making the most effective utilization of Your
						donations. Your donations are eligible for tax exemption under
						section 80G (applicable for Indian tax payers).
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 mb-3">
					<p>
						RCF has been awarded the GuideStar India
						Transparency Key. For latest updates, financials
						and documents, please visit our profile on
						GuideStar India.
					</p>
				</div>

				<div class="col-sm-12">
					<p>
						RCF is qualified by NASSCOM/BigTech (partner of
						TechSoup Global) and is a registered with
						Benevity Causes.
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<form id="donationForm" action="donate_step2.php" name="donate_step1" method="post">
						<!-- Name Field -->
						<legend><b>Donate towards</b></legend>
						<div>
							<input type="radio" id="dc1" name="donation" value="sponsor-student" />
							<label for="dc1">Sponsor a student - full 4 year program (Rs.68,000 or USD 830)</label>
							<br />
							<input type="radio" id="dc2" name="donation" value="sponsor-device" />
							<label for="dc2">Sponsor a Device (Tablet PC) (Rs. 19,000 or USD 230)</label>
							<br />
							<input type="radio" id="dc3" name="donation" value="sponsor-teaching" />
							<label for="dc3">Sponsor Teaching Hours for the full program (Rs.24,000 or USD
								300)</label>
							<br />
							<input type="radio" id="dc4" name="donation" value="sponsor-data" />
							<label for="dc4">Internet Data for 2 years (Rs.7,500 or USD 90)</label>
							<br />
							<input type="radio" id="dc5" name="donation" value="sponsor-other" />
							<label for="dc5">Other</label>
							<br>
							<span id="donationTypeError" style="color: red;"></span>
						</div>
						<legend><b>Donor Category</b></legend>
						<div>
							<input type="radio" id="cat1" name="donorcategory" value="Indian" />
							<label for="cat1">Indian Donor</label>

							<input type="radio" id="cat2" name="donorcategory" value="Foreign" />
							<label for="cat2">Foreign Donor</label>
							<br>
							<span id="donationCategoryError" style="color: red;"></span>
						</div>

						<!-- Submit Button -->
						<input class="btn btn-sm rcfBtn btn-white" type="submit" value="Next">
					</form>
				</div>
			</div>
			<script>
				// Add an event listener for form submission
				document.getElementById('donationForm').addEventListener('submit', function (event) {
					// Reset error messages
					document.getElementById('donationTypeError').textContent = '';
					document.getElementById('donationCategoryError').textContent = '';

					// Check if Donation Field is not selected
					var donationTypeElements = document.getElementsByName('donation');
					var selectedDonationType = false;
					for (var i = 0; i < donationTypeElements.length; i++) {
						if (donationTypeElements[i].checked) {
							selectedDonationType = true;
							break;
						}
					}
					if (!selectedDonationType) {
						document.getElementById('donationTypeError').textContent = 'Please select a Donation';
						event.preventDefault(); // Prevent form submission
					}

					//Check Donation Category
					var donationCategoryElements = document.getElementsByName('donorcategory');
					var selectedDonationCategory = false;
					for (var i = 0; i < donationCategoryElements.length; i++) {
						if (donationCategoryElements[i].checked) {
							selectedDonationCategory = true;
							break;
						}
					}
					if (!selectedDonationCategory) {
						document.getElementById('donationCategoryError').textContent = 'Please select a Donation Category';
						event.preventDefault(); // Prevent form submission
					}
				});
			</script>
		</div>
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