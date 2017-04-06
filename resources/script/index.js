$('.closed').click(function(event) {
	$('.areaInformatation').addClass('hide');
});

$('.box img').click(function(event) {
	$('.areaInformatation').removeClass('hide');
	var caminho = $(this).attr('src');
	$('.areaInformatation img').attr('src', caminho);

	var title = $(this).parents('.box').find('h4').text();
	// $('.titulo').text(title);
	NewPlane(title,'Direção de Droga','12/02/2017');

});

function NewPlane(titlee, organization, date) {
		$('.titulo').text(titlee);
		$('.organization').text(organization);
		$('.date').text(date);
	}

