$(document).ready(function() {
	$('.show-new-company').click(function() {
		$('#new-company').toggle('slide');
		$('#choose-firm').toggle('slide');
	});

	$('.show-choose-firm').click(function() {
		$('#new-company').toggle('slide');
		$('#choose-firm').toggle('slide');
	});

	$('.go-to-step2').click(function() {
		$('#new-company').hide('slide');
		$('#choose-firm').hide('slide');
		$('#new-employee').show('slide');
		$('.form-header').text('Krok 2 - dane pracownika');
	});

	$('.go-to-step1').click(function() {
		$('#new-company').show('slide');
		$('#choose-firm').hide('slide');
		$('#new-employee').hide('slide');
		$('.form-header').text('Krok 1 - dane firmy');
	});

	$('.go-to-step3').click(function() {
		$('#summary-form').show('slide');
		$('#new-employee').hide('slide');
		$('.form-header').text('Krok 3 - podsumowanie');
	});
});