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
	      ['para', ['ul', 'ol', 'paragraph']],
	      ['height', ['height']],
	      ['insert',['link']]
	     ],
	    placeholder: 'Schrijf je tekst hier...',
	    focus: true,
    });

    $('.afwijzingForm').hide();


});

//Tabs gebruikers in het adminpaneel
$('.nav-tabs a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})

$('#afwijzingKnop').click(function () {
	$(this).hide();
	$('.afwijzingForm').slideDown();
})

$('#afwijzingAnnulerenKnop').click(function () {
	$('.afwijzingForm').slideUp(function() {
   		$('#afwijzingKnop').show();
	});	
	
})

