<!DOCTYPE html>
<html lang="en">
<head>

	<title>Mizzle - Technology and Corporate Bootstrap Theme</title>

	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Webestica.com">
	<meta name="description" content="Technology and Corporate Bootstrap Theme">

	<!-- Dark mode -->
	<script>
		const storedTheme = localStorage.getItem('theme')
 
		const getPreferredTheme = () => {
			if (storedTheme) {
				return storedTheme
			}
			return window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'light'
		}

		const setTheme = function (theme) {
			if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
				document.documentElement.setAttribute('data-bs-theme', 'dark')
			} else {
				document.documentElement.setAttribute('data-bs-theme', theme)
			}
		}

		setTheme(getPreferredTheme())

		window.addEventListener('DOMContentLoaded', () => {
		    var el = document.querySelector('.theme-icon-active');
			if(el != 'undefined' && el != null) {
				const showActiveTheme = theme => {
				const activeThemeIcon = document.querySelector('.theme-icon-active use')
				const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
				const svgOfActiveBtn = btnToActive.querySelector('.mode-switch use').getAttribute('href')

				document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
					element.classList.remove('active')
				})

				btnToActive.classList.add('active')
				activeThemeIcon.setAttribute('href', svgOfActiveBtn)
			}

			window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
				if (storedTheme !== 'light' || storedTheme !== 'dark') {
					setTheme(getPreferredTheme())
				}
			})

			showActiveTheme(getPreferredTheme())

			document.querySelectorAll('[data-bs-theme-value]')
				.forEach(toggle => {
					toggle.addEventListener('click', () => {
						const theme = toggle.getAttribute('data-bs-theme-value')
						localStorage.setItem('theme', theme)
						setTheme(theme)
						showActiveTheme(theme)
					})
				})

			}
		})
		
	</script>

	<!-- Favicon -->
	<link rel="shortcut icon" href="../assets/images/favicon.ico">

	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="../assets/vendor/font-awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/vendor/bootstrap-icons/bootstrap-icons.css">
	
	<!-- Theme CSS -->
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">

</head>

<body>

