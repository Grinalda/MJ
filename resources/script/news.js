/**
 * Created by Grinalda Soares on 02/05/2017.
 */

$(function () {
    noticia.news();
    Videos.video();

    $("#moreNotice, .areaNotice").on('click', ".OneNotice", function () {

        var dadosNoticia = new DadosNoticia();

        //Recupera ID da noticia Clicada
        dadosNoticia = noticia.listNews[$(this).attr("id")];

        // Redimensiona para a Página seeNews a noticia clicada
        localStorage.setItem("news", JSON.stringify(dadosNoticia));
        window.location.href = "seeNews.php";
    });
});

var DadosNoticia = function () {
    this.id =undefined;
    this.photo = undefined;
    this.title = undefined;
    this.date =  undefined;
    this.resume = undefined;
    this.content = undefined;
};
var noticia = {
    listNews : [],
    news : function () {
        $.ajax({
            url:"php/controler/noticia.php",  //URL EM RELAÇÃO A ONDE ESTÁ A SER CHAMADO -HTML
            type: "post",
            dataType: "json",
            data:{intent : "News"},
            success: function (e) {
                var add = 0;
                for(var i =0; (i< e.noticias.length && add < 9) ;i++)
                {
                    var notice = e.noticias[i];
                    var dadosNoticia = new DadosNoticia();
                    dadosNoticia.id = notice["Noticia_id"];
                    dadosNoticia.date = notice["Noticia_data"];
                    dadosNoticia.title = notice["Noticia_titulo"];
                    dadosNoticia.photo = notice["Noticia_foto"];
                    dadosNoticia.resume = notice["Noticia_resumo"];
                    dadosNoticia.content = notice["Noticia_conteudo"];
                    noticia.listNews.push(dadosNoticia);

                    console.log(notice);

                    $('#moreNotice').append(
                        '<div id="'+i+'" class="OneNotice">'+
                        '       <div class="col-md-4 areaNewsDestaque">' +
                        '           <section>' +
                        '              <img src="'+notice["Noticia_foto"]+'"/>'+
                        '               <section>' +
                        '                  <h4>'+notice["Noticia_titulo"]+'</h4>'+
                        '                      <article class="areaContents">' +
                        '                         <p><i class="ion-ios-clock">'+' '+notice["Noticia_data"]+'</i></p>  ' +
                        '                      </article>'+
                        '                  <p>'+' '+notice["Noticia_resumo"]+'</p> '+
                        '                 <label>Ler Mais</label>' +
                        '               </section>'+
                        '            </section>'+
                        '       </div>'+
                        '</div>'
                    );

                    if(add < 4) {
                        $('.areaNotice').append(
                            '<div id="' + i + '" class="col-md-6 col-xs-12 OneNotice">' +
                            '   <div class="section">' +
                            '       <div class="areaIMG col-xs-12">' +
                            '           <img src="' + notice["Noticia_foto"] + '" alt="' + notice["Noticia_titulo"] + '">' +
                            '           <div class="areaScale">' +
                            '               <label class="noObrigatore">Ver Notícia</label>' +
                            '           </div>' +
                            '       </div>' +
                            '       <div class="descrition">' +
                            '           <h3 class="title">' + notice["Noticia_titulo"] + '</h3>' +
                            '           <h5 class="date">' + notice["Noticia_data"] + '</h5>' +
                            '           <p class="text">' + notice["Noticia_resumo"] + '</p>' +
                            '           <button class="BTmore">Ler Mais</button>' +
                            '       </div>' +
                            '   </div>' +
                            '</div>'
                        );


                        $('.slider').append(
                            '<div  class="slider-item">' +
                            '    <img class="img-responsive" src="' + notice["Noticia_foto"] + '" alt="' + notice["Noticia_titulo"] + '">' +
                            '     <div class="carousel-caption">' +
                            '       <h3>' + notice["Noticia_titulo"] + '</h3>' +
                            '       <p>' + notice["Noticia_resumo"] + '</p>' +
                            '    </div> ' +
                            '</div>'
                        );

                        if ($("*").hasClass("slider"))
                            $('.slider').cycle({
                                timeout: 3000,
                                fx: 'cover, turnDown, shuffle, fade, growY',
                                pager: $('.pager'),
                                pagerAnchorBuilder: function (index, DOMelement) {
                                    return '<a></a>';
                                },
                                activePagerClass: 'sliderAtivado'
                            });
                    }
                    add++;
                }
            }
        });
    }
};

var Videos = {

    video : function () {
        $.ajax({
            url:"php/controler/noticia.php",  //URL EM RELAÇÃO A ONDE ESTÁ A SER CHAMADO -HTML
            type: "post",
            dataType: "json",
            data:{intent : "ListarVideo"},
            success: function (e) {
                for(var i =0;i<3;i++)
                {
                    var video = e.videos[i];
                    $('.areaMultimedia').append(
                      '<div class="col-md-12 col-xs-6 section">'+video["conteudo"]+'</div>'
                      );
                    $('.section iframe').attr({
                        width: '200',
                        height: '160'
                    });
                }
            }
        });
    }
};

