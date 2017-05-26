<!DOCTYPE html>
	<html ng-app='app'>
	<head>
		<meta charset="UTF-8"/>
		<meta autor="Rafael Artal"/>
		<title>Rastreio Correios</title>
		<script src="https://use.fontawesome.com/4b3e772d8b.js"></script>
		<script src="/js/angular.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.1/angular-sanitize.js"></script>

		<script src="/js/script.js"></script>
		<link rel="stylesheet" href="/css/normalize.css">
		<link rel="stylesheet" href="/css/skeleton.css">
		<link rel="stylesheet" href="/css/estilo.css">
		<link rel="stylesheet" href="/css/modal.css">
		<link rel="stylesheet" href="/css/loader.css">
	</head>
	<body ng-controller="listController">
		<div class="section hero values">
			<!-- MODAL -->
			<div class="modal left fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h6 class="modal-title" id="myModalLabel">
								<i class="fa fa-archive yellow" aria-hidden="true"></i>
								Gerenciar Códigos de Rastreio
							</h6>
						</div>

						<div class="modal-body">
							<div class="crud">
								<div class="row">
									<input ng-model="registro.tag" placeholder="Tag" type="text">
								</div>
								<div class="row">
									<input ng-model="registro.codigo" placeholder="Código de Rastreio" type="text">
								</div>
								<button type="button" ng-click="cadastrarItem()" class="button-primary">
									<i class="fa fa-check" aria-hidden="true"></i>
									Cadastrar
								</button>
							</div>
							<div class="lista">
								<ul>
									<li class="row" ng-repeat="(codigo,informacoes) in listFromFile">
										<span class="columns one">
											<i ng-if="informacoes.tag"
											ng-click="removerItem(this)";
											class="fa fa-minus-circle red" aria-hidden="true"></i>
										</span>
										<span class="columns eleven">
											<input ng-if="informacoes.tag" type="text" value="{{codigo}} - {{informacoes.tag}}" />
										</span>
									</li>
								</ul>
							</div>
						</p>
					</div>

				</div>
			</div>
		</div>
		<!-- /MODAL -->	
		<div class="container">
			<div  id="bg-top">
				<span class="subtitle-bg">Rastreio de Encomendas </span>	
			</div>
		</div>


		<div class="container">
			<div class="row">
				<div class="six columns">
					<div class="row">
						<button type="button" data-toggle="modal" data-target="#myModal" class="button-primary">
							<i class="fa fa-plus-circle" aria-hidden="true"></i>  Gerenciar Códigos</button>

						</div>
					</div>

				</div>
				<div ng-if="!templateLoaded" class="row">
					<div class="showbox">
						<div class="loader">
							<svg class="circular" viewBox="25 25 50 50">
								<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
							</svg>
						</div>
						<div class="loader-sub">
							<br>
							Carregando <span id=wait></span>
						</div>
					</div>
				</div>

				<!-- <div ng-bind-html="htmlList"></div> -->
				<div ng-bind-html="htmlList">
					
				</div>
			</div>
		</div>


		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script src="/js/jquery.fallings.js"></script>
		<script src="/js/fallings-bootstrap.js"></script>
		<script src="/js/loader-dot.js"></script>



	</body>
	</html>