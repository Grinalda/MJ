
//----------------Selecionar Diretor Unidades Orgânicas---------------

$('.areaFotos img').mouseup(function() {
	var srcSelect = $(this).attr('src');
	$('.areaFotos img').attr('class','');
	$(this).addClass('select');
	$('.areaDescricao .areaText .Text *').remove();
	var nome = $(this).attr('nome');
	var cargo = $(this).attr('cargo');
	var descrition = $(this).attr('descrition');

	DiretorInformation(srcSelect, nome, cargo, descrition);

});

function DiretorInformation(srcImagem, nome, cargo, descrition) {
	$('.areaImg img').attr('src',srcImagem);
	$('.areaDescricao .areaText h3').text(nome);
	$('.areaDescricao .areaText h5').text(cargo);
	$('.areaDescricao .areaText .Text').append(descrition);
}


// *************  Legislação **************

//Tootip hover na tag a para abrir documento
$('.areaCollapse p.Doc a').attr({
	'data-toggle': 'tooltip',
	'data-placement': 'right',
	'title': 'Click para abrir o documento'
});

//Menu Categorias active
$('.menuLeg li').click(function() {

	$('.menuLeg li').removeClass('active');
	$(this).addClass('active');
    var position = $(this).attr('position');

    $('.areaMaster > div').removeClass('selected');
    $('.areaMaster > div').eq(position-1).addClass('selected');
});


//*********************** BT Ler Mais ***********************

$('.continue').click(function(event) {
	$(this).fadeOut('slow/400/fast');
});


// Area Multimédia

$('.section iframe').attr({
	width: '185',
	height: '150'
});

showNotice();
function showNotice() {

	var news = JSON.parse(localStorage.getItem("news"));
	$("#noticeDetails img").attr("src", news.photo);
	$("#noticeDetails h3").html(news.title);
	$("#noticeDetails h5").html(news.date);
	$("#noticeDetails article").html(news.content);
}


if (!String.prototype.$$) {
    /**
     * @param search
     * @param start
     * @return {boolean}
     */
    String.prototype.$$ = function(search, start) {
        'use strict';
        if (typeof start !== 'number') {
            start = 0;
        }

        if (start + search.length > this.length) {
            return false;
        } else {
            return this.indexOf(search, start) !== -1;
        }
    };
}