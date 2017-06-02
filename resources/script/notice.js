
$(function () {
    DadosNoticia.listarNoticia();
    DadosVideo.Listar();
    $('#BTsave').on("click",function () {

        if(validation1($('#noticeReg input:text'))){
            if(CKEDITOR.instances.conteudo.getData() !=="" && imgNotice !== undefined)
            {
                noticia = new Noticia($('#titulo').val(), $('#resumo').val(),
                    $("#dateStart").val().replace("-", "/").replace("-", "/"),
                    CKEDITOR.instances.conteudo.getData(), imgNotice);

                if(  $('#BTsave').html() === "Salvar")
                    DadosNoticia.add();
                else
                    DadosNoticia.editar_noticia();
            }
        }
    });
    $(".videoArea").on("click", ".desative", function(){

        var id = $(this).attr("id");

        swal({
                title: "Confirmação",
                text: "Tens Certeza que desejas remover o video?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Sim, Remover!",
                cancelButtonText: "Cancelar",
                closeOnConfirm: false
            },
            function(){
                desativar_video(id);
                DadosVideo.Listar();
            });

    });
    $('#tableNotice').on("click", ".desativeNew", function(){

        var id = $(this).attr("id");

        swal({
                title: "Confirmação",
                text: "Tens Certeza que desejas remover a noticia?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Sim, Remover!",
                cancelButtonText: "Cancelar",
                closeOnConfirm: false
            },
            function(){
                desativar_noticia(id);
                /*DadosNoticia.listarNoticia();*/
            });
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
    $('#BTsaveVideo').click(function () {
        if(validation1($('#videoTxt'))){
            DadosVideo.add();
            DadosVideo.Listar();
        }
    });
    $('#btCancelNotice').click(function () {
        inicial();
        imgNotice = undefined;
    });
    $('#tableNotice').on("click", ".editNew", function(){
         $("#myModalLabel").html("Editar Notícia");
         DadosNoticia.index = $(this).attr("index");
         DadosNoticia.carregar_dados_noticia();
    });
});


var Noticia = function (titulo, resumo, data, conteudo, img) {
    this.titulo = titulo;
    this.resumo = resumo;
    this.img = img;
    this.dataStart = data;
    this.conteudo = conteudo;
    this.id = undefined;
};

var DadosNoticia ={
  listaNoticias : [],
  index : undefined,
   add :function () {
        $.ajax({
            url:"../php/controler/noticia.php",  //URL EM RELAÇÃO A ONDE ESTÁ A SER CHAMADO -HTML
            type: "post",
            dataType: "json",
            data:{intent : "RegNotice", noticia: noticia},
            success: function (e) {
                //Se a requisição foi enviada com sucesso
                swal("Sucesso!", "Notícia adicionada com sucesso!");
                DadosNoticia.listarNoticia();
                imgNotice = undefined;
                inicial();
            },
            error: function (e) {
                swal("Erro!", "Ocorreu um erro durante a operação <br> Por favor contacte o administrador do sistema.")
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
               DadosNoticia.listaNoticias = [];
               DadosNoticia.listaNoticias = e.noticias;
                $('#totalNotice').html( e.noticias.length);

                $('#tableNotice').empty();
                for(var i =0;i<e.noticias.length;i++)
                {
                    var notice = e.noticias[i];
                    $('#tableNotice').append(''+
                        '<tr>' +
                            '<td width="100">' +
                            '   <i class="view fa fa-eye">' +
                            '   </i><i class="editNew fa fa-pencil-square-o" index="'+i+'"></i>' +
                            '   <i class="desativeNew fa fa-trash-o" id="'+notice["Noticia_id"]+'"></i>' +
                            '</td>' +
                            '<td><img src="'+notice["Noticia_foto"]+'"/></td>' +
                            '<td>'+notice["Noticia_data"]+'</td>' +
                            '<td>'+notice["Noticia_titulo"]+'</td>' +
                        ' </tr>'
                    );
                }
            }
        });
    },
   carregar_dados_noticia:function () {
        $("#imgSRC").addClass("noObrigatory");
        $('#titulo').val(DadosNoticia.listaNoticias[DadosNoticia.index]["Noticia_titulo"]);
        $('#resumo').val(DadosNoticia.listaNoticias[DadosNoticia.index]["Noticia_resumo"]);
        $('#conteudo').val(DadosNoticia.listaNoticias[DadosNoticia.index]["Noticia_conteudo"]);
        $('#imgView').attr('src', DadosNoticia.listaNoticias[DadosNoticia.index]["Noticia_foto"]);
        $('#dateStart').val(DadosNoticia.listaNoticias[DadosNoticia.index]["Noticia_data"]);
        imgNotice = DadosNoticia.listaNoticias[DadosNoticia.index].Noticia_foto.split("/")[4];
        CKEDITOR.instances.conteudo.setData(DadosNoticia.listaNoticias[DadosNoticia.index]["Noticia_conteudo"]);
        $('#BTsave').html("Editar");
        $('#bt-novaNoticia').click();
    },
   editar_noticia:function () {

      noticia.id = DadosNoticia.listaNoticias[DadosNoticia.index]["Noticia_id"];
        $.ajax({
            url: "../php/controler/noticia.php",
            type:"POST",
            dataType:"json",
            data:{intent : "EditarNoticia", noticia : noticia},
            success:function () {
                swal("Sucesso!", "Notícia editada com sucesso!");
                DadosNoticia.listarNoticia();
                imgNotice = undefined;
                inicial();
            }
        });
    }
};

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
                swal("Sucesso!", "Noticia Registrada com sucesso!", "success")
            },
            error: function (e) {
                swal("Erro!", "Ocorreu um erro durante a operação <br> Por favor contacte o administrador do sistema.")
            }
        });
    },
    Listar : function () {
        $.ajax({
            url:"../php/controler/noticia.php",  //URL EM RELAÇÃO A ONDE ESTÁ A SER CHAMADO -HTML
            type: "post",
            dataType: "json",
            data:{intent : "ListarVideo"},
            success: function (e) {
                $('#totalVideo').html(e.videos.length);
                var date = "Data de Registo";
                var structure = "";

                if(e.videos.length === 0)
                    $('.videoArea').append("<p>Não há Registros</p>");
                else
                {
                    for(var i =0;i<e.videos.length;i++)
                    {
                        var video = e.videos[i];
                        structure +=  '<li class="box-video">' +
                            '<span class="mailbox-attachment-icon has-img">'+video["conteudo"]+'</span>' +
                            '<div class="mailbox-attachment-info">' +
                            '   <a href="#" class="mailbox-attachment-name"><i class="fa fa-calendar-check-o"></i>'+video["data"]+'</a>' +
                            '   <span class="mailbox-attachment-size">' + date +
                            '       <a href="#" class="btn btn-default btn-xs pull-right"><i id="'+video["id"]+'" class="fa fa-trash-o desative"></i></a>' +
                            '   </span>' +
                            ' </div>' +
                            '</li>';
                    }
                    $('.videoArea').html(structure);
                }
                $('.videoArea iframe').attr({
                    width: '200',
                    height: '150'
                });
            }
        });
    }
};