<!-- Header START -->
<header class="header-sticky header-absolute">
	<!-- Logo Nav START -->
	<nav class="navbar navbar-expand-xl">
		<div class="container">
			<!-- Logo START -->
			<a class="navbar-brand me-0" href="index.html">
				<img class="light-mode-item navbar-brand-item" src="../assets/images/logo.svg" alt="logo">
				<img class="dark-mode-item navbar-brand-item" src="../assets/images/logo-light.svg" alt="logo">
			</a>
			<!-- Logo END -->

			<!-- Main navbar START -->
			<div class="navbar-collapse collapse" id="navbarCollapse">
				<ul class="navbar-nav navbar-nav-scroll dropdown-hover mx-auto">

					<!-- Nav item -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" data-bs-auto-close="outside" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Demos</a>
						<div class="dropdown-menu dropdown-menu-size-lg p-3">
							<div class="row">
								<!-- Image and button -->
								<div class="col-xl-6">
									<div class="card bg-light overflow-hidden h-100 p-3" style="background:url(../assets/images/bg/08.jpg) no-repeat; background-size:cover; background-position:center;">
										<!-- Bg overlay -->
										<div class="bg-overlay bg-dark opacity-5"></div>
										<div class="card-body d-flex justify-content-center text-center flex-column align-items-center position-relative z-index-2 p-0">
											<h5 class="text-white">Supercharge your site</h5>
											<a href="#" class="btn btn-sm btn-white mb-0">See how <i class="bi bi-arrow-right"></i></a>
										</div>
									</div>
								</div>

								<!-- Index nav links -->
								<div class="col-xl-6">
									<ul class="list-unstyled pt-3">
										<li> <a class="dropdown-item" href="index.html">Classic Default</a> </li>
										<li> <a class="dropdown-item" href="index-creative-agency.html">Creative Agency</a> </li>
										<li> <a class="dropdown-item" href="index-saas.html">SaaS v.1</a> </li>
										<li> <a class="dropdown-item" href="index-saas-v2.html">SaaS v.2</a> </li>
										<li> <a class="dropdown-item" href="index-saas-v3.html">SaaS v.3</a> </li>
										<li> <a class="dropdown-item" href="index-saas-v4.html">SaaS v.4</a> </li>
										<li> <a class="dropdown-item" href="index-saas-v5.html">SaaS v.5</a> </li>
										<li> <a class="dropdown-item" href="index-landing-product.html">Product Landing</a> </li>
										<li> <a class="dropdown-item" href="index-mobile-app-showcase.html">Mobile App Showcase</a> </li>
										<li> <a class="dropdown-item" href="index-shop.html">Index Shop</a> </li>
									</ul>
								</div>

								<!-- CTA -->
								<div class="col-12">
									<hr class="mt-sm-4"> <!-- Divider -->
									<div class="d-sm-flex justify-content-between align-items-center px-2">
										<div class="me-3 mb-2 mb-sm-0">
											<h6 class="mb-2 mb-sm-0">Ready to get started?</h6>
											<small class="mb-0">Take your documents to the next level with Mizzle</small>
										</div>
										<a href="#" class="btn btn-sm btn-primary">Get in touch</a>
									</div>
								</div>
							</div>
						</div>
					</li>

					<!-- Nav item -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">Pages</a>
						<ul class="dropdown-menu">
							<!-- Dropdown submenu -->
							<li class="dropdown dropend">
								<a class="nav-link dropdown-link dropdown-toggle" data-bs-toggle="dropdown" href="#">About</a>
								<ul class="dropdown-menu" data-bs-popper="none">
									<li> <a class="dropdown-item" href="about-v1.html">About v.1</a></li>
									<li> <a class="dropdown-item" href="about-v2.html">About v.2</a></li>
									<li> <a class="dropdown-item" href="about-v3.html">About v.3</a></li>
									<li> <a class="dropdown-item" href="team.html">Team</a></li>
									<li> <a class="dropdown-item" href="services-v1.html">Services v.1</a></li>
									<li> <a class="dropdown-item" href="services-v2.html">Services v.2</a></li>
									<li> <a class="dropdown-item" href="service-single.html">Service Single</a></li>
									<li> <a class="dropdown-item" href="customer-stories.html">Customer Stories</a></li>
									<li> <a class="dropdown-item" href="customer-story-single.html">Customer Story Single</a></li>
									<li> <a class="dropdown-item" href="career.html">Career <span class="badge text-bg-primary ms-2">2 Job</span></a></li>
									<li> <a class="dropdown-item" href="career-single.html">Career Single</a></li>
								</ul>
							</li>
							
							<li> <a class="dropdown-item" href="contact-v1.html">Contact v.1</a></li>
							<li> <a class="dropdown-item" href="contact-v2.html">Contact v.2</a></li>

							<!-- Dropdown submenu -->
							<li class="dropdown dropend">
								<a class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown" href="#">SaaS Pages</a>
								<ul class="dropdown-menu">
									<li> <a class="dropdown-item" href="features.html">Features</a></li>
									<li> <a class="dropdown-item" href="feature-single.html">Feature Single</a></li>
									<li> <a class="dropdown-item" href="integrations.html">Integrations</a></li>
									<li> <a class="dropdown-item" href="integration-single.html">Integration Single</a></li>
								</ul>
							</li>

							<!-- Dropdown submenu -->
							<li class="dropdown dropend">
								<a class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown" href="#">Shop</a>
								<ul class="dropdown-menu" >
									<li> <a class="dropdown-item" href="shop-grid.html">Shop Grid</a></li>
									<li> <a class="dropdown-item" href="shop-single.html">Shop Single</a></li>
									<li> <a class="dropdown-item" href="shop-cart.html">Shop Cart</a></li>
									<li> <a class="dropdown-item" href="shop-empty-cart.html">Shop Empty Cart</a></li>
									<li> <a class="dropdown-item" href="shop-checkout.html">Shop Checkout</a></li>
								</ul>
							</li>

							<!-- Dropdown submenu -->
							<li class="dropdown dropend">
								<a class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown" href="#">Blog</a>
								<ul class="dropdown-menu" >
									<li> <a class="dropdown-item" href="blog-grid.html">Blog Grid</a></li>
									<li> <a class="dropdown-item" href="blog-list-sidebar.html">Blog List Sidebar</a></li>
									<li> <a class="dropdown-item" href="blog-single-v1.html">Blog Single v.1</a></li>
									<li> <a class="dropdown-item" href="blog-single-v2.html">Blog Single v.2</a></li>
								</ul>
							</li>

							<!-- Dropdown submenu -->
							<li class="dropdown dropend">
								<a class="nav-link dropdown-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Specialty Pages</a>
								<ul class="dropdown-menu" data-bs-popper="none">
									<li> <a class="dropdown-item" href="help-center.html">Help Center</a></li>
									<li> <a class="dropdown-item" href="help-center-detail.html">Help Center Detail</a></li>
									<li> <a class="dropdown-item" href="pricing.html">Pricing</a></li>
									<li> <a class="dropdown-item" href="faq.html">Faqs</a></li>
									<li> <a class="dropdown-item" href="error-404.html">Error 404</a></li>
									<li> <a class="dropdown-item" href="coming-soon.html">Coming Soon</a></li>
									<li> <a class="dropdown-item" href="terms-and-condition.html">Terms & Conditions</a></li>
								</ul>
							</li>

							<!-- Dropdown submenu -->
							<li class="dropdown dropend">
								<a class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown" href="#">Authentication</a>
								<ul class="dropdown-menu" data-bs-popper="none">
									<li> <a class="dropdown-item" href="sign-up.html">Sign Up</a></li>
									<li> <a class="dropdown-item" href="sign-in.html">Sign In</a></li>
									<li> <a class="dropdown-item" href="forgot-password.html">Forgot Password</a></li>
								</ul>
							</li>

							<!-- Dropdown submenu -->
							<li class="dropdown dropend">
								<a class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown" href="#">Accounts</a>
								<ul class="dropdown-menu" data-bs-popper="none">
									<li> <a class="dropdown-item" href="account-detail.html">Details</a></li>
									<li> <a class="dropdown-item" href="account-security.html">Security</a></li>
									<li> <a class="dropdown-item" href="account-notification.html">Notifications</a></li>
									<li> <a class="dropdown-item" href="account-projects.html">My Projects</a></li>
									<li> <a class="dropdown-item" href="account-payment-details.html">Payment Details</a></li>
									<li> <a class="dropdown-item" href="account-order.html">Order History</a></li>
									<li> <a class="dropdown-item" href="account-wishlist.html">Wishlist</a></li>
									<li> <a class="dropdown-item" href="account-delete.html">Delete Profile</a></li>
								</ul>
							</li>

							<!-- Dropdown divider -->
							<li> <hr class="dropdown-divider"></li>
							
							<!-- Dropdown Multilevel -->
							<li class="dropdown dropend">
								<a class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside" href="#">Dropdown levels</a>
								<ul class="dropdown-menu">

									<!-- dropdown submenu open right -->
										<li class="dropdown dropend">
											<a class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside" href="#">Dropdown (end)</a>
											<ul class="dropdown-menu">
												<li> <a class="dropdown-item" href="#">Dropdown item</a> </li>
												<li> <a class="dropdown-item" href="#">Dropdown item</a> </li>
											</ul>
										</li>
									<li> <a class="dropdown-item" href="#">Dropdown item</a> </li>

									<!-- dropdown submenu open left -->
									<li class="dropdown dropstart">
										<a class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside" href="#">Dropdown (start)</a>
										<ul class="dropdown-menu">
											<li> <a class="dropdown-item" href="#">Dropdown item</a> </li>
											<li> <a class="dropdown-item" href="#">Dropdown item</a> </li>
										</ul>
									</li>
									<li> <a class="dropdown-item" href="#">Dropdown item</a> </li>
								</ul>
							</li>
						</ul>
					</li>

					<!-- Nav item -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Portfolio</a>
						<div class="dropdown-menu dropdown-menu-center dropdown-menu-size-xl p-3">
							<div class="row g-xl-3">
								<!-- Work -->
								<div class="col-xl-8 d-none d-xl-block">
									<div class="d-flex gap-4">
										<!-- Card -->
										<div class="card bg-transparent">
											<!-- Image -->
											<img src="../assets/images/portfolio/list/01.jpg" class="card-img" alt="">
											<!-- Card body -->
											<div class="card-body px-0 text-start pb-0">
												<h6><a href="#">Ceremony Worthy of Time</a></h6>
												<p class="mb-2 small">We help our customers better manage their web presence.</p>
												<a class="icon-link icon-link-hover stretched-link mb-0" href="portfolio-case-studies-v1.html">Learn more<i class="bi bi-arrow-right"></i> </a>
											</div>
										</div>

										<!-- Card -->
										<div class="card bg-transparent">
											<!-- Image -->
											<img src="../assets/images/portfolio/list/02.jpg" class="card-img" alt="">
											<!-- Card body -->
											<div class="card-body px-0 text-start pb-0">
												<h6><a href="#">Brushstrokes and Beyond</a></h6>
												<p class="mb-2 small">We help our customers better manage their web presence.</p>
												<a class="icon-link icon-link-hover stretched-link mb-0" href="portfolio-case-studies-v2.html">Learn more<i class="bi bi-arrow-right"></i> </a>
											</div>
										</div>

										<!-- Divider line -->
										<div class="vr ms-2"></div>
									</div>
								</div>

								<!-- Index nav links -->
								<div class="col-xl-4">
									<ul class="list-unstyled">
										<li class="dropdown-header h6">Portfolio Pages</li>
										<li> <a class="dropdown-item" href="portfolio-masonry.html">Portfolio Masonry</a> </li>
										<li> <a class="dropdown-item" href="portfolio-showcase.html">Portfolio Showcase</a> </li>
										<li> <a class="dropdown-item" href="portfolio-list.html">Portfolio List</a> </li>
										<li> <a class="dropdown-item" href="portfolio-case-studies-v1.html">Portfolio Case Study v.1</a> </li>
										<li> <a class="dropdown-item" href="portfolio-case-studies-v2.html">Portfolio Case Study v.2</a> </li>
									</ul>
								</div>
							</div>
						</div>
					</li>

					<!-- Nav item -->
					<li class="nav-item"> <a class="nav-link" href="contact-v1.html">Contact us</a> </li>

					<!-- Nav item -->
					<li class="nav-item"> <a class="nav-link" href="docs/index.html" target="_blank">Docs</a> </li>
				</ul>
			</div>
			<!-- Main navbar END -->

			<!-- Buttons -->
			<ul class="nav align-items-center dropdown-hover ms-sm-2">
				<!-- Dark mode option START -->
				<li class="nav-item dropdown dropdown-animation">
					<button class="btn btn-link mb-0 px-2 lh-1" id="bd-theme"
					type="button"
					aria-expanded="false"
					data-bs-toggle="dropdown"
					data-bs-display="static">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"  class="bi bi-circle-half theme-icon-active fill-mode fa-fw" viewBox="0 0 16 16">
						<path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z">
						<use href="#"></use>
					</svg>
					</button>

					<ul class="dropdown-menu min-w-auto dropdown-menu-end" aria-labelledby="bd-theme">
						<li class="mb-1">
							<button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light">
								<svg width="16" height="16" fill="currentColor" class="bi bi-brightness-high-fill fa-fw mode-switch me-1" viewBox="0 0 16 16">
									<path d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z">
									<use href="#"></use>
								</svg>Light
							</button>
						</li>
						<li class="mb-1">
							<button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon-stars-fill fa-fw mode-switch me-1" viewBox="0 0 16 16">
									<path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z">
									<path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z">
									<use href="#"></use>
								</svg>Dark
							</button>
						</li>
						<li>
							<button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-half fa-fw mode-switch me-1" viewBox="0 0 16 16">
									<path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z">
									<use href="#"></use>
								</svg>Auto
							</button>
						</li>
					</ul>
				</li>
				<!-- Dark mode option END -->

				<!-- Sign up button -->
				<li class="nav-item me-2">
					<a href="sign-up.html" class="btn btn-sm btn-light mb-0"><i class="bi bi-person-circle me-1"></i>Sign up</a>
				</li>
				<!-- Buy now button -->
				<li class="nav-item d-none d-sm-block">
					<button class="btn btn-sm btn-primary mb-0">Buy now!</button>
				</li>
				<!-- Responsive navbar toggler -->
				<li class="nav-item">
					<button class="navbar-toggler ms-sm-3 p-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-animation">
							<span></span>
							<span></span>
							<span></span>
						</span>
					</button>
				</li>	
			</ul>

		</div>
	</nav>
	<!-- Logo Nav END -->
