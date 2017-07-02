jQuery(function(){
	$('.lg-date').datepicker({
    format: 'dd-mm-yyyy',
    language: 'es',
    autoclose: true
	});
});

jQuery(function(){
	$('[data-toggle=confirmation]').confirmation({
  	rootSelector: '[data-toggle=confirmation]',
  	// other options
	});
});