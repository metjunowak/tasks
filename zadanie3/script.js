$(document).ready(function() {

	var isSelected = $('select').val();
	if(isSelected == 0) {
			$('.go-to-step2').hide();
		}
		else {
			$('.go-to-step2').show();
		}

	$('select').change(function() {
		isSelected = $(this).val();
		if(isSelected == 0) {
			$('.go-to-step2').hide();
		}
		else {
			$('.go-to-step2').show();
		}
	});

	$('.show-new-company').click(function() {
		$('#new-company').toggle('slide');
		$('#choose-firm').toggle('slide');
		$('.go-to-step2').show();
		isSelected = 0;
		$('select').val(0);
	});

	$('.show-choose-firm').click(function() {
		$('#new-company').toggle('slide');
		$('#choose-firm').toggle('slide');
		if(isSelected == 0) {
			$('.go-to-step2').hide();
		}
		else {
			$('.go-to-step2').show();
		}
	});

	$('.go-to-step2').click(function() {
		$('#new-company').hide('slide');
		$('#choose-firm').hide('slide');
		$('#new-employee').show('slide');
		$('#summary-form').hide('slide');
		$('.form-header').text('Krok 2 - dane pracownika');
	});

	$('.go-to-step1').click(function() {
		if(isSelected == 0) {
			$('#new-company').show('slide');
			$('#choose-firm').hide('slide');
		}
		else {
			$('#new-company').hide('slide');
			$('#choose-firm').show('slide');
		}
		$('#new-employee').hide('slide');
		$('#summary-form').hide('slide');
		$('.form-header').text('Krok 1 - dane firmy');
	});

	$('.go-to-step3').click(function() {
		//console.log(dateValidate());
		if(dateValidate()) {
			$('input[type="submit"]').show();
			$('.alert-danger').hide();
		}
		else {
			$('input[type="submit"]').hide();
			$('.alert-danger').show();
		}
		$('#summary-form').show('slide');
		$('#new-employee').hide('slide');
		$('.form-header').text('Krok 3 - podsumowanie');

		var formEmployeeValues = new Array();
		$("#new-employee input").each(function() {
			formEmployeeValues.push($(this).val());
		});

		var i = 0;
		$('#summary-form .employee input').each(function() {
			$(this).val(formEmployeeValues[i]);
			i++;
		});

		var i = 0;
		if(isSelected == 0) {
			$('#summary-form .company .more').show();
			var formCompanyValues = new Array();
			$("#new-company input").each(function() {
				formCompanyValues.push($(this).val());
			});
			$('#summary-form .company .more input').each(function() {
				$(this).val(formCompanyValues[i]);
				$(this).removeAttr('disabled');
				$(this).attr('readonly', 'readonly');
				i++;
			});
			$('#sumCompanyNameSelId').attr('disabled', 'disabled');
		}
		else {
			$('#summary-form .company .less').show();
			$('#summary-form .company .less #sumCompanyNameSel').val($('select :selected').text());
			$('#summary-form .company .less #sumCompanyNameSelId').val(isSelected);
			$('#sumCompanyNameSelId').removeAttr('disabled');		
			$('#summary-form .company .more input').each(function() {
				$(this).attr('disabled', 'disabled');
			});
		}
	});


	function dateValidate() {
		var state = true;
		$('.date').each(function() {
			var date = $(this).val();
			dateArr = date.split('/');
			if((dateArr[1] > 12) && (dateArr.length > 1)) {
				console.log('blad1');
				state =  false;
			}
			if ((dateArr[2] > 31) && (dateArr.length > 2)) {
				console.log('blad2');
				state = false;
			}
		});
		return state;
	}

	$('.date').mask('0000/00/00');
	$('.nip').mask('000-000-00-00');
	$('.regon').mask('000000000');



});