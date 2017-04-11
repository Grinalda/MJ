

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


	//alert($(this).attr('nome'));
	var nome;
	var cargo;

	nome = $(this).attr('nome');
	cargo = $(this).attr('cargo');


	/*if ($(this).attr('alt')=='img1') {
		nome = 'Herlander Rossi Medeiros';
		cargo = 'Director Geral';

	} else if ($(this).attr('alt')=='img2') {
		nome = 'Isac Vera Cruz Will';
		cargo = 'Director dos SRN';
	}
	else {
		nome = 'Domingas Renner Cardoso';
		cargo = 'Directora do CICC';
	}*/

	DiretorInformation(srcSelect, nome, cargo, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis necessitatibus nobis reiciendis tempore aperiam ipsam consectetur esse');

});

function DiretorInformation(srcImagem, nome, cargo, descrition) {
	$('.areaImg img').attr('src',srcImagem);
	$('.areaDescricao .areaText h3').text(nome);
	$('.areaDescricao .areaText h5').text(cargo);
	$('.areaDescricao .areaText p').text(descrition);
}

function equipa() {
	
}