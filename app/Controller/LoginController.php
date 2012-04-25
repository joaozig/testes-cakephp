<?php
class LoginController extends AppController {
	
	public function gerenciador_index() {

		if ($this->request->is('post')) {

			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash('E-mail e/ou senha inválidos', 'default', array(), 'auth');
			}
	    }
	}
	
	public function admin_index() {

		if ($this->request->is('post')) {

			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash('E-mail e/ou senha inválidos', 'default', array(), 'auth');
			}
	    }
	}

	public function gerenciador_logout() {
    	$this->redirect($this->Auth->logout());
	}

	public function admin_logout() {
    	$this->redirect($this->Auth->logout());
	}
}