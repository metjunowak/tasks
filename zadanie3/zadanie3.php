<!DOCTYPE html>
<html lang="pl">
<head>
	<title>Zadanie 3</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
  			<div class="col-md-6 col-md-offset-3">
  				<h1 class="form-header">Krok 1 - dane firmy</h1>
  					<form>
	  					<div id="choose-firm">
		  					<div class="form-group">
							    <label for="exampleInputEmail1">Wybierz firmę</label>
				  				<select class="form-control">
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
								</select>
							</div>
							<button type="button" class="btn btn-success go-to-step2">Krok 2 &raquo;</button>
							<br>
							<br>
							<button type="button" class="btn btn-primary show-new-company">Lub dodaj nową</button>

						</div>
						<br>
						<div id="new-company" style="display: none;">
							<button type="button" class="btn btn-primary show-choose-firm">Wybierz z listy</button>
							<br>
							<div class="form-group">
								<label for="exampleInputEmail1">Nazwa firmy</label>
								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nazwa firmy">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Data powstania</label>
								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Data powstania">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Miasto</label>
								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Miasto">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Nip</label>
								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nip">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Regon</label>
								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Regon">
							</div>
							<button type="button" class="btn btn-success go-to-step2">Krok 2 &raquo;</button>
						</div>
						<div id="new-employee" style="display: none;">
							<br>
							<div class="form-group">
								<label for="exampleInputEmail1">Imie</label>
								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nazwa firmy">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Nazwisko</label>
								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Data powstania">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Data urodzenia</label>
								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Miasto">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Data przyjęcia do firmy</label>
								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nip">
							</div>
							<button type="button" class="btn btn-danger go-to-step1">&laquo; Krok 2</button>
							<button type="button" class="btn btn-success go-to-step3">Krok 3 &raquo;</button>
						</div>
						<div id="summary-form" style="display: none;">
							<div class="form-group">
								<label for="exampleInputEmail1">Nazwisko</label>
								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Data powstania" disabled="disabled">
							</div>
						</div>
				</form>
  			</div>
		</div>
	</div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="script.js"></script>
</body>
</html>