function desativar_noticia(id_news) {

    $.ajax({
          url: "../php/controler/noticia.php",
          type:"POST",
          dataType:"json",
          data:{intent : "DesativarNew", id: id_news},
          success:function () {
              swal("Sucesso", "A noticia foi removida com sucesso", "success");
              DadosNoticia.listarNoticia();
        },
        error: function (e) {
            // swal("Erro!", "Ocorreu um erro durante a operação <br> Por favor contacte o administrador do sistema." + e)
            swal("Erro!",  e)
        }
    });
}

function desativar_video(id_news) {

    $.ajax({
          url: "../php/controler/noticia.php",
          type:"POST",
          dataType:"json",
          data:{intent : "DesativarVideo", id: id_news},
          success:function () {
              swal("Sucesso", "O video foi removido com sucesso", "success");
              DadosVideo.Listar();
        },
        error: function (e) {
            // swal("Erro!", "Ocorreu um erro durante a operação <br> Por favor contacte o administrador do sistema." + e)
            swal("Erro!",  e)
        }
    });
}

var noticia, imgNotice = undefined;

function inicial() {
    $("#myModalLabel").html("Nova Notícia");
    $("#BTsave").html("Salvar");
    $('#noticeReg input').val('');
    $("#imgView").attr("src","dist/img/image.png");
    $("#imgSRC").removeClass("noObrigatory");
    CKEDITOR.instances.conteudo.setData("");
}