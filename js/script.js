var app = angular.module('app', ['ngSanitize']);

app.controller('listController', function($scope,$http){
	$scope.listFromFile = {};
	$scope.registro = {};
	$scope.htmlList = "";
	$scope.templateLoaded = false;
	loadTemplate();
	getList();

	$scope.cadastrarItem = function(){
		if($scope.listFromFile[$scope.registro.codigo]){
			$scope.listFromFile[$scope.registro.codigo].tag = $scope.registro.tag; 
		}else{
			$scope.listFromFile[$scope.registro.codigo] = $scope.registro.tag;
		}
		$scope.registro = {};
		updateFile();
	}	

	$scope.removerItem = function(item){
		$scope.listFromFile[item.codigo] = null;
		$scope.registro = {};
		updateFile();
	}	

	function loadTemplate(){
		$http({ 
			method: 'POST', 
			url: 'index.controller.php', 
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}, 
		})
		.then(function(response) {
			if(response.data['ok']){
				$scope.htmlList = response.data['html'];
				$scope.templateLoaded = true; 
			}
		})
		.catch(function(){
			alert("Falha ao manipular o arquivo");
		});

	}

	function updateFile(){
		$http({ 
			method: 'POST', 
			url: 'file.controller.php', 
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}, 
			data:$scope.listFromFile
		})
		.then(function(response) {
			if(response.data['ok']){
				alert("Registros Atualizados");
				loadTemplate();
			}
		})
		.catch(function(){
			alert("Falha ao manipular o arquivo");
		});

	}

	function getList(){
		$http.get('codigos.json').then(sucessFileCallback, errorFileCallback);
	}

	function sucessFileCallback(resp){	
		if(!resp.data || resp.data.length == 0){
			$scope.listFromFile = new Object();
			return;
		}
		$scope.listFromFile = resp.data;
	}

	function errorFileCallback(resp){
		alert("Falha ao abrir o arquivo de códigos (/codigos.json)");
	}

});