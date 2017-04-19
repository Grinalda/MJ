
//------------Planos e Programas-------

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

//----------------Selecionar Diretor Unidades Orgânicas---------------

$('.areaFotos img').click(function function_name(argument) {
	var srcSelect = $(this).attr('src');
	$('.areaFotos img').attr('class','');
	$(this).addClass('select');

	var nome = $(this).attr('nome');
	var cargo = $(this).attr('cargo');

	DiretorInformation(srcSelect, nome, cargo, '');

});

function DiretorInformation(srcImagem, nome, cargo, descrition) {
	$('.areaImg img').attr('src',srcImagem);
	$('.areaDescricao .areaText h3').text(nome);
	$('.areaDescricao .areaText h5').text(cargo);
	$('.areaDescricao .areaText p').text(descrition);
}


// *************  Legislação **************

//Tootip hover na tag a para abrir documento
$('.areaCollapse p.Doc a').attr({
	'data-toggle': 'tooltip',
	'data-placement': 'right',
	'title': 'Click para abrir o documento'
});


//Menu Categorias active
$('.nav li').click(function(event) {
	$('.nav li').removeClass('active');
	$(this).addClass('active');
});