<div class="header-top-bar">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<ul class="top-bar-info list-inline-item pl-0 mb-0">
						<li class="list-inline-item"><a href="mailto:grievance.mmlsay@aaasassam.in"><i class="icofont-support-faq mr-2"></i>grievance.mmlsay@aaasassam.in</a></li>

					</ul>
				</div>
				<div class="col-lg-6">
					<div class="text-lg-right top-right-bar mt-2 mt-lg-0">
						<a href="#">
							<span>Call us on MMLSAY toll-free number : </span>
							<span class="h4">1800-309-3945</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navigation" id="navbar">
		<div class="container">
			<a class="navbar-brand" href="{{ url('/') }}">
				<img src="images/logo.png" alt="" class="img-fluid">
				Mukhya Mantri Lok Sevak Arogya Yojana
			</a>

			<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain"
				aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
				<span class="icofont-navigation-menu"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarmain">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item {{ Request::is('/*') ? 'active' : '' }}"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
					<li class="nav-item {{ Request::is('about*') ? 'active' : '' }}"><a class="nav-link" href="{{ url('/about') }}">About</a></li>
					<li class="nav-item {{ Request::is('guidelines_mmlsay*') ? 'active' : '' }}"><a class="nav-link" href="{{ url('/guidelines_mmlsay.pdf') }}">Guidelines</a></li>
					<li class="nav-itemnav-item {{ Request::is('/guidelines_mmlsay*') ? 'active' : '' }}"><a class="nav-link" href="{{ url('/MMLSAY_Grievance_Redressal_Mechanism.pdf') }}">User Manual</a></li>
					

					<li class="nav-item  {{ Request::is('contact*') ? 'active' : '' }}"><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>
				</ul>
			</div>
		</div>
	</nav>