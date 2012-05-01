<?php
class TesteController extends AppController {
	
	public $uses = array('Estrutura');
	
	public function index(){

		$estruturas = $this->Estrutura->find('all');
		$this->set('estruturas', $estruturas);
	}
}