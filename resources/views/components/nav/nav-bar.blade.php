<div>
	<nav class="navbar navbar-expand-xl navbar-dark unique-color">

		@include('components.nav.inc.brand')

		<!-- Collapsible content -->
		<div class="collapse navbar-collapse" id="navSind1">

			<!-- Links -->
			<ul class="navbar-nav mr-auto"> 
				@include('components.nav.inc.enlaces')
			</ul>
			<!-- Links -->

			<form method="GET" action="{{ route('buscar') }}" class="form-inline my-2 my-lg-0 ml-auto">
				
				<input class="input-buscar form-control form-control-sm" name="q" type="search" placeholder="Buscar" aria-label="Search">
				<button class="boton-buscar btn btn-sm btn-outline-white my-2" type="submit">Buscar</button>
			</form>

		</div>
		<!-- Collapsible content -->
	</nav>
</div>