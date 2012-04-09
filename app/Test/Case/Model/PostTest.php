<?php
App::uses('Post', 'Model');
class PostTestCase extends CakeTestCase {
	
	public $fixtures = array('app.post');

	public function setUp(){
		parent::setUp();
		$this->Post = ClassRegistry::init('Post');
	}

	public function testFind(){
		$result = $this->Post->find('all');
		$expected = array(
			array('Post' => array('id' => 1, 'titulo' => 'Teste 1', 'texto' => 'texto teste 1', 'publicado' => true)),
			array('Post' => array('id' => 2, 'titulo' => 'Teste 2', 'texto' => 'texto teste 2', 'publicado' => false)),
			array('Post' => array('id' => 3, 'titulo' => 'Teste 3', 'texto' => 'texto teste 3', 'publicado' => true)),
		);

		$this->assertEqual($result, $expected);
	}

	public function testPublicado(){
		$result = $this->Post->publicado();
		$expected = array(
			array('Post' => array('id' => 1, 'titulo' => 'Teste 1', 'texto' => 'texto teste 1', 'publicado' => true)),
			array('Post' => array('id' => 3, 'titulo' => 'Teste 3', 'texto' => 'texto teste 3', 'publicado' => true)),
		);

		$this->assertEqual($result, $expected);
	}
}