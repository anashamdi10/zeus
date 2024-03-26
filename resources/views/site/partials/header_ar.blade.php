<header id="header" class="fixed-top d-flex align-items-center">
	<div class="container">
		<div class="header-container d-flex align-items-center justify-content-between">
			<div class="logo">
				<a href="index.html" aria-label="some more descriptive text that explains the link">
					<img src="{{asset('zeus/assets/img/logo.png')}}" alt="Zeus" class="img-fluid" aria-label="some more descriptive text that explains the
						link" /></a>
			</div>

			<nav id="navbar" class="navbar">
				<ul>
					<li><a class="nav-link scrollto active" href="#hero">Home</a></li>
					<li><a class="nav-link scrollto" href="about.html">About</a></li>
					<li><a class="nav-link scrollto" href="index.html#services">Services</a></li>
					<li><a class="nav-link scrollto" href="Facilities.html">Facilities</a></li>
					<li><a class="nav-link scrollto" href="shop.html">Products</a></li>
					<li><a class="getstarted scrollto" href="#contact">Reach Us now</a></li>

					<li><a class="getstarted scrollto" href="{{route('index.show')}}">En</a></li>
				</ul>
				<i class="bi bi-list mobile-nav-toggle"></i>
			</nav>
			<!-- .navbar -->
		</div>
		<!-- End Header Container -->
	</div>
</header>