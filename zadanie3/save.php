<?php

	include('controller.php');

	$employee = new Employee($_POST['sumName'], $_POST['sumSurname'], $_POST['sumDoB'], $_POST['sumJoinDate']);

	if(!isset($_POST['sumCompanyNameSelId'])) {
		$company = new Company($_POST['sumCompanyName'], $_POST['sumCompanyDate'], $_POST['sumCompanyCity'], $_POST['sumCompanyNip'], $_POST['sumCompanyRegon']);
		$employee->company_id = $company->save();
	}
	else {
		$employee->company_id = $_POST['sumCompanyNameSelId'];
	}

	$employee->save();


	header('Location: list.php');

?>