</header>
<!-- Header END -->

<!-- **************** MAIN CONTENT START **************** -->
<main>

<!-- =======================
Content START -->
<section class="pt-sm-7">
	<div class="container pt-3 pt-xl-5">
		<div class="row">
			<!-- Sidebar -->
			<div class="col-lg-4 col-xl-3">
				<!-- Responsive offcanvas body START -->
				<div class="offcanvas-lg offcanvas-start h-100" tabindex="-1" id="offcanvasSidebar">
					<!-- Offcanvas header -->
					<div class="offcanvas-header bg-light">
						<h5 class="offcanvas-title" id="offcanvasNavbarLabel">My profile</h5>
						<button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasSidebar" aria-label="Close"></button>
					</div>
					<!-- Offcanvas body -->
					<div class="offcanvas-body p-0">
						<div class="card border p-3 w-100">
							<!-- Card header -->
							<div class="card-header text-center border-bottom">
									<!-- Avatar -->
									<div class="avatar avatar-xl position-relative mb-2">
										<img class="avatar-img rounded-circle border border-2 border-white" src="../assets/images/avatar/05.jpg" alt="">
										<a href="#" class="btn btn-sm btn-round btn-dark position-absolute top-50 start-100 translate-middle mt-4 ms-n3" data-bs-toggle="tooltip" data-bs-title="Edit profile">
												<i class="bi bi-pencil-square"></i>
										</a>
									</div>
									<h6 class="mb-0">Jacqueline Miller</h6>
									<a href="#" class="text-reset text-primary-hover small">hello@gmail.com</a>
							</div>

							<!-- Card body START -->
							<div class="card-body p-0 mt-4">
										<!-- Sidebar menu item START -->
										<ul class="nav nav-pills-primary-border-start flex-column">
											<li class="nav-item">
												<a class="nav-link" href="account-profile.php"><i class="bi bi-person fa-fw me-2"></i>Meu perfil</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="account-booking.php"><i class="bi bi-ticket-perforated fa-fw me-2"></i>Meus Agendamentos</a>
											</li>
											<li class="nav-item">
												<a class="nav-link active" href="account-notification.php"><i class="bi bi-bell fa-fw me-2"></i>Permições</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="account-projects.php"><i class="bi bi-briefcase fa-fw me-2"></i>Meus Horarios</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="account-payment-details.php"><i class="bi bi-wallet fa-fw me-2"></i>Detalhes Financeiros</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="account-order.php"><i class="bi bi-basket fa-fw me-2"></i>Relatorio Geral</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="account-wishlist.php"><i class="bi bi-heart fa-fw me-2"></i>Wishlist</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="account-delete.php"><i class="bi bi-trash fa-fw me-2"></i>Deletar Perfil</a>
											</li>
											<li class="nav-item">
												<a class="nav-link text-danger" href="#"><i class="fas fa-sign-out-alt fa-fw me-2"></i>Sair</a>
											</li>
										</ul>
										<!-- Sidebar menu item END -->
									</div>
									<!-- Card body END -->
						</div>
					</div>
				</div>		
			</div>

			<!-- Main content -->
			<div class="col-lg-8 col-xl-9 ps-lg-4 ps-xl-6">
				<!-- Title and offcanvas button -->
				<div class="d-flex justify-content-between align-items-center mb-5 mb-sm-6">
					<!-- Title -->
					<h1 class="h3 mb-0">Notification</h1>

					<!-- Advanced filter responsive toggler START -->
					<button class="btn btn-primary d-lg-none flex-shrink-0 ms-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
						<i class="fas fa-sliders-h"></i> Menu
					</button>
				 <!-- Advanced filter responsive toggler END -->
				</div>

				<form>
					<!-- Title -->
					<div class="d-flex justify-content-between align-items-center border-bottom pb-4 mb-4">
						<h6 class="rounded-0 mb-0">Email notification</h6>
						<button class="btn btn-sm btn-white border" type="button">Toggle all</button>
					</div>

					<!-- Item -->
					<div class="d-flex justify-content-between align-items-center mb-4">
						<!-- Content -->
						<div>
							<p class="heading-color fw-bold mb-0">News and updates</p>
							<small>News about product and feature updates</small>
						</div>
						<!-- Switch -->
						<div class="form-check form-switch form-check-md mb-0 ms-3">
							<input class="form-check-input" type="checkbox" id="checkPrivacy1" checked="">
						</div>
					</div>

					<!-- Item -->
					<div class="d-flex justify-content-between align-items-center mb-4">
						<!-- Content -->
						<div>
							<p class="heading-color fw-bold mb-0">Tips and tutorials</p>
							<small>Tips on getting more out of unlimited</small>
						</div>
						<!-- Switch -->
						<div class="form-check form-switch form-check-md mb-0 ms-3">
							<input class="form-check-input" type="checkbox" id="7" checked="">
						</div>
					</div>

					<!-- Item -->
					<div class="d-flex justify-content-between align-items-center mb-4">
						<!-- Content -->
						<div>
							<p class="heading-color fw-bold mb-0">User research</p>
							<small>Tips on getting more out of unlimited</small>
						</div>
						<!-- Switch -->
						<div class="form-check form-switch form-check-md mb-0 ms-3">
							<input class="form-check-input" type="checkbox" id="4">
						</div>
					</div>

					<!-- Item -->
					<div class="d-flex justify-content-between align-items-center mb-4">
						<!-- Content -->
						<div>
							<p class="heading-color fw-bold mb-0">Comments</p>
							<small>Comments on your post and replies to comments</small>
						</div>
						<!-- Switch -->
						<div class="form-check form-switch form-check-md mb-0 ms-3">
							<input class="form-check-input" type="checkbox" id="5">
						</div>
					</div>

					<!-- Item -->
					<div class="d-flex justify-content-between align-items-center mb-4">
						<!-- Content -->
						<div>
							<p class="heading-color fw-bold mb-0">Reminders</p>
							<small>I would like to receive booking assistance reminders</small>
						</div>
						<!-- Switch -->
						<div class="form-check form-switch form-check-md mb-0 ms-3">
							<input class="form-check-input" type="checkbox" id="checkPrivacy5">
						</div>
					</div>
					
				</form>

				<div class="text-center my-5"><i class="bi bi-three-dots"></i></div> <!-- Divider -->

				<form>
					<!-- Title -->
					<div class="d-flex justify-content-between align-items-center border-bottom pb-4 mb-4">
						<h6 class="rounded-0 mb-0">General Permission</h6>
						<button class="btn btn-sm btn-white border" type="button">Toggle all</button>
					</div>

					<!-- Item -->
					<div class="d-flex justify-content-between align-items-center mb-4">
						<!-- Content -->
						<div>
							<p class="heading-color fw-bold mb-0">Notify on updates and activity</p>
							<small>You'll be notified when anyone shares a report or invite you to a projects</small>
						</div>
						<!-- Switch -->
						<div class="form-check form-switch form-check-md mb-0 ms-3">
							<input class="form-check-input" type="checkbox" id="checkPrivacy6" checked="">
						</div>
					</div>

					<!-- Item -->
					<div class="d-flex justify-content-between align-items-center mb-4">
						<!-- Content -->
						<div>
							<p class="heading-color fw-bold mb-0">Send weekly digest</p>
							<small>A weekly update on changes in theme statement and more</small>
						</div>
						<!-- Switch -->
						<div class="form-check form-switch form-check-md mb-0 ms-3">
							<input class="form-check-input" type="checkbox" id="checkPrivacy7" checked="">
						</div>
					</div>

					<!-- Item -->
					<div class="d-flex justify-content-between align-items-center mb-4">
						<!-- Content -->
						<div>
							<p class="heading-color fw-bold mb-0">Collaborators</p>
							<small>I would like to receive booking assistance reminders</small>
						</div>
						<!-- Switch -->
						<div class="form-check form-switch form-check-md mb-0 ms-3">
							<input class="form-check-input" type="checkbox" id="6">
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>
</section>
<!-- =======================
Content END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->

