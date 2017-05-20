<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';
require_once 'rastrear.class.php';

class Rastreio{
	private $codigosRastreio = array();
	protected $encomendas = array();
	function __construct($codigosRastreio) {
		if(empty($codigosRastreio)){
			return;
		}
		$this->codigosRastreio = $codigosRastreio; 
		$this->getEncomendas();
	}

	public function getListHtml(){
		$templatePath = $_SERVER['DOCUMENT_ROOT'].'templates/';

		$loader = new Twig_Loader_Filesystem($templatePath);
		$twig = new Twig_Environment($loader, array(
			// 'cache' => $templatePath. 'cache',
			));
		if(!empty($this->encomendas)){
			return $twig->render('list-rastreios.html',array('dados' => $this->encomendas));
		}
		return "<br>Nenhuma encomenda ativa para rastreio.";
	}


	private function getEncomendas(){
		if(empty($this->codigosRastreio)){
			return false;
		}
		
		# setando os parametros de inicialização
		$_params = array( 'user' => 'ECT', 'pass' => 'SRO', 'tipo' => 'L', 'resultado' => 'T', 'idioma' => 101 );

		Rastrear::init( $_params );

		foreach($this->codigosRastreio as $codigo => $tag){
			$obj = Rastrear::get( $codigo );
			if(isset($obj->erro))
				die( $obj->erro );

			// echo "NUMERO: "    . $obj -> numero . "<br>" ;
			// echo "CATEGORIA: " . $obj -> categoria . "<br>" ;

			if( is_object($obj->evento) ):
				$tmp = Array();
			$tmp[] = $obj->evento ;
			$obj->evento = $tmp;
			endif;

			$encomenda = array();
			$encomenda['tag'] = $tag;
			$encomenda['codigo'] = @$obj->numero;
			$encomenda['status'] = @$obj->evento[0]->descricao;
			$encomenda['statusHora'] = @$obj->evento[0]->hora;
			$encomenda['statusData'] = @$obj->evento[0]->data;
			
			$encomenda['categoria'] = @$obj->categoria;

			$encomenda['encaminhadoDe'] = @$obj->evento[0]->local;
			$encomenda['encaminhadoDeCodigo'] = @$obj->evento[0]->codigo;
			$encomenda['encaminhadoDeCidade'] = @$obj->evento[0]->cidade;
			$encomenda['encaminhadoDeUF'] = @$obj->evento[0]->uf;
			
			$encomenda['encaminhadoPara'] = @$obj->evento[0]->destino->local;
			$encomenda['encaminhadoParaCodigo'] = @$obj->evento[0]->destino->codigo;
			$encomenda['encaminhadoParaCidade'] = @$obj->evento[0]->destino->cidade;
			$encomenda['encaminhadoParaUF'] = @$obj->evento[0]->destino->uf;

			$this->encomendas[] = $encomenda;
		}

		return $this->encomendas;


	// echo "DATA: "   . $ev -> data   . "<br>" ;
	// echo "HORA: "   . $ev -> hora   . "<br>" ;
	// echo "DESCRICAO: " . $ev -> descricao . "<br>" ;

	// if( isset( $ev -> destino ) ):
	//     echo " DESTINO (LOCAL): "  . $ev -> destino -> local . "<br>" ;
	//     // echo " DESTINO (CODIGO): " . $ev -> destino -> codigo . "<br>" ;
	//     echo " DESTINO (CIDADE): " . $ev -> destino -> cidade . "<br>" ;
	//     // echo " DESTINO (BAIRRO): " . $ev -> destino -> bairro . "<br>" ;
	//     echo " DESTINO (UF): "     . $ev -> destino -> uf . "<br>" ;
	// endif;

	// echo "<hr>";


	}
}
