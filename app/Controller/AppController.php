<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $components = array('Auth', 'Session');

	public function beforeFilter() {

		Security::setHash('md5');

		if ($this->isPrefix('gerenciador')) {

			AuthComponent::$sessionKey = 'APPGerenciador';

			$this->Auth->authenticate = array(
					AuthComponent::ALL => array(
						'fields'	=> array('username' => 'email', 'password' => 'senha'),
						'scope'		=> array('User.status' => 1)
					),
					'Form'
				);

			$this->Auth->loginAction 	= array('controller' => 'login', 'action' => 'index', 'prefix' => 'gerenciador');
			$this->Auth->authError 		= "Acesso não autorizado.";

		} else if ($this->isPrefix('admin')) {

			AuthComponent::$sessionKey = 'APPAdmin';

			$this->Auth->authenticate = array(
					AuthComponent::ALL => array(
						'userModel'	=> 'Usuario',
						'fields'	=> array('username' => 'email', 'password' => 'senha'),
						'scope'		=> array('Usuario.status' => 1)
					),
					'Form'
				);

			$this->Auth->loginAction 	= array('controller' => 'login', 'action' => 'index', 'prefix' => 'admin');
			$this->Auth->authError 		= "Acesso não autorizado.";

		} else {
			
			$this->Auth->allow();
			
		}
	}

	/**
	 * Verifica se está dentro de um prefixo
	 *
	 * @param string $prefix
	 *
	 * @return boolean
	 */
	protected function isPrefix($prefix) {
		return isset($this->request->params['prefix']) && $this->request->params['prefix'] === $prefix;
	}
}
