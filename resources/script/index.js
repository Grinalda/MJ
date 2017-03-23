$('.closed').click(function(event) {
	$('.areaInformatation').addClass('hide');
});

$('.box img').click(function(event) {
	$('.areaInformatation').removeClass('hide');
	var caminho = $(this).attr('src');
	
	$('.areaInformatation img').attr('src', caminho);
	
});