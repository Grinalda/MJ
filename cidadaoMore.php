<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Portal do cidadão</title>
	<link rel="stylesheet" href="resources/styles/index.css">
	<link rel="stylesheet" href="resources/styles/legislacao.css">
	<link rel="stylesheet" href="resources/styles/cidadao.css">
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

<div class="row areaTabs">
	<div class="container" id="MoreMaster">
		<h3 id="title-service">Diário da República</h3>
		<!--<button class="btn btn-info"><i class="glyphicon glyphicon-shopping-cart"></i><a href="http://www.notapositiva.com/old/monograf/enginf/licencbach/indexenginfl01.htm" style="color: #fff"> Realizar Serviço online</a></button> -->
		<div class="areaCollapse">
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			  <div class="panel">
			    <div class="panel-heading" role="tab" id="headingOne">
			      <h4 class="panel-title">
			        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"  aria-controls="collapseOne">
			          <i class="glyphicon glyphicon-triangle-bottom"></i> O que é necessário
			        </a>
			      </h4>
			    </div>
			    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
			      <div class="panel-body" id="what-service" >
					<ul>
			        	<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium officia maxime.</li>
			        	<li>Vel tempore consequuntur, libero similique ducimus alias culpa quis omnis explicabo placeat laborum.</li>
						<li>Deserunt hic laudantium doloremque nam ratione, et quo fuga Voluptas laudantium eaque assumenda eius architecto aliquam at eveniet odio.</li>
						<li>Fugiat, rem, quam? Quia dolorum minus iste natus numquam doloribus delectus, pariatur. U</li>        	
			        </ul>
		      	</div>
			   </div>
			  </div>
			  <div class="panel">
			    <div class="panel-heading" role="tab" id="headingTwo">
			      <h4 class="panel-title">
			        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
			          <i class="glyphicon glyphicon-triangle-bottom"></i> Onde Requerer
			        </a>
			      </h4>
			    </div>
			    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
			      <div class="panel-body" id="where-service">
			        <ul>
                        Sem Informações para Mostrar
                    </ul>
			      </div>
			    </div>
			  </div>
			  <div class="panel">
			    <div class="panel-heading" role="tab" id="headingThree">
			      <h4 class="panel-title">
			        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
			          <i class="glyphicon glyphicon-triangle-bottom"></i> Como Requerer
			        </a>
			      </h4>
			    </div>
			    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
			      <div class="panel-body">
			        <ul>
			        	Sem Informações para Mostrar
                    </ul>
			      </div>
			    </div>
			  </div>
			  <div class="panel">
			    <div class="panel-heading" role="tab" id="headingFor">
			      <h4 class="panel-title">
			        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
			          <i class="glyphicon glyphicon-triangle-bottom"></i> Mais Informações
			        </a>
			      </h4>
			    </div>
			    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFor">
			      <div class="panel-body">
			        <ul>
			        	Sem Informações para Mostrar
			        </ul>
			      </div>
			    </div>
			  </div>
			</div>

		</div>

        <div class="fb-comments" data-href="http://www.justica.gov.st/" data-numposts="10"></div>

	</div>

</div>


<?php include 'includes/footerIn.html';?>
<!-- /Menu Area -->

</body>

<script type="text/javascript" src="resources/script/jQuery.js"></script>
<script type="text/javascript" src="resources/script/index.js"></script>
<script type="text/javascript" src="resources/script/cidadao.js"></script>
<script type="text/javascript" src="resources/bootstrap/js/bootstrap.js"></script>

<script type="text/javascript">
	$('.menu6').addClass('active');
</script>

</html>