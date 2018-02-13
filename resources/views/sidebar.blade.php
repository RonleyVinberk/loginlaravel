<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<!-- start navbar -->

	<a class="navbar-brand" href="#">CRUD + Login Laravel</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNav">
		<!-- start collapse -->

		<ul class="navbar-nav ml-auto">
			<li class="nav-item"><a class="nav-link" href="javascript:void(0);">Welcome, {{Auth::user()->email}}</a></li>
		</ul>

		<!-- end collapse -->
	</div>

	<!-- end navbar -->
</nav>
