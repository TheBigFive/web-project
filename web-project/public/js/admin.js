$(document).ready(function() {
	//Summernote textarea plugin
  	$('.summernote').summernote({
	    lang: 'nl-NL',
	    height: 200,
	    toolbar: [
	      // [groupName, [list of button]]
	   		['style', ['bold', 'italic', 'underline', 'clear']],
	    	['font', ['strikethrough', 'superscript', 'subscript']],
	    	['fontsize', ['fontsize']],
	    	['color', ['color']],
	    	['para', ['ul', 'ol', 'paragraph', 'style']],
	    	['height', ['height']],
	    	['insert',['link','codeview','fullscreen']]
	     ],
	    placeholder: 'Schrijf je tekst hier...',
	    focus: true,
    });

    $('.afwijzingForm').hide();
    $('#tagForm').hide();

    new GMaps({
	  el: '#admin-map',
	  lat: 51.2154075,
	  lng: 4.409795,
	  zoom: 12
	});	

});


//Tabs gebruikers in het adminpaneel
$('.nav-tabs a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})

//Knop reden van afwijzing in alle openPaginas in admin
$('#afwijzingKnop').click(function () {
	$(this).hide();
	$('.afwijzingForm').slideDown();
})

//Knop reden van afwijzing annuleren in alle openPaginas in admin
$('#afwijzingAnnulerenKnop').click(function () {
	$('.afwijzingForm').slideUp(function() {
   		$('#afwijzingKnop').show();
	});	
	
})

//Knop tag toevoegen in tags admin pagina
$('#tagToevoegenKnop').click(function () {
	$(this).hide();
	$('#tagForm').slideDown();
})

//Knop tag toevoegen annuleren in tags admin pagina
$('#tagAnnulerenKnop').click(function () {
	$('#tagForm').slideUp(function() {
   		$('#tagToevoegenKnop').show();
	});	
	
})