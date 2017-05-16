var titulo;
var descricao;
var oque;
var onde;
var como;
var mais;

$('div.seccao p').click(function() {
	localStorage.setItem("servico-id", $(this).attr("id"));
	window.location.href = "cidadaoMore.php";
});

if(location.href.$$("cidadaoMore.php")) {
    var id_server = localStorage.getItem("servico-id");
    $.ajax({
        url: "php/controler/servico.php",  //URL EM RELAÇÃO A ONDE ESTÁ A SER CHAMADO -HTML
        type: "post",
        dataType: "json",
        data: {intent: "carregar_servico"},
        success: function (e) {
            servico = e[id_server];
            if (servico.titulo !== undefined) $("#title-service").html(servico.titulo);
            if (servico.what !== undefined) $("#what-service").html(servico.what);
            if (servico.where !== undefined) $("#where-service").html(servico.where);
        }
    });
}