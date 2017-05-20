<? require_once 'index.controller.php' ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<title>Rastreio Correios</title>
	<script src="https://use.fontawesome.com/4b3e772d8b.js"></script>
	<link rel="stylesheet" href="/css/normalize.css">
	<link rel="stylesheet" href="/css/skeleton.css">
	<link rel="stylesheet" href="/css/estilo.css">
	<link rel="stylesheet" href="/css/modal.css">
</head>
<body>
	<div class="section hero values">
		<!-- MODAL -->
		<div class="modal left fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h6 class="modal-title" id="myModalLabel">Códigos Para Adicionar</h6>
					</div>

					<div class="modal-body">
						<div class="row">
							<form>
								<label for="rastreio"></label>
								<input class="u-full-width" placeholder="Código de Rastreio" id="rastreio" type="text">
							</form>
						</div>
					</p>
				</div>

			</div>
		</div>
	</div>
	<!-- /MODAL -->

	<div class="container">
		<div class="row">
			<div class="six columns">
				<button type="button" data-toggle="modal" data-target="#myModal" class="button-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i>Adicionar Códigos</button>

			</div>
			<div class="row">
				<?= $listRastreio ?>
			</div>
		</div>
	</div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


</body>
</html>