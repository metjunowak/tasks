<?php header('Content-Type: text/html; charset=utf-8'); ?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<title>Zadanie 3</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/v4.0.0/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="row">
  			<div class="col-md-6 col-md-offset-3">
  				<h1 class="form-header">Krok 1 - dane firmy</h1>
  					<form action="controller.php" method="post">
	  					<div id="choose-firm">
		  					<div class="form-group">
							    <label for="exampleInputEmail1">Wybierz firmę</label>
				  				<select class="form-control">
									<option value="0" selected>zero</option>
									<option value="1">jeden</option>
									<option value="2">dwa</option>
									<option value="3">trzy</option>
									<option value="4">cztery</option>
									<option value="5">piec</option>
								</select>
							</div>
							<button type="button" class="btn btn-success go-to-step2" style="display: none">Krok 2 &raquo;</button>
							<br>
							<br>
							<button type="button" class="btn btn-primary show-new-company">Lub dodaj nową</button>

						</div>
						<br>
						<div id="new-company" style="display: none;">
							<button type="button" class="btn btn-primary show-choose-firm">Wybierz z listy</button>
							<br>
							<div class="form-group">
								<label for="companyName">Nazwa firmy</label>
								<input type="text" class="form-control" id="companyName" placeholder="Nazwa firmy">
							</div>
							<div class="form-group">
								<label for="establishDate">Data powstania</label>
								<input type="text" class="form-control date" id="establishDate" placeholder="YYYY/MM/DD">
							</div>
							<div class="form-group">
								<label for="companyCity">Miasto</label>
								<input type="text" class="form-control" id="companyCity" placeholder="Miasto">
							</div>
							<div class="form-group">
								<label for="companyNip">Nip</label>
								<input type="text" class="form-control nip" id="companyNip" placeholder="Nip">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Regon</label>
								<input type="text" class="form-control regon" id="companyRegon" placeholder="Regon">
							</div>
							<button type="button" class="btn btn-success go-to-step2">Krok 2 &raquo;</button>
						</div>

						<div id="new-employee" style="display: none;">
							<br>
							<div class="form-group">
								<label for="name">Imie</label>
								<input type="text" class="form-control" id="name" placeholder="Imię">
							</div>
							<div class="form-group">
								<label for="surname">Nazwisko</label>
								<input type="text" class="form-control" id="surname" placeholder="Nazwisko">
							</div>
							<div class="form-group">
								<label for="dateOfBirth">Data urodzenia</label>
								<input type="text" class="form-control date" id="dateOfBirth" placeholder="YYYY/MM/DD">
							</div>
							<div class="form-group">
								<label for="joinDate">Data przyjęcia do firmy</label>
								<input type="date" class="form-control date" id="joinDate" placeholder="YYYY/MM/DD">
							</div>
							<button type="button" class="btn btn-danger go-to-step1">&laquo; Krok 1</button>
							<button type="button" class="btn btn-success go-to-step3">Krok 3 &raquo;</button>
						</div>

						<div id="summary-form" style="display: none;">
							<div class="company">
								<div class="less" style="display: none;">
									<div class="form-group">
										<label for="exampleInputEmail1">Firma</label>
										<input type="text" class="form-control" id="sumCompanyNameSel" readonly="readonly">
										<input type="hidden" class="form-control" id="sumCompanyNameSelId" name="sumCompanyNameSelId">
									</div>
								</div>
								<div class="more" style="display: none;">
									<div class="form-group">
										<label for="exampleInputEmail1">Nazwa firmy</label>
										<input type="text" class="form-control" id="sumCompanyName" name="sumCompanyName" disabled="disabled">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Data powstania firmy</label>
										<input type="text" class="form-control" id="sumCompanyDate" name="sumCompanyDate" disabled="disabled">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Miasto</label>
										<input type="text" class="form-control" id="sumCompanyCity" name="sumCompanyCity" disabled="disabled">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Nip firmy</label>
										<input type="text" class="form-control" id="sumCompanyNip" name="sumCompanyNip" disabled="disabled">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Regon firmy</label>
										<input type="text" class="form-control" id="sumCompanyRegon" name="sumCompanyRegon" disabled="disabled">
									</div>
								</div>
							</div>
							<div class="employee">
								<div class="form-group">
									<label for="exampleInputEmail1">Imię</label>
									<input type="text" class="form-control" id="sumName" name="sumName" readonly="readonly">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Nazwisko</label>
									<input type="text" class="form-control" id="sumSurname" name="sumSurname" readonly="readonly">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Data urodzenia</label>
									<input type="text" class="form-control datepicker" id="sumDoB" name="sumDoB" readonly="readonly">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Data przyjęcia do firmy</label>
									<input type="text" class="form-control datepicker" id="sumJoinDate" name="sumJoinDate" readonly="readonly">
								</div>
							</div>
							
							<button type="button" class="btn btn-danger go-to-step1">&laquo; &laquo; Krok 1</button>
							<button type="button" class="btn btn-danger go-to-step2">&laquo; Krok 2</button>
							<input type="submit" class="btn btn-primary go-to-step2" value="submit" style="display:none;">
						</div>
				</form>
  			</div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>	
	<script type="text/javascript" src="mask.js"></script>
	<script type="text/javascript" src="script.js"></script>
</body>
</html>