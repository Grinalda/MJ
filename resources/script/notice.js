
$(function () {
    DadosNoticia.listarNoticia();

    $('#BTsave').on("click",function () {

        if(validation1($('#noticeReg input:text, #conteudo'))){

            noticia = new Noticia($('#titulo').val(), $('#resumo').val(),
                $("#dateStart").val(), $('#conteudo').val(), imgNotice);

            DadosNoticia.add();
        }
    });

    $("#fileNotice").on("change", function () {

        var foto;
        if(!window.File || !window.FileReader || !window.FileList || !window.Blob)
        { return ; }

        if(this.files.length === 0)
        { return ;}

        var file = this.files[0];

        var formData = new FormData();
        formData.append("intent","Uploadfoto");
        formData.append("image",file);

        $.ajax({
            url: "../php/controler/noticia.php",
            type: "POST",
            processData: false,
            contentType: false,
            dataType: "json",
            data: formData,
            success: function (e) {
                $('#imgView').attr('src',e.foto);
                $('#imgSRC').val(e.nomeFoto);
                imgNotice = e.novoNome;

            }
        });
    });
});



var Noticia = function (titulo, resumo, data, conteudo, img) {
    this.titulo = titulo;
    this.resumo = resumo;
    this.img = img;
    this.dataStart = data;
    this.conteudo = conteudo;
};

var DadosNoticia ={
    add :function () {
        $.ajax({
            url:"../php/controler/noticia.php",  //URL EM RELAÇÃO A ONDE ESTÁ A SER CHAMADO -HTML
            type: "post",
            dataType: "json",
            data:{intent : "RegNotice", noticia: noticia},
            success: function (e) {
                //Se a requisição foi enviada com sucesso
                $('#noticeReg input').val('');
                alert('Noticia Registrada com sucesso');

                DadosNoticia.listarNoticia();

            },
            error: function (e) {
                alert('Ocorreu um erro durante o Registro da Noticia');
            }
        });
    },
    listarNoticia : function () {
        $.ajax({
            url:"../php/controler/noticia.php",  //URL EM RELAÇÃO A ONDE ESTÁ A SER CHAMADO -HTML
            type: "post",
            dataType: "json",
            data:{intent : "ListarNoticia"},
            success: function (e) {
                this.listaNoticias = e.noticias;
                console.log(e.noticias);
                $('#tableNotice').empty();
                for(var i =0;i<e.noticias.length;i++)
                {
                    var notice = e.noticias[i];
                    $('#tableNotice').append(''+
                        '<tr>' +
                            '<td width="100">' +
                            '   <i class="view fa fa-eye">' +
                            '   </i><i class="edit fa fa-pencil-square-o"></i>' +
                            '   <i class="delete fa fa-trash-o"></i>' +
                            '</td>' +
                            '<td><img src="'+notice["Noticia_foto"]+'"/></td>' +
                            '<td>'+notice["Noticia_data"]+'</td>' +
                            '<td>'+notice["Noticia_titulo"]+'</td>' +
                        ' </tr>'
                    );
                }
            }
        });
    }
};

$('#BTsaveVideo').click(function () {
    if(validation1($('#videoTxt'))){
        DadosVideo.add();
    }
});

var DadosVideo = {
    add: function () {
        $.ajax({
            url: "../php/controler/noticia.php",  //URL EM RELAÇÃO A ONDE ESTÁ A SER CHAMADO -HTML
            type: "post",
            dataType: "json",
            data: {intent: "RegVideo", video: $('#videoTxt').val()},
            success: function (e) {
                //Se a requisição foi enviada com sucesso
                $('#videoTxt').val('');
                alert('Noticia Registrada com sucesso');

            },
            error: function (e) {
                alert('Ocorreu um erro durante o Registro da Noticia');
            }
        });
    }
};

var noticia, imgNotice;

