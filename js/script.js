var app = angular.module('app', ['ngSanitize']);

app.controller('listController', function($scope,$http){
	$scope.listFromFile = {};
	$scope.registro = {};
	$scope.htmlList = "";
	loadTemplate();
	getList();

	$scope.cadastrarItem = function(){
		console.log($scope.registro);
		$scope.listFromFile[$scope.registro.codigo] = $scope.registro.tag;
		$scope.registro = {};
		console.log($scope.listFromFile);
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