<!DOCTYPE html>
<html lang="pt">
<link rel="shortcut icon" href="resources/images/logo.ico" >
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>News</title>
	<link rel="stylesheet" href="resources/styles/index.css">
	<link rel="stylesheet" href="resources/styles/seeNews.css">
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
    }(document, 'script', 'facebook-jssdk'));
</script>

<div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/pt_PT/sdk.js#xfbml=1&version=v2.9&appId=1844189112571148";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>


<div class="row areaContent" id="noticeDetails">
	<div class="container">
		<div class="col-md-8">
			<h3></h3>
			<br>
			<img  class="img-responsive">
			<label>Publicado em: <h5></h5></label>
			<article>
			</article>
			<label>Por: Ministério da Justiça</label>
            <div class="col-md-12">
                <div class="fb-comments" data-href="http://ustp.st/mj/tese/" data-width="700" data-numposts="8"></div>
            </div>
		</div>
		<div class="col-md-4 ">
		<br>
			<h4 class="pull-right" style="margin: 3rem; font-size: 2rem">Multimédia</h4>
			<br><br>

			 <div class="fb-page" data-href="https://www.facebook.com/mjapap.stp/" data-tabs="timeline" data-height="220" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/mjapap.stp/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/mjapap.stp/">Ministério da Justiça, Administração Pública e Direitos Humanos</a></blockquote></div>
			<br><br>

            <div class="col-md-10 areaMultimedia" style="max-height: 46rem; overflow-y: auto;">

            </div>
		</div>

	</div>

</div>


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

<?php include 'includes/footerIn.html';?>
<!-- /Menu Area -->
</body>

<script type="text/javascript" src="resources/script/jQuery.js"></script>
<script type="text/javascript" src="resources/script/index.js"></script>
<script type="text/javascript" src="resources/script/news.js"></script>
<script type="text/javascript" src="resources/bootstrap/js/bootstrap.js"></script>

</html>