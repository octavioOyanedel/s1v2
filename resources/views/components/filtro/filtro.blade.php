<div>

	<div class="alert" role="alert">
		<form method="GET" action="{{ route(Request()->path()) }}">
			<div class="contenedor-filtro">
				<div clas="excel"><span class="total-filtro">{{ $total }}</span><i><a href="">Exportar planilla excel.</a></i></div>
				<div class="cantidad">
					<select id="cantidad" class="custom-select custom-select-sm" name="cantidad">
						<option selected>Cant.</option>
						@foreach (obtenerCantidadesFiltro($filtro) as $valor)
							<option value="{{ $valor }}">{{ $valor }}</option>  
						@endforeach
					</select>						
				</div>
				<div class="campo">
					<select id="columna" class="custom-select custom-select-sm" name="columna">
						<option selected>Columna</option>
						@foreach (obtenerCamposParaFiltro($filtro) as $nombre => $valor)
							<option value="{{ $valor }}">{{ $nombre }}</option>  
						@endforeach
					</select>					
				</div>
				<div class="orden">
					<select id="orden" class="custom-select custom-select-sm" name="orden">
						<option selected>Orden</option>
						<option value="ASC">Asc.</option>
						<option value="DESC">Desc.</option>
					</select>
				</div>
				<div class="boton">
					<button type="submit" class="boton-filtro btn btn-sm btn-primary">Filtrar</button>
				</div>
			</div>
		</form>
	</div>	
</div>