<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Area de Imprensa</title>
	<link rel="stylesheet" href="resources/styles/index.css">
	<link rel="stylesheet" href="resources/styles/News.css">
	<link rel="stylesheet" href="resources/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="resources/styles/fonts.css">
</head>
<body>
	<?php include 'includes/menu.html';?>
<!-- /Menu Area -->

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/pt_PT/sdk.js#xfbml=1&version=v2.9&appId=1844189112571148";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    <!-- /Plugin facebook page -->
<div class="row top">
	<div class="col-md-12 areaTop">
        <h1>Area de Imprensa</h1>
       <!--  <div class="input-group input-group-lg">
          <input type="text" class="form-control" placeholder="Escreva o que deseja procurar...">
          <span class="input-group-btn">
            <button class="btn btn-info" type="button"><i class="glyphicon glyphicon-search"></i> Pesquisar</button>
          </span>
        </div >-->
    </div>
</div>
<!-- /Area Top -->

<div class="row news">
	<div class="container ">		

		<div class="col-md-8" id="newsDestaque">
			<h1 class="title">Multimédia</h1> <br>
            <div class="col-md-12 areaMultimedia imprensa" style="display: flex; flex-direction: row !important; max-height: 25rem; overflow: auto">

            </div>
		</div>
		<div class="col-md-4  areaImprensa" style="padding-left: 5rem">
			<h1 class="title">Assessoria de Comunicação e Imagem</h1>
			<div>
				<p><b>email:</b> mjdh.stp@gmail.com</p>
				<p><b>Contacto:</b> 2222256</p>
				<article>
					<img src="resources/images/Team.png" style="width: 30%;">
				</article>
				<p><b>Iyolanda Graça</b></p>
				<p>Assessora de Comunicação e Imagem do MJAPDH</p>
			</div>	
		</div>
	</div>
</div>
<!-- /Area News -->

<div class="row moreNews">
	<div class="container">
		<div class="col-md-12" id="moreNotice">
			<h1 class="title">Mais Notícias</h1>
		</div>
	</div>
</div>
<!-- /Area More News -->


<div class="modal fade bs-example-modal-lg"  id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <div class="col-md-12 content-Modal">

                </div>
            </div>
            <div class="modal-footer" style="border: none;"></div>
        </div>
    </div>
</div>

</body>

<?php include 'includes/footer.html';?>
<!-- /Footer Area -->

<script type="text/javascript" src="resources/script/jQuery.js"></script>
<script type="text/javascript" src="resources/script/index.js"></script>
<script type="text/javascript" src="resources/script/master.js"></script>
<script type="text/javascript" src="resources/script/news.js"></script>
<script type="text/javascript" src="resources/bootstrap/js/bootstrap.js"></script>

<script type="text/javascript">
	$('.menu4').addClass('active');

	$('.section iframe').attr({
		width: '185',
		height: '150'
	});

</script>

</html>