<!-- =======================
Footer START -->
<footer class="bg-dark position-relative overflow-hidden pt-6" data-bs-theme="dark">

	<!-- SVG decoration -->
	<figure class="position-absolute top-0 start-0 mt-n8 ms-n9">
		<svg class="fill-mode" width="775px" height="834px" viewBox="0 0 775 834" style="enable-background:new 0 0 775 834; opacity: 0.05;" xml:space="preserve">
			<path d="M486.1,564.4c-3.6,2.5-7.4,4.8-11.3,6.4c-12,5.5-25.7,7.9-42.2,7.4c-30.6-1.1-65.6-12.5-102.8-24.4 c-50.7-16.2-103.3-33.4-152.5-27c-56.1,7.2-97.9,44.4-128,114l-0.4-0.2c67.5-156.1,181-119.5,281.1-87.1c37,12,72,23.2,102.5,24.3 c34.3,1.2,58.1-10.7,74.9-37.4C530.1,505,547.1,466,565,425.1C619.4,301,675.6,172.7,892.1,141.3l0.1,0.4 c-216.2,31.4-272.5,159.5-326.8,283.5c-18.1,41.1-35,79.7-57.7,115.6C501.6,550.7,494.5,558.5,486.1,564.4z"></path>
			<path d="M500.9,551.4c-43.7,31-103,15.8-165.5-0.2c-49.9-12.7-101.5-25.8-148.7-16.7c-53.3,10.5-93.2,49-121.6,118 l-0.5-0.1c15.3-37.1,33.3-64.7,55.1-84.7c19.5-17.7,41.3-28.6,66.7-33.7c47.4-9.2,99,3.9,148.9,16.6 c70.4,17.9,137.1,34.9,181.3-14.4c35.7-39.9,57.3-91.7,80.2-146.7c23.8-56.7,48.2-115.5,90.2-163.6c22.7-25.9,48.4-46.4,78.4-62.4 c33.9-18.1,72.2-30.3,117.1-37.1l0.1,0.4C695,155.3,645.2,274.5,597.1,389.7c-22.9,55-44.5,106.8-80.4,146.8 C512.3,542.4,506.6,547.3,500.9,551.4z"></path>
			<path d="M521.3,536.4c-21.9,15.5-48.4,23.4-80.8,23.8c-31.2,0.5-65.1-5.8-97.9-11.9c-49.3-9.2-100.2-18.7-145.7-6.5 c-51.1,13.7-88.9,53.7-116,122.6l-0.6-0.2c60.5-154.1,163.3-135,262.6-116.5c68.1,12.7,132.6,24.6,183.6-15.8 c48.1-38.2,71.1-100.6,95.6-166.5c20.3-55,41.4-111.6,78.3-158.1c20-25.1,42.7-44.9,69.2-60.5c30.1-17.5,64.2-29.1,104.3-35.4 l0.2,0.6c-167.2,26.3-210,141.9-251.4,253.5C598.3,431.5,575,493.8,527,532.2C525.1,533.8,523.2,535.1,521.3,536.4z"></path>
			<path d="M548.9,520.3c-4,2.9-8.2,5.6-12.6,8c-56.6,31.5-120.9,23.8-183,16.6c-51.7-6-100.4-11.8-144.6,3.2 c-49.9,16.9-85.5,57.7-111.3,128.2l-0.6-0.2c13.7-37.3,30.1-66,49.9-87.8c17.8-19.4,37.9-32.8,61.8-40.9 c44.3-15,93.1-9.3,144.9-3.2c62.1,7.2,126.3,14.8,182.8-16.6c59.6-33.2,82-104.7,105.9-180.4c17.1-54.3,34.7-110.5,67.2-156.6 c36.7-52,87.8-82.8,155.7-94l0.2,0.6c-151.9,25-187.8,139.3-222.3,250C620.4,417.6,599.4,484.5,548.9,520.3z"></path>
			<path d="M573.5,509.5c-8.2,5.8-17.4,10.7-27.7,14.6c-59.3,22-119.1,18.8-176.8,15.8c-53.2-2.8-103.3-5.3-147.1,12.5 C172.6,572.3,138.1,615.5,113,688l-0.5-0.1c25.1-72.7,59.6-115.9,108.9-136c44-18,94.2-15.3,147.6-12.6 c57.7,3,117.4,6.1,176.6-15.9c70.7-26.2,91.1-106.3,112.8-191.4c13.9-54.5,28.3-111,56.7-156.9C747,123.2,793,92.6,855.6,82l0,0.7 C716.3,106.5,687,221.4,658.9,332.2C640.4,405,622.6,474.4,573.5,509.5z"></path>
			<path d="M595.2,502.3c-11.3,8-24.6,14-40,17.4c-56.8,12.7-112,12.7-160.5,12.9c-60.2,0.1-112,0.2-157,21.1 c-49.5,23-84,69.3-108.5,146l-0.6-0.2c24.3-76.7,58.9-123.1,108.6-146.3c45.1-21.1,97.2-21.1,157.4-21.2 c48.6,0,103.6-0.1,160.5-12.9c81.6-18.3,99-106.7,117.4-200.6c10.7-55,22-112,46.6-158.2C747,108,788.6,77.5,846.5,67.2l0.1,0.8 C718,91.2,695.2,206.9,673.2,318.9C658.3,394.9,643.8,467.8,595.2,502.3z"></path>
			<path d="M615.3,497.4c-13.7,9.7-30.2,16-50.8,18c-44.4,4.6-86.5,5.8-123.6,6.8c-71.2,2-132.8,3.7-182,27.7 C206,575.6,169.8,627,145,711.3l-0.8-0.1c13-44.6,29-79.3,48.6-106.3c18.1-24.9,39.5-43.1,65.6-55.7 c49.5-24.1,110.9-25.8,182.4-27.7c37.1-1,79.3-2.2,123.5-6.7c92.6-9.4,106.2-106.5,120.5-209.2c7.8-55.9,15.9-113.6,37-160 c23.8-52.7,61.6-83.1,115.3-93.4l0.3,0.7c-53.4,10.1-91,40.4-114.6,92.9c-21.1,46.4-29.2,104.1-36.8,159.9 C674.6,386,663.8,463,615.3,497.4z"></path>
			<path d="M634.4,494c-15.5,11-35.2,17.2-60.4,17.3c-12.3,0.1-24.5,0.1-36.1,0.1c-103.7,0-185.5-0.1-246.4,26.4 c-63.5,27.7-103.7,85-130.5,185.5l-0.8-0.1c13.9-52.5,31.3-92.6,53.2-122.9c20.7-28.8,46.2-49.4,77.8-63.2 c61-26.6,142.9-26.4,246.6-26.4c11.7,0.1,23.8,0,36.1-0.1c103.8-0.2,112.9-105.6,122.5-217.2c4.7-56.9,9.9-115.5,27.5-162.4 c20-53.1,54.1-83.7,104.1-93.7l0.1,0.8c-49.5,9.8-83.5,40.3-103.3,93.1c-17.6,46.9-22.7,105.4-27.6,162 C690.1,378.2,682.9,459.6,634.4,494z"></path>
			<path d="M652.7,491.8c-17.9,12.7-40.7,17.7-69.2,15.4C328,486.2,228.3,517.5,177.2,735.2l-0.9-0.3 c25.9-110.7,64-171.6,127-204c66.6-34.2,160.2-34.6,280.3-24.7c32.2,2.6,56.9-4.1,75.4-20.5c42.1-37.4,45.1-118.6,48-204.7 c4-116.5,8.1-236.8,112.1-258.6l0.1,0.8C715.9,44.8,711.8,164.8,707.8,280.9c-3.1,86.3-5.8,167.7-48.3,205.2 C657.3,488.3,655,490.1,652.7,491.8z"></path>
			<path d="M670.6,490.3c-19.3,13.7-44.8,17.9-77.7,12.7c-138.5-21.4-227.1-13-287.3,27 c-55.4,36.8-89.1,101.7-112.4,216.9l-0.9-0.3C215.8,631,249.6,566,305.1,528.9c60.3-40.1,149.1-48.6,288.1-27.3 c35.9,5.5,63,0,82.6-16.9c43.2-37.5,42.2-124.3,40.9-216.1C714.9,151,713,28.8,809.9,7.7l0.1,0.8c-96,21.1-94.3,142.7-92.7,260.6 c1.3,92.1,2.4,179-41.1,216.7C674.3,487.4,672.6,488.9,670.6,490.3z"></path>
		</svg>
	</figure>

	<!-- SVG decoration -->
	<div class="position-absolute top-0 end-0 mt-n3 me-n4">
		<img src="../assets/images/elements/decoration-pattern-2.svg" style="opacity:0.05;" alt="">
	</div>

	<div class="container position-relative mt-5">
		<div class="row g-4 justify-content-between">

			<!-- Widget 1 START -->
			<div class="col-lg-3">
				<!-- logo -->
				<a class="me-0" href="index.html">
					<img class="light-mode-item h-40px" src="../assets/images/logo.svg" alt="logo">
					<img class="dark-mode-item h-40px" src="../assets/images/logo-light.svg" alt="logo">
				</a>

				<p class="mt-4 mb-2">A Bootstrap theme that's both stylish and functional, perfect for any type of technology or corporate website.</p>
			</div>
			<!-- Widget 1 END -->

			<!-- Widget 2 START -->
			<div class="col-lg-8 col-xxl-7">
				<div class="row g-4">
					<!-- Link block -->
					<div class="col-6 col-md-4">
						<h6 class="mb-2 mb-md-4">Quick links</h6>
						<ul class="nav flex-column">
							<li class="nav-item"><a class="nav-link pt-0" href="about-v1.html">About us</a></li>
							<li class="nav-item"><a class="nav-link" href="contact-v1.html">Contact us</a></li>
							<li class="nav-item"><a class="nav-link" href="career.html">Career <span class="badge text-bg-danger ms-2">2 Job</span></a></li>
							<li class="nav-item"><a class="nav-link" href="career-single.html">Career detail</a></li>
							<li class="nav-item"><a class="nav-link" href="contact-v1.html">Become a partner</a></li>
							<li class="nav-item"><a class="nav-link" href="sign-in.html">Sign in</a></li>
							<li class="nav-item"><a class="nav-link" href="sign-up.html">Sign up</a></li>
						</ul>
					</div>

					<!-- Link block -->
					<div class="col-6 col-md-4">
						<h6 class="mb-2 mb-md-4">Community</h6>
						<ul class="nav flex-column">
							<li class="nav-item"><a class="nav-link pt-0" href="#">Documents</a></li>
							<li class="nav-item"><a class="nav-link" href="#">Supports <i class="bi bi-box-arrow-up-right small ms-1"></i></a></li>
							<li class="nav-item"><a class="nav-link" href="faq.html">Faqs</a></li>
							<li class="nav-item"><a class="nav-link" href="#">Privacy Policy</a></li>
							<li class="nav-item"><a class="nav-link" href="blog-grid.html">News and blogs</a></li>
							<li class="nav-item"><a class="nav-link" href="#">Terms & condition</a></li>
						</ul>
					</div>

					<!-- Link block -->
					<div class="col-md-4">
						<h6 class="mb-2 mb-md-4">App available on</h6>
						<div class="row g-2 mt-2 mb-4 mb-sm-5">
							<!-- Google play store button -->
							<div class="col-5 col-sm-4 col-md-6">
								<a href="#"> <img src="../assets/images/elements/google-play.svg" alt=""> </a>
							</div>
							<!-- App store button -->
							<div class="col-5 col-sm-4 col-md-6">
								<a href="#"> <img src="../assets/images/elements/app-store.svg" alt="app-store"> </a>
							</div>
						</div>

						<!-- Social buttons -->
						<h6 class="mb-2 mb-md-4">Follow on</h6>

						<ul class="list-inline mb-0 mt-3">
							<li class="list-inline-item"> <a class="btn btn-xs btn-icon btn-light" href="#"><i class="fab fa-fw fa-facebook-f lh-base"></i></a> </li>
							<li class="list-inline-item"> <a class="btn btn-xs btn-icon btn-light" href="#"><i class="fab fa-fw fa-instagram lh-base"></i></a> </li>
							<li class="list-inline-item"> <a class="btn btn-xs btn-icon btn-light" href="#"><i class="fab fa-fw fa-twitter lh-base"></i></a> </li>
							<li class="list-inline-item"> <a class="btn btn-xs btn-icon btn-light" href="#"><i class="fab fa-fw fa-linkedin-in lh-base"></i></a> </li>
							<li class="list-inline-item"> <a class="btn btn-xs btn-icon btn-light" href="#"><i class="fab fa-fw fa-youtube lh-base"></i></a> </li>
						</ul>
					</div>
				</div>
			</div>
			<!-- Widget 2 END -->
		</div>

		<!-- Divider -->
		<hr class="mt-4 mb-0">

		<!-- Bottom footer -->
		<div class="d-md-flex justify-content-between align-items-center text-center text-lg-start py-4">
			<!-- copyright text -->
			<div class="text-body"> Copyrights ©2024 Mizzle. Build by <a href="https://www.webestica.com/" class="text-body text-primary-hover">Webestica</a>. </div>
			<!-- copyright links-->
			<!-- Language selector -->
			<div class="dropdown dropup text-center text-md-end mt-3 mt-md-0">
				<a class="dropdown-toggle btn btn-sm btn-light mb-0" href="#" role="button" id="languageSwitcher" data-bs-toggle="dropdown" aria-expanded="false">
					<i class="fas fa-globe me-2"></i>Language
				</a>
				<ul class="dropdown-menu min-w-auto" aria-labelledby="languageSwitcher">
					<li><a class="dropdown-item me-4" href="#"><img class="fa-fw me-2" src="../assets/images/flags/uk.svg" alt="">English</a></li>
					<li><a class="dropdown-item me-4" href="#"><img class="fa-fw me-2" src="../assets/images/flags/gr.svg" alt="">German </a></li>
					<li><a class="dropdown-item me-4" href="#"><img class="fa-fw me-2" src="../assets/images/flags/sp.svg" alt="">French</a></li>
				</ul>
			</div>
		</div>
	</div>
</footer>
<!-- =======================
Footer END -->

<!-- Back to top -->
<div class="back-top"></div>

<!-- Bootstrap JS -->
<script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- Theme Functions -->
<script src="../assets/js/functions.js"></script>

</body>
</html>