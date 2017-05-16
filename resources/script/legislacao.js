/**
 * Created by Grinalda Soares on 25/04/2017.
 */
var legislacao;
var campos = "#FormLeg input:text, #FormLeg #conteudo, #FormLeg select";
var legPDF;

$('#btnSave').click(function () {

    if(validation1($(campos))){
        legislacao = new LegislacaoData($('#titulo').val(),$('#categoria').val(),$('#conteudo'));
        legislacao.addLeg();
    }
});

var LegislacaoData = function (titulo, categoria, sumario) {
    this.titulo = titulo;
    this.categoria = categoria;
    this.legPDF = legPDF;
    this.sumario = sumario;
    this.listarLeg = [];
};

var Legislacao = {

    addLeg : function () {
        $.ajax({
            url: "../php/controler/legislacao.php",
            datatype: "json",
            type: "post",

            data: {intent : "addLegislacao", legislacao : legislacao},
            beforeSend: function () {
                // Adicionar Loading
            },
            complete: function () {

            },
            success: function () {
                $(campos).val("");
                console.log('Enviado com sucesso');
            }
        });
    },
    listarLeg : function () {
        $.ajax({
            url: "../php/controler/legislacao.php",
            dataType: "json",
            type: "post",
            data: {intent: "ListarLegislacao"},
            success: function (e) {

                loadComoBoxIDandValue($('#categoria'), e.categoria, "Cat_id", "Cat_nome");

                for(var i =0;i<e.legislacao.length;i++)
                {
                    var legislacao = e.legislacao[i];
                    $('#tableLeg').append(''+
                        '<tr>' +
                        '       <td><div ><input type="checkbox" class="icheckbox_flat-blue"></div></td>' +
                        '       <td>'+legislacao["categoria"]+'</td>' +
                        '       <td>'+legislacao["data"]+'</td>' +
                        '       <td>'+legislacao["titulo"]+'</td>' +
                        ' </tr>'
                    );
                }
            }
        });
    }
};


Legislacao.listarLeg();



$("#fileLegislacao").on("change", function () {

    if(!window.File || !window.FileReader || !window.FileList || !window.Blob)
    { return ; }

    if(this.files.length === 0)
    { return ;}


    if(this.files[0].type !== "application/pdf")
    { return; }

    var file = this.files[0];

    $("#imgSRC").val(file.name);

    var formData = new FormData();
    formData.append("intent","UploadPDF");
    formData.append("pdf",file);

   $.ajax({
        url: "../php/controler/legislacao.php",
        type: "POST",
        processData: false,
        contentType: false,
        dataType: "json",
        data: formData,
        success: function (e) {
            legPDF = e.novoNome;
        }
    });
});


