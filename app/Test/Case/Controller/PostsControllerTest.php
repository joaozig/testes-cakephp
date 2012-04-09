<?php
class PostsControllerTest extends ControllerTestCase {
	
	public $fixtures = array('app.post');
	
	public function testAdminIndex(){
		$results = $this->testAction('admin/posts/index/');
		debug($results);
	}

	public function testAdminAdd(){
		$data = array('Post' => array('titulo' => 'teste post', 'texto' => 'lorem ipsum dolor sit amet', 'publicado' => 1));
		$results = $this->testAction('admin/posts/add', array('data' => $data, 'method' => 'post'));
		debug($results);
	}
	
	public function testAdminEdit(){
		$results1 = $this->testAction('admin/posts/edit/1');
		debug($results1);
		
		$data = array('Post' => array('id' => 1, 'titulo' => 'teste update', 'texto' => 'teste de update do texto'));
		$results2 = $this->testAction('admin/posts/edit/1', array('data' => $data, 'method' => 'post'));
		debug($results2);
	}
	
	public function testAdminDelete(){
		$results = $this->testAction('admin/posts/delete/1');
		debug($results);
	}
}